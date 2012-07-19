<?php
if(!$IWEB_IM_IN) {
	die('Hacking attempt');
}
require("foundation/module_im.php");


$rid = $_GET["rid"];
$page = (int)$_POST['p'];
$num = (int)$_POST['n'];
$page = 1;
if(!$rid) {
	exit("-1");
}

//数据表定义区
$chat_txt = IM_DBTABLEPRE."txt_chatroom";

//定义数据库操作
dbtarget('r',$dbServs);
$dbo = new dbex;

$sql = "select * from `$chat_txt` where room_id=$rid and txt_contents!='' ";
$limit = '';
if($page>0){
	$sql .= " and txt_pagenum>=$page ";
}else{
	$sql .= " and txt_using=1 ";
	$limit = " limit 1";
}
$sql .= " order by txt_pagenum desc ".$limit;

$txt_array = $dbo->getRs($sql);

foreach($txt_array as $value) {
	if($value['txt_using']==1 && $value['txt_length']>=$txt_split_lenght) {
		$split_arr[$value['room_id']] = array(
				'id'			=>	$value['id'],
				'room_id' 		=> 	$value['room_id'],
				'txt_contents' 	=> 	'',
				'txt_length' 	=> 	'0',
				'txt_pagenum' 	=> 	$value['txt_pagenum']+1,
				'txt_recordnum' => 	1,
				'txt_using' 	=> 	'1'
		);
	}
	preg_match_all("/<ct_[0-9]+>([0-9]+){([0-9]+-[0-9]+-[0-9]+ [0-9]+:[0-9]+:[0-9]+)}(.+?)<\/ct_[0-9]+>/",$value['txt_contents'],$out);
	foreach($out[1] as $key=>$value) {
		$array[$key] = array(
			'id' => $out[1][$key],
			'time' => $out[2][$key],
			'txt' => $out[3][$key]
		);
	}
	$message_arr[] = $array;
}

if($split_arr) {
	// 需要折分新记录
	split_chatroom_txt_content($dbo,$chat_txt,$split_arr);
}

echo chat_json_encode(array_reverse($message_arr));


?>