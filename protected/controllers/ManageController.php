<?php
/**
 * 擂台
 */
class ManageController extends Controller
{
	private $_result=array();
	public function init()
	{
		$this->_result['menu'] = BaseMenu::ManageMenu();

	}
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

		$this->_result['data'] = Theory::getArticleList();
		$this->_result['recColumn'] = AdminColumn::getColumnByCid(1);
		
		if(isset($_GET['_']) && $_GET['_']>0)
		{

			$this->layout = false;
			$this->render('TheoryAjax',$this->_result);
		}else{
			$model=new Technology;
			$this->_result['get'] = array('Company_city_id'=>$Company_city_id,
					'Company_Industry_id'=>$Company_Industry_id,
					'Company_city'=>$Company_city,
					'Company_Industry'=>$Company_Industry,
					'keyword'=>$keyword,
					'cid'=>$cid

			);
			$this->_result['model'] = $model;

			$this->render('Theory',$this->_result);

		}
	 }

}
