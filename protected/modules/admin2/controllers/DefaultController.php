<?php

class DefaultController extends AdminController
{
	private $topMenus = array();
	private $menus = array();
	private $menuKeys = array();
	public function actionIndex()
	{
/*		$menus = Yii::app()->getDb()->createCommand()->from(AdminMenu::model()->tableName())
				->select('*')
				->order('listorder DESC');
		if($this->getModule()->getIsSuperUser()) {
			$menus->where('display=1');
		} else {

			$menus->where('id in('.implode(",", $this->getModule()->getRoleMenuIds()).') AND display= 1');
		}
*/
    $connection = Yii::app()->db;
    $sql = "SELECT * FROM `yl_admin_menu` ORDER BY id DESC";
    $command = $connection->createCommand($sql);
    $menus = $command->queryAll();


	//	$menus = $menus->queryAll();

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
		/**
	 *用户登录
	 */
	public function actionLogin() {
		$this->layout = false;
//		if(!$this->getUser()->isGuest)
//			$this->redirect(array('index'));

		$model = new AdminLoginForm();


		if(isset($_POST['AdminLoginForm'])) {

			$model->attributes = $_POST['AdminLoginForm'];
			$model->validate();

			if($model->validate() && $model->login()) {
				$this->success('登录成功！');
			}

			$this->error($model->getError('username').$model->getError('password'));
		}
		$this->render('login', array('model'=>$model));
	}

	public function actionMain() {
		$this->render('main');
	}
}