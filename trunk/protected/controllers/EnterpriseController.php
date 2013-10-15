<?php

class EnterpriseController extends Controller
{
	/**
	 * 企业秀台
	 */
	public function actionCPBooth($page=1)
	{
		
		//echo $_GET['Company_Industry_id'];exit;
		$Company_city_id = Tools::getParam('Company_city_id');
		$Company_Industry_id = Tools::getParam('Company_Industry_id');
		$Company_city = Tools::getParam('Company_city');
		$Company_Industry = Tools::getParam('Company_Industry');
		$keyword = Tools::getParam('keyword');
		$result = Article::enterprise($Company_city_id,$Company_Industry_id,$keyword);
		if(isset($_GET['_']))
		{
			$this->layout = false;
			$this->render('CPBoothAjax',$result);
		}else{
			$result['get'] = array('Company_city_id'=>$Company_city_id,
								   'Company_Industry_id'=>$Company_Industry_id,
								   'Company_city'=>$Company_city,
								   'Company_Industry'=>$Company_Industry,
									'keyword'=>$keyword
					);
			$this->pageTitle = '企业秀台';
			$this->render('CPBooth',$result);
		}
	}
	/**
	 * 团队闪耀
	 */
	public function actionCPTeam()
	{
		$this->pageTitle = '团队闪耀';
		
		
				//echo $_GET['Company_Industry_id'];exit;
		$Company_city_id = Tools::getParam('Company_city_id');
		$Company_Industry_id = Tools::getParam('Company_Industry_id');
		$Company_city = Tools::getParam('Company_city');
		if(!$Company_city)
			$Company_city_id = '';
		
		$Company_Industry = Tools::getParam('Company_Industry');
		if(!$Company_Industry)
			$Company_Industry_id = '';
		$keyword = Tools::getParam('keyword');
		$cid = Tools::getParam('cid');
		$result = Member::enterprise($Company_city_id,$Company_Industry_id,$keyword,$cid);
		$result['cat'] = BaseData::CPTeamCategary();

		if(isset($_GET['_']) && $_GET['_']>0)
		{

			$this->layout = false;
			$this->render('CPTeamAjax',$result);
		}else{

			$result['get'] = array('Company_city_id'=>$Company_city_id,
									   'Company_Industry_id'=>$Company_Industry_id,
									   'Company_city'=>$Company_city,
									   'Company_Industry'=>$Company_Industry,
										'keyword'=>$keyword,
										'cid'=>$cid
						);
			$this->render('CPTeam',$result);
		}	
	}
	/**
	 * 携手发展
	 */
	public function actionCPJoint()
	{
		$this->pageTitle = '携手发展';
	
	
		//echo $_GET['Company_Industry_id'];exit;
		$Company_city_id = Tools::getParam('Company_city_id');
		$Company_Industry_id = Tools::getParam('Company_Industry_id');
		$Company_city = Tools::getParam('Company_city');
		if(!$Company_city)
			$Company_city_id = '';
	
		$Company_Industry = Tools::getParam('Company_Industry');
		if(!$Company_Industry)
			$Company_Industry_id = '';
		$keyword = Tools::getParam('keyword');
		$cid = Tools::getParam('cid');
		$result = Joint::enterprise($Company_city_id,$Company_Industry_id,$keyword,$cid);
		$result['cat'] = BaseData::CPDevelopCategary();
	
		if(isset($_GET['_']) && $_GET['_']>0)
		{
	
			$this->layout = false;
			$this->render('CPJointAjax',$result);
		}else{
	
			$result['get'] = array('Company_city_id'=>$Company_city_id,
					'Company_Industry_id'=>$Company_Industry_id,
					'Company_city'=>$Company_city,
					'Company_Industry'=>$Company_Industry,
					'keyword'=>$keyword,
					'cid'=>$cid
			);
			$this->render('CPJoint',$result);
		}
	}
	
		/**
	 * 携手发展
	 */
	public function actionCompanyNews()
	{
		$this->pageTitle = '企业动态';
		$Company_city_id = Tools::getParam('Company_city_id');
		$Company_Industry_id = Tools::getParam('Company_Industry_id');
		$Company_city = Tools::getParam('Company_city');
		if(!$Company_city)
			$Company_city_id = '';
	
		$Company_Industry = Tools::getParam('Company_Industry');
		if(!$Company_Industry)
			$Company_Industry_id = '';
		$keyword = Tools::getParam('keyword');
		$cid = Tools::getParam('cid');
		$result = Joint::enterprise($Company_city_id,$Company_Industry_id,$keyword,$cid);
		$result['cat'] = BaseData::CPDevelopCategary();
	
		if(isset($_GET['_']) && $_GET['_']>0)
		{
	
			$this->layout = false;
			$this->render('CPJointAjax',$result);
		}else{
	
			$result['get'] = array('Company_city_id'=>$Company_city_id,
					'Company_Industry_id'=>$Company_Industry_id,
					'Company_city'=>$Company_city,
					'Company_Industry'=>$Company_Industry,
					'keyword'=>$keyword,
					'cid'=>$cid
			);
			$this->render('CPJoint',$result);
		}
	}

}
