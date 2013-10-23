<?php

class SiteController extends Controller
{
	public $layout='//layouts/column_main';
	
	public function actionError()
	{
	    if($error=Yii::app()->errorHandler->error)
	    {
	    	if(Yii::app()->request->isAjaxRequest)
	    		echo $error['message'];
	    	else
	        	$this->render('error', $error);
	    }
	}
	
	public function actionIndex()
	{
		if(Yii::app()->user->isGuest)
		{
			$this->layout='//layouts/column_signin';
			$this->render('index');
		}
		else
		{			
			$this->render('main');
		}
	}
	
	public function actionGetMainPanel()
	{
		$this->layout='//layouts/column_ajax';
		$this->render('main');
	}
	
	public function actionGetHomePanel()
	{
		$this->layout='//layouts/column_ajax';
		$this->render('home');
	}
	
	public function actionGetSystemJS()
	{
		$this->layout='//layouts/column_ajax';
		$this->render('javascript');
	}
}