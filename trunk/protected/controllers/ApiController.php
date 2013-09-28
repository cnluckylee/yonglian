<?php

class ApiController extends Controller
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
	public function actionIndustry()
	{
		$data['company'] =array();
		$smarty = Yii::app()->smarty;
		$data['cssurl'] = Yii::app()->request->baseUrl.'/css/';
		$data['jsurl'] = Yii::app()->request->baseUrl.'/js/';
		$data['cssjsv'] = date('Ymd');
		$IndustryJson = AdminIndustry::IndustryJson();
		
		$data['IndustryJson'] = json_encode($IndustryJson);
		$smarty->_smarty->assign($data);
		$smarty->_smarty->display('api/industry.tpl');
	}
	
	public function actionArea()
	{
		$data['company'] =array();
		$smarty = Yii::app()->smarty;
		$data['cssurl'] = Yii::app()->request->baseUrl.'/css/';
		$data['jsurl'] = Yii::app()->request->baseUrl.'/js/';
		$data['cssjsv'] = date('Ymd');
		$IndustryJson = Area::AreaJson();
		
		$data['IndustryJson'] = json_encode($IndustryJson);
		$smarty->_smarty->assign($data);
		$smarty->_smarty->display('api/area.tpl');
	}
}
