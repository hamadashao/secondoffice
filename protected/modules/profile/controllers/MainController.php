<?php

class MainController extends Controller
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
				'actions'=>array('getstaffpanel','getreservepanel','getstafflist'),
				'users'=>array('@'),
			),
			array('deny',  // deny all users
				'users'=>array('*'),
			),
		);
	}	
	
	public function actionGetStaffPanel() 
	{
		$this->render('staff_panel');
	}
	
	public function actionGetReservePanel() 
	{
		$this->render('reserve_panel');
	}
	
	public function actionGetStaffList() 
	{
		$filter = "";
		$condition = "";
		$items = "";
		$page = 1;
		$page_num = intval($_POST['page_num']);
		$sort = "t.uid desc";
		
		if($_POST['items']) 	$items = $_POST['items'];
		if($_POST['filter']) 	$filter = $_POST['filter'];
		if($_POST['condition']) $condition = $_POST['condition'];
		if($_POST['page']) 		$page = intval($_POST['page']);
		if($_POST['sort']) 		$sort = $_POST['sort'];
		
		
		$criteria = new CDbCriteria;
		$criteria->with  = array('career','companyrecord','user');
		$criteria->together = true;
		
		//$criteria->addSearchCondition('t.real_name', $filter, true, 'OR');
		//$criteria->addSearchCondition('t.user_name', $filter, true, 'OR');
		//$criteria->addSearchCondition('department.name', $filter, true, 'OR');
		//$criteria->addSearchCondition('position.name', $filter, true, 'OR');
		//$criteria->addSearchCondition('group.name', $filter, true, 'OR');
		
		$criteria->addcondition("user.valid = 1");
		
		$items_num = Profile::model()->count($criteria);
		
		if($page_num > 0) $criteria->limit	= $page_num;
		$criteria->offset 	= $page_num * ($page - 1);
		$criteria->order 	= $sort;
		
		$tool_view = 
					"data-toggle='modal' ".
					"data-link='".Yii::app()->createUrl('profile/main/getviewdialog')."' ".
					"data-target='#modal-main' ".
					"data-modal='#modal-profileview' ".
					"class='glyphicon glyphicon-search' ";
					 
		$tool_edit = 
					"data-toggle='modal' ".
					"data-link='".Yii::app()->createUrl('profile/main/geteditdialog')."' ".
					"data-target='#modal-main' ".
					"data-modal='#modal-profileedit' ".
					"class='glyphicon glyphicon-pencil' ";
					 
		$tools = '["'.$tool_view.'","'.$tool_edit.'"]';
					
		$user_list = "";		
		
		echo '{"result":"ok","item_page":"'.$page.'","item_pagenum":"'.$page_num.'","item_num":"'.$items_num.'","checkbox":"yes","tools":'.$tools.',"list":['.$user_list.']}';
		Yii::app()->end();
	}
}