<?php

/*
 * 文件传输上传类
 * 返回值： 
 * 1：文件不存在
 * 2：文件大小超过了服务器限制
 * 3：文件类型不符合
 * 4：文件路径创建失败
 * 5：文件上传失败
 * 6：服务器不支持文件上传 
 * array:文件上传成功
 */
class upload 
{
	var $savepath,$maxsize,$renamed,$errormsg,$ext;
	var $allowtype=array();
	var $upfile=array();	//上传后文件信息
	var $errorcode;
	function upload($savepath='../uploadfiles',$allowtype=array('jpg','gif','png'),$maxsize='1024',$renamed=true)
	{
		$this->savepath=$savepath;
	   	$this->allowtype=$allowtype;
	   	$this->maxsize=$maxsize;
	   	$this->renamed=$renamed;
	}
	function save($file)	{	
		//检查服务器是否允许上传文件
		if(!ini_get('file_uploads'))
    		return 6;	
   		//获取文件
   		if(!$this->getFile($file)) return 1;
   		//检查文件大小
   		if(!$this->checkSize()) {@unlink($this->upfile['tmp_name']);return 2;}
   		//检查文件类型
   		if(!$this->checkType()) {@unlink($this->upfile['tmp_name']);return 3;}
   		//设置上传后的文件名
   		if(!$this->setFileName()) {@unlink($this->upfile['tmp_name']);return 4;}
   		//上传文件
		if(move_uploaded_file($this->upfile['tmp_name'],$this->upfile['filename']))
        {
        	return $this->upfile;
			exit;
        }else{
        	@unlink($this->upfile['tmp_name']);
        	return 5;
        }
	}
	function getFile($field)
    {
        if(!$_FILES[$field])
        {
        	return false;
//        	$this->error('文件不存在！');
        }
        $this->upfile=$_FILES[$field];
        return true;
    }
    function checkSize()
    {    	
    	$post_max_file = strtoupper(ini_get('post_max_size'));
    	if(strstr($post_max_file,'M')){
	    	if(($this->maxsize>>10)>$post_max_file){
				return false;
			}
    	}elseif(strstr($post_max_file,'K')){
    		if($this->maxsize>$post_max_file){
				return false;
			}
    	}elseif(strstr($post_max_file,'G')){
    		if(($this->maxsize>>20)>$post_max_file){
				return false;
			}
    	}else{
    		if(($this->maxsize<<10)>$post_max_file){
				return false;
			}
    	}
	    if($this->upfile['size']>($this->maxsize<<10))
	    {
//	    	$this->error($this->upfile['name'].'文件大小超过了限制'.$this->maxsize.'KB');
			return false;
	    }
	    return true;
    }
    //检查文件类型
    function checkType()
    {
    	$this->getExt($this->upfile['name']);
        if(!in_array($this->ext,$this->allowtype))
        {
//        	$this->error('文件类型不符合。只允许上传'.implode(',',$this->allowtype).'类型文件');
			return false;
        }
        return true;
    }
    /**
      * 获取文件的后缀
    */
    function getExt($filename)
    {
        $ext = explode(".", $filename);
        $ext = $ext[count($ext) - 1];
        $this->ext=strtolower($ext);
        return $this->ext;
    }
    /**
      * 设置上传后的文件名
    */
    function setFileName()
    {
        //检查上传文件路径
        if(!file_exists($this->savepath)){
        	if(!$this->mkpath($this->savepath)){
        		return false;	
        	}
        }
        if($this->savepath[strlen($this->savepath)-1]!='/')$this->savepath.='/';
        if($this->renamed){
        	$ext=$this->ext;
            if(empty($ext))$ext=$this->getExt($this->upfile['name']); 
            $filename=md5(uniqid(time().rand())).'.'.$ext;
        }else{
            $filename=$this->upfile['name'];
        }
        $this->upfile['filename']=$this->savepath.$filename;
        $this->upfile['oldname'] =$this->upfile['name'];
        return true;
    }
    /**
      * 构造目录
    */
    function mkpath($savepath,$mode=0755)
    {
        $path=str_replace("\\","/",$savepath);
        $path_info=explode('/',$path);
        $total=count($path_info);
        $path='';
        for($i=0;$i<$total;$i++)
        {
            $path.=$path_info[$i].'/';
            if(empty($path_info[$i]))continue;
            if(file_exists($path))
            {
                continue;
            }else{
            	if(!@mkdir($path,$mode)){
//              		$this->error('创建'.$path.'出错！');
					return false;
             	}
              
            }
        }
        return true;
    }
	/**
      * 出错处理！
    */
    function error($msg)
    {
		$this->errormsg.= $msg;
		echo "<script language=\"javascript\">alert(\"".$this->errormsg."\");window.close();</script>";
		exit;		
    }
}
?>