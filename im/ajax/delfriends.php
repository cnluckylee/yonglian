<?php
if(!$IWEB_IM_IN) {
	die('Hacking attempt');
}
require("foundation/module_im.php");
$delids = short_check($_POST['ids']);
if($delids) {
	$delids = array_nullclear(explode(",",$delids));
} else {
	exit('-1');
}

//数据表定义区
$t_chat_session = IM_DBTABLEPRE."session";
$t_chat_txt = IM_DBTABLEPRE."txt";
$t_chat_pals = IM_DBTABLEPRE."pals";

//定义数据库操作
dbtarget('r',$dbServs);
$dbo = new dbex;
$del_success = array();

foreach($delids as $pals_id) {
	$player_ids = get_player_ids($uid,$pals_id);
	$session_info = get_session_info($dbo,$t_chat_session,$player_ids);
	if($session_info) {
		$session_id = $session_info['session_id'];
		$delText = imDelTextBySessionId($dbo,$t_chat_txt,$session_id);
		$delSession = imDelSessionBySessionId($dbo,$t_chat_session,$session_id);
	}
	$delPals = imDelPalsBySessionId($dbo,$t_chat_pals,$uid,$pals_id);
	$del_success[] = $pals_id;
}
echo chat_json_encode($del_success);

?>