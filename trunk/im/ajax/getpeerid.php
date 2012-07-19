<?php
if(!$IWEB_IM_IN) {
	die('Hacking attempt');
}
require("foundation/module_im.php");

$pals_id = short_check($_POST['pals_id']);
if(!$pals_id) {
	exit('-1');
}

//数据表定义区
$t_users = IM_DBTABLEPRE."users";
$t_chat_session = IM_DBTABLEPRE."session";

//定义数据库操作
dbtarget('w',$dbServs);
$dbo=new dbex;

$player_ids = get_player_ids($uid,$pals_id); 
$session_info = get_session_info($dbo,$t_chat_session,$player_ids);

$player_ids = array_nullclear(explode(',',$session_info['player_ids']));
$video_ids = explode(',',$session_info['video_peerid']);
foreach($player_ids as $key => $value) {
	if($value==$pals_id) {
		$peerid = $video_ids[$key-1];
	}
}
if($peerid){
	echo $peerid;
}else{
	echo '-1';
}
?>