<?php

class BaseData 
{
	/**
	 * 团队闪耀－栏目类别
	 */
	public static function CPTeamCategary($cid=null)
	{

		$carr = array(1=>'经营管理类',
				2=>'执行管理类',
				3=>'行政财务类',
				4=>'研究开发类',
				5=>'技术管理类'
		);
		return $cid?$carr[$cid]:$carr;
	}
	/**
	 * 携手发展
	 */
	public static function CPDevelopCategary($cid=null){
		$carr = array(1=>array('id'=>1,'name'=>'求购信息'),
				2=>array('id'=>2,'name'=>'外包信息'),
				3=>array('id'=>3,'name'=>'技术联盟'),
				4=>array('id'=>4,'name'=>'合作加盟'),
				5=>array('id'=>5,'name'=>'业务拓展')
		);
		return $cid?$carr[$cid]:$carr;
	}
	
	/**
	 * 舵主风采文章分类
	 */
	public static function MentorCategary($cid=null)
	{
		$carr = array(1=>array('id'=>1,'name'=>'文章分类1'),
				2=>array('id'=>2,'name'=>'文章分类2'),
				3=>array('id'=>3,'name'=>'文章分类3'),
				4=>array('id'=>4,'name'=>'文章分类4'),
				5=>array('id'=>5,'name'=>'文章分类5')
		);
		return $cid?$carr[$cid]:$carr;
	} 
}
