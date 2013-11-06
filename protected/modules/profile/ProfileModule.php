<?php

class ProfileModule extends CWebModule
{
	private $_uid		= "1c5ea7a328e8636dce8b2f7e0cb33d96";
	private $_name 		= "Profile Manager";
	private $_version	= "1.0.0";
	private $_author	= "Ram";


	public function init()
	{
		$this->
		setImport(array(
			'profile.models.*',
			'profile.components.*',
		));
	}
	
	/*
	public function beforeControllerAction($controller, $action)
	{
		if(parent::beforeControllerAction($controller, $action))
		{		
			return true;
		}
		else
			return false;
	}
	*/
	
	public function getUID()
	{
		return Yii::t("Profile", $this->_uid);
	}
	
	public function getName()
	{
		return Yii::t("Profile", $this->_name);
	}
	
	public function getVersion()
	{
		return $this->_version;
	}
	
	public function getAuthor()
	{
		return $this->_author;
	}
	
	public function hasInstall()
	{
		return Yii::app()->getGlobalState("module_profile_install", false);
	}
	
	public function hasActive()
	{
		return Yii::app()->getGlobalState("module_profile_active", false);
	}
}
