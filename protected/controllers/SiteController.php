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
			if(isset($_POST['ajax']))
			{
				$this->layout='//layouts/column_ajax';
				$this->render('index');
			}
			else
			{
				$this->layout='//layouts/column_signin';
				$this->render('index');
			}			
		}
		else
		{			
			$this->render('main_panel');
		}
	}
	
	public function actionAjaxSignin()
	{
		echo "<script>$('body').trigger('ajaxsignin.secondoffice.system');</script>";
		Yii::app()->end();
	}
	
	public function actionGetMainPanel()
	{
		$this->layout='//layouts/column_ajax';
		$this->render('main_panel');
	}
	
	public function actionGetHomePanel()
	{
		$this->layout='//layouts/column_ajax';
		$this->render('home_panel');
	}
	
	public function actionGetSystemJS()
	{
		$this->layout='//layouts/column_ajax';
		$this->render('javascript');
	}
	
	public function actionInitAuth()
	{
		$auth->createTask('sysytem.user.management', Yii::t('Base', 'User Management'));
		$auth->createTask('sysytem.module.management', Yii::t('Base', 'Module Management'));
		$auth->createTask('sysytem.config', Yii::t('Base', 'System Config'));
	}
}