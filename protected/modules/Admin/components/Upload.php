<?php
/**
 * $upload: CUploadedFile::getInstance;
 * $type:  artilce product
 * $act:  create update
 * $imgurl:  delete old imgurl when update
 */
class Upload{

	public static function createFile($upload,$type,$act,$imgurl='',$width='290',$heigh='170'){
		if(!empty($imgurl)&&$act==='update'){
			$deleteFile=Yii::app()->basePath.'/../'.$imgurl;
			if(is_file($deleteFile))
				unlink($deleteFile);
		}
		$uploadDir=Yii::app()->basePath.'/../uploads/'.$type.'/'.date('Y-m',time());
		self::recursionMkDir($uploadDir);
		$imgname=time().'-'.rand();
		//图片存储路径
		$imageurl='/uploads/'.$type.'/'.date('Y-m',time()).'/'.$imgname.'.'.$upload->extensionName;
		//存储绝对路径
		$uploadPath=$uploadDir.'/'.$imgname;
		$thumb = Yii::app()->thumb;
        $thumb->image = $upload->tempName;
        $thumb->width = $width;
        $thumb->height = $heigh;
        $thumb->directory = $uploadDir."/";
        $thumb->defaultName = $imgname;
        $thumb->createThumb();
        $thumb->save();
		return $imageurl;
	}
	private static function recursionMkDir($dir){
		if(!is_dir($dir)){
			if(!is_dir(dirname($dir))){
				self::recursionMkDir(dirname($dir));
				mkdir($dir,'0777');
			}else{
				mkdir($dir,'0777');
			}
		}
	}
	public static function delfile($link)
	{
		$deleteFile=Yii::app()->basePath.'/../'.$link;
			if(is_file($deleteFile))
				unlink($deleteFile);
	}
}