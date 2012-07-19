<?php
if(!$IWEB_IM_IN) {
	die('Hacking attempt');
}
require("foundation/module_im.php");

/* post 数据处理 */
$pals_id = short_check($_POST["pals"]);
$action = short_check($_POST["action"]);

//数据表定义区
$t_chat_session = IM_DBTABLEPRE."session";

//定义数据库操作
dbtarget('r',$dbServs);
$dbo=new dbex;
if(is_numeric($pals_id)) {
	$player_ids = get_player_ids($uid,$pals_id); 
	
	switch($action) {
		case 'p':
			$status = 1;
			update_video_status($dbo,$t_chat_session,$player_ids,$status);
			break;
		case 'g':
			$status = 2;
			update_video_status($dbo,$t_chat_session,$player_ids,$status);
			break;
		case 'c':
			$status = 0;
			update_video_status($dbo,$t_chat_session,$player_ids,$status);
			break;
	}
} 
?>