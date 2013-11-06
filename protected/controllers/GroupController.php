<?php

class GroupController extends Controller
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
			array('deny',  // deny all users
				'users'=>array('*'),
			),
		);
	}	
	
	public function actionGetPanel() 
	{
		$this->render('group_panel');
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
		$models = Group::model()->findAllByAttributes(array('valid'=>1));
		
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
		
		$group_num = Group::model()->count($criteria);
		
		if($page_num > 0) $criteria->limit	= $page_num;
		$criteria->offset 	= $page_num * ($page - 1);
		$criteria->order 	= $sort;		
		
		$groups = Group::model()->findAll($criteria);
		
		$group_list = "";
		
		foreach($groups as $group)		
		{
			$tool_edit = '
					"toggle":"modal",
					"link":"'.Yii::app()->createUrl('group/geteditdialog').'",
					"target":"#modal-main",
					"modal":"#modal-groupedit",
					"class":"glyphicon glyphicon-pencil"
					 ';
					 
			$tool_delete = '
					"toggle":"modal",
					"link":"'.Yii::app()->createUrl('group/getdeletedialog').'",
					"target":"#modal-main",
					"modal":"#modal-groupdelete",
					"class":"glyphicon glyphicon-remove"
					 ';
					 
			$tools = '{'.$tool_edit.'},{'.$tool_delete.'}';	
					
			if($group_list)
			{
				$group_list = $group_list.',{
				"id":"'.$group->uid.'",
				"data":["'.$group->name.'"]
				}';
			}
			else
			{
				$group_list = '{
				"id":"'.$group->uid.'",
				"data":["'.$group->name.'"]
				}';
			}
		}
		
		echo '{"result":"ok","item_page":"'.$page.'","item_pagenum":"'.$page_num.'","item_num":"'.$group_num.'","checkbox":"yes","tools":['.$tools.'],"list":['.$group_list.']}';
		
		Yii::app()->end();
	}
	
	public function actionGetItemData()
	{
		if(isset($_POST['id']))
		{
			$model = Group::model()->findByPk($_POST['id']);
			
			if($model)
			{				
				echo '{"result":"ok","list":[
				{"data_name":"group_name","data_value":"'.$model->name.'"}]}';
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
			
			$execute_num = Group::model()->updateByPk( $item, array("valid"=>0));	
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
			$group = Group::model()->findByPk($_POST['id']);				
			if(!$group) 
			{
				$group = new Group;			
				$group->uid = uniqid('',true);
			}
		
			$group->name 		= $_POST['name'];
			
			if (!$group->save()) throw new Exception(Yii::t('Base', 'Save group fail, please contact administrator'));
			
			$auth_items = explode(',', $_POST['auth']);
			$auth 		= Yii::app()->authManager;
			
			if(!$auth->getAuthItem($group->uid)) $auth->createRole($group->uid, $group->name);
			
			$child_items = $auth->getItemChildren($group->uid);
			
			foreach($child_items as $child_item)
			{
				$auth->removeItemChild($group->uid, $child_item->getName());
			}
						
			foreach($auth_items as $auth_item)
			{
				if($auth_item) $auth->addItemChild($group->uid, $auth_item);				
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
