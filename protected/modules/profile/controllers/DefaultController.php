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
				'actions'=>array('uninstall','enable','disable'),
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
	
	public function actionInstall()
	{
		echo "Install";
		Yii::app()->setGlobalState("module_profile_install", true);
		Yii::app()->end();
	}
	
	public function actionUninstall()
	{
		echo "Uninstall";
		Yii::app()->end();
	}
	
	public function actionEnable()
	{
		Yii::app()->setGlobalState("module_profile_active", true);
		Yii::app()->end();
	}
}