<?php

class MatchEntriesController extends AdminController
{
	protected $cid;
	public function init()
	{
		$cid = Tools::getParam("mid");
		$this->cid = $cid;
	}
	/**
	 * 首页列表.
	 */
	public function actionIndex()
	{
		$model=new MatchEntries('search');
		$model->unsetAttributes();  // 清理默认值
		if(isset($_GET['MatchEntries']))
			$model->attributes=$_GET['MatchEntries'];
		$matchname='所有作品';
		if($this->cid>0)
		{
			$match = Match::model()->findByPk($this->cid);
			$matchname = $match?$match->title:'';
		}
		$this->render('index',array(
			'model'=>$model,
			'mid'=>$this->cid,
			'matchname'=>$matchname	
		));
	}

	/**
	 * 创建
	 */
	public function actionCreate()
	{
		$model=new MatchEntries;

		// AJAX 表单验证
		$this->performAjaxValidation($model);

		if(isset($_POST['MatchEntries']))
		{

			$model->attributes=$_POST['MatchEntries'];
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
				$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('index','mid'=>$this->cid));
		}
		if($this->cid){
			$model->mid = $this->cid;
			$match = Match::model()->findByPk($this->cid);
			if($match)
			{
				$model->mname= $match->title;
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
		$model->setScenario('update');
		$old_imgurl = $model->imgurl;
		$old_pdf = $model->pdf;
		$this->cid = $model->mid;
		//AJAX 表单验证
		$this->performAjaxValidation($model);

		if(isset($_POST['MatchEntries']))
		{
			$model->attributes=$_POST['MatchEntries'];
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
			
			$model=$this->loadModel($id);
			$this->cid = $model->mid;
			$model->delete();

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
		$model=MatchEntries::model()->findByPk($id);
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
		if(isset($_POST['ajax']) && $_POST['ajax']==='match-entries-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
	
	/**
	 * 取value
	 */
	public function getValueByType($data, $row, $c)
	{
	
		$name = '';
		$result = EntriesSite::model()->findByPk($data->type);
		if($result)
			$name = $result->attributes['name'];
		return $name;
	}
}
