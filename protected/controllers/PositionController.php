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
				'actions'=>array('getpanel','getdropdownlist','getlist','geteditdialog','getdeletedialog','getitemdata','deleteitem','saveitem'),
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
	
	public function actionGetPanel() 
	{
		$this->render('position_panel');
	}
	
	public function actionGetEditDialog()
	{
		$this->render('edit_dialog');
	}
	
	public function actionGetDeleteDialog()
	{
		$this->render('delete_dialog');
	}
	
	public function actionGetDropdownList() 
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
		
		echo '{"result":"ok","list":['.$list.']}';
		Yii::app()->end();		
	}
	
	public function actionGetList() 
	{		
		$filter = "";
		$page = 1;
		$page_num = intval($_POST['page_num']);
		$sort = "t.uid desc";
		
		if($_POST['filter']) 	$filter = $_POST['filter'];
		if($_POST['page']) 		$page = intval($_POST['page']);
		if($_POST['sort']) 		$sort = $_POST['sort'];
		
		
		$criteria = new CDbCriteria;
		
		$criteria->addSearchCondition('t.name', $filter, true, 'OR');
		
		$criteria->addcondition("t.valid = 1");
		
		$position_num = Position::model()->count($criteria);
		
		if($page_num > 0) $criteria->limit	= $page_num;
		$criteria->offset 	= $page_num * ($page - 1);
		$criteria->order 	= $sort;		
		
		$positions = Position::model()->findAll($criteria);
		
		$position_list = "";
		
		foreach($positions as $position)		
		{
			$tool_edit = 
					"data-toggle='modal' ".
					"data-link='".Yii::app()->createUrl('position/geteditdialog')."' ".
					"data-target='#modal-main' ".
					"data-modal='#modal-positionedit' ".
					"class='glyphicon glyphicon-pencil' ";
					 
			$tool_delete = 
					"data-toggle='modal' ".
					"data-link='".Yii::app()->createUrl('position/getdeletedialog')."' ".
					"data-target='#modal-main' ".
					"data-modal='#modal-positiondelete' ".
					"class='glyphicon glyphicon-remove' ";
					 
			$tools = '["'.$tool_edit.'","'.$tool_delete.'"]';
					
			if($position_list)
			{
				$position_list = $position_list.',{
				"id":"'.$position->uid.'",
				"data":["'.$position->name.'"]
				}';
			}
			else
			{
				$position_list = '{
				"id":"'.$position->uid.'",
				"data":["'.$position->name.'"]
				}';
			}
		}
		
		echo '{"result":"ok","item_page":"'.$page.'","item_pagenum":"'.$page_num.'","item_num":"'.$position_num.'","checkbox":"yes","tools":'.$tools.',"list":['.$position_list.']}';
		
		Yii::app()->end();
	}
	
	public function actionGetItemData()
	{
		if(isset($_POST['id']))
		{
			$model = Position::model()->findByPk($_POST['id']);
			
			if($model)
			{				
				echo '{"result":"ok","list":[
				{"data_name":"position_name","data_value":"'.$model->name.'"}]}';
			}
			else
			{
				echo '{"result":"fail"}';
			}			
		}
		
		Yii::app()->end();
	}
	
	public function actionDeleteItem()
	{	
		try 
		{	
			$item = explode(',', $_POST['id']);
			
			$execute_num = Position::model()->updateByPk( $item, array("valid"=>0));	
			if ( count($item) != $execute_num ) throw new Exception(Yii::t('Base', 'Delete departmnet fail, please contact administrator'));			
		}
		catch (Exception $e) 
		{
			echo '{"result":"fail","message":"'.$e->getMessage().'"}';			
			Yii::app()->end();
		}
		
		echo '{"result":"ok"}';
		Yii::app()->end();
	}
	
	public function actionSaveItem()
	{
		try 
		{
			$position = Position::model()->findByPk($_POST['id']);				
			if(!$position) 
			{
				$position = new Position;			
				$position->uid = uniqid('',true);
			}
		
			$position->name 		= $_POST['name'];
			
			if (!$position->save()) throw new Exception(Yii::t('Base', 'Save position fail, please contact administrator'));
			
			$auth_items = explode(',', $_POST['auth']);
			$auth 		= Yii::app()->authManager;
			
			if(!$auth->getAuthItem($position->uid)) $auth->createRole($position->uid, $position->name);
			
			$child_items = $auth->getItemChildren($position->uid);
			
			foreach($child_items as $child_item)
			{
				$auth->removeItemChild($position->uid, $child_item->getName());
			}
						
			foreach($auth_items as $auth_item)
			{
				if($auth_item) $auth->addItemChild($position->uid, $auth_item);				
			}
		}
		catch(Exception $e)
		{
			echo '{"result":"fail","message":"'.str_replace('"','',$e->getMessage()).'"}';			
			Yii::app()->end();
		}
		
		echo '{"result":"ok"}';
		Yii::app()->end();
	}
}
