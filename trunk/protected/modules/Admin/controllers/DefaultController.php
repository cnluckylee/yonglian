<?php

class DefaultController extends Controller
{
	public $layout='/layouts/column2';
	public function actionIndex()
	{
		$data = Menu::model()->findAll('isshow=1 and pid=0');
		$data= CHtml::listData( $data, 'mid' , 'name','act');
		$this->render('index',array('dataProvider'=>$data));
		
	}
	
	public function actionLogout()
	{
	    Yii::app()->user->logout();
		  $this->redirect(array('/Admin'));
	}
	

}
