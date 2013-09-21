<?php

class SiteController extends Controller
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
	public function actionIndex()
	{
		// renders the view file 'protected/views/site/index.php'
		// using the default layout 'protected/views/layouts/main.php'
		/**
		 * 底部信息
		 */
		$link_arr = link::model()->findAll(
							array(
							'select'=>'webname,weburl,weblogo,link_type'
							)
						);
		$data['link'] = array_map(create_function('$record','return $record->attributes;'),$link_arr);

		$ad_arr = adminPic::model()->findAll(
							array('select'=>'imgurl,remark')
						);

		$data['adv'] = array_map(create_function('$record','return $record->attributes;'),$ad_arr);

		/**
		 * 推荐企业信息
		 */
		$company = Company::model()->findAll();
		$company = array_map(create_function('$record','return $record->attributes;'),$company);
		$rec_company = $tmp_company = array();
		$i = $count = 0;
		foreach($company as $k=>$v)
		{
			if($v['rec'] == 1)
			{
				if($k%4>0)
				{
					$rec_company[$count][] = $v;
				}else{
					$count++;
					$rec_company[$count][] = $v;
				}
			}
			if($k%4>0)
			{
				$tmp_company[$i][] = $v;
			}else{
				$i++;
				$tmp_company[$i][] = $v;
			}
		}
		$data['rec_company'] =$rec_company;
		$data['company'] =$tmp_company;
		$smarty = Yii::app()->smarty;
		$smarty->_smarty->assign($data);
		$smarty->_smarty->display('index.tpl');
	}
}
