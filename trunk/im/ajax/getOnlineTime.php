<?php
if(!$IWEB_IM_IN) {
	die('Hacking attempt');
}
require("foundation/module_im.php");
//数据表定义区
$t_chat_users = IM_DBTABLEPRE."users";

//定义读操作
dbtarget('r',$dbServs);
$dbo=new dbex;

$ctime = new time_class();
$time_stamp = $ctime->time_stamp();

$userinfo = get_user_info($dbo,$t_chat_users,$uid);
$last_time = $userinfo['last_time'];
$online_time = $userinfo['online_time'];
$online_time = $time_stamp-$last_time+$online_time;

// 更新最后动作时间，在线时间
im_update_online_time($dbo,$t_chat_users,$uid,$time_stamp,$online_time);

echo $online_time;