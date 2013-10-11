<?php

class AdminJointController extends AdminController
{
	
	/**
	 * 首页列表.
	 */
	public function actionIndex()
	{
		$model=new Joint('search');
		$model->unsetAttributes();  // 清理默认值
		if(isset($_GET['Joint']))
			$model->attributes=$_GET['Joint'];

		$this->render('index',array(
			'model'=>$model,
		));
	}

	/**
	 * 创建
	 */
	public function actionCreate()
	{
		$model=new Joint;

		// AJAX 表单验证
		$this->performAjaxValidation($model);

		if(isset($_POST['Joint']))
		{
			$model->attributes=$_POST['Joint'];
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

		//AJAX 表单验证
		$this->performAjaxValidation($model);

		if(isset($_POST['Joint']))
		{
			$model->attributes=$_POST['Joint'];
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
		$model=Joint::model()->findByPk($id);
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
		if(isset($_POST['ajax']) && $_POST['ajax']==='joint-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
	
	/**
	 * 取value
	 */
	public function getCompanyByKey($data, $row, $c)
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
	public function getValueByKey($data, $row, $c)
	{
		$media = AllType::model()->findAllByAttributes('type=4');
		print_r($media);exit;
		$name = '';
		$result = Post::model()->findByPk($data->cid);
		if($result)
			$name = $result->attributes['name'];
		return $name;
	}
}
