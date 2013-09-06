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
		$this->layout='//layouts/column_login';
		$this->render('index');
	}
	
	public function actionGetMainUI()
	{
		$this->layout='//layouts/column_main';
		$this->render('main');
	}
}