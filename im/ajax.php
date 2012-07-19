<?php
header("content-type:text/html;charset=utf-8");
$IWEB_IM_IN = true;

require("foundation/asession.php");
require("configuration.php");
require("includes.php");

// 通过当前SESSION获取 当前用户信息
$uid = get_sess_uid();
if(!$uid) { exit('-1'); }
$uverifycode = get_sess_uverifycode();

//ajax 请求操作！
$actArray = array(
	'language'			=> './langpackage/zh/language.php',
	'getfriendlist'		=> 'ajax/getfriendlist.php',
	'getfriendinfo'		=> 'ajax/getfriendinfo.php',
	'initwin'			=> 'ajax/initwin.php',
	'getmessagelist'	=> 'ajax/getmessagelist.php',
	'postnewmessage'	=> 'ajax/postnewmessage.php',
	'changestatus'		=> 'ajax/changestatus.php',
	'changemsgwav'		=> 'ajax/changemsgwav.php',
	'gethistorymessage'	=> 'ajax/gethistorymessage.php',
	'createnewgroup'	=> 'ajax/createnewgroup.php',
	'addusertogroup'	=> 'ajax/addusertogroup.php',
	'updatapals'		=> 'ajax/updatapals.php',
	'logoutgroup'		=> 'ajax/logoutgroup.php',
	'getgrouplist'		=> 'ajax/getgrouplist.php',
	'addtomyfriend'		=> 'ajax/addtomyfriend.php',
	'postfile'			=> 'ajax/dopostfile.php',
	'getpeerid'			=>	'ajax/getpeerid.php',
	'getvideostatus'	=>	'ajax/getvideostatus.php',
	'updatepeerid'		=>	'ajax/updatepeerid.php',
	'updatevideostatus'	=>	'ajax/updatevideostatus.php',
	'updateintro'		=> 'ajax/updateintro.php',
	'uploadheadimg'		=>	'ajax/uploadheadimg.php',
	'onlineTime'		=>	'ajax/getOnlineTime.php',
	'delFriends'		=>	'ajax/delfriends.php',
	'getCustomGroup'	=>	'ajax/getCustomGroup.php',
	'moveFriends'		=>	'ajax/movefriends.php',
	'newCustomGroup'	=>	'ajax/newCustomGroup.php',
	'updateCustomGroup'	=>	'ajax/updateCustomGroup.php',
	'delCustomGroup'	=>	'ajax/delCustomGroup.php',
	'setCondition'		=>	'ajax/setCondition.php',
	'getStranger'		=>	'ajax/getStranger.php',
	'updateContacted'	=>	'ajax/updateContacted.php',
	'searchGroup'		=>	'ajax/searchGroup.php',
	'serachUser'		=>	'ajax/searchUser.php',
	'delmsg'			=>	'ajax/delmsg.php',
);

$act = $_GET['act'];
$acttarget=$actArray[$act];

//action动作成功控制函数
function action_return($success=1,$return_mess="",$activeUrl=""){
	exit();
}

if(isset($acttarget)) {
	require($acttarget);
} else {
	exit('-1');
}
?>