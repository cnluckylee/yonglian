<?php

/**
 * Controller is the customized base controller class.
 * All controller classes for this application should extend from this base class.
 */
class AdminController extends Controller {

	/**
	 * @var string the default layout for the controller view. Defaults to '//layouts/column1',
	 * meaning using a single column layout. See 'protected/views/layouts/column1.php'.
	 */
	public $layout = 'main';
	
	/**
	 *获取用户 
	 * @return AdminWebUser
	 */
	public function getUser() {
		return Yii::app()->user;
	}

}