<?php
if(!$IWEB_IM_IN) {
	die('Hacking attempt');
}
require_once("${webRoot}foundation/cupload.class.php");
$upfile = $_POST['upfile'];
$pid = $_GET['pid'];
if(!$upfile || !$uid || !$pid) {
	exit("-1");
}
if($upfile==2){	//发送图片
	$allowtype = array('jpg','gif','png','bmp');
	$userfiledir = 'uploadfiles/customimg/'.date('Y').'/'.date('m').'/'.date('d').'/'.$uid;
}
if($upfile == 1 or $upfile == 2){
	$upload = new upload($userfiledir,$allowtype,$allowmaxsize);
	$upfileAry = $upload->save('impostfile');
	switch($upfileAry){
		case 1:
			echo "<script language=\"javascript\">parent.backTransferFileError('".$language_transfer['FileNotExist']."');</script>";
			exit;
			break;
		case 2:
			echo "<script language=\"javascript\">parent.backTransferFileError('".$language_transfer['OutRestraint']."');</script>";
			exit;
			break;
		case 3:
			echo "<script language=\"javascript\">parent.backTransferFileError('".$language_transfer['UnknowType'].implode(',',$allowtype)."');</script>";
			exit;
			break;
		case 4:
			echo "<script language=\"javascript\">parent.backTransferFileError('".$language_transfer['TransferFailed']."');</script>";
			exit;
			break;
		case 5:
			echo "<script language=\"javascript\">parent.backTransferFileError('".$language_transfer['TransferFailed']."');</script>";
			exit;
			break;
		case 6:
			echo "<script language=\"javascript\">parent.backTransferFileError('".$language_transfer['TransferFileOff']."');</script>";
			exit;
			break;
	}	
}else{
	echo "<script language=\"javascript\">parent.backTransferFileError('".$language_transfer['TransferFileOff']."');</script>";
	exit;
}
if(is_array($upfileAry)) {
	require("foundation/module_im.php");
	//数据表定义区
	$t_chat_transfer_fileinfo = IM_DBTABLEPRE."transfer_fileinfo";
	$insert_array = array(
		'promoter_id'	=>	$uid,
		'recipient_id'	=>	$pid,
		'file_url'		=>	$upfileAry['filename'],
		'is_download'	=>	0,
		'upload_time'	=>	time(),
		'download_time'	=>	0,
		'old_name'		=>	$upfileAry['oldname'],
	);
	if($upfile==2){
		$insert_array['custom_face'] = 1;
	}
	dbtarget('r',$dbServs);
	$dbo=new dbex;
	$autoid = insert_new_transfer_fileinfo($dbo,$t_chat_transfer_fileinfo,$insert_array);
	
	if($autoid && ($upfile==1)){
		$fileurl = $baseUrl.'getfile.php?fid/'.$autoid;
		$fileurl = "{IM:A}$fileurl{/IM:A}";
		echo "<script language=\"javascript\">parent.backAutoSendMsg(".$pid.",'".$language_transfer['FileUpdateToServer']."。\\r\\n".$language_basic['ClickForDownload']."：\\r\\n".$fileurl."');</script>";
	}elseif($autoid && ($upfile==2)){
		$fileurl = "{img:".$upfileAry['filename']."/}";
		echo "<script language='javascript'>parent.backSubmitImg('".$fileurl."');</script>";
	}else{
		echo "<script language=\"javascript\">parent.backTransferFileError('".$language_transfer['TransferFileOff']."');</script>";
		exit;
	}
}else{
	echo "<script language=\"javascript\">parent.backTransferFileError('".$language_transfer['TransferFileOff']."');</script>";
	exit;
}
?>