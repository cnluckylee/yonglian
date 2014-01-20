<?php

class SectorDetailController extends AdminController
{
	protected $sid;
	public function init()
	{
		$this->sid = Tools::getParam("sid");
	}
	/**
	 * 首页列表.
	 */
	public function actionIndex()
	{
		$model=new SectorDetail('search');
		$model->unsetAttributes();  // 清理默认值
		if(isset($_GET['SectorDetail']))
			$model->attributes=$_GET['SectorDetail'];

		$this->render('index',array(
			'model'=>$model,
			'sid'=>$this->sid,
		));
	}

	/**
	 * 创建
	 */
	public function actionCreate()
	{
		$model=new SectorDetail;

		// AJAX 表单验证
		$this->performAjaxValidation($model);

		if(isset($_POST['SectorDetail']))
		{
			$model->attributes=$_POST['SectorDetail'];
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
				$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('index','sid'=>$this->sid));
		}else{
			if($this->sid){
				$model->sid = $this->sid;
				$match = Sector::model()->findByPk($this->sid);
				if($match)
				{
					$model->sname= $match->name;
				}
			
			}
		}

		$this->render('create',array(
			'model'=>$model,
			'sid'=>$this->sid,
		));
	}

	/**
	 * 修改
	 * @param integer $id 主键
	 */
	public function actionUpdate($id)
	{
		$model=$this->loadModel($id);
		$old_imgurl = $model->imgurl;
		$old_pdf = $model->pdf;
		$this->sid = $model->sid;
		//AJAX 表单验证
		$this->performAjaxValidation($model);

		if(isset($_POST['SectorDetail']))
		{
			$model->attributes=$_POST['SectorDetail'];
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
				$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('index','mid'=>$this->cid));
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
				$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('index','mid'=>$this->cid));
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
		$model=SectorDetail::model()->findByPk($id);
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
		if(isset($_POST['ajax']) && $_POST['ajax']==='sector-detail-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
