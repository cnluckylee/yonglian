<?php
# MetInfo Enterprise Content Management System
# Copyright (C) MetInfo Co.,Ltd (http://www.metinfo.cn). All rights reserved.
require_once '../login/login_check.php';
if($action=="modify"){
$file_basicname      =ROOTPATH."config/lang.inc.php";
if(substr($met_htmpack_url,-1,1)!='/')$met_htmpack_url.="/";
if(file_exists($file_basicname)){
$fp = @fopen($file_basicname, "r") or die("Cannot open $file_basicname");
$k=0;
while ($conf_line = @fgets($fp, 1024)){
if(!(strstr($conf_line, "$"."met_langok[".$lang."][met_webhtm]") or strstr($conf_line, "$"."met_langok[".$lang."][met_htmtype]"))){
$linenum = $conf_line;
$linelist[$k]=$linenum;
$k++;
}}
}
$j=$k-4;
for($i=0;$i<$k;$i++){
$lang_save .=$linelist[$i];
if($j==$i){
   $lang_save .="$"."met_langok[".$lang."][met_webhtm]='".$met_webhtm."';\n";
   $lang_save .="$"."met_langok[".$lang."][met_htmtype]='".$met_htmtype."';\n";
  }
}
if(!is_writable("../../config/lang.inc.php"))@chmod("../../config/lang.inc.php",0777);
 $fp = fopen("../../config/lang.inc.php",w);
 fputs($fp, $lang_save);
 fclose($fp);
require_once 'configsave.php';
require_once '404.php';
if($met_pseudo)require_once 'pseudo.php';
$meturl='sethtm.php?lang='.$lang;
if($met_webhtm!=0){
$localurl="http://";
$localurl.=$_SERVER['HTTP_HOST'].$_SERVER["PHP_SELF"];
$localurl_a=explode("/",$localurl);
$localurl_count=count($localurl_a);
$localurl_admin=$localurl_a[$localurl_count-3];
$localurl_admin=$localurl_admin."/set/sethtm";
$localurl_real=explode($localurl_admin,$localurl);
$localurl=$localurl_real[0];

$met_pseudo?okinfo($meturl):okinfoh($meturl,indexhtm());
}else{
if($lang==$met_index_type && file_exists("../../index.htm"))@unlink("../../index.htm");
if($lang==$met_index_type && file_exists("../../index.html"))@unlink("../../index.html");
if(file_exists("../../index_".$lang.".htm"))@unlink("../../index_".$lang.".htm");
if(file_exists("../../index_".$lang.".html"))@unlink("../../index_".$lang.".html");
$meturn="sethtm.php?action=deleteall&lang=".$lang;
okinfot($meturl,$meturn,$lang_js21);
}
}elseif($action=="deleteall"){
 $query = "SELECT * FROM $met_column where (bigclass=0 or releclass!=0) and if_in=0 and lang='$lang'";
 $result = $db->query($query);
  while($list= $db->fetch_array($result)){
   $dir="../../".$list['foldername'];
   $file=scandir($dir);
   foreach ($file as $value){
if($lang==$met_index_type){
   if($value != "." && $value !=".."){
      $langmarkarray=explode("_",$value);
	  $k=count($langmarkarray)-1;
	  $langmark=$k?$langmarkarray[$k]:"";
      if((substr($value,-4,4)=="html" || substr($value,-3,3)=="htm") and (!strstr($htmlang, "_".$langmark) || $langmark=="")){

	  unlink($dir."/".$value);
	  }
	  }
   }else{
    if($value != "." && $value !=".."){
		if(strstr($value,".htm")){
		unlink($dir."/".$value);
		}
	}
   }
   }
  }
   $meturn='sethtm.php?lang='.$lang;
   okinfo($meturn);
}
else{

$met_webhtm1[$met_webhtm]="checked='checked'";
if($met_htmtype=="htm")$met_htmtype1[0]="checked='checked'";
if($met_htmtype=="html")$met_htmtype1[1]="checked='checked'";
$met_htmpagename1[$met_htmpagename]="checked='checked'";
$met_htmlistname1[$met_htmlistname]="checked='checked'";
$met_sitemap_html1[$met_sitemap_html]="checked='checked'";
$met_sitemap_xml1[$met_sitemap_xml]="checked='checked'";
$met_htmway1[$met_htmway]="checked='checked'";
$met_pseudo1[$met_pseudo]="checked='checked'";
$met_htmpacks[$met_htmpack]="checked='checked'";

$webml = 'http://'.$_SERVER['HTTP_HOST'].'/';
$webmpa = $_SERVER["PHP_SELF"];
$webmpa = dirname($webmpa);
$webmpa = explode('/',$webmpa);
$wnum = count($webmpa)-2;
for($i=1;$i<$wnum;$i++){
	$webmp = $i==1?$webmpa[$i]:$webmp.'/'.$webmpa[$i];
}
$css_url="../templates/".$met_skin."/css";
$img_url="../templates/".$met_skin."/images";
include template('sethtm');

}
# This program is an open source system, commercial use, please consciously to purchase commercial license.
# Copyright (C) MetInfo Co., Ltd. (http://www.metinfo.cn). All rights reserved.
?>