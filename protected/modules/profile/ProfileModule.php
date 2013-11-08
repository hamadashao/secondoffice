<?php

class ProfileModule extends CWebModule
{
	private $_uid		= "1c5ea7a328e8636dce8b2f7e0cb33d96";
	private $_name 		= "Profile Manager";
	private $_version	= "1.0.0";
	private $_author	= "Ram";
	private $_icon  	= "profile.png";


	public function init()
	{
		$this->
		setImport(array(
			'profile.models.*',
			'profile.components.*',
		));
	}
	
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
	
	public function getIcon()
	{
		return $this->_icon;
	}
	
	public function hasInstall()
	{
		return Yii::app()->getGlobalState("module_profile_install", false);
	}
	
	public function hasActive()
	{
		return Yii::app()->getGlobalState("module_profile_active", false);
	}
	
	public function checkModuleAccess()
	{
		return Yii::app()->user->checkAccess('secondoffice-profile-module-access');
	}
	
	public function installModule()
	{
		$auth = Yii::app()->authManager;
		
		if(!$auth->getAuthItem("secondoffice-profile"))
		{ 
			$profile_task = $auth->createTask('secondoffice-profile', Yii::t('Profile', 'Profile Auth'));
			
			if(!$auth->getAuthItem("secondoffice-profile-module-access")) $auth->createOperation('secondoffice-profile-module-access', Yii::t('Profile', 'Module Access'));
			if(!$auth->getAuthItem("secondoffice-profile-data-management")) $auth->createOperation('secondoffice-profile-data-management', Yii::t('Profile', 'Data Management'));
			if(!$auth->getAuthItem("secondoffice-profile-experience-management")) $auth->createOperation('secondoffice-profile-experience-management', Yii::t('Profile', 'Experience Management'));
		
			$profile_task->addChild('secondoffice-profile-module-access');
			$profile_task->addChild('secondoffice-profile-data-management');
			$profile_task->addChild('secondoffice-profile-experience-management');
		}
		
		return;
	}
	
	public function uninstallModule()
	{
		$auth = Yii::app()->authManager;
		
		$auth->removeAuthItem('secondoffice-profile-data-management');
		$auth->removeAuthItem('secondoffice-profile-experience-management');
		
		$auth->removeAuthItem('secondoffice-profile');
		
		return;
	}
}
