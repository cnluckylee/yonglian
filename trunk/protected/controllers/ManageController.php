<?php
/**
 * 擂台
 */
class ManageController extends Controller
{
	/**
	 * 专家新论
	 */
	public function actionTheory()
	{
		
		$this->pageTitle = '专家新论';
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
		$result = Mentor::enterprise($Company_city_id,$Company_Industry_id,$keyword,$cid);
		$result['cat'] = BaseData::MentorCategary();

		if(isset($_GET['_']) && $_GET['_']>0)
		{

			$this->layout = false;
			$this->render('TheoryAjax',$result);
		}else{
			$model=new Technology;
			$result['get'] = array('Company_city_id'=>$Company_city_id,
					'Company_Industry_id'=>$Company_Industry_id,
					'Company_city'=>$Company_city,
					'Company_Industry'=>$Company_Industry,
					'keyword'=>$keyword,
					'cid'=>$cid
					
			);
			$result['model'] = $model;

			$this->render('Theory',$result);
			
		}
	 }

}
