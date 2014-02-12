<?php
/**
 * 永链数据
 */
class YlController extends Controller
{
	private $_result=array();
	protected $menus;
	public function init()
	{
		$menus = QtMenu::getQtMenuList(5);
		$this->menus = $menus[5];
	}
	/**
	 * 公司新闻
	 */
	public function actionNews()
	{

		$this->pageTitle = '公司新闻';
		$pageArray = array();
		$pageArray['newslist'] = YlNews::getNewsList();
		$pageArray['menus'] = $this->menus;
		$this->render('News',$pageArray);
	 }
	/**
	 * 活动分享
	 */

	 public function actionActivity()
	{
		$this->pageTitle = '活动分享';
		$pageArray = array();
		$pageArray['datalist'] = YlActivity::getDataList();
		$pageArray['menus'] = $this->menus;
		$this->render('Activity',$pageArray);
	 }

	/**
	 * 项目合作
	 */

	 public function actionCase()
	{

		$this->pageTitle = '项目合作';
		$pageArray = array();
		$pageArray['datalist'] = YlCase::getDataList();
		$pageArray['menus'] = $this->menus;
		$this->render('Case',$pageArray);
	 }
	/**
	 * 永链团队
	 */

	 public function actionTeam()
	{
		$uid = Tools::getParam('id');
		$this->pageTitle = '永链团队';
		$pageArray = array();
		$pageArray['datalist'] = YlTeam::getDataList($uid);
		$pageArray['menus'] = $this->menus;
		$pageArray['areas'] = YlArea::AreaArray();

		$this->render('Team',$pageArray);
	 }
	/**
	 * 永链产品
	 */

	public function actionProduct()
	{

		$pid = Tools::getParam('id');
		$this->pageTitle = '永链产品';
		$pageArray = array();
		$pageArray['datalist'] = YlProduct::getDataList($pid);

		$pageArray['product'] = YlProduct2::ProductArray();
		$pageArray['menus'] = $this->menus;
		$this->render('Product',$pageArray);
	 }
	 /**
	  * 永链招聘
	  */
	 public function actionRecruit()
	 {

	 	$this->pageTitle = '永链招聘';
	 	$pageArray = array();

	 	$pageArray['datalist'] = YlRecruit::getDataList();
	 	$pageArray['menus'] = $this->menus;
	 	$this->render('Recruit',$pageArray);


	 }
}
