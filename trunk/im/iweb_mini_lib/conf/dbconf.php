<?php
if(!$IWEB_IM_IN) {
	die('Hacking attempt');
}
$user = "root"; //mysql数据库默认用户名
$pwd = ""; //mysql数据库默认密码
$db = "im"; //默认数据库名
$host = "localhost";

$dbServs=array($host,$db,$user,$pwd);
//IM 数据表前缀
define('IM_DBTABLEPRE', 'yl_chat_');
?>