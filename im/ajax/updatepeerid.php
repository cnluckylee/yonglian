<?php
if(!$IWEB_IM_IN) {
	die('Hacking attempt');
}
require("foundation/module_im.php");

$peerid = short_check($_POST['peerid']);
$calluser = short_check($_POST['calluser']);

//数据表定义区
$t_users = IM_DBTABLEPRE."users";
$t_chat_session = IM_DBTABLEPRE."session";

//定义数据库操作
dbtarget('w',$dbServs);
$dbo=new dbex;

$player_ids = get_player_ids($uid,$calluser); 
$session_info = get_session_info($dbo,$t_chat_session,$player_ids);
if($session_info) {
	$player_ids = array_nullclear(explode(',',$session_info['player_ids']));
	$video_peerid = $session_info['video_peerid'];
	$video_ids = explode(',',$video_peerid);
	foreach($player_ids as $key => $value) {
		if($value==$uid) {
			$video_ids[$key-1] = $peerid;		
		}
	}
	$video_ids = implode(',',$video_ids);
	$updates = array('video_peerid'=>$video_ids);
	imUpdateSessionById($dbo,$t_chat_session,$session_info['session_id'],$updates);
}else{
	exit('-1');
}

?>