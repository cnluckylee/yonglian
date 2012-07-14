<?php

class DefaultController extends AdminController {

	private $topMenus = array();
	private $menus = array();
	private $menuKeys = array();

	public function actionIndex() {
		$menus = Yii::app()->getDb()->createCommand()
				->from(AdminMenu::model()->tableName())
				->select('*')
				->order('listorder DESC');

		if($this->getModule()->getIsSuperUser()) {
			$menus->where('display=1');
		} else {
			$menus->where('id in('.implode(",", $this->getModule()->getRoleMenuIds()).') AND display= 1');
		}
		$menus = $menus->queryAll();
		foreach ($menus as $key => $menu) {

			$this->menus[$menu['id']] = $menu;
		}

		unset($menus);

		foreach ($this->menus as $key => $menu) {
			$this->menuKeys[$menu['parentid']][$key] = $key;
		}

		$this->render('index', array(
			'topmenus' => $this->menuKeys[0],
			'menus' => $this->menus,
			'menukeys' => $this->menuKeys
		));
	}

	public function actionMain() {
		$this->render('main');
	}

	/**
	 *用户登录
	 */
	public function actionLogin() {
		$this->layout = false;
		if(!$this->getUser()->isGuest)
			$this->redirect(array('index'));

		$model = new AdminLoginForm();


		if(isset($_POST['AdminLoginForm'])) {

			$model->attributes = $_POST['AdminLoginForm'];
			$model->validate();

			if($model->validate() && $model->login()) {
				$this->success();
			}

			$this->error($model->getError('username').$model->getError('password'));
		}
		$this->render('login', array('model'=>$model));
	}

	/**
	 *用户退出
	 */
	public function actionLogout() {
		$this->getUser()->logout();
		$this->redirect(array('login'));
	}

	public function actionLeft()
	{
		$menus = Yii::app()->getDb()->createCommand()
				->from(AdminMenu::model()->tableName())
				->select('*')
				->order('listorder DESC');

		if($this->getModule()->getIsSuperUser()) {
			$menus->where('display=1');
		} else {
			$menus->where('id in('.implode(",", $this->getModule()->getRoleMenuIds()).') AND display= 1');
		}
		$menus = $menus->queryAll();
		foreach ($menus as $key => $menu) {

			$this->menus[$menu['id']] = $menu;
		}
		unset($menus);

		foreach ($this->menus as $key => $menu) {
			$this->menuKeys[$menu['parentid']][$key] = $key;
		}

		$this->render('left', array(
			'topmenus' => $this->menuKeys[0],
			'menus' => $this->menus,
			'menukeys' => $this->menuKeys
		));
	}




}