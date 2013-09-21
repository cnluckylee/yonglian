<?php

class AdminMenuController extends AdminController {

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate($parentid = 0) {
		$model = new AdminMenu;

		// Uncomment the following line if AJAX validation is needed
		$this->performAjaxValidation($model);

		if (isset($_POST['AdminMenu'])) {
			$model->attributes = $_POST['AdminMenu'];
			if ($model->save()) {
				if (Yii::app()->request->getPost('crud', FALSE)) {
					foreach (array('create' => '创建', 'update' => '修改', 'delete' => '删除') as $k => $act) {
						$data = $model->attributes;
						unset($data['id']);
						$data['action'] = $k;
						$data['name'] = $act;
						$data['display'] = 0;
						$data['parentid'] = $model->id;
						$menuObj =  new AdminMenu;
						$menuObj->setAttributes($data);
						$menuObj->save();
					}
				}
				$this->redirect(array('index'));
			}
		}
		if ($parentid)
			$model->parentid = $parentid;
		$this->render('create', array(
			'model' => $model,
		));
	}

	/**
	 * Updates a particular model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 * @param integer $id the ID of the model to be updated
	 */
	public function actionUpdate($id) {
		$model = $this->loadModel($id);

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if (isset($_POST['AdminMenu'])) {
			$model->attributes = $_POST['AdminMenu'];
			if ($model->save())
				$this->redirect(array('index'));
		}

		$this->render('update', array(
			'model' => $model,
		));
	}

	/**
	 * Deletes a particular model.
	 * If deletion is successful, the browser will be redirected to the 'admin' page.
	 * @param integer $id the ID of the model to be deleted
	 */
	public function actionDelete($id) {
		if (Yii::app()->request->isPostRequest) {
			// we only allow deletion via POST request
			$this->loadModel($id)->delete();

			// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
			if (Yii::app()->request->isAjaxRequest) {
				$this->success('删除成功！');
			} else {
				$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('index'));
			}
		}
		else
			throw new CHttpException(400, 'Invalid request. Please do not repeat this request again.');
	}

	/**
	 * 管理页面
	 */
	public function actionIndex() {
		$menus = AdminMenu::getTreeDATA('*', false);

		$tree = new Tree();
		$tree->icon = array('&nbsp;&nbsp;&nbsp;│ ', '&nbsp;&nbsp;&nbsp;├─ ', '&nbsp;&nbsp;&nbsp;└─ ');
		$tree->nbsp = '&nbsp;&nbsp;&nbsp;';
		foreach ($menus as $r) {

			$r['str_manage'] = '<a href="' . $this->createUrl('create', array('parentid' => $r['id'])) . '">添加子菜单</a> |
				<a  href="' . $this->createUrl('update', array('id' => $r['id'])) . '">修改</a> |
                                    <a class="del" href="' . $this->createUrl('delete', array('id' => $r['id'])) . '" msg="确定删除.' . $r['name'] . '">删除</a> ';
			$array[] = $r;
		}
		$str = "<tr>
					<td><input name='listorders[\$id]' type='text' size='3' value='\$listorder' class='input-text-c'></td>
					<td >\$spacer\$name</td>
					<td ><a href='\".Yii::app()->createUrl(\$modules.'/'.\$controller.'/'.\$action).\"'>\".Yii::app()->createUrl(\$modules.'/'.\$controller.'/'.\$action).\"</td>
					<td>\$str_manage</td>
				</tr>";
		$tree->init($array);
		$this->render('index', array(
			'menuTree' => $tree->get_tree('0', $str)
		));
	}

	/**
	 * 排序
	 */
	public function actionListorder() {
		$orders = Yii::app()->getRequest()->getPost('listorders');
		foreach ($orders as $k => $v) {
			AdminMenu::model()->updateByPk($k, array('listorder' => $v));
		}
		$this->success('更新排序成功！');
	}


	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer the ID of the model to be loaded
	 */
	public function loadModel($id) {
		$model = AdminMenu::model()->findByPk($id);
		if ($model === null)
			throw new CHttpException(404, 'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param CModel the model to be validated
	 */
	protected function performAjaxValidation($model) {
		if (isset($_POST['ajax']) && $_POST['ajax'] === 'admin-menu-form') {
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}

}
