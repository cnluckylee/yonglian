<?php
if(!$IWEB_IM_IN) {
	die('Hacking attempt');
}
// 设置session
function set_session($k,$v) {
	global $session_prefix;
	$_SESSION[$session_prefix.$k] = $v;
}

// 获取session
function get_session($k) {
	global $session_prefix;
	if(isset($_SESSION[$session_prefix.$k])) return $_SESSION[$session_prefix.$k];
	return null;
}

function set_sess_uid($v) {
	set_session('uid',$v);
}
function get_sess_uid() {
	return get_session('uid');
}

function set_sess_uname($v) {
	set_session('uname',$v);
}
function get_sess_uname() {
	return get_session('uname');
}

function set_sess_ico($v) {
	set_session('ico',$v);
}
function get_sess_ico() {
	return get_session('ico');
}

function set_sess_intro($v) {
	set_session('intro',$v);
}
function get_sess_intro() {
	return get_session('intro');
}

function set_sess_status($v) {
	set_session('status',$v);
}
function get_sess_status() {
	return get_session('status');
}

function set_sess_uverifycode($v) {
	set_session('uverifycode',$v);
}
function get_sess_uverifycode() {
	return get_session('uverifycode');
}
?>