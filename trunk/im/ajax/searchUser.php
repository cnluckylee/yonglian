<?php
if(!$IWEB_IM_IN) {
	die('Hacking attempt');
}
require("foundation/module_im.php");

if(isset($_POST['s'])) {
	$keyword = short_check($_POST["s"]);
} else {
	exit('-1');
}

//数据表定义区
$t_chat_users = IM_DBTABLEPRE."users";

//定义读操作
dbtarget('r',$dbServs);
$dbo=new dbex;

$userinfo = get_user_info_by_name($dbo,$t_chat_users,$keyword);

if($userinfo) {
	$return = array();
	foreach($userinfo as $value) {
		$return[] = array(
						'pals_id' => $value['uid'],
						'pals_name' => $value['u_name'],
						'pals_ico' => $value['u_ico'],
						'line_status' => $value['line_status']
					);
	}
	echo chat_json_encode($return);
} else {
	exit('-1');
}
?>