<?php
/* Iweb产品配置文件 */
if(!$IWEB_IM_IN) {
	die("Hacking attempt");
}

//语言包参数，目前参数值zh(简体中文)、ft(繁体中文)
$langPackagePara="zh";

date_default_timezone_set("Asia/Chongqing");

// 站点配置
$webRoot=str_replace("\\","/",dirname(__FILE__))."/";

// 支持库配置
$baseLibsPath="iweb_mini_lib/";

// 聊天记录拆分的大小 单位字节
$txt_split_lenght = 1024;

// 多长时间不动判断不在线时间 单位秒
$offline_time = 600;

// session 前缀。请与您的主系统保持一致
$session_prefix = "isns_";

// 案例校验码前缀
$verify_prefix = "5rgqw2";

/* 共享数据配置 */
// 站点地址
$siteDomain = "http://localhost/";

// webim访问根目录
$imBaseUrl = "im/";
$baseUrl = $siteDomain.$imBaseUrl;

// 获取当前系统里存放用户id的session赋值给im的session_uid
$session_uid = $_SESSION[$session_prefix."user_id"];





// 获取用户数据Sql
$getUserInfoSql = "SELECT user_id uid,user_name u_name,user_ico u_ico FROM isns_users WHERE user_id=$session_uid";

//开启(1)/关闭(0)同步主系统好友关系
$getMainFriend = 0;
//获取好友关系数据Sql
$getPalsListSql = "SELECT pals_id uid,pals_name u_name,pals_ico u_ico FROM isns_pals_mine WHERE user_id=$session_uid";

//// 好友管理链接
//$friendManageUrl = $siteDomain."modules.php?appuser_ico";
//$friendManageTarget = "imall_modules"; // _self, _blank, _parent, _top

//允许传输文件类型
$allowtype = array (
  0 => 'jpg',
  1 => 'gif',
  2 => 'png',
  3 => 'zip',
  4 => 'rar',
);
//允许传输文件的最大值，单位：KB
$allowmaxsize = "1024";
//传输文件临时存放目录，相对与im 目录下
$userfiledir = "uploadfiles/";
//文件在服务器上保存的天数
$savedays = 7;
	?>