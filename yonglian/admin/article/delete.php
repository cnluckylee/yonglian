<?php
# MetInfo Enterprise Content Management System 
# Copyright (C) MetInfo Co.,Ltd (http://www.metinfo.cn). All rights reserved. 
require_once '../login/login_check.php';
$backurl="../article/index.php?lang=$lang&class1=$class1&class2=$class2&class3=$class3";
$folder=$db->get_one("select * from $met_column where id='$class1'");
if($action=="del"){
	$allidlist=explode(',',$allid);
	$k=count($allidlist)-1;
	for($i=0;$i<$k; $i++){
	if($met_htmpagename==1 or $met_deleteimg or $metadmin[pagename])$news_list=$db->get_one("select * from $met_news where id='$allidlist[$i]'");
	$updatetime=date('Ymd',strtotime($news_list[updatetime]));
	//delete images
	if($met_deleteimg){
	file_unlink("../".$news_list[imgurl]);
	file_unlink("../".$news_list[imgurls]);
	$news_list[imgurlbig]=str_replace('watermark/','',$news_list[imgurl]);
	file_unlink("../".$news_list[imgurlbig]);
	}
	deletepage($folder[foldername],$allidlist[$i],'shownews',$updatetime,$news_list[filename]);
	$query = "delete from $met_news where id='$allidlist[$i]'";
	$db->query($query);
	}
$htmjs = indexhtm();
$htmjs.= classhtm($class1,$class2,$class3);
	if($met_webhtm==2){
	   okinfoh($backurl,$htmjs,$lang_delall);
	}else{
	   okinfoh($backurl,$htmjs);
	}
}elseif($action=="editor"){
	$allidlist=explode(',',$allid);
	foreach($allidlist as $key=>$val){
		$no_order = "no_order_$val";
		$no_order = $$no_order;
		$query = "update $met_news SET
			no_order       	 = '$no_order',
			lang               = '$lang'
			where id='$val'";
		$db->query($query);
	}
	$htmjs =indexhtm();
	$htmjs.=classhtm($class1,$class2,$class3);
	okinfoh($backurl,$htmjs);
}else{
	$news_list = $db->get_one("SELECT * FROM $met_news WHERE id='$id'");
	if(!$news_list){
		okinfox($backurl,$lang_dataerror);
	}
	$query = "delete from $met_news where id='$id'";
	$db->query($query);

	//delete images
	if($met_deleteimg){
	file_unlink("../".$news_list[imgurl]);
	file_unlink("../".$news_list[imgurls]);
	$news_list[imgurlbig]=str_replace('watermark/','',$news_list[imgurl]);
	file_unlink("../".$news_list[imgurlbig]);
	}
	$updatetime=date('Ymd',strtotime($news_list[updatetime]));
	deletepage($folder[foldername],$id,'shownews',$updatetime,$news_list[filename]);
	$htmjs =indexhtm();
	$class1=$news_list[class1];
	$class2=$news_list[class2];
	$class3=$news_list[class3];
	$htmjs.=classhtm($class1,$class2,$class3);
	okinfoh($backurl,$htmjs);
}
# This program is an open source system, commercial use, please consciously to purchase commercial license.
# Copyright (C) MetInfo Co., Ltd. (http://www.metinfo.cn). All rights reserved.
?>
