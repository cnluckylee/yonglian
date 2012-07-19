<?php
if(!$IWEB_IM_IN) {
	die('Hacking attempt');
}
require("foundation/cuploadfull.class.php");
require("foundation/module_im.php");

$up = new upload();
$up->set_field('headimg');
$up->set_dir('uploadfiles/headimg/');//目录设置
$up->set_thumb(40,40); 
$fs = $up->execute();

if($fs) {
	unlink($fs[0]['dir'].$fs[0]['name']);
	//数据表定义区
	$t_chat_users = IM_DBTABLEPRE."users";
	$t_chat_txt = IM_DBTABLEPRE."txt";
	
	//定义数据库操作
	dbtarget('r',$dbServs);
	$dbo=new dbex;
	$headimg = $baseUrl.$fs[0]['dir'].$fs[0]['thumb'];
	imUpdateHeadImg($dbo,$t_chat_users,$headimg,$uid);
	echo "<script language=\"javascript\">parent.i_im_backChangeIco('".$headimg."');</script>";
} else {
	exit('-1');
}