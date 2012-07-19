<?php
if(!$IWEB_IM_IN) {
	die('Hacking attempt');
}
require("foundation/module_im.php");

$intro = strip_tags(short_check($_POST['intro']));

//数据表定义区
$t_users = IM_DBTABLEPRE."users";
$t_pals_mine = IM_DBTABLEPRE."pals_mine";

//定义数据库操作
dbtarget('w',$dbServs);
$dbo=new dbex;

if(update_intro($dbo,$t_users,$intro,$uid)){
	echo stripcslashes($intro);
}else{
	echo '-1';
}
?>