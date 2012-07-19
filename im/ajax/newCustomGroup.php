<?php
if(!$IWEB_IM_IN) {
	die('Hacking attempt');
}
require("foundation/module_im.php");

$newGroupName = short_check($_POST['groupName']);
if(!$newGroupName) {
	exit('-1');
}

//数据表定义区
$t_chat_customgroup = IM_DBTABLEPRE."customgroup";
//$t_chat_session = IM_DBTABLEPRE."session";
//$t_chat_users = IM_DBTABLEPRE."users";

//定义数据库操作
dbtarget('r',$dbServs);
$dbo = new dbex;

$insertArray = array(
	'uid'	=>	$uid,
	'groupName'	=>	$newGroupName,
);
$groupid = imInsertCustomGroup($dbo,$t_chat_customgroup,$insertArray);
if($groupid>0) {
	echo chat_json_encode(array('gid'=>$groupid,'gname'=>$newGroupName));
}else{
	exit('-1');
}

?>