<?php

class PositionController extends Controller
{

	/**
	 * @return array action filters
	 */
	public function filters()
	{
		return array(
			'accessControl', // perform access control for CRUD operations
		);
	}

	/**
	 * Specifies the access control rules.
	 * This method is used by the 'accessControl' filter.
	 * @return array access control rules
	 */
	public function accessRules()
	{
		return array(
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('getpositionui','getlist'),
				'users'=>array('@'),
			),
			array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions'=>array('admin','delete','create','update'),
				'users'=>array('admin'),
			),
			array('deny',  // deny all users
				'users'=>array('*'),
			),
		);
	}	
	
	public function actionGetPositionUI() 
	{
		$this->render('position_ui');
	}
	
	public function actionGetList() 
	{		
		$models = Position::model()->findAllByAttributes(array('valid'=>1));
		
		$list = '';
		
		foreach($models as $model)
		{
			if($list)
			{
				$list = $list.',{"value":"'.$model->uid.'","string":"'.$model->name.'"}';
			}
			else
			{
				$list = '{"value":"'.$model->uid.'","string":"'.$model->name.'"}';
			}
		}
		
		echo '{"result":"ok","url":"'.$_GET['r'].'","list":['.$list.']}';
		Yii::app()->end();		
	}
}
