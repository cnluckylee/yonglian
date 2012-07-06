<?php

class DownloadController extends Controller
{
	public $layout='/layouts/column2';
	// Uncomment the following methods and override them if needed
	/*
	public function filters()
	{
		// return the filter configuration for this controller, e.g.:
		return array(
			'inlineFilterName',
			array(
				'class'=>'path.to.FilterClass',
				'propertyName'=>'propertyValue',
			),
		);
	}

	public function actions()
	{
		// return external action classes, e.g.:
		return array(
			'action1'=>'path.to.ActionClass',
			'action2'=>array(
				'class'=>'path.to.AnotherActionClass',
				'propertyName'=>'propertyValue',
			),
		);
	}
	*/
	/*
	 * 下载首页
	 */ 
	public function actionIndex()
	{
		/*
		 * 查询处理的内容缓存1小时
		 
		 $cache = Yii::app()->cache;
		 $DownResults = $cache->get('Download');
		 if ($DownResults === false){
			  $DownResults = Download::model()->findAll("downloadaccess=1");
			  $cache->set('Download', $DownResults, 60*60);
		  }
		*/ 
		$criteria=new CDbCriteria(array(
			'condition'=>'downloadaccess=1',
			'order'=>'updatetime DESC',
		));
		if(isset($_GET['tag']))
			$criteria->addSearchCondition('tags',$_GET['tag']);

		$dataProvider=new CActiveDataProvider('Download', array(
			'pagination'=>array(
				'pageSize'=>Yii::app()->params['postsPerPage'],
			),
			'criteria'=>$criteria,
		));

		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
		

	}
}
