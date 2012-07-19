<?php
if(!$IWEB_IM_IN) {
	die('Hacking attempt');
}
require("foundation/module_im.php");
$addcon = short_check($_POST['addcon']);
$im_question = short_check($_POST['im_question']);
$im_answer = short_check($_POST['im_answer']);

!$addcon && exit('-1');

//数据表定义区
$t_chat_users = IM_DBTABLEPRE."users";

//定义数据库操作
dbtarget('r',$dbServs);
$dbo = new dbex;

switch($addcon) {
	case 1:
		$updateinfo = imUpdateFriendsCondition($dbo, $t_chat_users, $uid,$addcon);
		break;
	case 2:
		$updateinfo = imUpdateFriendsCondition($dbo, $t_chat_users, $uid,$addcon, $im_question, $im_answer);
		break;
	case 3:
		$updateinfo = imUpdateFriendsCondition($dbo, $t_chat_users, $uid,$addcon);
		break;
	default:
		exit('-1');
}

if($updateinfo) {
	echo chat_json_encode(array('addcon'=>$addcon,'question'=>$im_question,'answer'=>$im_answer)); 
}else{
	echo '-1';
}
?>