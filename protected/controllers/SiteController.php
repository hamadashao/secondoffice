<?php

class SiteController extends Controller
{
	public $layout='//layouts/column_head';
	
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
			$this->render('index');
		}
		else
		{
			$this->layout='//layouts/column_head_signin';
			$this->render('main');
		}
	}
	
	public function actionGetMainUI()
	{
		$this->layout='//layouts/column_content';
		$this->render('main');
	}
}