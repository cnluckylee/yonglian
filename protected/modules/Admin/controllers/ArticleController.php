<?php

class ArticleController extends AdminController
{
	
	/**
	 * 首页列表.
	 */
	public function actionIndex()
	{
		
		$model=new Article('search');
		$model->unsetAttributes();  // 清理默认值
		if(isset($_GET['Article']))
			$model->attributes=$_GET['Article'];
		$this->render('index',array(
			'model'=>$model,
		));
	}

	/**
	 * 创建
	 */
	public function actionCreate()
	{
		$model=new Article;

		// AJAX 表单验证
		$this->performAjaxValidation($model);

		if(isset($_POST['Article']))
		{
			$model->attributes=$_POST['Article'];
// 			$upload=CUploadedFile::getInstance($model,'imgurl');
// 			if(!empty($upload))
// 			{
// 				$model->imgurl=Upload::createFile($upload,'article','create');
// 			}
			if($model->save())
				$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('index'));
		}

		$this->render('create',array(
			'model'=>$model,
		));
	}

	/**
	 * 修改
	 * @param integer $id 主键
	 */
	public function actionUpdate($id)
	{
		$model=$this->loadModel($id);
// 		$old_imgurl = $model->imgurl;
		//AJAX 表单验证
		$this->performAjaxValidation($model);

		if(isset($_POST['Article']))
		{
			$model->attributes=$_POST['Article'];

// 			$upload=CUploadedFile::getInstance($model,'imgurl');
// 			if(!empty($upload))
// 			{
// 				$model->imgurl=Upload::createFile($upload,'article','update');
// 			}else{
// 				$model->imgurl = $old_imgurl;
// 			}
			if($model->save())
				$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('index'));
		}

		$this->render('update',array(
			'model'=>$model,
		));
	}

	/**
	 * 删除
	* @param integer $id 主键
	 */
	public function actionDelete($id)
	{
		if(Yii::app()->request->isPostRequest)
		{
			
			$this->loadModel($id)->delete();

			// 如果是 AJAX 操作返回
			if (Yii::app()->request->isAjaxRequest) {
				$this->success('删除成功！');
			} else {
				$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('index'));
			}
		}
		else
			throw new CHttpException(400,'非法访问！');
	}

	
	/**
	 * 查看
	 */
	public function actionView($id)
	{
		$model = $this->loadModel($id);
		$this->render('view',array(
				'model'=>$model,
		));
	}
	

	/**
	 * 载入
	 * @param integer $id 主键
	 */
	public function loadModel($id)
	{
		$model=Article::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'内容不存在！.');
		return $model;
	}

	/**
	 * 取value
	 */
	public function getValueByKey($data, $row, $c)
	{
		$NewsType = AllType::getAllType(1);
		return $NewsType[$data->cid]['name'];
	}
	
	/**
	 * 取value
	 */
	public function getValueByCompanyID($data, $row, $c)
	{
		
		$name = '';
		$result = Company::model()->findByPk($data->CompanyID);
		if($result)
			$name = $result->attributes['name'];
		return $name;
	}
	
	/**
	 * 取value
	 */
	public function getValueByIndustryID($data, $row, $c)
	{
		$name = '';
		$result = AdminIndustry::model()->find($data->IndustryID);
		if($result)
			$name = $result->attributes['name'];
		return $name;
	}
	
	/**
	 * Ajax验证
	 * @param CModel the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='article-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
