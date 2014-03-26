<?php

class AdminMemberController extends AdminController
{
	
	/**
	 * 首页列表.
	 */
	public function actionIndex()
	{
		$model=new Member('search');
		$model->unsetAttributes();  // 清理默认值
		if(isset($_GET['Member']))
			$model->attributes=$_GET['Member'];

		$this->render('index',array(
			'model'=>$model,
		));
	}

	/**
	 * 创建
	 */
	public function actionCreate()
	{
		$model=new Member;

		// AJAX 表单验证
		$this->performAjaxValidation($model);

		if(isset($_POST['Member']))
		{
			$model->attributes=$_POST['Member'];
			
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

		if(isset($_POST['Member']))
		{
			$model->attributes=$_POST['Member'];
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
	 * 根据公司获取用户
	 * @param integer $id 主键
	 */
	public function actionGetuserbycompany()
	{
		$cid = intval($_POST['id']);
		$this->layout = false;
		$member = Users::findUsersByType(null,$cid);
		echo json_encode($member);
		exit;
	}
	

	/**
	 * 载入
	 * @param integer $id 主键
	 */
	public function loadModel($id)
	{
		$model=Member::model()->findByPk($id);
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
		if(isset($_POST['ajax']) && $_POST['ajax']==='member-form')
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
	public function getPostByKey($data, $row, $c)
	{
	
		$name = '';
		$result = Post::model()->findByPk($data->pid);
		if($result)
			$name = $result->attributes['name'];
		return $name;
	}
	/**
	 * 取value
	 */
	public function getCategoryByKey($data, $row, $c)
	{	
		$name='';
		if($data->cid)
			$name = BaseData::CPTeamCategary($data->cid);	
		return $name;
	}
	
}
