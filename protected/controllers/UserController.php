<?php

class UserController extends Controller
{
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
			array('allow',  // allow all users to perform 'index' and 'view' actions
				'actions'=>array('signin'),
				'users'=>array('*'),
			),
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('logout','getchangeownpassworddialog','getlogoutdialog','getdropdownlist','changeownpassword'),
				'users'=>array('@'),
			),
			
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('getmanagementpanel','getpanel','geteditdialog','getdeletedialog','getitemdata','getlist','saveitem','deleteitem'),
				'expression'=>'Yii::app()->user->checkAccess("secondoffice-sysytem-user-management")',
			),
			array('deny',  // deny all users
				'users'=>array('*'),
			),
		);
	}
	
	public function actionSignin()
	{
		if(!(isset($_POST['name'])) || !(isset($_POST['password'])) )
		{
			echo '{"result":"fail"}';
			Yii::app()->end();
		}
		
		$identity = new UserIdentity($_POST['name'],$_POST['password']);
		$identity->authenticate();
		
		
		if($identity->errorCode===UserIdentity::ERROR_NONE)
		{			
			Yii::app()->user->login($identity);
			Yii::log('user signin', CLogger::LEVEL_INFO, 'event.signin');
			
			echo '{"result":"ok"}';
		}
		else
		{
			echo '{"result":"fail"}';
		}
		
		Yii::app()->end();
	}
	
	public function actionLogout()
	{
		Yii::app()->user->logout();	
		
		echo '{"result":"ok"}';		
		Yii::app()->end();
	}	
	
	public function actionGetManagementPanel() 
	{
		$this->render('management_panel');
	}
	
	public function actionGetPanel() 
	{
		$this->render('user_panel');
	}
	
	public function actionGetEditDialog()
	{
		$this->render('edit_dialog');
	}
	
	public function actionGetDeleteDialog()
	{
		$this->render('delete_dialog');
	}
	
	public function actionGetItemData()
	{
		if(isset($_POST['id']))
		{
			$model = User::model()->findByPk($_POST['id']);
			
			if($model)
			{
				$department_name = "";
				$position_name = "";
				$group_name = "";
				$department_uid = "";
				$position_uid = "";
				$group_uid = "";
			
				if($model->department) 
				{
					$department_name = $model->department[0]->name;
					$department_uid = $model->department[0]->uid;
				}
				
				if($model->position) 
				{
					$position_name = $model->position[0]->name;
					$position_uid = $model->position[0]->uid;
				}
				if($model->group) 
				{
					$group_name = $model->group[0]->name;
					$group_uid = $model->group[0]->uid;
				}
			
				echo '{"result":"ok","list":[
				{"data_name":"real_name","data_value":"'.$model->real_name.'"},
				{"data_name":"user_name","data_value":"'.$model->user_name.'"},
				{"data_name":"department_id","data_value":"'.$department_uid.'"},
				{"data_name":"department_name","data_value":"'.$department_name.'"},
				{"data_name":"position_id","data_value":"'.$position_uid.'"},
				{"data_name":"position_name","data_value":"'.$position_name.'"},
				{"data_name":"group_id","data_value":"'.$group_uid.'"},
				{"data_name":"group_name","data_value":"'.$group_name.'"}]}';
			}
			else
			{
				echo '{"result":"fail"}';
			}			
		}
		
		Yii::app()->end();
	}
	
	public function actionGetDropdownList()
	{
		$models = User::model()->findAllByAttributes(array('valid'=>1));
		
		$list = '';
		
		foreach($models as $model)
		{
			if($list)
			{
				$list = $list.',{"value":"'.$model->uid.'","string":"'.$model->real_name.'('.$model->user_name.')"}';
			}
			else
			{
				$list = '{"value":"'.$model->uid.'","string":"'.$model->real_name.'('.$model->user_name.')"}';
			}
		}
		
		echo '{"result":"ok","list":['.$list.']}';
		Yii::app()->end();	
	}
	
	public function actionGetList()
	{
		$filter = "";
		$page = 1;
		$page_num = $page_num = intval($_POST['page_num']);
		$sort = "t.uid desc";
		
		if($_POST['filter']) 	$filter = $_POST['filter'];
		if($_POST['page']) 		$page = intval($_POST['page']);
		if($_POST['sort']) 		$sort = $_POST['sort'];
		
		
		$criteria = new CDbCriteria;
		$criteria->with  = array('department','position','group');
		$criteria->together = true;
		
		$criteria->addSearchCondition('t.real_name', $filter, true, 'OR');
		$criteria->addSearchCondition('t.user_name', $filter, true, 'OR');
		$criteria->addSearchCondition('department.name', $filter, true, 'OR');
		$criteria->addSearchCondition('position.name', $filter, true, 'OR');
		$criteria->addSearchCondition('group.name', $filter, true, 'OR');
		
		$criteria->addcondition("t.valid = 1");
		
		$users_num = User::model()->count($criteria);
		
		if($page_num > 0) $criteria->limit	= $page_num;
		$criteria->offset 	= $page_num * ($page - 1);
		$criteria->order 	= $sort;		
		
		$users = User::model()->findAll($criteria);
		
		$user_list = "";
		
		foreach($users as $user)		
		{
			$department_name = "";
			$position_name = "";
			$group_name = "";
			
			if($user->department) $department_name = $user->department[0]->name;
			if($user->position) $position_name = $user->position[0]->name;
			if($user->group) $group_name = $user->group[0]->name;
			
			$tool_edit = 
					"data-toggle='modal' ".
					"data-link='".Yii::app()->createUrl('user/geteditdialog')."' ".
					"data-target='#modal-main' ".
					"data-modal='#modal-useredit' ".
					"class='glyphicon glyphicon-pencil' ";
					 
			$tool_delete = 
					"data-toggle='modal' ".
					"data-link='".Yii::app()->createUrl('user/getdeletedialog')."' ".
					"data-target='#modal-main' ".
					"data-modal='#modal-userdelete' ".
					"class='glyphicon glyphicon-remove' ";
					 
			$tools = '["'.$tool_edit.'","'.$tool_delete.'"]';		
		
			if($user_list)
			{
				$user_list = $user_list.',{
				"id":"'.$user->uid.'",
				"data":["'.$user->user_name.'","'.$user->real_name.'","'.$department_name.'","'.$position_name.'","'.$group_name.'"]
				}';
			}
			else
			{
				$user_list = '{
				"id":"'.$user->uid.'",
				"data":["'.$user->user_name.'","'.$user->real_name.'","'.$department_name.'","'.$position_name.'","'.$group_name.'"]
				}';
			}
		}
		
		echo '{"result":"ok","item_page":"'.$page.'","item_pagenum":"'.$page_num.'","item_num":"'.$users_num.'","checkbox":"yes","tools":'.$tools.',"list":['.$user_list.']}';
		
		Yii::app()->end();
	}
	
	public function actionGetChangeOwnPasswordDialog()
	{
		$this->layout='//layouts/column_ajax';
		$this->render('changeownpassword_dialog');
	}
	
	public function actionGetLogoutDialog()
	{
		$this->layout='//layouts/column_ajax';
		$this->render('logout_dialog');
	}
	
	public function actionChangeOwnPassword()
	{
		if(!(isset($_POST['oldpass'])) || !(isset($_POST['newpass'])) )
		{
			echo '{"result":"fail"}';
			Yii::app()->end();
		}

		$user = User::model()->findByPk(Yii::app()->user->id);
		
		if($user->password != md5($_POST['oldpass'].$user->password_salt))
		{
			echo '{"result":"fail"}';
			Yii::app()->end();
		}
		
		$user->password = md5($_POST['newpass'].$user->password_salt);
		$user->save();
		
		echo '{"result":"ok"}';		
		Yii::app()->end();
	}
	
	public function actionSaveItem()
	{
		$transaction = Yii::app()->db->beginTransaction();
			
		try 
		{
			$old_department_uid = "";
			$old_position_uid 	= "";
			$old_group_uid 		= "";
			
			
			$criteria = new CDbCriteria;
			
			$criteria->addcondition("t.uid != '".$_POST['id']."'");
			$criteria->addcondition("(t.real_name = '".$_POST['realname']."' OR t.user_name = '".$_POST['username']."')");
			$criteria->addcondition("t.valid = 1");
			
			$user_num = User::model()->count($criteria);
			if($user_num > 0) throw new Exception(Yii::t('Base', 'User name or real name duplicate'));
		
			$user = User::model()->findByPk($_POST['id']);				
			if(!$user) 
			{
				$user = new User;			
				$user->uid = uniqid('',true);
			}	
			$user->real_name = $_POST['realname'];
			$user->user_name = $_POST['username'];
			if(strlen($_POST['password'])) $user->password = md5($_POST['password'].$user->password_salt);
			if (!$user->save()) throw new Exception(Yii::t('Base', 'Save user data fail, please contact administrator'));
				
			$userdepartmentposition = UserDepartmentPosition::model()->findByAttributes(array('user_uid'=>$user->uid));
			if(!$userdepartmentposition) $userdepartmentposition = new UserDepartmentPosition;
			
			$old_department_uid = $userdepartmentposition->department_uid;
			$old_position_uid 	= $userdepartmentposition->position_uid;
				
			$userdepartmentposition->user_uid = $user->uid;
			$userdepartmentposition->department_uid = $_POST['department'];
			$userdepartmentposition->position_uid = $_POST['position'];
			if (!$userdepartmentposition->save()) throw new Exception(Yii::t('Base', 'Save user department position relation fail, please contact administrator'));
				
			$usergroup = UserGroup::model()->findByAttributes(array('user_uid'=>$user->uid));
			if(!$usergroup) $usergroup = new UserGroup;
			
			$old_group_uid 	= $usergroup->group_uid;
				
			$usergroup->user_uid = $user->uid;
			$usergroup->group_uid = $_POST['group'];
			if (!$usergroup->save()) throw new Exception(Yii::t('Base', 'Save user group relation fail, please contact administrator'));			
			
			$auth = Yii::app()->authManager;
			
			if($auth->getAuthItem($old_department_uid)) $auth->revoke($old_department_uid, $user->uid);
			if($auth->getAuthItem($old_position_uid)) $auth->revoke($old_position_uid, $user->uid);
			if($auth->getAuthItem($old_group_uid)) $auth->revoke($old_group_uid, $user->uid);
			
			$auth->assign($userdepartmentposition->department_uid, $user->uid);
			$auth->assign($userdepartmentposition->position_uid, $user->uid);
			$auth->assign($usergroup->group_uid, $user->uid);		
			
			$transaction->commit();	
		} 
		catch (Exception $e) 
		{
     		$transaction->rollback();
				
			echo '{"result":"fail","message":"'.$e->getMessage().'"}';			
			Yii::app()->end();
		}
	
		echo '{"result":"ok"}';			
		Yii::app()->end();
	}
	
	public function actionDeleteItem()
	{	
		try 
		{	
			$item = explode(',', $_POST['id']);
			
			$execute_num = User::model()->updateByPk( $item, array("valid"=>0));	
			if ( count($item) != $execute_num ) throw new Exception(Yii::t('Base', 'Delete user fail, please contact administrator'));			
		}
		catch (Exception $e) 
		{
			echo '{"result":"fail","message":"'.$e->getMessage().'"}';
			Yii::app()->end();
		}
		
		echo '{"result":"ok"}';
		Yii::app()->end();
	}
}
