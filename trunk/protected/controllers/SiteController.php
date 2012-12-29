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


//		foreach($footer_arr as  $k=>$v)
//		{
//			$footer_link[$v->link_type] = $v;
//		}
//		$this->render('index',array('footer_link'=>$footer_link));
	}


	/**
	 * 企业全貌
	 */
	public function actionCompanyshow()
	{


		$company = array_map(create_function('$company','return $company->attributes;'),
								company::model()->findAll(array('select'=>'name, id,product , desct')));
		$adv = array_map(create_function('$adv','return $adv->attributes;'),
								adminPic::model()->findAll(array('select'=>'imgurl,imglink,id',
																'condition'=>'type=:type',
																'params'=>array(':type'=>'14'))));
		$smarty = Yii::app()->smarty;
		$data = array();
		$data['company'] = $company;
		$data['adv'] = $adv;
		$smarty->_smarty->assign($data);
		$smarty->_smarty->display('site/company_show.html');
	}


	/**
	 * This is the action to handle external exceptions.
	 */
	public function actionError()
	{
	    if($error=Yii::app()->errorHandler->error)
	    {
	    	if(Yii::app()->request->isAjaxRequest)
	    		echo $error['message'];
	    	else
	        	$this->render('error', $error);
	    }
	}

	/**
	 * Displays the contact page
	 */
	public function actionContact()
	{
		$model=new ContactForm;
		if(isset($_POST['ContactForm']))
		{
			$model->attributes=$_POST['ContactForm'];
			if($model->validate())
			{
				$headers="From: {$model->email}\r\nReply-To: {$model->email}";
				mail(Yii::app()->params['adminEmail'],$model->subject,$model->body,$headers);
				Yii::app()->user->setFlash('contact','Thank you for contacting us. We will respond to you as soon as possible.');
				$this->refresh();
			}
		}
		$this->render('contact',array('model'=>$model));
	}

	/**
	 * Displays the login page
	 */
	public function actionLogin()
	{
		$model=new LoginForm;

		// if it is ajax validation request
		if(isset($_POST['ajax']) && $_POST['ajax']==='login-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}

		// collect user input data
		if(isset($_POST['LoginForm']))
		{
			$model->attributes=$_POST['LoginForm'];
			// validate user input and redirect to the previous page if valid
			if($model->validate() && $model->login())
				$this->redirect(Yii::app()->user->returnUrl);
		}
		// display the login form
		$this->render('login',array('model'=>$model));
	}

	/**
	 * Logs out the current user and redirect to homepage.
	 */
	public function actionLogout()
	{
		Yii::app()->user->logout();
		$this->redirect(Yii::app()->homeUrl);
	}



}
