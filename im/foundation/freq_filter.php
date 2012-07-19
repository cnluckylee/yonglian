<?php
//post,get对象过滤通用函数


function login_check($post)
{

   $MaxSlen=30;//限制登陆验证输入项最多20个字符

   if (!get_magic_quotes_gpc())    // 判断magic_quotes_gpc是否为打开
   {

      $post=addslashes($post);    // 进行magic_quotes_gpc没有打开的情况对提交数据的过滤

   }
   
   $post = LenLimit($post,$MaxSlen);

   $post=trim(str_replace(" ","",$post));

   $post=cleanHex($post);

   if (strpos($post,"=")||strpos($post,"'")||strpos($post,"\\")||strpos($post,"*")||strpos($post,"#")){
       return false;
   }else{
       return true;
   }

}


function long_check($post)
{
   
   $MaxSlen=3000;//限制较长输入项最多3000个字符

   if (!get_magic_quotes_gpc())    // 判断magic_quotes_gpc是否为打开
   {

      $post = addslashes($post);    // 进行magic_quotes_gpc没有打开的情况对提交数据的过滤

   }
   
   $post = LenLimit($post,$MaxSlen);
   
   $post = str_replace("\'", "’", $post);
   
   $post= htmlspecialchars($post);    // 将html标记转换为可以显示在网页上的html   
   
   $post = nl2br($post);    // 回车

   return $post;

}



function big_check($post){

   $MaxSlen=30000;//限制大输入项最多30000个字符

   if (!get_magic_quotes_gpc())    // 判断magic_quotes_gpc是否为打开
   {
      $post = addslashes($post);    // 进行magic_quotes_gpc没有打开的情况对提交数据的过滤
   }
   
   $post = LenLimit($post,$MaxSlen);
   
   $post = str_replace("\'", "’", $post);
   
   $post = str_replace("<script ", "", $post);
   
   $post = str_replace("</script ", "", $post);

   return $post;
}


function short_check($str) {  
   	$MaxSlen=300;//限制短输入项最多300个字符
   	if (!get_magic_quotes_gpc())    // 判断magic_quotes_gpc是否打开
   	{
      $str = addslashes($str);    // 进行过滤
   	}
	$str = LenLimit($str,$MaxSlen);
//     $str = str_replace("\'", "", $str); 
//     $str = str_replace("\\", "", $str); 
//     $str = str_replace("#", "", $str); 
//     $str = str_replace("=", "", $str);
//     $str = str_replace(" ", "", $str);
    $str= htmlspecialchars($str);
   	return trim($str); 
}

//过滤16进制
function cleanHex($input){
     $clean = preg_replace("![\][xX]([A-Fa-f0-9]{1,3})!", "",$input);
     return $clean; 
}


//限制输入字符长度，防止缓冲区溢出攻击
function LenLimit($Str,$MaxSlen){
    if(isset($Str{$MaxSlen})){
        return " ";
    }else{
        return $Str;
    }
}

//过滤敏感词语
function filt_word($Content){
	global $is_filt;
	
	if($is_filt==1&&empty($_SESSION['admin_name'])){
		global $filtrate_str;
		$f_array=explode(",",$filtrate_str);
		$repl="*";
		foreach($f_array as $v){
			$Content=str_replace($v,str_pad($repl,mb_strlen($v,"utf-8"),$repl),$Content);
		}
		return $Content;
	}else{
		return $Content;
	}
}
//汉字截取
function cut_str($string, $sublen, $start = 0, $code = 'UTF-8'){
	if($code == 'UTF-8'){
		$pa = "/[\x01-\x7f]|[\xc2-\xdf][\x80-\xbf]|\xe0[\xa0-\xbf][\x80-\xbf]|[\xe1-\xef][\x80-\xbf][\x80-\xbf]|\xf0[\x90-\xbf][\x80-\xbf][\x80-\xbf]|[\xf1-\xf7][\x80-\xbf][\x80-\xbf][\x80-\xbf]/";
		preg_match_all($pa, $string, $t_string);    
		if(count($t_string[0]) - $start > $sublen) return join('', array_slice($t_string[0], $start, $sublen))."...";
		return join('', array_slice($t_string[0], $start, $sublen));
	}else{
		$start = $start*2;
		$sublen = $sublen*2;
		$strlen = strlen($string);
		$tmpstr = '';
		for($i=0; $i<$strlen; $i++) {
			if($i>=$start && $i<($start+$sublen)){
				if(ord(substr($string, $i, 1))>129) $tmpstr.= substr($string, $i, 2);
				else $tmpstr.= substr($string, $i, 1);
			}
			if(ord(substr($string, $i, 1))>129) $i++;
		}
		if(strlen($tmpstr)<$strlen ) $tmpstr.= "...";
		return $tmpstr;
	}
}
?>