<?php
# MetInfo Enterprise Content Management System 
# Copyright (C) MetInfo Co.,Ltd (http://www.metinfo.cn). All rights reserved. 
require_once '../login/login_check.php';
$adminno = $db->counter($met_admin_table, " where admin_type like '%metinfo%' and id<>'$id'", "*");
if($adminno<1)okinfox($lang_deleteJS,'index.php?lang='.$lang);
if($action=="del"){
$allidlist=explode(',',$allid);
foreach($allidlist as $key=>$val){
$query = "delete from $met_admin_table where id='$val'";
$db->query($query);
}
okinfo('../admin/index.php?lang='.$lang);
}
else{
$admin_list = $db->get_one("SELECT * FROM $met_admin_table WHERE id='$id'");
if(!$admin_list){
okinfox('../admin/index.php?lang='.$lang,$lang_loginNoid);
}
$query = "delete from $met_admin_table where id='$id'";
$db->query($query);
okinfo('../admin/index.php?lang='.$lang);
}
# This program is an open source system, commercial use, please consciously to purchase commercial license.
# Copyright (C) MetInfo Co., Ltd. (http://www.metinfo.cn). All rights reserved.
?>