<?php
header("content-type:text/html;charset=utf-8");
$IWEB_IM_IN = true;

require("foundation/asession.php");
require("configuration.php");
require("includes.php");
require("foundation/module_im.php");

// 通过当前SESSION获取 当前用户信息
$uid = get_sess_uid();
if(!$uid) {	echo404();}

$queryarray = explode('/',$_SERVER['QUERY_STRING']);
$fid = (int)$queryarray[1];

if($fid<=0){echo404();}
//数据表定义区
$t_chat_transfer_fileinfo = IM_DBTABLEPRE."transfer_fileinfo";

dbtarget('r',$dbServs);
$dbo=new dbex;
$where = 'id='.$fid;
$fileinfo = get_transfer_fileinfo($dbo,$t_chat_transfer_fileinfo,$where);

if($fileinfo['recipient_id']!=$uid or $fileinfo['is_download']==1){	echo404();}

$file = $fileinfo['file_url'];
$fileoldname = $fileinfo['old_name'];

if(!file_exists($file)){
	echo '<script language="javascript">alert("'.$language_basic['FileIsNotExist'].'");</script>';
	exit();
}else{
	$filetype = filetype($file);
	$filesize = filesize($file);
	$filename = basename($file);
	header("Pragma: public");
	header('Content-Encoding: none');
	header('Content-Length: '.$filesize);	
	header('Content-Type: '.$filetype);	
	header("Cache-Control: private, post-check=0, pre-check=0,max-age=5");
	$encoded_fileoldname = urlencode($fileoldname);
	$encoded_fileoldname = str_replace("+", "%20", $encoded_fileoldname);
	$ua = getenv(HTTP_USER_AGENT);
	if (preg_match("/MSIE/", $ua)) { 
		header('Content-Disposition: attachment; filename="' . $encoded_fileoldname . '"');
	} else if (preg_match("/Firefox/", $ua)) { 
		header('Content-Disposition: attachment; filename*="utf8\'\'' . $fileoldname . '"');
	} else { 
		header('Content-Disposition: attachment; filename="' . $fileoldname . '"');
	}
	//下载文件
	$download_status = readfile($file);

	//下载完成后..		
	$status = update_transfer_fileinfo(&$dbo,$t_chat_transfer_fileinfo,$fid);
//	unlink($file);
	exit;	
}
?>