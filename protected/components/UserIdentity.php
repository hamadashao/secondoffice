<?php

/**
 * UserIdentity represents the data needed to identity a user.
 * It contains the authentication method that checks if the provided
 * data can identity the user.
 */
class UserIdentity extends CUserIdentity
{
	private $_id;
	
	public function authenticate()
	{
		$user=User::model()->find('LOWER(user_name)=?',array(strtolower($this->name)));
		
		if($user===null)
			$this->errorCode=self::ERROR_USERNAME_INVALID;
		else if(!$user->validatePassword($this->password))
			$this->errorCode=self::ERROR_PASSWORD_INVALID;
		else
		{
			$group_name = "";
			if($user->group) $group_name = $user->group[0]->name;
			
			$this->_id = $user->uid;
			$this->setState('real_name', $user->real_name);
			$this->setState('group_name', $group_name);
			$this->errorCode = self::ERROR_NONE;
		}
		return $this->errorCode==self::ERROR_NONE;
	}
	
	public function getId()
	{
		return $this->_id;
	}
}