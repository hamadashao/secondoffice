<?php

/**
 * UserIdentity represents the data needed to identity a user.
 * It contains the authentication method that checks if the provided
 * data can identity the user.
 */
class UserIdentity extends CUserIdentity
{
	private $_id;
	private $_real_name;
	private $_user_name;
	
	public function authenticate()
	{
		$user=User::model()->find('LOWER(user_name)=?',array(strtolower($this->name)));
		
		if($user===null)
			$this->errorCode=self::ERROR_USERNAME_INVALID;
		else if(!$user->validatePassword($this->password))
			$this->errorCode=self::ERROR_PASSWORD_INVALID;
		else
		{
			$this->_id = $user->uid;
			$this->_real_name = $user->real_name;
			$this->_user_name = $user->user_name;
			$this->errorCode = self::ERROR_NONE;
		}
		return $this->errorCode==self::ERROR_NONE;
	}
	
	public function getId()
	{
		return $this->_id;
	}
}