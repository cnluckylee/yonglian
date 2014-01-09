<?php

class LoginController extends Controller
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
		$model=new LoginForm;
		$users = new Users;
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
		}else if(isset($_POST['Users']))
			{
				$users->attributes=$_POST['Users'];
					
				if(Users::checkonly($users)){
					if($users->type == 0)
						$users->addError("linkuser", "企业名称或联系人重复");
					else if ($users->type == 1) {
						$users->addError("linkuser", "隶属企业或会员名称重复");
					}
				}else if($users->validate() && $users->save()){
					$this->redirect(Yii::app()->user->returnUrl);
				}
			}
			if($users->type == 1)
			{
				$users2 = $users;
				$users = new Users();
			}else{
				$users2 = new Users();
			}
		$this->render('index',array('model'=>$model,'users'=>$users,'users2'=>$users2));
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
	 * Displays the login page
	 
	public function actionLogin()
	{
		$model=new LoginForm;
		$users = new Users;
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

		$this->render('index',array('model'=>$model,'users'=>$users));
		
	}
*/
	/**
	 * Logs out the current user and redirect to homepage.
	 */
	public function actionLogout()
	{
		Yii::app()->user->logout();
		$this->redirect(Yii::app()->homeUrl);
	}

}
