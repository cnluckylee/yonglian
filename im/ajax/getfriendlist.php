<?php
if(!$IWEB_IM_IN) {
	die('Hacking attempt');
}
require("foundation/module_im.php");

if(isset($_POST['sid'])) {
	$session_id = intval(str_replace('g_','',$_POST['sid']));
} else {
	$session_id = 0;
}

//数据表定义区
$t_chat_pals = IM_DBTABLEPRE."pals";
$t_chat_session = IM_DBTABLEPRE."session";
$t_chat_users = IM_DBTABLEPRE."users";

$ctime = new time_class();
$time_stamp = $ctime->time_stamp();

//定义读操作
dbtarget('r',$dbServs);
$dbo=new dbex;

if($session_id) {
	$session_info = get_session_info_bysessionid($dbo,$t_chat_session,$session_id);
	$pals_id = trim($session_info['player_ids'],',');
	$friendlist = get_group_friend_list($dbo,$t_chat_users,$pals_id);
} else {
	$friendlist = get_friend_list($dbo,$t_chat_pals,$t_chat_users,$uid);
}

$timeout_user = get_timeout_user($dbo,$t_chat_users,$time_stamp);

if($timeout_user) {
	$uids = implode(",",$timeout_user);
	update_user_to_offline($dbo,$t_chat_users,$t_chat_pals,$uids);
}
// 更新最后动作时间
update_user_last_time($dbo,$t_chat_users,$uid,$time_stamp);

if(!$friendlist) {
	exit("-1");
}

echo chat_json_encode($friendlist);
?>