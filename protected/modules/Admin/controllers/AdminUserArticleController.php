<?php

class AdminUserArticleController extends AdminController
{
	protected $uid;
	public function init()
	{
		$uid = Tools::getParam("uid");
		$this->uid = $uid;
	}
	/**
	 * 首页列表.
	 */
	public function actionIndex()
	{
		$model=new UserArticle('search');
		$model->unsetAttributes();  // 清理默认值
		if(isset($_GET['UserArticle']))
			$model->attributes=$_GET['UserArticle'];
		$matchname='所有文章';
		if($this->uid>0)
		{
			$match = Users::model()->findByPk($this->uid);
			$matchname = $match?$match->username:'';
		}
		$this->render('index',array(
			'model'=>$model,
			'uid'=>$this->uid,
			'username'=>$matchname
		));
	}

	/**
	 * 创建
	 */
	public function actionCreate()
	{
		$model=new UserArticle;

		// AJAX 表单验证
		$this->performAjaxValidation($model);

		if(isset($_POST['UserArticle']))
		{
			$model->attributes=$_POST['UserArticle'];
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
			unset($pdf);
			if($model->save())
				$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('index','uid'=>$this->uid));
		}

		
		$model->uid = $this->uid;

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
		$this->uid = $model->uid;
		//AJAX 表单验证
		$this->performAjaxValidation($model);

		if(isset($_POST['UserArticle']))
		{
			$model->attributes=$_POST['UserArticle'];
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
				
			unset($pdf);
			if($model->save())
				$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('index','uid'=>$this->uid));
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
	 * 作品
	 * @param integer $id 主键
	 */
	public function actionArticle($id)
	{
		$this->redirect(array('/admin/adminUserArticle','uid'=>$id));
	}
	
	/**
	 * 取value
	 */
	public function getUserByUid($data, $row, $c)
	{
		$user = Users::model()->findByPk($data->uid);
		$name = $user?$user->username:"";
		
		return $name;
	}

	

	/**
	 * 载入
	 * @param integer $id 主键
	 */
	public function loadModel($id)
	{
		$model=UserArticle::model()->findByPk($id);
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
		if(isset($_POST['ajax']) && $_POST['ajax']==='article-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
