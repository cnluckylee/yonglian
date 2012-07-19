<?php
if(!$IWEB_IM_IN) {
	die('Hacking attempt');
}
require("foundation/module_im.php");
$gid = short_check($_POST['gid']);
$gname = short_check($_POST['gname']);

!$gid && exit('-1');

//数据表定义区
$t_chat_pals = IM_DBTABLEPRE."pals";
$t_chat_customgroup = IM_DBTABLEPRE."customgroup";

//定义数据库操作
dbtarget('r',$dbServs);
$dbo = new dbex;

//移动组内成员
imMoveGroupFriends($dbo,$t_chat_pals,$uid,$gid);
//删除分组
$delinfo = imDelCustomGroup($dbo,$t_chat_customgroup,$uid,$gid);

if($delinfo) {
	exit('1');
}else {
	exit('-1');
}
?>