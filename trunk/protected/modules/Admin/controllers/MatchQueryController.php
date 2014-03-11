<?php

class MatchQueryController extends AdminController
{
	protected  $cid;
	public function init()
	{
		$this->cid = Tools::getParam('mid');
	}
	/**
	 * 首页列表.
	 */
	public function actionIndex()
	{
		$model=new MatchQuery('search');
		$model->unsetAttributes();  // 清理默认值
		if(isset($_GET['MatchQuery']))
			$model->attributes=$_GET['MatchQuery'];
		if($this->cid>0)
		{
			$match = MatchApply::model()->findByPk($this->cid);
			$matchname = $match?$match->title:'';
		}
		$this->render('index',array(
			'model'=>$model,
			'cid'=>$this->cid,
			'cname'=>$matchname
		));
	}

	/**
	 * 创建
	 */
	public function actionCreate()
	{
		$model=new MatchQuery;

		// AJAX 表单验证
		$this->performAjaxValidation($model);

		if(isset($_POST['MatchQuery']))
		{
			$model->attributes=$_POST['MatchQuery'];
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
					$model->pdf=FileUpload::createFile($pdf,'swf','create');
			}
			unset($pdf);
			if($model->save())
				$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('index','mid'=>$this->cid));
		}
		if($this->cid){
			$model->cid = $this->cid;
			$match = MatchApply::model()->findByPk($this->cid);
			if($match)
			{
				$model->cname= $match->title;
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
		$old_imgurl = $model->imgurl;
		$old_pdf = $model->pdf;
		$this->cid = $model->cid;
		//AJAX 表单验证
		$this->performAjaxValidation($model);

		if(isset($_POST['MatchQuery']))
		{
			$model->attributes=$_POST['MatchQuery'];
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
					$model->pdf=FileUpload::createFile($pdf,'swf','create');
			}else
				$model->pdf = $old_pdf;
				
			unset($pdf);
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
		$model=MatchQuery::model()->findByPk($id);
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
		if(isset($_POST['ajax']) && $_POST['ajax']==='match-query-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
