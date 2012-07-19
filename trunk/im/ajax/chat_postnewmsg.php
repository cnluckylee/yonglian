<?php
if(!$IWEB_IM_IN) {
	die('Hacking attempt');
}
require("foundation/module_im.php");

/* post 数据处理 */
$roomid = $_POST["roomid"];
$v = short_check($_POST["v"]);

if(!$roomid || !$v || !$uid) {
	exit("-1");
}

$ctime = new time_class;
$datatime = $ctime->long_time();
$txt_content = $uid.'{'.$datatime.'}'.$v;
$txt_length = strlen($txt_content);

//数据表定义区
$chat_txt_chatroom = IM_DBTABLEPRE."txt_chatroom";

//定义数据库操作
dbtarget('r',$dbServs);
$dbo=new dbex;

$post_txt = post_txt_chatroom($dbo,$chat_txt_chatroom,$txt_content,$txt_length,$roomid);
if($post_txt){
	exit('1');
}else{
	exit('-1');
}
?>