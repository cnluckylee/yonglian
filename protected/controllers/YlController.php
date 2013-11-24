<?php
/**
 * 永链数据
 */
class YlController extends Controller
{
	private $_result=array();
	public function init()
	{

	}
	/**
	 * 公司新闻
	 */
	public function actionNews()
	{

		$this->pageTitle = '公司新闻';
		$pageArray = array();
		$pageArray['newslist'] = YlNews::getNewsList();
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
		$this->render('Case',$pageArray);
	 }
	/**
	 * 永链团队
	 */

	 public function actionTeam()
	{

		$this->pageTitle = '永链团队';
		$pageArray = array();
		$pageArray['datalist'] = YlTeam::getDataList();
		$this->render('Team',$pageArray);
	 }
	/**
	 * 永链产品
	 */

	public function actionProduct()
	{

		$this->pageTitle = '永链团队';
		$pageArray = array();
		$pageArray['datalist'] = YlTeam::getDataList();
		$this->render('Team',$pageArray);
	 }
}
