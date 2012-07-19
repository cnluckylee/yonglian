<?php
if(!$IWEB_IM_IN) {
	die('Hacking attempt');
}
require("foundation/module_im.php");

/* post 数据处理 */
$pals_id = $_POST["pals"];
$v = short_check($_POST["v"]);
$vc = short_check($_POST['vc']);
$session_id = '';

if(!$pals_id && !$v && !$vc) {
	exit("-1");
}

//数据表定义区
$t_chat_users = IM_DBTABLEPRE."users";
$t_chat_txt = IM_DBTABLEPRE."txt";
$t_chat_session = IM_DBTABLEPRE."session";

//定义数据库操作
dbtarget('r',$dbServs);
$dbo=new dbex;
if(is_numeric($pals_id)) {
	$player_ids = get_player_ids($uid,$pals_id);
	$session_info = get_session_info($dbo,$t_chat_session,$player_ids);
} else {
	$session_id = str_replace("g_","",$pals_id);
	if(is_numeric($session_id)) {
		$session_info = get_session_info_bysessionid($dbo,$t_chat_session,$session_id);
	} else {
		exit("-1");
	}
}
if(is_numeric($pals_id)) {
	if(!$session_info) {
		$userinfo = get_user_info($dbo,$t_chat_users,$uid);
		$session_info = insert_new_seesion_info($dbo,$t_chat_session,$player_ids);
		insert_new_txt_info($dbo,$t_chat_txt,$player_ids,$session_info['session_id']);
	} else {
		$checktxt = imIsExistTxt($dbo,$t_chat_txt,$session_info['session_id']);
		if(!$checktxt) {
			$split_arr[$session_info['player_ids']] = array(
				'id' => '',
				'multi_chat' => '0',
				'player_ids' => $session_info['player_ids'],
				'session_id' => $session_info['session_id'],
				'txt_pagenum' => $session_info['page_num']+1,
				'txt_ctnum' => 1,
				'txt_content' => '',
				'txt_length' => '0',
				'txtlog_pageview' => $session_info['player_ids']
			);
			split_txt_content($dbo,$t_chat_session,$t_chat_txt,$split_arr);
		}	
	}
}
if(!strstr($session_info['player_ids'],",$uid,")) { exit("-1");}
if(mk_md5($session_info['session_code'],$uverifycode)!=$vc) { exit("-1");}

//定义数据库操作
dbtarget('w',$dbServs);
$dbo=new dbex;
$ctime = new time_class;
$datatime = $ctime->long_time();

$v = str_replace("\n","<br />",$v);
$v = str_replace('"',"&quot;",$v);
$pattern = "/{img:(.+?)\/}/";
$replacement = "<img src=\"im/\${1}\" />";
$v = preg_replace($pattern, $replacement, $v);
$txt_content = $uid.'{'.$datatime.'}'.$v;

$txt_length = strlen($txt_content);

if(is_numeric($pals_id)) {
	$player_ids = get_player_ids($uid,$pals_id);
	$post_txt = post_txt($dbo,$t_chat_txt,$player_ids,$txt_content,$txt_length);
} else {
	$session_id = str_replace("g_","",$pals_id);
	if(is_numeric($session_id)) {
		$post_txt = post_txt_bysessionid($dbo,$t_chat_txt,$session_id,$txt_content,$txt_length);
	} else {
		exit("-1");
	}
}

if($post_txt) {
	if(is_numeric($session_id)) {
		update_session_ctnum_bysessionid($dbo,$t_chat_session,$session_id);
	} else {
		update_session_ctnum($dbo,$t_chat_session,$player_ids);
	}
	exit("1");
} else {
	exit("-1");
}

?>