<?php

class AdminMentorController extends AdminController
{
	
	/**
	 * 首页列表.
	 */
	public function actionIndex()
	{
		$model=new Mentor('search');
		$model->unsetAttributes();  // 清理默认值
		if(isset($_GET['Mentor']))
			$model->attributes=$_GET['Mentor'];

		$this->render('index',array(
			'model'=>$model,
		));
	}

	/**
	 * 创建
	 */
	public function actionCreate()
	{
		$model=new Mentor;

		// AJAX 表单验证
		$this->performAjaxValidation($model);

		if(isset($_POST['Mentor']))
		{
			$model->attributes=$_POST['Mentor'];
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

				$model->imgurl=Upload::createFile($upload,'cp','create');
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
		//AJAX 表单验证
		$this->performAjaxValidation($model);

		if(isset($_POST['Mentor']))
		{
			$model->attributes=$_POST['Mentor'];
			$upload=CUploadedFile::getInstance($model,'imgurl');
			if(!empty($upload))
			{
				$model->imgurl=Upload::createFile($upload,'cp','update');
			}else{
				$model->imgurl = $old_imgurl;
			}
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
	 * 载入
	 * @param integer $id 主键
	 */
	public function loadModel($id)
	{
		$model=Mentor::model()->findByPk($id);
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
		if(isset($_POST['ajax']) && $_POST['ajax']==='mentor-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
	
	/**
	 * 取value
	 */
	public function getValueByCompanyID($data, $row, $c)
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
	public function getValueByKey($data, $row, $c)
	{
		$name = '';
		$result = Alltype::model()->findByPk($data->cid);
		if($result)
			$name = $result->attributes['name'];
		return $name;
	}
}
