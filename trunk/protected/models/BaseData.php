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
		$carr = array(1=>'求购信息',
				2=>'外包信息',
				3=>'技术联盟',
				4=>'合作加盟',
				5=>'业务拓展'
		);
		return $cid?$carr[$cid]:$carr;
	}
}
