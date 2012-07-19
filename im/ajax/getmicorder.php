<?php
if(!$IWEB_IM_IN) {
	die('Hacking attempt');
}
require("foundation/module_im.php");

//数据表定义区
$t_chat_room = IM_DBTABLEPRE."room";
$t_chat_users = IM_DBTABLEPRE."users";

$rid = (int)$_POST['rid'];
if(!$rid or !is_numeric($rid)){
	exit('-1');
}
$dbo=new dbex;
$ctime = new time_class();

//定义读操作
dbtarget('r',$dbServs);
$dbo=new dbex;

$room_memberids = get_ordermicmemberid_by_roomid($dbo,$t_chat_room,$rid);
if(!is_array($room_memberids)){
	exit('-1');
}

$room_members = get_useinfo_by_ids($dbo,$t_chat_users,$room_memberids[0]);
//print_r($room_members);
//$returnHTML = '';
//foreach($room_members as $value){
//	$returnHTML .= '<li><img src="'.$value['u_ico'].'"><a href="#">'.$value['u_name'].'</a></li>'; 
//}
//PRINT_R($room_members);
//EXIT;
echo chat_json_encode($room_members);
//echo $returnHTML;

?>