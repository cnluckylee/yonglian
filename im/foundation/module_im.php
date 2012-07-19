<?php
if(!$IWEB_IM_IN) {
	die('Hacking attempt');
}

// 获取用户信息
function get_user_info(&$dbo,$table,$uid) {
	$sql = "select * from `$table` where uid='$uid'";
	$row = $dbo->getRow($sql);
	return $row;
}
function get_user_info_by_name(&$dbo,$table,$uname) {
	$sql = "select * from `$table` where u_name='$uname'";
	$row = $dbo->getRs($sql);
	return $row;
}

// 添加一个新用户信息
function insert_user_info(&$dbo,$table,$array) {
	$item_sql = get_insert_item($array);
	$sql = "insert into `$table` $item_sql";
	return $dbo->exeUpdate($sql);
}

// 获取群组信息
function get_group_list(&$dbo,$table,$uid) {
	global $baseUrl;
	$sql = "select * from `$table` where group_name!='' and instr(player_ids,',$uid,')";
	$rows = $dbo->getRs($sql);
	$array = array();
	foreach($rows as $k=>$v) {
		$p_value = array_nullclear(explode(",",$v['player_ids']));
		$array[$k]['host_id'] = $uid;
		$array[$k]['pals_id'] = "g_".$v['session_id'];
		$array[$k]['group_name'] = $v['group_name'];
		$array[$k]['pals_name'] = $v['group_name'];
		$array[$k]['pals_ico'] = $baseUrl."skin/default/images/talk.gif";
		$array[$k]['line_status'] = "1";
		$array[$k]['num'] = count($p_value);
		$array[$k]['group_mid'] = $p_value[1];
	}
	return $array;
}
//获取所有群组信息
function get_allgroup_list(&$dbo,$table) {
	$sql = "select * from `$table` where group_name!=''";
	$rows = $dbo->getRs($sql);
	$array = array();
	foreach($rows as $k=>$v) {
		$array[$k]['host_id'] = $uid;
		$array[$k]['pals_id'] = "g_".$v['session_id'];
		$array[$k]['group_name'] = $v['group_name'];
		$array[$k]['pals_name'] = $v['group_name'];
		$array[$k]['pals_ico'] = "skin/default/images/talk.gif";
		$array[$k]['line_status'] = "1";
	}
	return $array;
}

// 添加一个好友
function insert_friend_info(&$dbo,$table,$array) {
	$item_sql = get_insert_item($array);
	$sql = "insert into `$table` $item_sql";
	return $dbo->exeUpdate($sql);
}

// 获取好友列表
function get_friend_list(&$dbo,$table,$tableUsers,$uid) {
	$sql = "select p.*,u.u_intro as pals_intro from `$table` as p, `$tableUsers` as u where p.host_id='$uid' and p.pals_id=u.uid";
	$rs = $dbo->getRs($sql);
	if(!$rs) { return false;}
	$online = array();
	$notline = array();
	foreach($rs as $key=>$value) {
		if($value['line_status']==0 || $value['line_status']==2) {
			$notline[] = clear_array_numkey($value);
		} else {
			$online[] = clear_array_numkey($value);
		}
	}
	return array_merge($online,$notline);
}
function get_group_friend_list($dbo,$table,$ids) {
	$sql = "select * from `$table` where uid in ($ids)";
	$rs = $dbo->getRs($sql);
	if(!$rs) { return false;}
	$online = array();
	$notline = array();
	foreach($rs as $key=>$value) {
		if($value['line_status']=='0' || $value['line_status']=='2') {
			$notline[] = array(
				'pals_id' => $value['uid'],
				'pals_name' => $value['u_name'],
				'pals_ico' => $value['u_ico'],
				'line_status' => $value['line_status'],
				'pals_intro' => $value['u_intro'],
			);
		} else {
			$online[] = array(
				'pals_id' => $value['uid'],
				'pals_name' => $value['u_name'],
				'pals_ico' => $value['u_ico'],
				'line_status' => $value['line_status'],
				'pals_intro' => $value['u_intro'],
			);
		}
	}
	return array_merge($online,$notline);
}

// 获取有新消息的好友列表
function get_newmsg_friend_list(&$dbo,$table,$uid) {
	$player_ids = ",$uid,";
	$sql = "SELECT * FROM `$table` WHERE instr(player_ids,'$player_ids')";
	$rs = $dbo->getRs($sql);
	$array = array();
	if($rs) {
		foreach($rs as $key=>$value) {
			if($pagect = check_new_message($uid,$value)) {
				$value['page'] = $pagect[0];
				$value['ct'] = $pagect[1];
				$array[] = $value;
			}
		}
	}
	return $array;
}

// 发送信息 用户信息
function post_txt(&$dbo,$table,$player_ids,$txt_content,$txt_length) {
	$sql = "update `$table` set txt_content = CONCAT(txt_content,'<ct_',txt_ctnum,'>$txt_content</ct_',txt_ctnum,'>'), txt_length=txt_length+'$txt_length', txt_ctnum=txt_ctnum+1 where player_ids='$player_ids' and multi_chat='0' ORDER BY txt_pagenum DESC LIMIT 1";
	return $dbo->exeUpdate($sql);
}
// 发送信息 群组信息
function post_txt_bysessionid($dbo,$table,$session_id,$txt_content,$txt_length) {
	$sql = "update `$table` set txt_content = CONCAT(txt_content,'<ct_',txt_ctnum,'>$txt_content</ct_',txt_ctnum,'>'), txt_length=txt_length+'$txt_length', txt_ctnum=txt_ctnum+1 where session_id='$session_id' ORDER BY txt_pagenum DESC LIMIT 1";
	return $dbo->exeUpdate($sql);
}

// 更新chat_session ct_num	// 一对一用户
function update_session_ctnum(&$dbo,$table,$player_ids) {
	$sql = "update `$table` set ct_num=ct_num+1 where player_ids='$player_ids' and group_name=''";
	return $dbo->exeUpdate($sql);
}
// 群组用户
function update_session_ctnum_bysessionid($dbo,$table,$session_id) {
	$sql = "update `$table` set ct_num=ct_num+1 where session_id='$session_id'";
	return $dbo->exeUpdate($sql);
}

// 根据player_ids获取session_info
function get_session_info(&$dbo,$table,$player_ids) {
	$sql = "select * from `$table` where player_ids='$player_ids' and group_name=''";
	return $dbo->getRow($sql);
}

// 根据session_id获取session_info
function  get_session_info_bysessionid(&$dbo,$table,$session_id) {
	$sql = "select * from `$table` where session_id='$session_id'";
	return $dbo->getRow($sql);
}

// 检查是否有新消息
function check_new_message($uid,$session_info) {
	$r_arr = explode(",",$session_info['readed_pagect_position']);
	$p_arr = explode(",",$session_info['player_ids']);
	if(!in_array($uid,$p_arr)) {
		return false;
	}
	$k = '';
	foreach($p_arr as $key=>$value) {
		if($value==$uid) {
			$k = ($key-1);
		}
	}
	$pagect = explode("->",$r_arr[$k]);
	if($session_info['page_num'] > $pagect[0] || $session_info['ct_num'] > $pagect[1] || ($session_info['video_status']==1)) {
		return $pagect;
	} else {
		return false;
	}
}

// 更新 init_pagect_position
function update_init_pagect_position($dbo,$table,$session_id,$readed_pagect_position) {
	$sql = "update `$table` set init_pagect_position='$readed_pagect_position' where session_id='$session_id'";
	return $dbo->exeUpdate($sql);
}

// 创建新的session_info
function insert_new_seesion_info(&$dbo,$table,$player_ids) {
	$pagect_position = get_init_pagect_position($player_ids);
	$insert_array = array(
		'player_ids' => $player_ids,
		'page_num' => '1',
		'ct_num' => '0',
		'init_pagect_position' => $pagect_position,
		'readed_pagect_position' => $pagect_position,
		'session_code' => mk_code(),
	);
	$item_sql = get_insert_item($insert_array);
	$sql = "insert into `$table` $item_sql";
	if($dbo->exeUpdate($sql)) {
		$insert_array['session_id'] = mysql_insert_id();
		return $insert_array;
	} else {
		return false;
	}
}

// 创建新的txt_info
function insert_new_txt_info(&$dbo,$table,$player_ids,$session_id,$multi_chat=0) {
	$multi_chat = $multi_chat ? 1 : 0;
	$insert_array = array(
		'player_ids' => $player_ids,
		'multi_chat' => $multi_chat,
		'txt_content' => '',
		'txt_length' => 0,
		'txt_pagenum' => 1,
		'txtlog_pageview' => $player_ids,
		'session_id' => $session_id,
	);

	$item_sql = get_insert_item($insert_array);
	$sql = "insert into `$table` $item_sql";
	if($dbo->exeUpdate($sql)) {
		return $insert_array;
	} else {
		return false;
	}
}

// 初始化pagect_position
function get_init_pagect_position($player_ids) {
	$num = back_player_num($player_ids);
	$newarray = array();
	for($i=0; $i<$num; $i++) {
		$newarray[] = '1->0';
	}
	return implode(",",$newarray);
}

// 初始化pagect_position
function back_player_num($player_ids) {
	return count(explode(",",$player_ids))-2;
}

// 获取player_ids
function get_player_ids($uid,$pals_id) {
	$newarray = array();
	if(strstr($pals_id,',')){
		$explode = explode(",",$pals_id);
		$newarray = $explode;
		if(!in_array($uid,$newarray)) {
			$newarray[] = $uid;
		}
	} else {
		$newarray = array($uid,$pals_id);
	}
	$newarray = array_nullclear($newarray);
	sort($newarray);
	return ','.implode(",",$newarray).',';
}

// 格式聊天记录到数组
function format_message($pagect,$txt) {
	$array = array();
	if($txt['txt_pagenum']>$pagect[0] || $pagect[1]==0) {
		preg_match_all("/<ct_([0-9]+)>([0-9]+){([0-9]+-[0-9]+-[0-9]+ [0-9]+:[0-9]+:[0-9]+)}(.+?)<\/ct_[0-9]+>/",$txt['txt_content'],$out);
	} else {
		$ex_result = explode("<ct_".($pagect[1]+1).">",$txt['txt_content']);
		preg_match_all("/<ct_([0-9]+)>([0-9]+){([0-9]+-[0-9]+-[0-9]+ [0-9]+:[0-9]+:[0-9]+)}(.+?)<\/ct_[0-9]+>/","<ct_".($pagect[1]+1).">".$ex_result[1],$out);
	}
	foreach($out[1] as $key=>$value) {
		$array[$key] = array(
			'rid'=>	$out[1][$key],
			'id' => $out[2][$key],
			'time' => $out[3][$key],
			'txt' => preg_replace("/{:(\d+):}/i","<span class='smile_$1'></span>",$out[4][$key])
		);
	}
	return $array;
}

// 更新当前用户所读到的位置
function update_readed_pagect_position(&$dbo,$table,$uid,$array) {
	if($array) {
		$ex2 = array_nullclear(explode(",",$array['player_ids']));
		$ex3 = explode(",",$array['readed_pagect_position']);
		foreach($ex2 as $k=>$v) {
			if($v==$uid) {
				$ex3[$k-1] = $array['page_num']."->".$array['ct_num'];
			}
		}
		$readed_pagect_position = implode(",",$ex3);
		$sql = "update `$table` set readed_pagect_position='$readed_pagect_position' where session_id='".$array['session_id']."'";
		return $dbo->exeUpdate($sql);
	}
}

// 聊天记录自动拆分
function split_txt_content(&$dbo,$t_chat_session,$t_chat_txt,$split_arr) {
	foreach($split_arr as $value) {
		// 更新老记录为不使用记录
		$dbo->exeUpdate("update $t_chat_txt set `using`='0' where id='".$value['id']."'");
		// 插入新记录
		$value['id'] = '';
		$insert_item = get_insert_item($value);
		$sql = "insert into $t_chat_txt $insert_item";
		if($dbo->exeUpdate($sql)) {
			$dbo->exeUpdate("update $t_chat_session set page_num='".$value['txt_pagenum']."',ct_num=0 where session_id='".$value['session_id']."'");
		}
	}
	return ;
}

// 改变当前状态
function change_status($dbo,$t_chat_pals,$t_chat_users,$v,$uid) {
	$time = time();
	$sql = "UPDATE `$t_chat_pals` SET line_status='$v' WHERE pals_id='$uid'";
	if($dbo->exeUpdate($sql)){
		return $dbo->exeUpdate("UPDATE `$t_chat_users` SET line_status='$v',last_time='$time' WHERE uid='$uid'");
	} else {
		return false;
	}
}

// 用户创建一个新组
function create_new_group(&$dbo,$t_chat_session,$t_chat_txt,$uid,$groupname,$m) {
	$insert_session_array = array(
		'player_ids' => ','.$uid.',',
		'page_num' => 1,
		'ct_num' => 0,
		'init_pagect_position' => '1->0',
		'readed_pagect_position' => '1->0',
		'group_name' => $groupname,
		'session_code' => mk_code(),
	);
	if($m=='meeting'){
		$insert_session_array['contact_status'] = ','.$uid.'->1,';
	}

	$insert_session_item = get_insert_item($insert_session_array);
	$sql = "insert into `$t_chat_session` $insert_session_item";
	if($dbo->exeUpdate($sql)) {
		$session_id = mysql_insert_id();
		insert_new_txt_info($dbo,$t_chat_txt,','.$uid.',',$session_id,1);
	} else {
		return false;
	}
	return $session_id;
}

// 更新用户最后动作时间
function update_user_last_time(&$dbo,$table,$uid,$time_stamp) {
	$sql = "update `$table` set last_time='$time_stamp' where uid='$uid'";
	return $dbo->exeUpdate($sql);
}

function im_update_online_time(&$dbo,$table,$uid,$time_stamp,$online_time) {
	$sql = "update `$table` set last_time='$time_stamp',online_time='$online_time' where uid='$uid'";
	return $dbo->exeUpdate($sql);
}

// 获取已超时的用户
function get_timeout_user($dbo,$table,$time_stamp) {
	global $offline_time;
	$last_time = $time_stamp-$offline_time;
	$sql = "SELECT uid FROM `$table` WHERE line_status>0 AND last_time<'$last_time'";
	$rowset = $dbo->getRs($sql);
	$array = array();
	if($rowset) {
		foreach($rowset as $value) {
			$array[] = $value['uid'];
		}
		return $array;
	} else {
		return false;
	}
}

// 更新超时用户为离线
function update_user_to_offline($dbo,$t_chat_users,$t_chat_pals,$uids) {
	$sql = "update `$t_chat_users` set line_status=0 where uid in ($uids)";
	if($dbo->exeUpdate($sql)) {
		$sql = "update `$t_chat_pals` set line_status=0 where pals_id in ($uids)";
		return $dbo->exeUpdate($sql);
	} else {
		return false;
	}
}

// 改变信息提示音状态
function change_msgwav($dbo,$table,$v,$uid) {
	$sql = "update `$table` set msg_wav='$v' where uid='$uid'";
	return $dbo->exeUpdate($sql);
}

// 创建新的文件传输信息 transfer_fileinfo
function insert_new_transfer_fileinfo(&$dbo,$table,$insert_array) {
	$item_sql = get_insert_item($insert_array);
	$sql = "insert into `$table` $item_sql";
	if($dbo->exeUpdate($sql)) {
		return mysql_insert_id();
	} else {
		return '-1';
	}
}

//获取传输文件的信息
function get_transfer_fileinfo(&$dbo,$table,$where){
	$sql = "select * from `$table` where $where";
	$row = $dbo->getRow($sql);
	return $row;
}

//更新传输文件状态
function update_transfer_fileinfo(&$dbo,$table,$autoid){
	$sql = "update `$table` set is_download=1, download_time='".time()."' where id='$autoid'";
	return $dbo->exeUpdate($sql);

}

// 添加新纪录
function i_im_insert_newRecord(&$dbo,$table,$array) {
	$item_sql = get_insert_item($array);
	$sql = "insert into `$table` $item_sql";
	return $dbo->exeUpdate($sql);
}

//获取peerid
function get_peerid_by_uid(&$dbo,$table,$uid){
	$sql = "select im_peerid from `$table` where uid='$uid'";
	return $dbo->getRow($sql);
}
//更新peerid
function update_peerid(&$dbo,$table,$uid,$peerid){
	$sql = "update `$table` set im_peerid='$peerid' where uid='$uid'";
	return $dbo->exeUpdate($sql);
}
//更新视频链接状态
function update_video_status(&$dbo,$table,$player_ids,$status,$uid=0){
	if($uid){
		$sql = "update `$table` set video_status='$status',from_user_id='$uid' where player_ids='$player_ids' and group_name=''";
	}else{
		$sql = "update `$table` set video_status='$status' where player_ids='$player_ids' and group_name=''";
	}
	$dbo->exeUpdate($sql);
}
//更新个性签名
function update_intro(&$dbo,$table,$intro,$uid) {
	$sql = "update `$table` set u_intro = '$intro' where uid='$uid'";
	return $dbo->exeUpdate($sql);
}
//更新用户头像
function imUpdateHeadImg(&$dbo,$table,$headimg,$uid) {
	$sql = "update $table set u_ico = '$headimg' where uid=$uid";
	return $dbo->exeUpdate($sql);
}
//删除聊天记录
function imDelTextBySessionId(&$dbo,$table,$sessionid) {
	$sql = "delete from `$table` where session_id='$sessionid'";
	return $dbo->exeUpdate($sql);
}
//删除好友关系记录
function imDelSessionBySessionId(&$dbo,$table,$sessionid) {
	$sql = "delete from `$table` where session_id='$sessionid'";
	return $dbo->exeUpdate($sql);
}
//删除好友关系
function imDelPalsBySessionId(&$dbo,$table,$uid,$pals_id) {
	$sql = "delete from `$table` where host_id='$uid' and pals_id='$pals_id'";
	return $dbo->exeUpdate($sql);
}
//获取自定义好友分组
function imGetCustomGroup(&$dbo,$table,$uid) {
	$sql = "select * from `$table` where uid='$uid'";
	return $dbo->getRs($sql);
}
//移动好友
function imMoveFriends(&$dbo,$table,$uid,$gid,$ids) {
	$swithor = get_multi_or_item('pals_id',$ids);
	$sql = "update `$table` set groupId='$gid' where host_id='$uid' and ($swithor)";
	return $dbo->exeUpdate($sql);
}
//移动整个分组好友
function imMoveGroupFriends(&$dbo,$table,$uid,$fgid,$togid=0) {
	$sql = "update `$table` set groupId='$togid' where host_id='$uid' and groupId='$fgid'";
	return $dbo->exeUpdate($sql);
}
//添加好友分组
function imInsertCustomGroup(&$dbo,$table,$array) {
	$item_sql = get_insert_item($array);
	$sql = "insert into `$table` $item_sql";
	if($dbo->exeUpdate($sql)) {
		return mysql_insert_id();
	} else {
		return '-1';
	}
}
//修改自定义好友分组
function imUpdateCustomGroup(&$dbo,$table,$uid,$gid,$gname) {
	$sql = "update `$table` set groupName = '$gname' where id='$gid' and uid='$uid'";
	return $dbo->exeUpdate($sql);
}
//删除自定义好友分组
function imDelCustomGroup(&$dbo,$table,$uid,$gid) {
	$sql = "delete from `$table` where id='$gid' and uid='$uid'";
	return $dbo->exeUpdate($sql);
}
//好友设置
function imUpdateFriendsCondition(&$dbo,$table,$uid,$condition,$question='',$answer='') {
	$subsql = ",question='".$question."',answer='".$answer."'";
	if($question=='' || $answer=='') {
		$subsql = '';
	}
	$sql = "update `$table` set addFriends='$condition' ".$subsql." where uid='$uid'";
	return $dbo->exeUpdate($sql);
}
//获取所有聊过天的会员
function imGetAllContactedUsers(&$dbo,$table,$uid) {
	$player_ids = ",$uid,";
	$sql = "select * from `$table` where instr(player_ids,'$player_ids') and group_name=''";
	return $dbo->getRs($sql);
}
//更新用户信息
function imUpdateUserInfo(&$dbo,$table,$uid,$userinfo) {
	$userinfo = get_update_item($userinfo);
	$sql = "update `$table` set $userinfo where uid='$uid'";
	return $dbo->exeUpdate($sql);
}
//更新session信息
function imUpdateSessionById(&$dbo,$table,$sessionid,$sessioninfo) {
	$sessions = get_update_item($sessioninfo);
	$sql = "update `$table` set $sessions where session_id='$sessionid'";
	return $dbo->exeUpdate($sql);
}
//搜索讨论组
function imSearchGroupByKeyWord(&$dbo,$table,$keyword) {
	$sql = "select * from `$table` where group_name like '%${keyword}%'";
	return $dbo->getRs($sql);
}
//获取单页聊天记录
function imGetSingleMsg(&$dbo,$table,$tid) {
	$sql = "select * from `$table` where id='$tid'";
	return $dbo->getRow($sql);
}
//跟新聊天记录
function imUpdateMsg(&$dbo,$table,$tid,$update) {
	$update = get_update_item($update);
	$sql = "update `$table` set $update where id='$tid'";
	return $dbo->exeUpdate($sql);
}
//删除消息分页
function imDelMsgPage(&$dbo,$table,$tid) {
	$sql = "delete from `$table` where id='$tid'";
	return $dbo->exeUpdate($sql);
}
//删除全部聊天记录
function imDelWholeMsg(&$dbo,$table,$session_id,$player_ids) {
	$sql = "delete from `$table` where session_id='$session_id' and player_ids='$player_ids' and multi_chat='0'";
	return $dbo->exeUpdate($sql);
}
//数据修复
function imIsExistTxt(&$dbo,$table,$session_id) {
	$sql = "select * from `$table` where session_id='$session_id'";
	return $dbo->getRs($sql);
}
?>