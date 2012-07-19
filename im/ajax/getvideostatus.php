<?php
if(!$IWEB_IM_IN) {
	die('Hacking attempt');
}
require("foundation/module_im.php");

/* post 数据处理 */
$pals_id = $_POST["pals_id"];

//数据表定义区
$t_chat_session = IM_DBTABLEPRE."session";

//定义数据库操作
dbtarget('r',$dbServs);
$dbo=new dbex;
if(is_numeric($pals_id)) {
	$player_ids = get_player_ids($uid,$pals_id); 
	$sql = "select video_status from $t_chat_session where player_ids='$player_ids'";
	$video_status = $dbo->getRow($sql);
	echo $video_status['video_status'];
}else{
	exit('-1');
}
?>