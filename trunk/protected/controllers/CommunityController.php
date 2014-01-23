<?php
/**
 * 会员社区
 */
class CommunityController extends Controller
{
	/**
	 * Declares class-based actions.
	 */
	public function actions()
	{
		return array(
			// captcha action renders the CAPTCHA image displayed on the contact page
			'captcha'=>array(
				'class'=>'CCaptchaAction',
				'backColor'=>0xFFFFFF,
			),
			// page action renders "static" pages stored under 'protected/views/site/pages'
			// They can be accessed via: index.php?r=site/page&view=FileName
			'page'=>array(
				'class'=>'CViewAction',
			),
		);
	}

	/**
	 * This is the default 'index' action that is invoked
	 * when an action is not explicitly requested by users.
	 */
	public function actionUser()
	{
		$this->pageTitle = '会员试航';
		$pageArray =array();
		$pageArray['users'] = Users::model()->findAll();
		$pageArray['sector'] = Sector::model()->findAll(array('limit' => 20));
		$this->render('user',$pageArray);
	}
	public function actionSector()
	{
		$id = Tools::getParam('id');
		$pageArray = array();
		$sData = Sector::model()->findByPk($id);
		$pageArray['model'] = $sData?$sData:array();
		$pageArray['data'] = Sector::getListBySid($id);
		$pageArray['sector'] = Sector::model()->findAll(array('limit' => 20));
		$this->render('Sector',$pageArray);
	}
}
