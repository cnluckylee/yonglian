<?php

class AdminRoleController extends AdminController {

	/**
	 * 首页列表.
	 */
	public function actionIndex() { //echo $this->pageTitle;
		$model = new AdminRole('search');
		$model->unsetAttributes();  // 清理默认值
		if (isset($_GET['AdminRole']))
			$model->attributes = $_GET['AdminRole'];

		$this->render('index', array(
			'model' => $model,
		));
	}

	/**
	 * 创建
	 */
	public function actionCreate() {
		$model = new AdminRole;

		// AJAX 表单验证
		$this->performAjaxValidation($model);

		if (isset($_POST['AdminRole'])) {
			$model->attributes = $_POST['AdminRole'];
			if ($model->save())
				$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('index'));
		}

		$this->render('create', array(
			'model' => $model,
		));
	}

	/**
	 * 修改
	 * @param integer $id 主键
	 */
	public function actionUpdate($id) {
		$model = $this->loadModel($id);

		//AJAX 表单验证
		$this->performAjaxValidation($model);

		if (isset($_POST['AdminRole'])) {
			$model->attributes = $_POST['AdminRole'];
			if ($model->save())
				$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('index'));
		}

		$this->render('update', array(
			'model' => $model,
		));
	}

	/**
	 * 分配权限
	 */
	public function actionPriv($id) {

		$model = $this->loadModel($id);

		if (Yii::app()->request->isPostRequest) {
			AdminRolePriv::model()->deleteAll('role_id=:id', array('id' => $id));
			try {
				foreach (Yii::app()->getRequest()->getPost('menu_id') as $menuId) {
					Yii::app()->getDb()->createCommand()->insert(AdminRolePriv::model()->tableName(), array('menu_id' => $menuId, 'role_id' => $id));
				}
				$this->success('保存成功！');
			} catch (Exception $exc) {
				$this->error('保存失败!');
			}
		}
		$privs = $model->getMenus();

		$menus = AdminMenu::getTreeDATA('id,parentid as pId, name', FALSE);
		foreach ($menus as $key => $menu) {
			if (isset($privs[$key])) {
				$menus[$key]['checked'] = true;
				$menus[$key]['open'] = true;
			}
		}
		$menus = array_values($menus);

		$this->render('priv', array(
			'menus' => $menus
		));
	}

	/**
	 * 删除
	 * @param integer $id 主键
	 */
	public function actionDelete($id) {
		if (Yii::app()->request->isPostRequest) {

			$this->loadModel($id)->delete();

			// 如果是 AJAX 操作返回
			if (Yii::app()->request->isAjaxRequest) {
				$this->success('删除成功！');
			} else {
				$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('index'));
			}
		}
		else
			throw new CHttpException(400, '非法访问！');
	}

	/**
	 * 载入
	 * @param integer $id 主键
	 * @return AdminRole
	 */
	public function loadModel($id) {
		$model = AdminRole::model()->findByPk($id);
		if ($model === null)
			throw new CHttpException(404, '内容不存在！.');
		return $model;
	}

	/**
	 * Ajax验证
	 * @param CModel the model to be validated
	 */
	protected function performAjaxValidation($model) {
		if (isset($_POST['ajax']) && $_POST['ajax'] === 'admin-role-form') {
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}

}
