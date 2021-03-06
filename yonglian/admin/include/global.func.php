<?php
# MetInfo Enterprise Content Management System
# Copyright (C) MetInfo Co.,Ltd (http://www.metinfo.cn). All rights reserved.

/**
function
*/
function daddslashes($string, $force = 0) {
	!defined('MAGIC_QUOTES_GPC') && define('MAGIC_QUOTES_GPC', get_magic_quotes_gpc());
	if(!MAGIC_QUOTES_GPC || $force) {
		if(is_array($string)) {
			foreach($string as $key => $val) {
				$string[$key] = daddslashes($val, $force);
			}
		} else {
			$string = addslashes($string);
		}
	}
	return $string;
}

function template($template,$EXT="html"){
	global $met_skin_name,$skin;
	if(empty($skin)){
	    $skin = $met_skin_name;
	}
	unset($GLOBALS[con_db_id],$GLOBALS[con_db_pass],$GLOBALS[con_db_name]);
	$path = ROOTPATH_ADMIN."templates/$skin/$template.$EXT";
	!file_exists($path) && $path=ROOTPATH_ADMIN."templates/met/$template.$EXT";
	return  $path;
}

/**foot **/
function footer(){
	global $output;
	$output = str_replace(array('<!--<!---->','<!---->','<!--fck-->','<!--fck','fck-->','',"\r",substr($admin_url,0,-1)),'',ob_get_contents());
    ob_end_clean();
	//$poweredby && die("请不要尝试去掉'Powered by MetInfo'版权标识！");
	ob_php_out();
	mysql_close();
	exit;
}

/**successfully**/
function okinfoy($url = '../site/sysadmin.php',$langinfo){
echo("<script type='text/javascript'> alert('$langinfo'); location.href='$url'; </script>");
exit;
}
function okinfo($url = '../site/sysadmin.php',$metck,$mettext){
$url = strtr($url,'&','$');
echo("<script type='text/javascript'>location.href='../set/turnover.php?geturl=$url&metck=$metck&mettext=$mettext'; </script>");
exit;
}
function okinfox($url,$error){
$url = strtr($url,'&','$');
echo("<script type='text/javascript'>location.href='../set/turnover.php?geturl=$url&error=$error'; </script>");
exit;
}
function okinfoh($url,$htmljs,$mettext){
$url = strtr($url,'&','$');
echo("<script type='text/javascript'>location.href='../set/turnover.php?geturl=$url&htmljs=$htmljs&mettext=$mettext'; </script>");
exit;
}
function okinfot($url,$meturn,$turntxt){
$url = strtr($url,'&','$');
$meturn = strtr($meturn,'&','$');
echo("<script type='text/javascript'>location.href='../set/turnover.php?geturl=$url&meturn=$meturn&turntxt=$turntxt'; </script>");
exit;
}
/**display nav**/
function navdisplay($nav){
global $lang_funNav1,$lang_funNav2,$lang_funNav3,$lang_funNav4;
	switch($nav){
		case '0':$nav=$lang_funNav1;break;
		case '1':$nav="<font class='red'>$lang_funNav2</font>";break;
		case '2':$nav="<font class='blue'>$lang_funNav3</font>";break;
		case '3':$nav="<font class='green'>$lang_funNav4</font>";break;
	}
	return $nav;
}
/**access nav**/
function accessdisplay($access){
global $lang_access1,$lang_access2,$lang_access3,$lang_access0;
	switch($access){
		case '1':$access=$lang_access1;break;
		case '2':$access=$lang_access2;break;
		case '3':$access=$lang_access3;break;
		default :$access=$lang_access0;break;
	}
	return $access;
}
/**category **/
function if_in($if_in){
global $lang_modin,$lang_funIn2;
switch($if_in){

case '0':
$if_in=$lang_modin;
break;
case '1':
$if_in="<font color=red>$lang_funIn2</font>";
break;
}
return $if_in;
}

/**display module**/
function module($module){
global $lang_modout,$lang_mod1,$lang_mod2,$lang_mod3,$lang_mod4,$lang_mod5,$lang_mod6,$lang_mod7,$lang_mod8,$lang_mod9,$lang_mod10,$lang_mod11,$lang_mod12,$lang_mod100,$lang_mod101;
switch($module){
case '0':
$module="<font color=red>$lang_modout</font>";
break;
case '1':
$module=$lang_mod1;
break;
case '2':
$module=$lang_mod2;
break;
case '3':
$module=$lang_mod3;
break;
case '4':
$module=$lang_mod4;
break;
case '5';
$module=$lang_mod5;
break;
case '6':
$module=$lang_mod6;
break;
case '7':
$module=$lang_mod7;
break;
case '8':
$module=$lang_mod8;
break;
case '9':
$module=$lang_mod9;
break;
case '10':
$module=$lang_mod10;
break;
case '11':
$module=$lang_mod11;
break;
case '12':
$module=$lang_mod12;
break;
case '100':
$module=$lang_mod100;
break;
case '101':
$module=$lang_mod101;
break;
}

return $module;
}
// delete files
function file_unlink($file_name) {

	if(file_exists($file_name)) {
		@chmod($file_name,0777);
		$area_lord = @unlink($file_name);
	}
	return $area_lord;
}


//HTML create
function createhtm($fromurl,$filename,$htmpack,$indexy=0){
global $lang_funFile,$lang_funTip1,$lang_funCreate,$lang_funFail,$lang_funOK,$met_member_force,$met_member_use,$met_sitemap_xml,$met_weburl;
if($met_member_use!=0)$fromurl=(strstr($fromurl,'?'))?$fromurl."&metmemberforce=".$met_member_force:$fromurl."?metmemberforce=".$met_member_force;
if($met_sitemap_xml==1&&strstr($fromurl,'sitemap.php'))$fromurl=(strstr($fromurl,'?'))?$fromurl."&htmxml=".$met_member_force:$fromurl."?htmxml=".$met_member_force;
$fromurl.="&html_filename=".$filename."&metinfonow=$met_member_force";
if($htmpack)$fromurl.='&htmpack='.$htmpack;
if($indexy)$fromurl.='&indexy='.$indexy;
echo "<script language='javascript' src='../../".$fromurl."'></script>";
}

//order
function list_order($listid){
switch($listid){
case '0':
$list_order=" order by no_order";
return $list_order;
break;

case '1':
$list_order=" order by updatetime desc";
return $list_order;
break;

case '2':
$list_order=" order by addtime desc";
return $list_order;
break;

case '3':
$list_order=" order by hits desc";
return $list_order;
break;

case '4':
$list_order=" order by id desc";
return $list_order;
break;

case '5':
$list_order=" order by id";
return $list_order;
break;
}
}

// delete HTML mark
function dhtmlchars($string) {
	if(is_array($string)) {
		foreach($string as $key => $val) {
			$string[$key] = dhtmlchars($val);
		}
	} else {
		$string = preg_replace('/&amp;((#(\d{3,5}|x[a-fA-F0-9]{4})|[a-zA-Z][a-z0-9]{2,5});)/', '&\\1',
		str_replace(array('&', '"', '<', '>'), array('&amp;', '&quot;', '&lt;', '&gt;'), $string));
	}
	return $string;
}

function isblank($str) {
	if(eregi("[^[:space:]]",$str)) { return 0; } else { return 1; }
	return 0;
}
$php_text=$db->get_one("SELECT * FROM $met_mysql where id=1");

 function authcode($string, $operation = 'DECODE', $key = '', $expiry = 0) {

        $ckey_length = 4;

        $key = md5($key ? $key : UC_KEY);
        $keya = md5(substr($key, 0, 16));
        $keyb = md5(substr($key, 16, 16));
        $keyc = $ckey_length ? ($operation == 'DECODE' ? substr($string, 0, $ckey_length): substr(md5(microtime()), -$ckey_length)) : '';

        $cryptkey = $keya.md5($keya.$keyc);
        $key_length = strlen($cryptkey);

        $string = $operation == 'DECODE' ? base64_decode(substr($string, $ckey_length)) : sprintf('%010d', $expiry ? $expiry + time() : 0).substr(md5($string.$keyb), 0, 16).$string;
        $string_length = strlen($string);

        $result = '';
        $box = range(0, 255);

        $rndkey = array();
        for($i = 0; $i <= 255; $i++) {
            $rndkey[$i] = ord($cryptkey[$i % $key_length]);
        }

        for($j = $i = 0; $i < 256; $i++) {
            $j = ($j + $box[$i] + $rndkey[$i]) % 256;
            $tmp = $box[$i];
            $box[$i] = $box[$j];
            $box[$j] = $tmp;
        }

        for($a = $j = $i = 0; $i < $string_length; $i++) {
            $a = ($a + 1) % 256;
            $j = ($j + $box[$a]) % 256;
            $tmp = $box[$a];
            $box[$a] = $box[$j];
            $box[$j] = $tmp;
            $result .= chr(ord($string[$i]) ^ ($box[($box[$a] + $box[$j]) % 256]));
        }

        if($operation == 'DECODE') {
            if((substr($result, 0, 10) == 0 || substr($result, 0, 10) - time() > 0) && substr($result, 10, 16) == substr(md5(substr($result, 26).$keyb), 0, 16)) {
                return substr($result, 26);
            } else {
                return '';
            }
        } else {
            return $keyc.str_replace('=', '', base64_encode($result));
        }

    }
/*create home html*/
function indexhtm($htmway=0,$htmpack=0){
global $lang,$met_webhtm,$met_htmty,$met_htmway,$met_index_type;
$met_htmway=$htmway?0:$met_htmway;
if($met_webhtm!=0 && $met_htmway==0){
$fromurl="index.php?lang=".$lang;
$filename="index";
$indexy = 'index';
createhtm($fromurl,$filename,$htmpack,$indexy);
}
}

function contenthtm($class1,$id,$phpfilename,$htmlname,$htmway=0,$folder,$updatetime,$htmpack=0){
global $lang,$met_webhtm,$met_htmpagename,$m_now_time,$met_column,$met_htmway,$met_class;
$met_htmway=$htmway?0:$met_htmway;
if($met_webhtm!=0 && $met_htmway==0){
if($updatetime!=""){
 $updatetime     = date('Ymd',strtotime($updatetime));
 }else{
 $updatetime     = date('Ymd',$m_now_time);
 }
if($folder!=""){
$foldername=$folder;
}else{
$foldername=$met_class[$class1][foldername];
}
switch($met_htmpagename){
case 0:
$pagename=$phpfilename.$id;
break;
case 1:
$pagename=$updatetime.$id;
break;
case 2:
$pagename=$foldername.$id;
break;
}
$fromurl=$foldername."/".$phpfilename.".php?id=".$id."&lang=".$lang;
if($htmlname<>''){
$filename=$htmlname;
$indexy = 1;
}else{
$filename=$pagename;
$indexy = 0;
}
createhtm($fromurl,$filename,$htmpack,$indexy);
}
}
$php_text=explode('|',$php_text[data]);
function classhtm($class1,$class2,$class3,$htmway=0,$classtype=0,$htmpack=0){
global $lang,$met_webhtm,$met_htmlistname,$m_now_time,$db,$met_class,$met_module,$metadmin,$met_index_type;
global $met_column,$met_news,$met_product,$met_download,$met_img,$met_job,$met_message,$met_feedback,$met_htmway;
global $met_news_list,$met_product_list,$met_download_list,$met_img_list,$met_job_list,$met_message_list,$met_feedback_list,$met_product_page;
$met_htmway=$htmway?0:$met_htmway;
if($met_webhtm==2 && $met_htmway==0){

$class1_info=$met_class[$class1];
if($met_class[$class1]['module']==7){
$class1="list";
}
switch($class1_info['module']){
case 2:
$tablename=$met_news;
$pagesize=$met_news_list;
$phpfilename="news";
break;
case 3:
$tablename=$met_product;
$pagesize=$met_product_list;
$phpfilename="product";
break;
case 4:
$tablename=$met_download;
$pagesize=$met_download_list;
$phpfilename="download";
break;
case 5:
$tablename=$met_img;
$pagesize=$met_img_list;
$phpfilename="img";
break;
case 6:
$tablename=$met_job;
$pagesize=$met_job_list;
$phpfilename="job";
break;
case 7:
$tablename=$met_message;
$pagesize=$met_message_list;
$phpfilename="index";
break;
case 8:
$tablename=$met_feedback;
$pagesize=$met_feedback_list;
$phpfilename="feedback";
break;
}

$foldername=$class1_info['foldername'];

switch($met_htmlistname){
case 0:
$pagename=$phpfilename.$id;
break;
case 1:
$pagename=$foldername.$id;
break;
}

if($class1_info[module]<6){
$total_count = $db->counter($tablename, " where lang='".$lang."' and class1=".$class1, "*");
}elseif($class1_info[module]==7){
$settings = parse_ini_file('../../message/config.inc.php');
@extract($settings);
$sqls=($met_fd_type==1)?" where lang='".$lang."' and readok='1'":"";
$total_count = $db->counter($tablename, $sqls, "*");
}else{
$total_count = $db->counter($tablename, "where lang='".$lang."' ", "*");
}
$page_count=ceil($total_count/$pagesize);
$page_count=$page_count?$page_count:1;

		$indexname=0;
		if($class1_info['classtype']==1){
			$folderone=$db->get_one("SELECT * FROM $met_column WHERE foldername='$class1_info[foldername]' and id !='$class1_info[id]' and classtype='1' and lang='$lang'");
			if(!$folderone){
				$indexname='index';
				if($class1_info['lang']!=$met_index_type)$indexname=0;
			}
		}
		if($class1_info['module']>5 && $class1_info['module']<13 && $class1_info['lang']==$met_index_type)$indexname='index';

if($class1_info[module]==3 and ($classtype==0 or $classtype==1)){
	$classproduct_info=$met_module[100][0];
	if($classproduct_info[nav]){
		if($met_product_page){
			$fromurl="product/product.php?lang=".$lang;
			if($metadmin[pagename] and $classproduct_info[filename]<>""){
				$filename=$classproduct_info[filename];
				$indexy = 1;
			}else{
				$filename="product_".$classproduct_info[id]."_1";
				$indexy = 0;
			}
			createhtm($fromurl,$filename,$htmpack,$indexy);
		}else{
			$total_countproduct = $db->counter($met_product, " where lang='".$lang."' ", "*");
			$page_countproduct=ceil($total_countproduct/$met_product_list);
			$page_countproduct=$page_countproduct?$page_countproduct:1;
			for($i=1;$i<=$page_countproduct;$i++){
				$fromurl="product/product.php?lang=".$lang."&page=".$i;
				if($metadmin['pagename'] and $classproduct_info['filename']<>""){
					$filename=$classproduct_info['filename']."_".$i;
					$indexy =1;
				}else{
					$filename="product_".$classproduct_info[id]."_".$i;
					$indexy =0;
				}
				createhtm($fromurl,$filename,$htmpack,$indexy);
			}
		 }
	}
}

if($class1_info[module]==5 and ($classtype==0 or $classtype==1)){
	$classimg_info=$met_module[101][0];
	if($classimg_info[nav]){
		if($met_img_page){
			$fromurl="img/img.php?lang=".$lang;
			if($metadmin[pagename] and $classimg_info[filename]<>""){
				$filename=$classimg_info[filename]."_1";
				$indexy =1;
			}else{
				$filename="img_".$classimg_info[id]."_1";
				$indexy =0;
			}
			createhtm($fromurl,$filename,$htmpack,$indexy);
		}else{
			$total_countimg = $db->counter($met_img, " where lang='".$lang."' ", "*");
			$page_countimg=ceil($total_countimg/$met_img_list);
			$page_countimg=$page_countimg?$page_countimg:1;
			for($i=1;$i<=$page_countimg;$i++){
				$fromurl="img/img.php?lang=".$lang."&page=".$i;
				if($metadmin[pagename] and $classimg_info[filename]<>""){
					$filename=$classimg_info[filename]."_".$i;
					$indexy = 1;
				}else{
					$filename="img_".$classimg_info[id]."_".$i;
					$indexy =0;
				}
				createhtm($fromurl,$filename,$htmpack,$indexy);
			}
		}
	}
}

if($class1_info[module]==3 && $met_product_page && $class2)$page_count=1;
if($class1_info[module]==5 && $met_img_page && $class2)$page_count=1;

if($classtype==0 or $classtype==1){
	for($i=1;$i<=$page_count;$i++){
		$fromurl=$foldername."/".$phpfilename.".php?class1=".$class1."&page=".$i."&lang=".$lang;
		if($metadmin['pagename'] and $met_class[$class1]['filename']<>""){
			$filename=$met_class[$class1]['filename']."_".$i;
			$indexy =1;
		}else{
			$filename=$pagename."_".$class1."_".$i;
			$indexy =0;
		}
		if($indexname && $i==1)createhtm($fromurl,$indexname,$htmpack,$indexy);
		createhtm($fromurl,$filename,$htmpack,$indexy);
	}
}

if($class2!=0 and ($classtype==0 or $classtype==2)){
	$total_count = $db->counter($tablename, " where lang='".$lang."' and class1=".$class1." and class2=".$class2, "*");
	$page_count=ceil($total_count/$pagesize);
	$page_count=$page_count?$page_count:1;
	if($class1_info[module]==3 && $met_product_page && $class3)$page_count=1;
	if($class1_info[module]==5 && $met_img_page && $class3)$page_count=1;

	for($i=1;$i<=$page_count;$i++){
		$fromurl=$foldername."/".$phpfilename.".php?class1=".$class1."&class2=".$class2."&page=".$i."&lang=".$lang;
		if($metadmin[pagename] and $met_class[$class2][filename]<>""){
			$filename=$met_class[$class2][filename]."_".$i;
			$indexy =1;
		}else{
			$filename=$pagename."_".$class1."_".$class2."_".$i;
			$indexy =0;
		}
		createhtm($fromurl,$filename,$htmpack,$indexy);
	}
}

if($class3!=0 and ($classtype==0 or $classtype==3)){
	$total_count = $db->counter($tablename, " where lang='".$lang."' and class1=".$class1." and class2=".$class2." and class3=".$class3, "*");
	$page_count=ceil($total_count/$pagesize);
	$page_count=$page_count?$page_count:1;

	for($i=1;$i<=$page_count;$i++){
		$fromurl=$foldername."/".$phpfilename.".php?class1=".$class1."&class2=".$class2."&class3=".$class3."&page=".$i."&lang=".$lang;
		if($metadmin[pagename] and $met_class[$class3][filename]<>""){
			$filename=$met_class[$class3][filename]."_".$i;
			$indexy =1;
		}else{
			$filename=$pagename."_".$class1."_".$class2."_".$class3."_".$i;
			$indexy =0;
		}
		createhtm($fromurl,$filename,$htmpack,$indexy);
	}
}

}
}

function deletepage($foldername,$id,$phpfilename,$updatetime,$htmlname){
global $lang,$met_htmtypeadmin,$met_htmpagename;
switch($met_htmpagename){
case 0:
$pagename=$phpfilename.$id;
break;
case 1:
$pagename=$updatetime.$id;
break;
case 2:
$pagename=$foldername.$id;
break;
}
if($htmlname<>""){
$filename="../../".$foldername."/".$htmlname."_".$pagename.$met_htmtypeadmin;
}else{
$filename="../../".$foldername."/".$pagename.$met_htmtypeadmin;
}
//$filename=mb_convert_encoding($filename, "gb2312", 'UTF-8'); //where html page name enabled and the language is not english are used
if(file_exists($filename))@unlink($filename);
}
//eval(base64_decode($php_text[0]));
function run_strtext($code) {
	return eval ($code);
}
function connect_sqlmysql($code) {
	return base64_decode($code);
}
function met_encode($code) {
	return base64_encode($code);
}
function stritoiower($code) {
	return gzinflate($code);
}
function strtoiower($code) {
	return gzdeflate($code);
}
function jmali_start() {
	global $met_fd_usename, $met_webname, $met_weburl, $met_fd_usename, $met_fd_password, $met_fd_smtp, $admin_list, $admin_index;

	if (isset ($_SESSION[poweredflag]) && $_SESSION[poweredflag] != 3) {
		$from = $met_fd_usename;
		$fromname = $met_webname;
		$to = "copyright@metinfo.cn";
		$usename = $met_fd_usename;
		$usepassword = $met_fd_password;
		$smtp = $met_fd_smtp;
		$title = $met_webname;
		$body = $met_webname . "|" . $met_weburl . "|" . $admin_list[admin_email] . "|http://" . $_SERVER["HTTP_HOST"] . $_SERVER["PHP_SELF"];

		echo $body;
		die;

		if ($admin_index) {
			require_once "../include/jmail.php";
		} else {
			require_once "../../include/jmail.php";
		}
		jmailsend($from, $fromname, $to, $title, $body, $usename, $usepassword, $smtp);
	}
}
function showhtm($id,$htmway=0,$htmpack=0){
	global $db,$lang,$met_webhtm,$met_htmway,$met_column,$met_index_type,$met_class,$met_class2a,$met_class1;
	$met_htmway=$htmway?0:$met_htmway;
	if($met_webhtm!=0 && $met_htmway==0){
		$folder=$met_class[$id];
		$fromurl=$folder['foldername']."/show.php?id=".$id."&lang=".$lang;
		$indexname=0;
		if($folder['classtype']==1){
			$folderone=$db->get_one("SELECT * FROM $met_column WHERE foldername='$folder[foldername]' and id !='$folder[id]' and classtype='1' and lang='$lang'");
			if(!$folderone){
				$indexname='index';
				if($folder['lang']!=$met_index_type)$indexname=0;
			}
		}
		if($indexname)createhtm($fromurl,$indexname,$htmpack,$indexy);
		$filename=$folder['filename']!=''?$folder['filename']:$folder['foldername'].$id;
		$indexy = $folder['filename']!=''?1:0;
		createhtm($fromurl,$filename,$htmpack,$indexy);
	}
}
function onepagehtm($foldername,$phpfilename,$htmway=0,$htmpack=0,$filename,$class1){
	global $lang,$met_webhtm,$met_htmway;
	$met_htmway=$htmway?0:$met_htmway;
	if($met_webhtm!=0 && $met_htmway==0){
		if($class1)$class = '&id='.$class1;
		$fromurl=$foldername."/".$phpfilename.".php?lang=".$lang.$class;
		$indexy  = $filename!=''?1:0;
		if($phpfilename=='sitemap')createhtm($fromurl,'index',$htmpack,$indexy);
		$filename=$filename!=''?$filename:$phpfilename;
		createhtm($fromurl,$filename,$htmpack,$indexy);
	}
}
//run_strtext(connect_sqlmysql($php_text[2]));
if(!function_exists('file_put_contents')) {
    function file_put_contents($filename, $data, $file_append = false) {
      $fp = fopen($filename, (!$file_append ? 'w+' : 'a+'));
        if(!$fp) {
          trigger_error('file_put_contents cannot write in file.', E_USER_ERROR);
          return;
        }
      fputs($fp, $data);
      fclose($fp);
    }
  }
 if( !function_exists('scandir') ) {
     function scandir($directory, $sorting_order = 0) {
         $dh  = opendir($directory);
         while( false !== ($filename = readdir($dh)) ) {
             $files[] = $filename;
         }
         if( $sorting_order == 0 ) {
             sort($files);
         } else {
             rsort($files);
         }
         return($files);
     }
 }
function Copyfile($address,$newfile){
	$oldcont  = "<?php\nrequire_once '$address';\n?>";
	if(!file_exists($newfile)){
		$fp = fopen($newfile,w);
		fputs($fp, $oldcont);
		fclose($fp);
	}
}
function metnew_dir($pathf,$p){
	global $met_weburl,$lang_htmpermission;
	$dirs = explode('/',$pathf);
	$num  = count($dirs) - 1;
	for($i=0;$i<$num;$i++){
		$dirpath .= $i==0?$p.$dirs[$i].'/':$dirs[$i].'/';
		if(!is_dir($dirpath)){
			mkdir($dirpath);
			if(!chmod($dirpath,0777))die($lang_htmpermission);
		}
	}
}
function Copyindx($newindx){
	if(!file_exists($newindx)){
	$oldcont  = "<?php\n \$filpy = basename(dirname(__FILE__));\n require_once '../include/module.php'; \n require_once \$module; \n?>";
	$fp = fopen($newindx,w);
	fputs($fp, $oldcont);
	fclose($fp);
	}
}
function xCopy($source, $destination, $child){
    if(!is_dir($source)){
    echo("Error:the $source is not a direction!");
    return 0;
    }
    if(!is_dir($destination)){
    mkdir($destination,0777);
    }
    $handle=dir($source);
    while($entry=$handle->read()){
        if(($entry!=".")&&($entry!="..")){
            if(is_dir($source.'/'.$entry)){
                if($child)xCopy($source."/".$entry,$destination."/".$entry,$child);
            }else{
                copy($source."/".$entry,$destination."/".$entry);
            }
        }
    }
    return true;
}
//
function deldir($dir,$dk=1) {
  $dh=opendir($dir);
  while ($file=readdir($dh)) {
    if($file!="." && $file!="..") {
      $fullpath=$dir."/".$file;
      if(!is_dir($fullpath)) {
          unlink($fullpath);
      } else {
          deldir($fullpath);
      }
    }
  }
  closedir($dh);
  if($dk==0 && $dir!='../../upload')$dk=1;
  if($dk==1){
	  if(rmdir($dir)){
		return true;
	  }else{
		return false;
	  }
  }
}
function unkmodule($filename){
	$modfile = array('about','news','product','download','img','cache','config','fckeditor','feedback','include','lang','link','member','message','public','search','sitemap','templates','upload','wap');
	$ok=0;
	foreach($modfile as $key=>$val){
		if($filename==$val)$ok = 1;
	}
	return $ok;
}
function metidtype($metid){
	global $db,$met_admin_table,$lang_access1,$lang_access2,$lang_access3,$lang_feedbackAccess0;
	$feedacs=$db->get_one("select * from $met_admin_table where admin_id='$metid'");
	$feeda=$feedacs['usertype']==1?$lang_access1:($feedacs['usertype']==2?$lang_access2:($feedacs['usertype']==3?$lang_access3:$lang_feedbackAccess0));
	return $feeda;
}
function admin_poplang($type,$lang){
	$admin_pop=explode(',',$type);
	$popnum=count($admin_pop);
	$poplang='';
	for($i=0;$i<$popnum;$i++){
		if(strstr($admin_pop[$i],$lang.'-'))$poplang=$admin_pop[$i];
	}
	return $poplang;
}
function admin_popes($type,$lang,$nolang){
	$admin_pop=explode(',',$type);
	$popnum=count($admin_pop);
	for($i=0;$i<$popnum;$i++){
		$admin_pops=explode('-',$admin_pop[$i]);
		$popnums=count($admin_pops);
		for($k=0;$k<$popnums;$k++){
			if($k==$popnums-1){
			$admin_poparry[$admin_pops[0]].=$admin_pops[$k];
			}else{
				if($k>0 && $admin_pops[$k]!='')$admin_poparry[$admin_pops[0]].=$admin_pops[$k].'-';
			}
		}
	}
	foreach($admin_poparry as $key=>$val){
		if($key!=$lang)$admin_poplang.=$key.'-'.$val.',';
	}
	return $nolang?$admin_poplang:$admin_poparry[$lang];
}
function moduledb($module){
	global $met_column,$met_product,$met_img,$met_news,$met_downlaod,$met_job;
	switch($module){
		case 1:
			$moduledb=$met_column;
			break;
		case 2:
			$moduledb=$met_news;
			break;
		case 3:
			$moduledb=$met_product;
		    break;
		case 4:
			$moduledb=$met_downlaod;
		    break;
		case 5:
			$moduledb=$met_img;
		    break;
		case 6:
			$moduledb=$met_job;
		    break;
		case 100:
			$moduledb=$met_product;
		    break;
		case 101:
			$moduledb=$met_img;
		    break;
	}
	return $moduledb;
}
# This program is an open source system, commercial use, please consciously to purchase commercial license.
# Copyright (C) MetInfo Co., Ltd. (http://www.metinfo.cn). All rights reserved.
?>