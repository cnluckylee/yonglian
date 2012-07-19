<?php
/*
 * 返回值：
 * 1：添加好友成功
 * -1:已为好友
 * -2：回答问题加为好友
 * -3：拒绝加为好友
 * -4：添加失败
*/
if(!$IWEB_IM_IN) {
	die('Hacking attempt');
}
require("foundation/module_im.php");
$return = array();
/* post 数据处理 */
$pals_id = intval(str_replace("imWin_",'',$_POST["uid"]));
$answer = short_check($_POST['answer']);

if(!$pals_id) {
	$return[0] = "-4";
	echo chat_json_encode($return);
	exit;
}

//数据表定义区
$t_chat_users = IM_DBTABLEPRE."users";
$t_chat_pals = IM_DBTABLEPRE."pals";

//定义数据库操作
$dbo=new dbex;
dbtarget('r',$dbServs);

$pals_info = get_user_info($dbo,$t_chat_users,$pals_id);

$row = $dbo->getRow("select * from `$t_chat_pals` where host_id='$uid' and pals_id='$pals_id'");
if($row) {
	$return[0] = "-1";
	echo chat_json_encode($return);
	exit;
}

if($pals_info) {
	$array = array(
		'host_id' => $uid,
		'pals_id' => $pals_info['uid'],
		'pals_name' => $pals_info['u_name'],
		'pals_ico' => $pals_info['u_ico'],
		'line_status' => $pals_info['line_status']
	);
	switch($pals_info['addFriends']) {
		case 3:			//拒绝加为好友
			$return[0] = "-3";
			echo chat_json_encode($return);
			exit;
			break;
		case 2:			//回答问题
			if(!$answer){
				$return[0] = "-2";
				$return[1] = $pals_info['question'];
				echo chat_json_encode($return);
				exit;
			} else {
				$row = $dbo->getRow("select * from `$t_chat_users` where uid='$pals_id' and answer='$answer'");	
				if($row){
					if(insert_friend_info(&$dbo,$t_chat_pals,$array)){
						$return[0] = "1";
						echo chat_json_encode($return);
						exit;
					} else {
						$return[0] = "-4";
						echo chat_json_encode($return);
						exit;
					}
				} else {
					$return[0] = "-5";
					echo chat_json_encode($return);
					exit;
				}
			}
			break;
	}
	if(insert_friend_info(&$dbo,$t_chat_pals,$array)) {
		$return[0] = "1";
		echo chat_json_encode($return);
		exit;
	} else {
		$return[0] = "-4";
		echo chat_json_encode($return);
		exit;
	}
} else {
	$return[0] = "-4";
	echo chat_json_encode($return);
	exit;
}
?>