<?php

class ScrollNewsController extends AdminController
{
	
	/**
	 * 首页列表.
	 */
	public function actionIndex()
	{
		$model=new ScrollNews('search');
		$model->unsetAttributes();  // 清理默认值
		if(isset($_GET['ScrollNews']))
			$model->attributes=$_GET['ScrollNews'];

		$this->render('index',array(
			'model'=>$model,
		));
	}

	/**
	 * 创建
	 */
	public function actionCreate()
	{
		$model=new ScrollNews;

		// AJAX 表单验证
		$this->performAjaxValidation($model);

		if(isset($_POST['ScrollNews']))
		{
			$model->attributes=$_POST['ScrollNews'];
			if($model->save())
				$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('index'));
		}
		$model->cid = 5;
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

		if(isset($_POST['ScrollNews']))
		{
			$model->attributes=$_POST['ScrollNews'];
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
	 * 取value
	 */
	public function getPositionByCid($data, $row, $c)
	{
		$NewsType = Alltype::getAllType(5);
		$name = '';
		if(isset($NewsType[$data->cid]))
			$name = $NewsType[$data->cid]['name'];
		return $name;
	}

	

	/**
	 * 载入
	 * @param integer $id 主键
	 */
	public function loadModel($id)
	{
		$model=ScrollNews::model()->findByPk($id);
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
		if(isset($_POST['ajax']) && $_POST['ajax']==='scroll-news-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
