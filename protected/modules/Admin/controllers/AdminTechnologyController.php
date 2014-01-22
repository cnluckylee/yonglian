<?php

class AdminTechnologyController extends AdminController
{

	/**
	 * 首页列表.
	 */
	public function actionIndex()
	{
		$model=new Technology('search');
		$model->unsetAttributes();  // 清理默认值
		if(isset($_GET['Technology']))
			$model->attributes=$_GET['Technology'];

		$this->render('index',array(
			'model'=>$model,
		));
	}

	/**
	 * 创建
	 */
	public function actionCreate()
	{
		$model=new Technology;

		// AJAX 表单验证
		$this->performAjaxValidation($model);

		if(isset($_POST['Technology']) && !isset($_POST['ajax']))
		{
			$model->attributes=$_POST['Technology'];
			$upload=CUploadedFile::getInstance($model,'imgurl');

			if(!empty($upload))
			{
				$im = null;

				$imagetype = strtolower($upload->extensionName);
				if($imagetype == 'gif')
				    $im = imagecreatefromgif($upload->tempName);
				else if ($imagetype == 'jpg')
				    $im = imagecreatefromjpeg($upload->tempName);
				else if ($imagetype == 'png')
				    $im = imagecreatefrompng($upload->tempName);
				//CThumb::resizeImage($im,100, 100,"d:/1.jpg",$upload->tempName);

				$model->imgurl=Upload::createFile($upload,'mediapic','create');
			}
			
			$pdf=CUploadedFile::getInstance($model,'pdf');
			
			if(!empty($pdf))
			{
				$pdftype = strtolower($pdf->extensionName);
				if($pdftype == 'swf')
					$model->pdf=FileUpload::createFile($pdf,'pdf','create');
			}
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
		$model->setScenario('update');
		$old_imgurl = $model->imgurl;
		$old_pdf = $model->pdf;
		//AJAX 表单验证
		$this->performAjaxValidation($model);

		if(isset($_POST['Technology']))
		{
			$model->attributes=$_POST['Technology'];
			$upload=CUploadedFile::getInstance($model,'imgurl');
			if(!empty($upload))
			{
				$model->imgurl=Upload::createFile($upload,'mediapic','update');
			}else{
				$model->imgurl = $old_imgurl;
			}
			if($model->save())
				$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('index'));
		}
		$pdf=CUploadedFile::getInstance($model,'pdf');
		if(!empty($pdf))
			{
				$pdftype = strtolower($pdf->extensionName);
				if($pdftype == 'swf')
					$model->pdf=FileUpload::createFile($pdf,'pdf','create');
			}else
				$model->pdf = $old_pdf;

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
	public function getValueByzzid($data, $row, $c)
	{
	
		$name = '';
		$model = SubjectManagement::model()->findByPk($data->zzid);
		if($model)
			$name = $model->name;
		return $name;
	}
	
	/**
	 * 取value
	 */
	public function getValueByhxid($data, $row, $c)
	{
	
		$name = '';
		$model = HorizontalManagement::model()->findByPk($data->hxid);
		if($model)
			$name = $model->name;
		return $name;
	}
	
	/**
	 * 取value
	 */
	public function getValueByzxid($data, $row, $c)
	{
	
		$name = '';
		$model = VerticalManagement::model()->findByPk($data->zxid);
		if($model)
			$name = $model->name;
		return $name;
	}
	
	/**
	 * 取value
	 */
	public function getValueByCompanyID($data, $row, $c)
	{
	
		$name = '';
		$model = Company::model()->findByPk($data->CompanyID);
		if($model)
			$name = $model->name;
		return $name;
	}
	
	/**
	 * 取value
	 */
	public function getValueByIndustryID($data, $row, $c)
	{
	
		$name = '';
		$model = Industrymanagement::model()->findByPk($data->IndustryID);
		if($model)
			$name = $model->name;
		return $name;
	}


	/**
	 * 载入
	 * @param integer $id 主键
	 */
	public function loadModel($id)
	{
		$model=Technology::model()->findByPk($id);
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
		if(isset($_POST['ajax']) && $_POST['ajax']==='technology-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
