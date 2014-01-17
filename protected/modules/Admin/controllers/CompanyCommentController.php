<?php

class CompanyCommentController extends AdminController
{
	protected $cid;
	public function init()
	{
		$cid = Tools::getParam("mid");
		
		if($cid)
			$cid = CompanyComment::getCidById($cid);
		$this->cid = $cid;
	}
	/**
	 * 首页列表.
	 */
	public function actionIndex()
	{
		$model=new CompanyComment('search');
		$model->unsetAttributes();  // 清理默认值
		if(isset($_GET['CompanyComment']))
			$model->attributes=$_GET['CompanyComment'];

		$this->render('index',array(
			'model'=>$model,
			'cid' =>$this->cid,
		));
	}

	/**
	 * 创建
	 */
	public function actionCreate()
	{
		$model=new CompanyComment;

		// AJAX 表单验证
		$this->performAjaxValidation($model);

		if(isset($_POST['CompanyComment']))
		{
			$model->attributes=$_POST['CompanyComment'];
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
		if($this->cid>0)
		{
			$companyComment = CompanyComment::model()->findByAttributes(array('cid'=>$this->cid));
			if($companyComment){
				$model->aid = $companyComment?$companyComment->aid:"";
				$model->aname = $companyComment?$companyComment->aname:"";
				
			}
			$model->cid = $this->cid;
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

		if(isset($_POST['CompanyComment']))
		{
			$model->attributes=$_POST['CompanyComment'];
			$upload=CUploadedFile::getInstance($model,'imgurl');
			if(!empty($upload))
			{
				$model->imgurl=Upload::createFile($upload,'mediapic','update');
			}else{
				$model->imgurl = $old_imgurl;
			}
				
			$pdf=CUploadedFile::getInstance($model,'pdf');
				
			if(!empty($pdf))
			{
				$pdftype = strtolower($pdf->extensionName);
				if($pdftype == 'swf')
					$model->pdf=FileUpload::createFile($pdf,'pdf','create');
			}else
				$model->pdf = $old_pdf;
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
	 * 删除
	 * @param integer $id 主键
	 */
	public function actionView($id)
	{
		$this->redirect(array('/admin/CompanyComment/create','mid'=>$id));
	}

	/**
	 * 取value
	 */
	public function getValueByKey($data, $row, $c)
	{
		$name ='';
		if($data->class1)
		{
			$dd = JointSite::model()->findByPk($data->class1);
			if($dd)
				$name = $dd->name;
		}
		return $name;
	}

	/**
	 * 载入
	 * @param integer $id 主键
	 */
	public function loadModel($id)
	{
		$model=CompanyComment::model()->findByPk($id);
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
		if(isset($_POST['ajax']) && $_POST['ajax']==='company-comment-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
