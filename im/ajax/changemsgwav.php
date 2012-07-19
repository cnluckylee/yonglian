<?php
if(!$IWEB_IM_IN) {
	die('Hacking attempt');
}
require("foundation/module_im.php");

/* post 数据处理 */
$v = intval($_POST["v"]);

//数据表定义区
$t_chat_users = IM_DBTABLEPRE."users";

//定义数据库操作
dbtarget('w',$dbServs);
$dbo=new dbex;

if(change_msgwav($dbo,$t_chat_users,$v,$uid)) {
	exit("1");
} else {
	exit("-1");
}
?>