<?php

class CompanyCategoryController extends AdminController
{
	protected $cid;
	public function init()
	{
		$cid = Tools::getParam("cid");
		$this->cid = $cid;
	}
	/**
	 * 首页列表.
	 */
	public function actionIndex()
	{
		$model=new CompanyCategory('search');
		$model->unsetAttributes();  // 清理默认值
		if(isset($_GET['CompanyCategory']))
			$model->attributes=$_GET['CompanyCategory'];
		
		$this->render('index',array(
			'model'=>$model,
			'cid'=>$this->cid
		));
	}

	/**
	 * 创建
	 */
	public function actionCreate()
	{
		$model=new CompanyCategory;

		// AJAX 表单验证
		$this->performAjaxValidation($model);

		if(isset($_POST['CompanyCategory']))
		{
			$model->attributes=$_POST['CompanyCategory'];
			if($model->save())
				$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('index','cid'=>$this->cid));
		}
		if($this->cid){
			$model->cid = $this->cid;
			$company = Company::model()->findByPk($this->cid);
			if($company)
			{
				$model->companyName= $company->name;
			}
			
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
		$this->cid = $model->cid;
		//AJAX 表单验证
		$this->performAjaxValidation($model);

		if(isset($_POST['CompanyCategory']))
		{
			$model->attributes=$_POST['CompanyCategory'];
			if($model->save())
				$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('index','cid'=>$this->cid));
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
			$model=$this->loadModel($id);
			$this->cid = $model->cid;
			$model->delete();

			// 如果是 AJAX 操作返回
			if (Yii::app()->request->isAjaxRequest) {
				$this->success('删除成功！');
			} else {
				$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('index','cid'=>$this->cid));
			}
		}
		else
			throw new CHttpException(400,'非法访问！');
	}

	/**
	 * 获取企业商品分类
	 */
	public function actionGetCompanyCategory()
	{
		$cid = Tools::getParam("cid","",'post');
		$result = array();
		if($cid>0)
		{
			
			$data = CompanyCategory::model()->findAllByAttributes(array('cid'=>$cid));
			foreach($data as $i)
			{
				$arr = $i->attributes;
				$result[] = array('id'=>$arr['id'],'name'=>$arr['name']);
			}
		}
		echo json_encode($result);
	}

	

	/**
	 * 载入
	 * @param integer $id 主键
	 */
	public function loadModel($id)
	{
		$model=CompanyCategory::model()->findByPk($id);
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
		if(isset($_POST['ajax']) && $_POST['ajax']==='company-category-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
