<?php
class BaseMenu{
	/**
	 * 管理经典
	 */
	 public static function ManageMenu()
	 {
	 	$menu = array();
	 	$menu[1]= array('name'=>'专家新论','url'=>'?r=manage/Theory');
	 	$menu[2]= array('name'=>'管理技术','url'=>'?r=manage/Technology');
	 	$menu[3]= array('name'=>'管理案例','url'=>'?r=manage/Case');
	 	$menu[4]= array('name'=>'永链观点','url'=>'?r=manage/Viewpoint');
	 	return $menu;
	 }

	 /**
	 * 用户之窗
	 */
	 public static function WindowMenu()
	 {
	 	$menu = array();
	 	$menu[1]= array('name'=>'政策精选','url'=>'?r=manage/Theory');
	 	$menu[2]= array('name'=>'电子期刊','url'=>'?r=manage/Technology');
	 	$menu[3]= array('name'=>'常用工具','url'=>'?r=manage/Case');
	 	$menu[4]= array('name'=>'用户体验','url'=>'?r=manage/Viewpoint');
	 	return $menu;
	 }
	 /**
	  * 永链数据
	  */
	  public static function YLMenu()
	  {
		  
	  } 
}
?>
