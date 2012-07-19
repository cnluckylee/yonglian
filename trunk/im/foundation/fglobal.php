<?php
if(!$IWEB_IM_IN) {
	die('Hacking attempt');
}

// 清除数组里下标为数字的值
function clear_array_numkey($array) {
	if(!is_array($array)) {return false;}
	$newarray = array();
	foreach($array as $key=>$value) {
		if(!is_numeric($key)) {
			$newarray[$key] = $value;
		}
	}
	return $newarray;
}

// 清除数组里值为空的值
function array_nullclear($array) {
	$newarray = array();
	foreach($array as $k=>$v){
		if($v) {
			$newarray[$k] = $v;
		}
	}
	return $newarray;
}

// 随机生成code
function mk_code($num=6) {
	$strSeed = "123456789abcdefghijklmnprstuvwxyz";
    $bgnIdx = 0;
    $endIdx = strlen($strSeed)-1;

    $code = "";
	for($i=0; $i<$num; $i++) {
		$curPos = rand($bgnIdx, $endIdx);
		$code .= substr($strSeed, $curPos, 1);
	}

	return $code;
}

// 加密
function mk_md5($s_code,$u_code) {
	global $verify_prefix;
	return md5($s_code.$u_code.$verify_prefix);
}

// Json 处理
function chat_json_encode($array) {
	return json_encode($array);
}

function chat_json_decode($value) {
	return json_decode($value);
}

// 获取api用户信息
function get_api_user_info(&$dbo) {
	global $siteDomain,$getUserInfoSql,$session_uid;
	$row = $dbo->getRow($getUserInfoSql);
	if($row['u_ico'] && !strstr($row['u_ico'],'http://')) {
		$row['u_ico'] = $siteDomain.$row['u_ico'];
	}

	$array = clear_array_numkey($row);

	return $array;
}

// 获取api好友关系信息
function get_api_pals_list(&$dbo) {
	global $siteDomain,$getPalsListSql,$session_uid;
	if($getPalsListSql) {
		$rowset = $dbo->getRs($getPalsListSql);

		$array = array();
		$i = 0;
		foreach($rowset as $key=>$value) {
			if(!strstr($value['u_ico'],'http://')) {
				$value['u_ico'] = $siteDomain.$value['u_ico'];
			}
			$array[$i]['uid'] = $value['uid'];
			$array[$i]['u_name'] = $value['u_name'];
			$array[$i]['u_intro'] = $value['u_intro'];
			$array[$i]['u_ico'] = $value['u_ico'];
			$i++;
		}
		return $array;
	} else {
		return '';
	}
}

//输出404页面
function echo404(){
	$nopage = '<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">';
	$nopage .= '<html><head><title>页面不存在</title></head><body style="background:#F0F0F0;">';
	$nopage .= '<div style="width:250px;height:80px; border:1px solid #BBBBBB; margin:100px auto; text-align:center;padding:55px 0 0 0; background:#FFFFFF;">出错了，您访问的页面不存在...</div>';
	$nopage .= '</body></html>';
	echo $nopage;
	exit;
}
?>