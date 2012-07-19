<?php
if(!$IWEB_IM_IN) {
	die('Hacking attempt');
}
require("foundation/module_im.php");
//数据表定义区
$t_chat_pals = IM_DBTABLEPRE."pals";
$t_chat_session = IM_DBTABLEPRE."session";
$t_chat_users = IM_DBTABLEPRE."users";

//定义读操作
dbtarget('r',$dbServs);
$dbo=new dbex;

//获取所有联系过的会员
$allContacted = imGetAllContactedUsers($dbo,$t_chat_session,$uid);

//获取所有好友
$allFriends = get_friend_list($dbo,$t_chat_pals,$t_chat_users,$uid);
if(!$allFriends) {
	$allFriends = array();
}
$allFriendsId = array();
foreach($allFriends as $v) {
	$allFriendsId[] = $v['pals_id'];
}
$strangers = array();
foreach($allContacted as $key => $value) {
	$player_ids = str_replace(",".$uid.",",'',$value['player_ids']);
	$player_ids = array_nullclear(explode(',',$player_ids));
	$player_id = $player_ids[0] ? $player_ids[0] : $player_ids[1];
	if($player_id && !in_array($player_id,$allFriendsId)) {
		$strangers[] = $player_id;
	}
}

!$strangers && exit('-1');
$strangerids = implode(',',$strangers);

$strangersinfo = get_group_friend_list($dbo,$t_chat_users,$strangerids);

if($strangersinfo &&is_array($strangersinfo)) {
	echo chat_json_encode($strangersinfo);
}else{
	exit('-1');
}

?>