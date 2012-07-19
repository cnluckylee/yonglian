<?php
if(!$IWEB_IM_IN) {
	die('Hacking attempt');
}
require("foundation/module_im.php");

/* post 数据处理 */
$pals_id = $_POST["id"];

if(!$pals_id) {
	exit("-1");
}

//数据表定义区
$t_chat_session = IM_DBTABLEPRE."session";
$t_chat_txt = IM_DBTABLEPRE."txt";

//定义数据库操作
dbtarget('r',$dbServs);
$dbo=new dbex;

if(is_numeric($pals_id)) {
	$player_ids = get_player_ids($uid,$pals_id);
	$session_info = get_session_info($dbo,$t_chat_session,$player_ids);
} else {
	$session_id = str_replace("g_","",$pals_id);
	if(is_numeric($session_id)) {
		$session_info = get_session_info_bysessionid($dbo,$t_chat_session,$session_id);
	} else {
		exit("-1");
	}
}

//定义数据库操作
dbtarget('w',$dbServs);
$dbo=new dbex;
if(!$session_info) {
	$session_info = insert_new_seesion_info($dbo,$t_chat_session,$player_ids);
	$txt_info = insert_new_txt_info($dbo,$t_chat_txt,$player_ids,$session_info['session_id']);
} else {
	update_init_pagect_position($dbo,$t_chat_session,$session_info['session_id'],$session_info['readed_pagect_position']);	//更新初始 pagect_position
}

$verifycode = mk_md5($session_info['session_code'],$uverifycode);
exit($verifycode);
?>