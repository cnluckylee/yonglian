<?php

class AdminModule extends CWebModule {

	private $_assetsUrl;
	private $_superUserIds = array(
		1
	);
	private $_isSuperUser = false;
	private $_roleMenuIds;

	public function init() {
		parent::init();
		Yii::app()->name .= ' - 管理平台';

		Yii::app()->setComponents(array(
			'user' => array(
				'class' => 'AdminWebUser',
				'stateKeyPrefix' => 'admin',
				'loginUrl' => Yii::app()->createUrl('/admin/default/login'),
			),
			'session' => array(
				'class' => 'system.web.CDbHttpSession',
				'connectionID' => 'db',
				'sessionTableName' => 'yl_admin_session',
			),
			'messages' => array(
				'class' => 'CPhpMessageSource',
				'cachingDuration' => 0,
				'cacheID' => 'cache',
				'basePath' => Yii::getPathOfAlias('admin.messages'),
				'forceTranslation' => false,
				'behaviors' => array(),
			)
		));
		$this->setImport(array(
			'admin.models.*',
			'admin.components.*',
		));
	}

	public function beforeControllerAction($controller, $action) {
		if (parent::beforeControllerAction($controller, $action)) {

			$route = $controller->id . '/' . $action->id;


			$publicPages = array(
				'default/login',
				'default/logout',
				'default/error',
				'default/left'
			);
			if(in_array($route, $publicPages)) {
				return true;
			}
			if (self::getUser()->isGuest)
				Yii::app()->user->loginRequired();
			$publicControllers = array(
				'my'
			);
			if(in_array($controller->id, $publicControllers))
					return TRUE;
			if(in_array(self::getUser()->id, $this->_superUserIds)) {
				$this->_isSuperUser = true;
				return TRUE;
			}
			$array = array(
				'modules' => $controller->getModule()->getId(),
				'controller' => $controller->id,
				'action' => $action->id
			);

			$menus = Yii::app()->getDb()->createCommand()
					->from("{{admin_role_priv}} as p")
					->select("id,modules,controller,action")
					->leftJoin("{{admin_menu}} as m", 'm.id=p.menu_id')
					->where('p.role_id=:rid', array("rid" => self::getUser()->role_id))
					->queryAll();

			foreach ($menus as $key => $val) {
				$this->_roleMenuIds[] = $val['id'];
				unset($val['id']);
				$menus[$key] = $val;
			}

			if (!in_array($array, $menus)) {
				if (Yii::app()->getRequest()->isAjaxRequest) {
					$result = array();
					$result['status'] = 0;
					$result['info'] = '没有权限！';
					$result['data'] = null;
					header('Content-Type:text/html; charset=utf-8');
					exit(json_encode($result));
				} else {
					throw new CHttpException(505, '没有权限！');
				}
			}

			return true;
		}
		else
			return false;
	}

	/**
	 * @return string the base URL that contains all published asset files of gii.
	 */
	public function getAssetsUrl() {
		if ($this->_assetsUrl === null)
			$this->_assetsUrl = Yii::app()->getAssetManager()->publish(Yii::getPathOfAlias('admin.assets'));
		return $this->_assetsUrl;
	}

	/**
	 * @param string $value the base URL that contains all published asset files of gii.
	 */
	public function setAssetsUrl($value) {
		$this->_assetsUrl = $value;
	}

	/**
	 * 获取User
	 * @return AdminWebUser
	 */
	public static function getUser() {
		return Yii::app()->user;
	}

	public function getIsSuperUser() {
		return $this->_isSuperUser;
	}
	public function getRoleMenuIds() {
		return $this->_roleMenuIds;
	}

}
