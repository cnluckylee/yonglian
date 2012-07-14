<?php

class MyController extends AdminController {

	public function actionIndex() {
		
		$model = $this->getModel();
		$model->setting = CJSON::decode($model->setting);

		$this->render('index', array('model' => $model));
	}

	public function actionPassword() {
		if (!Yii::app()->getRequest()->isPostRequest)
			throw new CHttpException(505, '非法访问！.');
		$infos = $_POST['info'];
		foreach ($infos as $key => $info) {
			$infos[$key] = trim($info);
		}
		if (empty($infos['olbpassword']))
			$this->error('原始密码必须!');
		if (empty($infos['password']))
			$this->error('新密码必须!');
		if (strlen($infos['password']) < 6)
			$this->error('密码长度不能小于6位！');
		if (empty($infos['repassword']))
			$this->error('确认新密码必须!');

		if ($infos['password'] != $infos['repassword'])
			$this->error('新密码与确认密码不一致!');

		$model = $this->getModel();

		if ($model->password != AdminUser::hashPassword($infos['olbpassword']))
			$this->error('原始密码错误！');
		$model->attributes = $infos;
		$model->isUpdatePassword = true;
		if ($model->save()) {
			//$this->success('保存成功！', );
			$this->ajaxReturn($this->createUrl('default/logout'), '修改成功，请重新登录！', 1);
		}

		$this->error('保存失败！');
	}

	public function actionSetting() {
		if (!Yii::app()->getRequest()->isPostRequest)
			throw new CHttpException(505, '非法访问！.');
		$infos = $_POST['info'];
		foreach ($infos as $key => $info) {
			$infos[$key] = trim($info);
		}
		$model = $this->getModel();
		$model->setting = CJSON::encode($infos);
		if ($model->save(FALSE)) {
			$userinfo = $this->getUser()->getState('__userInfo', array());

			$userinfo['setting'] = $infos;

			$this->getUser()->setState('__userInfo', $userinfo);
			$this->success('保存成功！');
		}
		$this->error('保存失败！');
	}

	public function actionUserinfo() {
		if (!Yii::app()->getRequest()->isPostRequest)
			throw new CHttpException(505, '非法访问！.');
		$infos = $_POST['info'];
		foreach ($infos as $key => $info) {
			$infos[$key] = trim($info);
		}
		if (empty($infos['name']))
			$this->error('姓名必须!');
		$model = $this->getModel();
		$model->attributes = $infos;

		if ($model->save(FALSE)) {
			$this->success('保存成功！');
		}
		$this->error('保存失败！');
	}

	/**
	 *
	 * @return AdminUser
	 * @throws CHttpException 
	 */
	protected function getModel() {
		$model = AdminUser::model()->findByPk($this->getUser()->id);
		if ($model === null)
			throw new CHttpException(404, 'The requested page does not exist.');
		return $model;
	}

}