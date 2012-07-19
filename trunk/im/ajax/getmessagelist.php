<?php
if(!$IWEB_IM_IN) {
	die('Hacking attempt');
}
require("foundation/module_im.php");

/* post 数据处理 */
$pals = $_POST["pals"];

if(!$pals) {
	exit("-1");
}

//数据表定义区
$t_chat_session = IM_DBTABLEPRE."session";
$t_chat_txt = IM_DBTABLEPRE."txt";

// pals处理
$pals_explode = explode("|",$pals);
$pals_explode = array_nullclear($pals_explode);

//定义数据库操作
dbtarget('r',$dbServs);
$dbo = new dbex;

// 查询session
$session_list = get_newmsg_friend_list($dbo,$t_chat_session,$uid);

// 如果有新消息 执行如下
if($session_list) {
	$get_txt_sql = "select * from `$t_chat_txt` where ";
	$status_new_msg_txt = 0; // 是否有新的消息内容需要提取
	$update_session_arr = array(); // 需要更新用户当前读位置的会话信息
	$or = '';
	foreach($session_list as $value) {
		$return_pals_id = empty($value['group_name']) ? trim(str_replace(','.$uid.',','',$value['player_ids']),',') : "g_".$value['session_id'];

		$return_winopen = in_array($return_pals_id,$pals_explode) ? '1' : '-1';
		if($return_winopen=="1"){
			$status_new_msg_txt++;
			$update_session_arr[] = $value;
			$get_txt_sql .= $or." (session_id='".$value['session_id']."' and txt_pagenum>='".$value['page']."') and txt_content!=''";
			$or = ' or ';
		}

		$return_value[$value['session_id']] = array(
			'pals_id' => $return_pals_id,
			'winopen' => $return_winopen,
			'message' => '-1',
			'video_status' => $value['video_status'],
		);
		$pagects[$value['session_id']] = array($value['page'],$value['ct']);
	}

	$get_txt_sql .= " order by txt_pagenum asc";

	// 如果有新的消息内容需要提取
	if($status_new_msg_txt>0) {
		// 查询需要提取的新消息txt记录
		$txt_list = $dbo->getRs($get_txt_sql);
		$message_arr = array();
		$split_arr = array();
		foreach($txt_list as $value) {
			if($value['using']==1 && $value['txt_length']>=$txt_split_lenght) {
				$split_arr[$value['player_ids']] = array(
					'id' => $value['id'],
					'multi_chat' => $value['multi_chat'],
					'player_ids' => $value['player_ids'],
					'session_id' => $value['session_id'],
					'txt_pagenum' => $value['txt_pagenum']+1,
					'txt_ctnum' => 1,
					'txt_content' => '',
					'txt_length' => '0',
					'txtlog_pageview' => $value['player_ids']
				);
			}

			// 格式化聊天记录， 并存放到 message_arr
			$formatv = format_message($pagects[$value['session_id']],$value);

			if(isset($message_arr[$value['session_id']])) {
				$message_arr[$value['session_id']] = array_merge($message_arr[$value['session_id']],$formatv);
			} else {
				$message_arr[$value['session_id']] = $formatv;
			}
		}

		// 形成最终数组 $return_value;
		foreach($message_arr as $key=>$value) {
			if($value) {
				$return_value[$key]['message'] = $value;
			}
		}

		//定义数据库操作
		dbtarget('w',$dbServs);
		$dbo = new dbex;
		foreach($update_session_arr as $value) {
			update_readed_pagect_position($dbo,$t_chat_session,$uid,$value);
		}

		if($split_arr) {
			// 需要折分新记录
			split_txt_content($dbo,$t_chat_session,$t_chat_txt,$split_arr);
		}
	}
	//$return_value = clear_array_numkey($return_value);
	sort($return_value);
	echo chat_json_encode($return_value);

} else {
	exit("-1");
}
?>