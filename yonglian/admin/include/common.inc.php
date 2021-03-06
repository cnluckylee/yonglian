<?php
# MetInfo Enterprise Content Management System
# Copyright (C) MetInfo Co.,Ltd (http://www.metinfo.cn). All rights reserved.

header("Content-type: text/html;charset=utf-8");
error_reporting(E_ERROR | E_PARSE);
@set_time_limit(0);
//get admin folder name
define('ROOTPATH_ADMIN', substr(dirname(__FILE__), 0, -7));
DIRECTORY_SEPARATOR == '\\'?@ini_set('include_path', '.;' . ROOTPATH_ADMIN):@ini_set('include_path', '.:' . ROOTPATH_ADMIN);
$DS=DIRECTORY_SEPARATOR;
$url_array=explode($DS,ROOTPATH_ADMIN);
$count = count($url_array);
$last_count=$count-2;
$last_count=strlen($url_array[$last_count])+1;
define('ROOTPATH', substr(ROOTPATH_ADMIN, 0, -$last_count));

PHP_VERSION >= '5.1' && date_default_timezone_set('Asia/Shanghai');
session_cache_limiter('private, must-revalidate');
@ini_set('session.auto_start',0);
if(PHP_VERSION < '4.1.0') {
	$_GET         = &$HTTP_GET_VARS;
	$_POST        = &$HTTP_POST_VARS;
	$_COOKIE      = &$HTTP_COOKIE_VARS;
	$_SERVER      = &$HTTP_SERVER_VARS;
	$_ENV         = &$HTTP_ENV_VARS;
	$_FILES       = &$HTTP_POST_FILES;
}
session_start();
if($_GET[langset]!='')$_SESSION['languser'] = $_GET[langset];
$metinfo_admin_name     = $_SESSION['metinfo_admin_name'];
$metinfo_admin_pass     = $_SESSION['metinfo_admin_pass'];
$metinfo_admin_pop      = $_SESSION['metinfo_admin_pop'];
$languser               = $_SESSION['languser'];
$langadminok            = $_SESSION['metinfo_admin_lang'];
if($langadminok<>"" and $langadminok<>'metinfo')$adminlang=explode('-',$langadminok);
$db_settings = parse_ini_file(ROOTPATH.'config/config_db.php');
@extract($db_settings);
require_once ROOTPATH.'config/tablepre.php';
require_once ROOTPATH.'config/lang.inc.php';
$langusenow=$languser;
// MYSQL
require_once ROOTPATH_ADMIN.'include/mysql_class.php';
$db = new dbmysql();
$db->dbconn($con_db_host,$con_db_id,$con_db_pass,$con_db_name);
require_once dirname(__file__).'/global.func.php';
define('MAGIC_QUOTES_GPC', get_magic_quotes_gpc());
$lang=$_GET['lang']<>""?$_GET['lang']:$_POST['lang'];
$lang=($lang=="")?$met_index_type:$lang;
$settings = parse_ini_file(ROOTPATH."config/config_".$lang.".inc.php");
@extract($settings);
$settings = parse_ini_file(ROOTPATH."wap/config_".$lang.".inc.php");
@extract($settings);
function dump($vars, $label = '', $return = false)
{
    if (ini_get('html_errors')){
        $content = "<pre>\n";
        if ($label != '') {
            $content .= "<strong>{$label} :</strong>\n";
        }
        $content .= htmlspecialchars(print_r($vars, true));
        $content .= "\n</pre>\n";
    } else {
        $content = $label . " :\n" . print_r($vars, true);
    }
    if ($return) { return $content; }
    echo $content;
    return null;
}
require_once ROOTPATH_ADMIN.'include/lang.php';
isset($_REQUEST['GLOBALS']) && exit('Access Error');
foreach(array('_COOKIE', '_POST', '_GET') as $_request) {
	foreach($$_request as $_key => $_value) {
		$_key{0} != '_' && $$_key = daddslashes($_value);
	}
}
$metcms_v="4.0";
require_once ROOTPATH_ADMIN.'include/pubilc.php';
(!MAGIC_QUOTES_GPC) && $_FILES = daddslashes($_FILES);
$REQUEST_URI  = $_SERVER['PHP_SELF'].'?'.$_SERVER['QUERY_STRING'];
$t_array = explode(' ',microtime());
$P_S_T	 = $t_array[0] + $t_array[1];
ob_start();
$referer?$forward=$referer:$forward=$_SERVER['HTTP_REFERER'];
$char_key=array("\\",'&',' ',"'",'"','/','*',',','<','>',"\r","\t","\n",'#','%','?');
$m_now_time     = time();
$m_now_date     = date('Y-m-d H:i:s',$m_now_time);
$m_now_counter  = date('Y-m-d',$m_now_time);
$m_now_month    = date('Ym',$m_now_time);
$m_now_year     = date('Y',$m_now_time);
$m_user_agent   =  $_SERVER['HTTP_USER_AGENT'];
//run_strtext(connect_sqlmysql($php_text[1]));
global $foot,$poweredby,$p0weredby,$metcms_v,$m_now_year;
$foot="Powered by cnluckylee@gmail.com";
function ob_php_out() {
	global $output;
	global $foot;

//	if($output=="")
//		die("请不要尝试去掉'Powered by MetInfo'版权标识！");
	$output=preg_replace("//si", "",$output);
	if(!stristr($output,"MetInfo {$metcms_v}"))
	$output.=$foot;

	if($_SESSION[poweredflag]==2)
		$_SESSION[poweredflag]=3;

	echo $output;
}

function ob_pcontent() {
	$output=ob_get_contents();

	if($output=="")
		die("请不要尝试去掉'Powered by cnluckylee'版权标识！");
	$output=preg_replace("//si", "",$output);
	if(!stristr($output,"<title>cnluckylee")){
		ob_end_clean();
		die("请不要尝试去掉'Powered by cnluckylee'版权标识！");
	}

	$_SESSION[poweredflag]=$_SESSION[poweredflag]==3?3:2;
}
if(!isset($_SESSION[poweredflag])) $_SESSION[poweredflag]=1;
$poweredby=1;
$p0weredby=1;
if($_SERVER['HTTP_X_FORWARDED_FOR']){
	$m_user_ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
} elseif($_SERVER['HTTP_CLIENT_IP']){
	$m_user_ip = $_SERVER['HTTP_CLIENT_IP'];
} else{
	$m_user_ip = $_SERVER['REMOTE_ADDR'];
}
$m_user_ip  = preg_match('/^([0-9]{1,3}\.){3}[0-9]{1,3}$/',$m_user_ip) ? $m_user_ip : 'Unknown';
$PHP_SELF = $_SERVER['PHP_SELF'] ? $_SERVER['PHP_SELF'] : $_SERVER['SCRIPT_NAME'];
//admin skin
$met_skin="met";
if($metsking)$met_skin=$metsking;
if($lang==""){
foreach($met_langok as $key=>$val){
$lang=$val[mark];
break;
}
}
$metinfoadminfile=ROOTPATH.'templates/'.$met_skin_user.'/metinfo.inc.php';
if(file_exists($metinfoadminfile)){
require_once $metinfoadminfile;
}else{
require_once ROOTPATH.'config/metinfo.inc.php';
}
$metadmin[pagename]=1;
$met_htmtypeadmin=($lang==$met_index_type)?".".$met_htmtype:"_".$lang.".".$met_htmtype;
$met_seo=stripslashes($met_seo);
$met_foottext=stripslashes($met_foottext);
$met_footright=stripslashes($met_footright);
$met_footother=stripslashes($met_footother);
$met_foottel=stripslashes($met_foottel);
$met_footaddress=stripslashes($met_footaddress);
$met_footstat=stripslashes($met_footstat);
$met_memberemail=stripslashes($met_memberemail);
$met_membercontrol=stripslashes($met_membercontrol);
$met_onlinetel=stripslashes($met_onlinetel);
$wap_description=stripslashes($wap_description);
$wap_footertext=stripslashes($wap_footertext);
$met_onlinetel = stripslashes($met_onlinetel);
$met_jiathis = stripslashes($met_jiathis);
$met_tools_code = stripslashes($met_tools_code);
if(!function_exists('ob_phpintan')) {
	function ob_phpintan($content){return htmlspecialchars($content);}
}
 if(!function_exists('ob_pcontent')) {
	function ob_pcontent($content){return intval($content);}
}

# This program is an open source system, commercial use, please consciously to purchase commercial license.
# Copyright (C) MetInfo Co., Ltd. (http://www.metinfo.cn). All rights reserved.
?>

