<?php

if(!defined('WELIVE')) die('File not found!');

include('welive.GlobalFunctions.php');

// #####################

function IsBannedIP($clientip){
	global $_CFG;

	$addresses = explode(';', preg_replace('/[[:space:]]+/', '', $_CFG['cBannedips']));

	if(count($addresses) > 0){
		foreach($addresses as $ip){
			if(strpos($ip, '*') === false){
				if($ip == $clientip)  return true;
			}elseif(preg_match('/'.$ip.'/i', $clientip)){
				return true;
			}
		}
	}

	return false;
}

// #####################

function get_userAgent($userAgent){
	if(!$userAgent) return "unknown";

	$knownAgents = array("opera", "msie", "chrome", "safari", "firefox", "netscape", "mozilla");

	$userAgent = strtolower($userAgent);
	foreach ($knownAgents as $agent) {
		if (strstr($userAgent, $agent)) {
			if (preg_match("/" . $agent . "[\\s\/]?(\\d+(\\.\\d+(\\.\\d+(\\.\\d+)?)?)?)/", $userAgent, $matches)) {
				$ver = $matches[1];
				if ($agent == 'safari') {
					if (preg_match("/version\/(\\d+(\\.\\d+(\\.\\d+)?)?)/", $userAgent, $matches)) {
						$ver = $matches[1];
					} else {
						$ver = "1 or 2 (build " . $ver . ")";
					}
					if (preg_match("/mobile\/(\\d+(\\.\\d+(\\.\\d+)?)?)/", $userAgent, $matches)) {
						$userAgent = "iPhone " . $matches[1] . " ($agent $ver)";
						break;
					}
				}

				$userAgent = ucfirst($agent) . " " . $ver;
				break;
			}
		}
	}

	return $userAgent;
}

// #####################

function WeLive($sender, $content, $ctype = 2, $biu = '000', $color = '0') {
	return $sender .'|||'.$content .'|||'.$ctype .'|||'.$biu .'|||'.$color;
}

// #####################

function WeLiveSend($realtime, $lines, $ajax_last, $error = 0) {
	$info = '';

	if($error){
		$info = $ajax_last . '||||||2';
	}else{
		if(is_array($lines)) {
			foreach($lines as $value) {
				$info .= $value . '^^^';
			}

			$info = $realtime . '||||||' . $info;
		}else{
			$info = $realtime . '||||||' . $lines;
		}
	}

	echo $info;
}

?>