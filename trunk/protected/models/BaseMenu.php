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
	 	$menu[3]= array('name'=>'管理案例','url'=>'?r=manage/Theory');
	 	$menu[4]= array('name'=>'永链观点','url'=>'?r=manage/Theory');
	 	return $menu;
	 }
}
?>