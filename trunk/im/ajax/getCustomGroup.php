<?php
if(!$IWEB_IM_IN) {
	die('Hacking attempt');
}
require("foundation/module_im.php");

//数据表定义区
$t_chat_customGroup = IM_DBTABLEPRE."customgroup";

//定义读操作
dbtarget('r',$dbServs);
$dbo=new dbex;

$customGroup = imGetCustomGroup($dbo,$t_chat_customGroup,$uid);
if($customGroup) {
	echo chat_json_encode($customGroup);
}else{
	exit('-1');
}

?>