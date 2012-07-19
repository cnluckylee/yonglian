<?php
if(!$IWEB_IM_IN) {
	die('Hacking attempt');
}
require("foundation/module_im.php");

//数据表定义区
$t_chat_room = IM_DBTABLEPRE."room";
$t_chat_room_type = IM_DBTABLEPRE."room_type";

$dbo=new dbex;
$ctime = new time_class();

//定义读操作
dbtarget('r',$dbServs);
$dbo=new dbex;

$chatroom_list = get_chatroom_all_list($dbo,$t_chat_room,$t_chat_room_type);
foreach($chatroom_list as $roomkey => $value){
	$members = explode(',',$value['members']);
	foreach($members as $key => $trimmembers){
		if($trimmembers==''){
			unset($members[$key]);
		}
	}
	$chatroom_list[$roomkey]['online'] = count($members);
}

$return = Array();
foreach($chatroom_list as $value){
	if(!isset($return[$value[type_id]]['type_name'])){
		$return[$value[type_id]]['type_name'] = $value['type_name'];
	}
	$return[$value[type_id]][] = $value;
}

$returnstr = '';
foreach($return as $rooms){
	foreach($rooms as $value){
		if(is_array($value)){
			$returnstr .= '<dd ondblclick="i_im_chatroom(\''.$value['rid'].'\',\'chatwin\')"><span id="online_room_'.$value['rid'].'">['.$value['online'].'/'.$value['members_max'].']</span>'.$value['room_name'].'</dd>';
		}else {
			$returnstr .= '<dt>'.$value.'</dt>';
		}			
	}
}
echo $returnstr;

?>