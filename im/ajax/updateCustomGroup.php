<?php
if(!$IWEB_IM_IN) {
	die('Hacking attempt');
}
require("foundation/module_im.php");
$gid = short_check($_POST['gid']);
$gname = short_check($_POST['gname']);

!$gid && exit('-1');
!$gname && exit('-1');

//数据表定义区
$t_chat_customgroup = IM_DBTABLEPRE."customgroup";

//定义数据库操作
dbtarget('r',$dbServs);
$dbo = new dbex;

$updateinfo = imUpdateCustomGroup($dbo,$t_chat_customgroup,$uid,$gid,$gname);
if($updateinfo) {
	exit('1');
}else{
	exit('-1');
}
?>