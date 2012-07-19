<?php
if(!$IWEB_IM_IN) {
	die('Hacking attempt');
}
require("foundation/module_im.php");
$tid = short_check($_POST['tid']);
$rid = short_check($_POST['rid']);
$pid = short_check($_POST['pid']);



//数据表定义区
$t_chat_txt = IM_DBTABLEPRE."txt";
$t_chat_session = IM_DBTABLEPRE.'session';

//定义数据库操作
dbtarget('r',$dbServs);
$dbo = new dbex;
$del_success = array();
if($pid) {
	if(is_numeric($pid)) {		//删除分页消息
		$msginfo = imGetSingleMsg($dbo,$t_chat_txt,$pid);
		if($msginfo) {
			if(strpos($msginfo['player_ids'],','.$uid.',')===false && $msginfo['multi_chat']!='0') {
				exit('-1');
			}
			$delinfo = imDelMsgPage($dbo,$t_chat_txt,$pid);
			$delinfo && exit('1');
		}
	} elseif(strpos('imWin_',$pid)===false && $msginfo['multi_chat']!='0') {		//删除全部记录
		$pals_id = str_replace('imWin_','',$pid);
		$player_ids = get_player_ids($uid,$pals_id);
		$session_info = get_session_info($dbo,$t_chat_session,$player_ids);
		if($session_info) {
			$delstatus = imDelWholeMsg($dbo,$t_chat_txt,$session_info['session_id'],$player_ids);
			$delstatus && exit('1');
		}
	}
} else {	//删除单条记录
	if(!is_numeric($tid) || !is_numeric($rid)) {
		exit('-1');
	}
	$msginfo = imGetSingleMsg($dbo,$t_chat_txt,$tid);
	if($msginfo) {
		if(strpos($msginfo['player_ids'],','.$uid.',')===false) {
			exit('-1');
		}
		$msg = preg_replace("/<ct_".$rid.">(.+?)<\/ct_".$rid.">/",'',$msginfo['txt_content']);

		$msg = str_replace("'","\'",$msg);
		if($msg) {
			$update = array('txt_content'=>$msg);
			$updateinfo = imUpdateMsg($dbo,$t_chat_txt,$tid,$update);
			echo $updateinfo?'1':'-1';
		} else {
			if($msginfo['using']==0) {
				$delpage = imDelMsgPage($dbo,$t_chat_txt,$tid);
				echo $delpage?'1':'-1';
			}
		}	
	}
}
exit('-1');
?>