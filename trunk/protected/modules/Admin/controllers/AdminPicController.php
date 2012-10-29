<?php

class AdminPicController extends AdminController
{

	/**
	 * 首页列表.
	 */
	public function actionIndex()
	{

		$model=new AdminPic('search');
		$model->unsetAttributes();  // 清理默认值
		if(isset($_GET['adminPic']))
			$model->attributes=$_GET['adminPic'];

		$picType = Alltype::getAllPicType();
		$this->render('index',array(
			'picType'=>$picType,
			'model'=>$model,

		));
	}

	/**
	 * 创建
	 */
	public function actionCreate()
	{
		$model=new AdminPic;

		// AJAX 表单验证
		$this->performAjaxValidation($model);

		if(isset($_POST['adminPic']))
		{

			$model->attributes=$_POST['adminPic'];
			
			
			$upload=CUploadedFile::getInstance($model,'imgurl');
			if(!empty($upload))
			{
				$model->imgurl=Upload::createFile($upload,'advPic','create');
			}
			
			if($model->save())
			{
				$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('index'));
				exit;
			}

		}
		
		$this->render('create',array(
			'model'=>$model,
			'categorys' => $categorys,
		));
	}

	/**
	 * 修改
	 * @param integer $id 主键
	 */
	public function actionUpdate($id)
	{
		$model=$this->loadModel($id);
		$model->setScenario('update');
		$old_imgurl = $model->imgurl;
		//AJAX 表单验证
		$this->performAjaxValidation($model);

		if(isset($_POST['adminPic']))
		{

			$model->attributes=$_POST['adminPic'];

			$upload=CUploadedFile::getInstance($model,'imgurl');
			if(!empty($upload))
			{
				$model->imgurl=Upload::createFile($upload,'advPic','update');
			}else{
				$model->imgurl = $old_imgurl;
			}
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
	 * 载入
	 * @param integer $id 主键
	 */
	public function loadModel($id)
	{
		$model=AdminPic::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'内容不存在！.');
		return $model;
	}

	/**
	 * Ajax验证
	 * @param CModel the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='admin-user-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}


}
