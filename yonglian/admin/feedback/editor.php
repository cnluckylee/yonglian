<?php
# MetInfo Enterprise Content Management System 
# Copyright (C) MetInfo Co.,Ltd (http://www.metinfo.cn). All rights reserved. 
require_once '../login/login_check.php';
include_once("../../fckeditor/fckeditor.php");
if($action=="editor"){
$query = "update $met_feedback SET
                      useinfo            = '$useinfo',
                      class1             = '$class1',
					  readok             = '1'
					  where id='$id'";
$db->query($query);
okinfo('../feedback/editor.php?lang='.$lang.'&id='.$id.'&class1='.$class1);
}else{
$query = "update $met_feedback SET
					  class1             = '$class1',
					  readok             = '1'
					  where id='$id'";
$db->query($query);
$feedback_list=$db->get_one("select * from $met_feedback where id='$id' and class1 = '$class1'");
if(!$feedback_list){
okinfox('../feedback/index.php?lang='.$lang,$lang_dataerror);
}

$feedback_list['customerid']=metidtype($feedback_list['customerid']);
$query = "SELECT * FROM $met_parameter where module=8 and lang='$lang' and class1='$class1' order by no_order";
$result = $db->query($query);
while($list= $db->fetch_array($result)){
$info_list=$db->get_one("select * from $met_flist where listid='$id' and paraid='$list[id]' and lang='$lang'");
$list[content]=$info_list[info];
if($list[type]==5)$list[content]="<a href='../../upload/file/".$info_list[info]."' target='_blank'>".$info_list[info]."</a>";
$feedback_para[]=$list;
}
$css_url="../templates/".$met_skin."/css";
$img_url="../templates/".$met_skin."/images";
include template('feedback_editor');
footer();
}
# This program is an open source system, commercial use, please consciously to purchase commercial license.
# Copyright (C) MetInfo Co., Ltd. (http://www.metinfo.cn). All rights reserved.
?>