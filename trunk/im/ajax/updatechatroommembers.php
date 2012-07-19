<?php
if(!$IWEB_IM_IN) {
	die('Hacking attempt');
}
require("foundation/module_im.php");

//数据表定义区
$t_chat_room = IM_DBTABLEPRE."room";

$rid = (int)$_POST['rid'];
$action = $_POST['action'];
$who = $_POST['who'];

if(!$rid or !is_numeric($rid) or !$uid){
	exit('-1');
}
$dbo=new dbex;
$ctime = new time_class();

//定义读操作
dbtarget('r',$dbServs);
$dbo=new dbex;

$room_memberids = get_memberid_by_roomid($dbo,$t_chat_room,$rid);
if(!is_array($room_memberids)){
	exit('-1');
}
$members = explode(',',$room_memberids['members']);
$mic_order = explode(',',$room_memberids['mic_order']);
if($action=='out'){	
	foreach($members as $key => $value){
		if($value==$uid or $value==''){
			unset($members[$key]);
		}
	}
	foreach($mic_order as $key => $value){
		if($value==$uid or $value==''){
			unset($mic_order[$key]);
		}
	}
	$members = implode(',',$members);
	$mic_order = implode(',',$mic_order);
	$updatearray = array('members'=>$members,'mic_order'=>$mic_order);
	update_room_members($dbo,$t_chat_room,$rid,$updatearray);
}elseif($action=='add'){
	if(!$who){exit(-1);}
	if($who=='user'){
		foreach($members as $key => $value){
			if($value=='') unset($members[$key]);
			if($value==$uid) exit;
		}
		$members[] = $uid;
		$members = implode(',',$members);
		$updatearray = array('members'=>$members);
		update_room_members($dbo,$t_chat_room,$rid,$updatearray);
	}elseif($who=='mic'){
		foreach($mic_order as $key => $value){
			if($value=='') unset($mic_order[$key]);
			if($value==$uid) exit;
		}
		$mic_order[] = $uid;
		$mic_order = implode(',',$mic_order);
		$updatearray = array('mic_order'=>$mic_order);
		update_room_members($dbo,$t_chat_room,$rid,$updatearray);
	}
}



//$room_members = get_useinfo_by_ids($dbo,$t_chat_users,$room_memberids[0]);

//echo chat_json_encode($room_members);

?>