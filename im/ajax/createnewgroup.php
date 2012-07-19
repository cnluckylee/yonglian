<?php
if(!$IWEB_IM_IN) {
	die('Hacking attempt');
}
require("foundation/module_im.php");

/* post 数据处理 */
$groupname = $_POST["gname"];
$m = $_POST['m'];

if(!$groupname) {
	exit("-1");
}

//数据表定义区
$t_chat_txt = IM_DBTABLEPRE."txt";
$t_chat_session = IM_DBTABLEPRE."session";

//定义数据库操作
dbtarget('w',$dbServs);
$dbo=new dbex;

if($session_id = create_new_group($dbo,$t_chat_session,$t_chat_txt,$uid,$groupname,$m)) {
	$array['host_id'] = $uid;
	$array['pals_id'] = "g_".$session_id; //substr($v['player_ids'],1,-1);
	$array['group_name'] = $groupname;
	$array['pals_name'] = $groupname;
	$array['pals_ico'] = $baseUrl."skin/default/images/talk.gif";
	$array['line_status'] = "1";
	$array['num'] = 1;
	$array['group_mid'] = $uid;
	echo chat_json_encode($array);
	exit();
} else {
	exit("-1");
}