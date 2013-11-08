<?php

class AttendanceModule extends CWebModule
{
	private $_uid		= "7cd28b2197757bc14000fea57d5b1a00";
	private $_name 		= "Attendance Manager";
	private $_version	= "1.0.0";
	private $_author	= "Ram";
	private $_icon  	= "attendance.png";


	public function init()
	{
		$this->
		setImport(array(
			'attendance.models.*',
			'attendance.components.*',
		));
	}
	
	public function getUID()
	{
		return Yii::t("Attendance", $this->_uid);
	}
	
	public function getName()
	{
		return Yii::t("Attendance", $this->_name);
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
		return Yii::app()->getGlobalState("module_attendance_install", false);
	}
	
	public function hasActive()
	{
		return Yii::app()->getGlobalState("module_attendance_active", false);
	}
	
	public function checkModuleAccess()
	{
		return Yii::app()->user->checkAccess('secondoffice-attendance-module-access');
	}
	
	public function installModule()
	{
		$auth = Yii::app()->authManager;
		
		if(!$auth->getAuthItem("secondoffice-attendance"))
		{ 
			$attendance_task = $auth->createTask('secondoffice-attendance', Yii::t('Attendance', 'Attendance Auth'));
			
			if(!$auth->getAuthItem("secondoffice-attendance-module-access")) $auth->createOperation('secondoffice-attendance-module-access', Yii::t('Attendance', 'Module Access'));
			if(!$auth->getAuthItem("secondoffice-attendance-data-management")) $auth->createOperation('secondoffice-attendance-data-management', Yii::t('Attendance', 'Data Management'));
			if(!$auth->getAuthItem("secondoffice-attendance-experience-management")) $auth->createOperation('secondoffice-attendance-experience-management', Yii::t('Attendance', 'Experience Management'));
		
			$attendance_task->addChild('secondoffice-attendance-module-access');
			$attendance_task->addChild('secondoffice-attendance-data-management');
			$attendance_task->addChild('secondoffice-attendance-experience-management');
		}
		
		return;
	}
	
	public function uninstallModule()
	{
		$auth = Yii::app()->authManager;
		
		$auth->removeAuthItem('secondoffice-attendance-data-management');
		$auth->removeAuthItem('secondoffice-attendance-experience-management');
		
		$auth->removeAuthItem('secondoffice-attendance');
		
		return;
	}
}
