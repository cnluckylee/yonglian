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
		$carr = array(
				1=>array('id'=>1,'name'=>'文章分类1'),
				2=>array('id'=>2,'name'=>'文章分类2'),
				3=>array('id'=>3,'name'=>'文章分类3'),
				4=>array('id'=>4,'name'=>'文章分类4'),
				5=>array('id'=>5,'name'=>'文章分类5')
		);
		return $cid?$carr[$cid]:$carr;
	}

	/**
	 * 管理经典－专家新论-经营战略
	 */
	public static function NewTheory_JYZL($cid=null)
	{
		$carr = array(1=>array('id'=>1,'name'=>'战略方针'),
				2=>array('id'=>2,'name'=>'采购战略'),
				3=>array('id'=>3,'name'=>'营销战略'),
				4=>array('id'=>4,'name'=>'财务战略')
		);
		return $cid?$carr[$cid]:$carr;
	}

	/**
	 * 管理经典－专家新论-采购供应
	 */
	public static function NewTheory_CGGY($cid=null)
	{
		$carr = array(1=>array('id'=>1,'name'=>'采购计划'),
				2=>array('id'=>2,'name'=>'采购战术'),
				3=>array('id'=>3,'name'=>'采购谈判'),
				4=>array('id'=>4,'name'=>'供应关系')
		);
		return $cid?$carr[$cid]:$carr;
	}

		/**
	 * 管理经典－专家新论-内部运营
	 */
	public static function NewTheory_NBYY($cid=null)
	{
		$carr = array(1=>array('id'=>1,'name'=>'生产计划'),
				2=>array('id'=>2,'name'=>'作业流程'),
				3=>array('id'=>3,'name'=>'设施布置'),
				4=>array('id'=>4,'name'=>'库存管理')
		);
		return $cid?$carr[$cid]:$carr;
	}

		/**
	 * 管理经典－专家新论-分销配送
	 */
	public static function NewTheory_FXPS($cid=null)
	{
		$carr = array(1=>array('id'=>1,'name'=>'分销策划'),
				2=>array('id'=>2,'name'=>'配送体系')
		);
		return $cid?$carr[$cid]:$carr;
	}

		/**
	 * 管理经典－专家新论-企业组织
	 */
	public static function NewTheory_QYZZ($cid=null)
	{
		$carr = array(1=>array('id'=>1,'name'=>'组织架构'),
				2=>array('id'=>2,'name'=>'组织功能'),
				3=>array('id'=>3,'name'=>'组织中人')
		);
		return $cid?$carr[$cid]:$carr;
	}

		/**
	 * 管理经典－专家新论-人力资源
	 */
	public static function NewTheory_RLZY($cid=null)
	{
		$carr = array(1=>array('id'=>1,'name'=>'人力的规划'),
				2=>array('id'=>2,'name'=>'招聘与培训'),
				3=>array('id'=>3,'name'=>'薪酬与福利'),
				4=>array('id'=>4,'name'=>'考核与评价')
		);
		return $cid?$carr[$cid]:$carr;
	}

		/**
	 * 管理经典－专家新论-财务税收
	 */
	public static function NewTheory_CWSS($cid=null)
	{
		$carr = array(1=>array('id'=>1,'name'=>'筹资筹划'),
				2=>array('id'=>2,'name'=>'投资筹划'),
				3=>array('id'=>3,'name'=>'运营资金'),
				4=>array('id'=>4,'name'=>'利润分配'),
				5=>array('id'=>5,'name'=>'财务评价'),
				5=>array('id'=>5,'name'=>'税收筹划')
		);
		return $cid?$carr[$cid]:$carr;
	}

		/**
	 * 管理经典－专家新论-开发战略
	 */
	public static function NewTheory_KFZL($cid=null)
	{
		$carr = array(1=>array('id'=>1,'name'=>'文章分类1'),
				2=>array('id'=>2,'name'=>'文章分类2'),
				3=>array('id'=>3,'name'=>'文章分类3'),
				4=>array('id'=>4,'name'=>'文章分类4'),
				5=>array('id'=>5,'name'=>'文章分类5')
		);
		return $cid?$carr[$cid]:$carr;
	}


		/**
	 * 管理经典－专家新论-适用行业
	 */
	public static function NewTheory_SYHY($cid=null)
	{
		$carr = array(1=>array('id'=>1,'name'=>'农、林、牧、渔业'),
				2=>array('id'=>2,'name'=>'采矿业'),
				3=>array('id'=>3,'name'=>'制造业'),
				4=>array('id'=>4,'name'=>'电力、热力、燃气及水产和供应业'),
				5=>array('id'=>5,'name'=>'建筑业')

				,
				6=>array('id'=>6,'name'=>'批发和零售业'),
				7=>array('id'=>7,'name'=>'交通运输、仓储和邮政业'),
				8=>array('id'=>8,'name'=>'住宿和餐饮业'),
				9=>array('id'=>9,'name'=>'信息传达、软件和信息技术服务业')


				,
				10=>array('id'=>10,'name'=>'金融业'),
				11=>array('id'=>11,'name'=>'房地产业'),
				12=>array('id'=>12,'name'=>'租凭和商务服务业'),
				13=>array('id'=>13,'name'=>'科学研究和技术服务业')


				,
				14=>array('id'=>14,'name'=>'水利、环境和公共设施管理业'),
				15=>array('id'=>15,'name'=>'居民服务、修理和其他服务业'),
				16=>array('id'=>16,'name'=>'教育'),
				17=>array('id'=>17,'name'=>'卫生和社会工作')

				,
				18=>array('id'=>18,'name'=>'文化、体育和娱乐业'),
				19=>array('id'=>19,'name'=>'公共管理、社会保障和社会组织'),
				20=>array('id'=>20,'name'=>'国籍组织')
		);
		return $cid?$carr[$cid]:$carr;
	}
	/**
	 * 推荐栏目
	 */
	 public static function ReColumn($cid = null)
	 {
		$data = array(1=>array('id'=>1,'name'=>'专家新论'),
					  2=>array('id'=>2,'name'=>'管理技术')
				);
		return $cid?$data[$cid]:$data;
	 }

}
