<?php
if(!$IWEB_IM_IN) {
	die('Hacking attempt');
}
require("foundation/module_im.php");

$uid = intval($_POST['sid']);

//数据表定义区
$t_chat_users = IM_DBTABLEPRE."users";


//定义读操作
dbtarget('r',$dbServs);
$dbo=new dbex;

$userinfo = get_user_info($dbo,$t_chat_users,$uid);

$array = array(
	'pals_id' => $userinfo['uid'],
	'pals_name' => $userinfo['u_name'],
	'pals_ico' => $userinfo['u_ico'],
	'line_status' => $userinfo['line_status'],
	'pals_intro' => $userinfo['u_intro'],
);

echo chat_json_encode($array);
?>