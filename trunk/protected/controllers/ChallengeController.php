<?php
/**
 * 擂台
 */
class ChallengeController extends Controller
{
	/**
	 * 报名
	 */
	public function actionCRApply()
	{
		$this->pageTitle ="赛事报名";
		$data = array();
		$data['match'] = Match::getCRApply();

		$this->render('CRApply',$data);
	}
	/**
	 * 赛事查询
	 */
	public function actionCRInquire()
	{
		$this->pageTitle ="赛事查询";
		$this->render('CRInquire');
	}
	/**
	 * 赛事详情
	 */
	public function actionView()
	{
		$this->pageTitle ="赛事详情";
		$this->render('CRInquire');
	}
}
