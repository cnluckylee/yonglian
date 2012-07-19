<?php
if(!$IWEB_IM_IN) {
	die('Hacking attempt');
}
require("foundation/module_im.php");

$contactuid = short_check($_POST['uid']);

//数据表定义区
$t_chat_users = IM_DBTABLEPRE."users";

//定义数据库操作
dbtarget('r',$dbServs);
$dbo = new dbex;

$userinfo = get_user_info($dbo,$t_chat_users,$uid);

$contacted = $userinfo['contacted'];
$length = strrpos($contacted,',') ? strrpos($contacted,',') : strlen($contacted);

$contacted = substr($contacted,0,$length);

if($contacted && $contactuid) {
	$contacted = $contactuid.','.$contacted;
}elseif(!$contacted && $contactuid){
	$contacted = $contactuid;
}

!$contacted && exit('-1');
$contactedAry = explode(',',$contacted);

if(count($contactedAry)>10) {
	array_pop($contactedAry);
}
$contacted = implode(',',$contactedAry);

imUpdateUserInfo($dbo,$t_chat_users,$uid,array('contacted'=>$contacted));
$contactedUsers = get_group_friend_list($dbo,$t_chat_users,$contacted);
if($contactedUsers) {
	echo chat_json_encode($contactedUsers);
}else{
	exit('-1');
}
?>