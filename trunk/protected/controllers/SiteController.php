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
		
		/**
		 * 底部信息
		 */
		$link_arr = Link::model()->findAll(
							array(
							'select'=>'webname,weburl,weblogo,link_type'
							)
						);
		$data['link'] = array_map(create_function('$record','return $record->attributes;'),$link_arr);

		$ad_arr = AdminPic::model()->findAll(
							array('select'=>'imgurl,remark')
						);

		$data['adv'] = array_map(create_function('$record','return $record->attributes;'),$ad_arr);
		/**
		 * 企业秀台
		 */
		$data['CPBooth'] = Article::getListForIndex();
		/**
		 * 动态
		 */
		$data['CompanyNews'] = CompanyNews::getListForIndex();
		/**
		 * 携手发展
		 */
		$data['Joint'] = Joint::getListForIndex();
		
		/**
		 * 托主
		 */
		$data['Mentor'] = Mentor::getListForIndex();
		/**
		 * 团队闪耀
		 */
		$data['CPTeam'] = Member::getListForIndex();
		/**
		 * 推荐企业信息
		 */
		$company = Company::model()->findAll();
		$company = array_map(create_function('$record','return $record->attributes;'),$company);
		$rec_company = $tmp_company = array();
		$i = $count = 0;
		$data['menus'] = QtMenu::getQtMenuList();

		$data['rec_company'] =$rec_company;
		$data['company'] =$tmp_company;
		$MarketInfo = IndexMarketInfo::getList();
		$ManageInfo = IndexManageInfo::getList();
		$LawInfo = IndexLawInfo::getList();
		$TechnologyInfo = IndexTechnologyInfo::getList();
		$RankInfo = IndexRankInfo::getList();
		$data['IndexInfo'] = array(1=>$MarketInfo,2=>$ManageInfo,3=>$LawInfo,4=>$TechnologyInfo,5=>$RankInfo);
		$this->render('newindex',$data);


//		foreach($footer_arr as  $k=>$v)
//		{
//			$footer_link[$v->link_type] = $v;
//		}
//		$this->render('index',array('footer_link'=>$footer_link));
	}





	public function actionGetcity()
	{
		$city_id = Yii::app()->request->getPost('city',1);

	 	if($city_id == 1)
	 	{
	 		$data=City::model()->findAll('parent_id='.$city_id,array('city_id'=>'desc'));
	 		$data=CHtml::listData($data,'city_id','city_name');
	 		foreach($data as $value=>$name)
		   {
		        echo CHtml::tag('option',array('value'=>$value),CHtml::encode($name),true);
		   }
	 	}else{
			$data=City::model()->findAll('parent_id='.$city_id.' and city_type=2');
			$data=CHtml::listData($data,'city_id','city_name');
		   foreach($data as $value=>$name)
		   {
		        echo CHtml::tag('option',array('value'=>$value),CHtml::encode($name),true);
		   }
	 	}
		return $data;
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
