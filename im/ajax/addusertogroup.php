<?php
if(!$IWEB_IM_IN) {
	die('Hacking attempt');
}
require("foundation/module_im.php");

/* post 数据处理 */
$pals_ids = $_POST["pid"];
$gid = $_POST["gid"];

if(!$pals_ids || !$gid) {
	exit("-1");
}

$session_id = intval(str_replace('g_','',$gid));
if(!$session_id) {
	exit("-1");
}

//数据表定义区
$t_chat_txt = IM_DBTABLEPRE."txt";
$t_chat_session = IM_DBTABLEPRE."session";

//定义数据库操作
dbtarget('r',$dbServs);
$dbo=new dbex;
$session_info = get_session_info_bysessionid($dbo,$t_chat_session,$session_id);
$add_arr = array();
if($session_info) {
	// 处理 player_ids, 相关好了update
	$player_ids = $session_info['player_ids'];
	$player_id_arr = explode(",",trim($player_ids,', '));
	$init_pagect_position_arr = explode(",",$session_info['init_pagect_position']);
	$readed_pagect_position_arr = explode(",",$session_info['readed_pagect_position']);

	$pals_id_arr = explode(",",trim($uid.$pals_ids,', '));
	if(count($pals_id_arr)>30) {
		exit("2");
	}
	$arr2 = array_diff($player_id_arr,$pals_id_arr);
	$arr3 = array_diff($pals_id_arr,$player_id_arr);

	if($arr2) {
		foreach($player_id_arr as $k=>$v) {
			if(in_array($v,$arr2)) {
				$init_pagect_position_arr[$k] = '';
				$readed_pagect_position_arr[$k] = '';
				$player_id_arr[$k] = '';
			}
		}
	}
	if($arr3) {
		$position = $session_info['page_num']."->".$session_info['ct_num'];
		foreach($arr3 as $v) {
			$player_id_arr[] = $v;
			$init_pagect_position_arr[] = $position;
			$readed_pagect_position_arr[] = $position;
		}
	}

	//定义数据库操作
	dbtarget('w',$dbServs);
	$dbo = new dbex;

	$update_session['player_ids'] = ','.implode(",",array_nullclear($player_id_arr)).',';
	$update_session['init_pagect_position'] = implode(",",array_nullclear($init_pagect_position_arr));
	$update_session['readed_pagect_position'] = implode(",",array_nullclear($readed_pagect_position_arr));
	$update_session_item = get_update_item($update_session);
	$sql = "update $t_chat_session set $update_session_item where session_id='$session_id'";
	if($dbo->exeUpdate($sql)) {
		$sql2 = "update $t_chat_txt set player_ids='".$update_session['player_ids']."',txtlog_pageview='".$update_session['player_ids']."' where session_id='$session_id' and `using`='1'";
		$dbo->exeUpdate($sql2);
	}
	echo "1";
} else {
	exit("-1");
}

?>