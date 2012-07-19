<?php
/* 公共包含文件 */
if(!$IWEB_IM_IN) {
	die('Hacking attempt');
}

//数据库配置及连接文件
require_once($webRoot.$baseLibsPath."conf/dbconf.php");
require_once($webRoot.$baseLibsPath."fdbtarget.php");
require_once($webRoot.$baseLibsPath."libs_inc.php");

//库支持文件
//表操作类
require_once($webRoot.$baseLibsPath."cdbex.class.php");
//过滤函数
require_once($webRoot."foundation/freq_filter.php");
//时间函数
require_once($webRoot."foundation/ctime.class.php");
//全局函数
require_once($webRoot."foundation/fglobal.php");
//sql 拼接函数
require_once("foundation/fsqlitem_set.php");
//session处理函数
require_once("foundation/fsession.php");

//语言包路径
if (!isset($_COOKIE['i_im_language'])) {
	setcookie("i_im_language",$langPackagePara,time()+3600*24,"/");
}
$im_language = $_COOKIE['i_im_language']?$_COOKIE['i_im_language']:$langPackagePara;
$langPackageBasePath="langpackage/".$im_language."/";
//语言文件
require_once($langPackageBasePath."language.php");
?>