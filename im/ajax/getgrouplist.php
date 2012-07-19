<?php
if(!$IWEB_IM_IN) {
	die('Hacking attempt');
}
require("foundation/module_im.php");

//$session_id = intval(str_replace('g_','',$_POST['sid']));

//数据表定义区
$t_chat_session = IM_DBTABLEPRE."session";

$dbo=new dbex;

//定义读操作
dbtarget('r',$dbServs);
$dbo=new dbex;

$group = get_group_list($dbo,$t_chat_session,$uid);

if(!$group) {
	exit("-1");
}

echo chat_json_encode($group);
?>