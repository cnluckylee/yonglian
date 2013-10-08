<?php

class Tools 
{
	/**
	 * 获取参数
	 */
	public static function getParam($name,$default='',$method='get')
	{
		if($method == 'post')
			$var = filter_input(INPUT_POST, $name, FILTER_SANITIZE_SPECIAL_CHARS);
		else 
			$var = filter_input(INPUT_GET, $name, FILTER_SANITIZE_SPECIAL_CHARS);
		if(is_null($var))
			$var = $default;
		return $var;
	}
}
