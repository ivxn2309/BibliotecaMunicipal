<?php

/**
 * UserIdentity represents the data needed to identity a user.
 * It contains the authentication method that checks if the provided
 * data can identify the user.
 */
class UserIdentity extends CUserIdentity
{
	private $_id;

	public function authenticate()
	{
		$user=Cuentas::model()->find("LOWER(username)=?", array(strtolower($this->username)));

		if($user===null)
			$this->errorCode=self::ERROR_USERNAME_INVALID;
		else if(md5($this->password) !== $user->password)
			$this->errorCode=self::ERROR_USERNAME_INVALID;
		else{
			$this->_id=$user->username;
			$this->setState('type', $user->admin);
			$this->setState('user_id', $user->user_id);
			$this->errorCode=self::ERROR_NONE;
		}
		return !$this->errorCode;
	}
	public function getId()
    {
        return $this->_id;
    }
}