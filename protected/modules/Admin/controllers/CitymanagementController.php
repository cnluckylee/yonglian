<?php

class CitymanagementController extends AdminController
{
	
	/**
	 * 首页列表.
	 */
	public function actionIndex()
	{
		$model=new Citymanagement('search');
		$model->unsetAttributes();  // 清理默认值
		if(isset($_GET['Citymanagement']))
			$model->attributes=$_GET['Citymanagement'];
		$data = Citymanagement::getList();
		$this->render('index',array(
			'model'=>$model,
			'data'=>$data,
		));
	}

	/**
	 * 创建
	 */
	public function actionCreate()
	{
		$model=new Citymanagement;

		// AJAX 表单验证
		$this->performAjaxValidation($model);

		if(isset($_POST['Citymanagement']))
		{
			$model->attributes=$_POST['Citymanagement'];
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

		if(isset($_POST['Citymanagement']))
		{
			$model->attributes=$_POST['Citymanagement'];
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
	 * 排序
	 */
	public function actionListorder() {
		$orders = Yii::app()->getRequest()->getPost('listorders');
		foreach ($orders as $k => $v) {
			Citymanagement::model()->updateByPk($k, array('sort' => $v));
		}
		$this->success('更新排序成功！');
	}
	

	/**
	 * 载入
	 * @param integer $id 主键
	 */
	public function loadModel($id)
	{
		$model=Citymanagement::model()->findByPk($id);
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
		if(isset($_POST['ajax']) && $_POST['ajax']==='citymanagement-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
