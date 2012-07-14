<?php

class AdminWebUser extends CWebUser {
	public $allowAutoLogin= false;
	
	public function __get($name) {
		if ($this->hasState('__userInfo')) {
			$user = $this->getState('__userInfo', array());

			if (isset($user[$name])) {
				return $user[$name];
			}
		}

		return parent::__get($name);
	}

	public function login($identity, $duration=0) {
		$userInfo = $identity->getUser()->attributes;
		$userInfo['setting'] = CJSON::decode($userInfo['setting']);
		
		$userInfo['role'] = $identity->getUser()->role->name;
		$this->setState('__userInfo', $userInfo);
		parent::login($identity, $duration);
	}
	
	

}

?>
