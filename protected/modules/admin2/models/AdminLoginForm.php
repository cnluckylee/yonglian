<?php

/**
 * LoginForm class.
 * LoginForm is the data structure for keeping
 * user login form data. It is used by the 'login' action of 'SiteController'.
 */
class AdminLoginForm extends CFormModel {

	public $username;
	public $password;

	/**
	 *
	 * @var AdminIdentity
	 */
	private $_identity;

	/**
	 * Declares the validation rules.
	 * The rules state that username and password are required,
	 * and password needs to be authenticated.
	 */
	public function rules() {
		return array(
			array('username, password', 'required'),
			array('password', 'authenticate'),
		);
	}

	/**
	 * Declares attribute labels.
	 */
	public function attributeLabels() {
		return array(
			'username' => '用户名',
			'password' => '密码',
		);
	}

	/**
	 * Authenticates the password.
	 * This is the 'authenticate' validator as declared in rules().
	 */
	public function authenticate($attribute, $params) {
		if (!$this->hasErrors()) {
			$this->_identity = new AdminUserIdentity($this->username, $this->password);
			if (!$this->_identity->authenticate()) {
				switch ($this->_identity->errorCode) {
					case AdminUserIdentity::ERROR_STATE_INVALID:
						$this->addError('username', '该账户处于非激活状态.');
						break;
					default:
						$this->addError('password', '无效的帐号或者密码.');
						break;
				}
			}
		}
	}

	/**
	 * Logs in the user using the given username and password in the model.
	 * @return boolean whether login is successful
	 */
	public function login() {
		if ($this->_identity === null) {
			$this->_identity = new AdminUserIdentity($this->username, $this->password);
			$this->_identity->authenticate();
		}
		
		if ($this->_identity->errorCode === AdminUserIdentity::ERROR_NONE) {
			$duration =  0; // 30 days

			Yii::app()->user->login($this->_identity, $duration);

			
			//TODO set other variables.

			return true;
		} else {
			return false;
		}
	}

}
