<?php

class DefaultController extends Controller
{
	public function filters()
	{
		return array(
			'accessControl', // perform access control for CRUD operations
		);
	}
	
	public function accessRules()
	{
		return array(
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('getpanel'),
				'users'=>array('@'),
			),	
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('changeinstallstatus','changeactivestatus'),
				'expression'=>'true',
			),		
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('install'),
				'expression'=>'true',
			),
			array('deny',  // deny all users
				'users'=>array('*'),
			),
		);
	}
	
	public function actionChangeInstallStatus()
	{
		$module = Yii::app()->getModule("attendance");
		
		try
		{
			if(Yii::app()->getGlobalState("module_attendance_install", false))
			{
				$module->uninstallModule();
				
				Yii::app()->setGlobalState("module_attendance_install", false);
				Yii::app()->setGlobalState("module_attendance_active", false);
			}
			else
			{
				$module->installModule();
				
				Yii::app()->setGlobalState("module_attendance_install", true);
			}			
		}
		catch (Exception $e) 
		{
			echo '{"result":"fail","message":"'.$e->getMessage().'"}';			
			Yii::app()->end();
		}		
		
		echo '{"result":"ok","message":"'.Yii::t('Attendance', 'Attendance module install status has been change').'"}';	
		Yii::app()->end();
	}
	
	public function actionChangeActiveStatus()
	{
		try
		{
			if(Yii::app()->getGlobalState("module_attendance_active", false))
			{
				Yii::app()->setGlobalState("module_attendance_active", false);
			}
			else
			{
				if(!Yii::app()->getGlobalState("module_attendance_install", false)) throw new Exception(Yii::t('Attendance', 'You should install module first'));
				Yii::app()->setGlobalState("module_attendance_active", true);
			}			
		}
		catch (Exception $e) 
		{
			echo '{"result":"fail","message":"'.$e->getMessage().'"}';
			Yii::app()->end();
		}		
		
		echo '{"result":"ok","message":"'.Yii::t('Attendance', 'Attendance module active status has been change').'"}';	
		Yii::app()->end();
	}
}