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
$t_chat_session = IM_DBTABLEPRE."session";

//定义读操作
dbtarget('r',$dbServs);
$dbo=new dbex;

$searchgroup = imSearchGroupByKeyWord($dbo,$t_chat_session,$keyword);
if($searchgroup) {
	$return = array();
	foreach($searchgroup as $value) {
		$players = explode(',',$value['player_ids']);
		$isin = in_array($uid,$players) ? 1 : 0;
		$return[] = array('gid'=>$value['session_id'],'gname'=>$value['group_name'],'ownerid'=>$players[1],'isin'=>$isin);
	}
	echo chat_json_encode($return);
} else {
	exit('-1');
}