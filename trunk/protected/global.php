<?php
/**
 * 整个系统全局变量、函数
 */
function footer()
{
/**
 * 底部信息
 */
$footer_arr = link::model()->findAll();

foreach($footer_arr as  $k=>$v)
{
	$footer_link[$v->link_type] = $v;
}
print_r($footer_link);
}