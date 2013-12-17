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
		$this->render('CRApply');
	}
	/**
	 * 赛事查询
	 */
	public function actionCRInquire()
	{
		$this->pageTitle ="赛事查询";
		$this->render('CRInquire');
	}
}
