<?php
# MetInfo Enterprise Content Management System 
# Copyright (C) MetInfo Co.,Ltd (http://www.metinfo.cn). All rights reserved. 
require_once '../login/login_check.php';
$module=$met_class[$class1][module];
$query = "select * from $met_parameter where lang='$lang' and module='".$met_class[$class1][module]."' and (class1=$class1 or class1=0) order by no_order";
$result = $db->query($query);
while($list = $db->fetch_array($result)){
 if($list[type]==4){
  $query1 = " where lang='$lang' and bigid='".$list[id]."'";
  $total_list[$list[id]] = $db->counter($met_list, "$query1", "*");
  }
$para_list[]=$list;
}
$filename=preg_replace("/\s/","_",trim($filename)); 
$filenameold=preg_replace("/\s/","_",trim($filenameold)); 
if($imgnum>0){
	for($i=0;$i<$imgnum;$i++){
		$displayimg = "displayimg".$i;
		$displayname = "displayname".$i;
		if($i==0){
			$displayimglist=$$displayname.'-'.$$displayimg;
		}else{
			$displayimglist=$displayimglist.','.$$displayname.'-'.$$displayimg;
		}
	}
} 
$displayimg = $displayimglist;
if($action=="add"){
if($filename!=''){
	$filenameok = $db->get_one("SELECT * FROM $met_img WHERE class1='$class1' and filename='$filename'");
	if($filenameok)okinfox('../img/content.php?lang='.$lang."&action=$action&class1=$class1",$lang_modFilenameok);
}
$access=$access<>""?$access:0;
$query = "INSERT INTO $met_img SET
                      title              = '$title',
					  keywords           = '$keywords',
					  description        = '$description',
					  content            = '$content',
					  class1             = '$class1',
					  class2             = '$class2',
					  class3             = '$class3',
					  new_ok             = '$new_ok',
					  imgurl             = '$imgurl',
					  imgurls            = '$imgurls',
					  displayimg         = '$displayimg',
				      com_ok             = '$com_ok',
				      wap_ok             = '$wap_ok',
					  issue              = '$issue',
					  hits               = '$hits', 
					  addtime            = '$addtime', 
					  updatetime         = '$updatetime',
					  access          	 = '$access',
					  filename           = '$filename',
					  no_order       	 = '$no_order',
					  lang          	 = '$lang',";
if($metadmin[imgother])$query .="
                      contentinfo         = '$contentinfo',
					  contentinfo1        = '$contentinfo1',
					  contentinfo2        = '$contentinfo2',
					  contentinfo3        = '$contentinfo3',
					  contentinfo4        = '$contentinfo4',
                      content1            = '$content1',
					  content2            = '$content2',
					  content3            = '$content3',
					  content4            = '$content4',
					  ";
			 $query .="top_ok             = '$top_ok'";
         $db->query($query);

$later_img=$db->get_one("select * from $met_img where updatetime='$updatetime' and lang='$lang'");
$id=$later_img[id];
foreach($para_list as $key=>$val){
    if($val[type]!=4){
      $para="para".$val[id];
	  $para=$$para;
	   if($val[type]==5){
	     $paraname="para".$val[id]."name";
		 $paraname=$$paraname;
		 }
	}else{
	  $para="";
	  for($i=1;$i<=$total_list[$val[id]];$i++){
	  $para1="para".$val[id]."_".$i;
	  $para2=$$para1;
	  $para=($para2<>"")?$para.$para2."-":$para;
	  }
	  $para=substr($para, 0, -1);
	}
	
    $query = "INSERT INTO $met_plist SET
                      listid   ='$id',
					  paraid   ='$val[id]',
					  info     ='$para',
					  imgname  ='$paraname',
					  module   ='$module',
					  lang     ='$lang'";
         $db->query($query);
   $paraname="";
 }
//html
$htmjs =contenthtm($class1,$id,'showimg',$filename);
$htmjs.=indexhtm();
$htmjs.=classhtm($class1,$class2,$class3);
okinfoh('../img/index.php?lang='.$lang.'&class1='.$class1,$htmjs);
}
if($action=="editor"){
if($filename!=''){
	$filenameok = $db->get_one("SELECT * FROM $met_img WHERE class1='$class1' and filename='$filename'");
	if($filenameok)okinfox('../img/content.php?lang='.$lang."&action=$action&id=$id",$lang_modFilenameok);
}
$query = "update $met_img SET 
                      title              = '$title',
					  keywords           = '$keywords',
					  description        = '$description',
					  content            = '$content',
                      class1             = '$class1',
					  class2             = '$class2',
					  class3             = '$class3',
					  imgurl             = '$imgurl',
					  imgurls            = '$imgurls',
					  displayimg         = '$displayimg',";
if($metadmin[imgnew])$query .= "					  
					  new_ok             = '$new_ok',";
if($metadmin[imgcom])$query .= "	
				      com_ok             = '$com_ok',";
					  $query .= "
					  wap_ok             = '$wap_ok',
					  issue              = '$issue',
					  hits               = '$hits', 
					  addtime            = '$addtime', 
					  updatetime         = '$updatetime',";
if($met_member_use)  $query .= "
					  access			 = '$access',";
if($metadmin[pagename])$query .= "
					  filename       	 = '$filename',
					  no_order       	 = '$no_order',";
if($metadmin[imgother])$query .="
                      contentinfo         = '$contentinfo',
					  contentinfo1        = '$contentinfo1',
					  contentinfo2        = '$contentinfo2',
					  contentinfo3        = '$contentinfo3',
					  contentinfo4        = '$contentinfo4',
                      content1            = '$content1',
					  content2            = '$content2',
					  content3            = '$content3',
					  content4            = '$content4',
					  ";
					  $query .= "
					  top_ok             = '$top_ok',
					  lang               = '$lang'
					  where id='$id'";
$db->query($query);

foreach($para_list as $key=>$val){
    if($val[type]!=4){
      $para="para".$val[id];
	  $para=$$para;
	   if($val[type]==5){
	     $paraname="para".$val[id]."name";
		 $paraname=$$paraname;
		 }
	}else{
	  $para="";
	  for($i=1;$i<=$total_list[$val[id]];$i++){
	  $para1="para".$val[id]."_".$i;
	  $para2=$$para1;
	  $para=($para2<>"")?$para.$para2."-":$para;
	  }
	  $para=substr($para, 0, -1);
	}
    $now_list=$db->get_one("select * from $met_plist where listid='$id' and  paraid='$val[id]'");
	if($now_list){
    $query = "update $met_plist SET
					  info     ='$para',
					  imgname  ='$paraname',
					  lang     ='$lang'
					  where listid='$id' and  paraid='$val[id]'";
	}else{
    $query = "INSERT INTO $met_plist SET
                      listid   ='$id',
					  paraid   ='$val[id]',
					  info     ='$para',
					  imgname  ='$paraname',
					  module   ='$module',
					  lang     ='$lang'";	
	 }
         $db->query($query);
   $paraname="";
 }
//html
$htmjs =contenthtm($class1,$id,'showimg',$filename);
$htmjs.=indexhtm();
$htmjs.=classhtm($class1,$class2,$class3);
if($filenameold<>$filename and $metadmin[pagename])deletepage($met_class[$class1][foldername],$id,'showimg',$updatetimeold,$filenameold);
okinfoh('../img/index.php?lang='.$lang.'&class1='.$class1,$htmjs);
}
# This program is an open source system, commercial use, please consciously to purchase commercial license.
# Copyright (C) MetInfo Co., Ltd. (http://www.metinfo.cn). All rights reserved.
?>
