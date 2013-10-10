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
		$result = array();
				//echo $_GET['Company_Industry_id'];exit;
		$Company_city_id = Tools::getParam('Company_city_id');
		$Company_Industry_id = Tools::getParam('Company_Industry_id');
		$Company_city = Tools::getParam('Company_city');
		$Company_Industry = Tools::getParam('Company_Industry');
		$keyword = Tools::getParam('keyword');
		$result['get'] = array('Company_city_id'=>$Company_city_id,
								   'Company_Industry_id'=>$Company_Industry_id,
								   'Company_city'=>$Company_city,
								   'Company_Industry'=>$Company_Industry,
									'keyword'=>$keyword
					);
		$result['posts'] = $result['pages']  = array();			
		$this->render('CPTeam',$result);
	}

}
