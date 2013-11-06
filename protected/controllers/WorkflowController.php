<?php


class WorkflowController extends Controller
{
	public function filters()
	{
		return array(
			'accessControl',
		);
	}
	
	public function accessRules()
	{
		return array(
			array('allow',
				'actions'=>array('getpanel'),
				'users'=>array('@'),
			),
			array('deny',
				'users'=>array('*'),
			),
		);
	}
	
	public function actionGetPanel() 
	{
		$this->render('workflow_panel');
	}
}
