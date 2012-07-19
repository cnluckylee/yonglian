<?php
if(!$IWEB_IM_IN) {
	die('Hacking attempt');
}
require("foundation/module_im.php");

/* post 数据处理 */
$pals = $_POST["pals"];
$page = intval($_POST['page']);
if(!$pals) {
	exit("-1");
}

//数据表定义区
$t_chat_session = IM_DBTABLEPRE."session";
$t_chat_txt = IM_DBTABLEPRE."txt";

//定义数据库操作
dbtarget('r',$dbServs);
$dbo = new dbex;

// 创建sql
if(strstr($pals,"g_")) {
	$session_id = intval(str_replace("g_",'',$pals));
	$sql = "select * from `$t_chat_txt` where session_id='$session_id' and INSTR(txtlog_pageview,',$uid,') and txt_content!='' ORDER BY txt_pagenum asc";
} else {
	$player_ids = get_player_ids($uid,$pals);
	$sql = "select * from `$t_chat_txt` where player_ids='$player_ids' and INSTR(txtlog_pageview,',$uid,') and multi_chat='0' and txt_content!='' ORDER BY txt_pagenum asc";
}
$result = $dbo->getRs($sql);

// 统计条数
$countpage = count($result);
if(!$page || $page > $countpage) {
	$page = $countpage;
}

// 创建返回新数组
$newarray = array(
	'countpage' => $countpage,
	'page' => $page,
	'message' => ''
);
foreach($result as $key=>$value) {
	if(($key+1)==$page){
		$newarray['tid'] = $value['id'];
		$newarray['message'] = format_message(array(0,0),$value);
	}
}
if($newarray['message']) {
	echo chat_json_encode($newarray);
} else {
	exit("-1");
}
?>