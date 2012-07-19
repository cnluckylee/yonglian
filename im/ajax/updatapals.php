<?php
if(!$IWEB_IM_IN) {
	die('Hacking attempt');
}
require("foundation/module_im.php");

// 数据表定义区
$t_chat_pals = IM_DBTABLEPRE."pals";
$t_chat_users = IM_DBTABLEPRE."users";

// 定义数据库操作
dbtarget('r',$dbServs);
$dbo=new dbex;

$pals = get_friend_list($dbo,$t_chat_pals,$t_chat_users,$uid);
//同步好友关系
if($getMainFriend){
	$api_pals = get_api_pals_list($dbo);
}

if(!isset($api_pals)) { exit("-1"); }

$new_pals_array = array();
if($pals) {
	foreach($pals as $value) {
		$new_pals_array[] = $value['pals_id'];
	}
}

$api_new_array = array();
$uids = array();
foreach($api_pals as $value) {
	if(!in_array($value['uid'],$new_pals_array)) {
		$api_new_array[] = $value;
		$uids[] = $value['uid'];
	}
}

if($api_new_array) {
	$uidss = implode(",",$uids);
	$sql = "select * from `$t_chat_users` where uid in ($uidss)";
	$user_row = $dbo->getRs($sql);
	$user_array = array();
	$insert_user_info = array();
	
	if($user_row) {
		foreach($user_row as $value) {
			$user_array[$value['uid']] = clear_array_numkey($value);
		}
	}
	
	foreach($api_new_array as $v) {
		if(!isset($user_array[$v['uid']])) {
			$temp = $v;
			$temp['line_status'] = 0;
			$insert_user_info[] = $temp;		// 需要插入的用户信息
		}
	}


	// 定义数据库操作
	dbtarget('w',$dbServs);
	$dbo=new dbex;
	if($insert_user_info) {
		foreach($insert_user_info as $value) {
			$value['line_status'] = intval($value['line_status']);
			insert_user_info($dbo,$t_chat_users,$value);
		}
	}

	foreach($api_new_array as $value) {
		$insert_array = array(
			'host_id' => $uid,
			'pals_id' => $value['uid'],
			'pals_name' => $value['u_name'],
			'pals_ico' => $value['u_ico'],
			'line_status' => intval($value['line_status'])
		);
		
		if($user_array[$value['uid']]) {
			$insert_array['line_status'] = $user_array[$value['uid']]['line_status'];
		}

		insert_friend_info($dbo,$t_chat_pals,$insert_array);
	}

} else {
	exit("-1");
}

?>