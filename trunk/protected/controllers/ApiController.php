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
		$data['cssurl'] = Yii::app()->request->baseUrl;
		$data['jsurl'] = Yii::app()->request->baseUrl;
		$data['cssjsv'] = date('Ymd');
		$model = Area::model()->findAll('parentid=0');
		$areas = array();
		foreach($model as $i)
		{
			$areas[] = $i->attributes;
		}
		$data['areas'] = $areas;
		$smarty->_smarty->assign($data);
		$smarty->_smarty->display('api/industry.tpl');
	}
}
