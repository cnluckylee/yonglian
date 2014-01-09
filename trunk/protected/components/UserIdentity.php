<?php

/**
 * UserIdentity represents the data needed to identity a user.
 * It contains the authentication method that checks if the provided
 * data can identity the user.
 */
class UserIdentity extends CUserIdentity
{
	/**
	 * Authenticates a user.
	 * The example implementation makes sure if the username and password
	 * are both 'demo'.
	 * In practical applications, this should be changed to authenticate
	 * against some persistent user identity storage (e.g. database).
	 * @return boolean whether authentication succeeds.
	 */
	private $_id;
	public function authenticate()
	{
		$username = trim($this->username);
		$type = intval($this->type);
		$where = "username='".$username."' and type =".$type;
		$user=Users::model()->find($where);
		$this->errorCode = "";
		if(empty($user))
			$this->errorCode=self::ERROR_USERNAME_INVALID;
		else if(!$user->validatePassword($this->password)){
			$this->errorCode=self::ERROR_PASSWORD_INVALID;
		}else if($user->state == 0){
			$this->errorCode=self::ERROR_nocheck_INVALID;
		}else if($user->state >2){
			$this->errorCode=self::ERROR_checkerr_INVALID;
		}else{
			$this->_id=$user->id;
			$this->username=$user->username;
			$this->errorCode=self::ERROR_NONE;
		}
		return $this->errorCode;
	}
	public function getId()
	{
		return $this->_id;
	}
}
