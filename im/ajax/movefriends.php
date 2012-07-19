<?php
if(!$IWEB_IM_IN) {
	die('Hacking attempt');
}
require("foundation/module_im.php");
$ids = short_check($_POST['ids']);
$gid = short_check($_POST['gid']);
if($ids) {
	$ids = array_nullclear(explode(",",$ids));
} else {
	exit('-1');
}
!$ids && exit('-1');
$ids = implode(',',$ids);
if(!$gid && $gid!=='0' && $gid!==0) {
	exit('-1');
}
//数据表定义区
$t_chat_session = IM_DBTABLEPRE."session";
$t_chat_txt = IM_DBTABLEPRE."txt";
$t_chat_pals = IM_DBTABLEPRE."pals";

//定义数据库操作
dbtarget('r',$dbServs);
$dbo = new dbex;

if($gid=='-1') {
	$moveFriend = imDelPalsBySessionId($dbo,$t_chat_pals,$uid,$ids);	//移动到陌生人
}else{
	$moveFriend = imMoveFriends($dbo,$t_chat_pals,$uid,$gid,$ids);
}


if($moveFriend) {
	echo chat_json_encode(explode(',',$ids));
}else{
	exit('-1');
}
?>