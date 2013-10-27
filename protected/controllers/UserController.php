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
				'actions'=>array('logout','changepassword','getusermanagementpanel','getuserpanel','getusereditdialog','getuserdeletedialog','getchangeownpassworddialog','getlogoutdialog','getuserdata','getuserlist','changeownpassword','saveuser','deleteuser'),
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
	
	public function actionGetUserManagementPanel() 
	{
		$this->render('usermanagement');
	}
	
	public function actionGetUserPanel() 
	{
		$this->render('user');
	}
	
	public function actionGetUserEditDialog()
	{
		$this->render('useredit');
	}
	
	public function actionGetUserDeleteDialog()
	{
		$this->render('userdelete');
	}
	
	public function actionGetUserData()
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
	
	public function actionGetUserList()
	{
		$filter = "";
		$page = 1;
		$page_num = 10;
		$sort = "t.uid desc";
		
		if($_POST['filter']) 	$filter = $_POST['filter'];
		if($_POST['page']) 		$page = intval($_POST['page']);
		if($_POST['page_num']) 	$page_num = intval($_POST['page_num']);
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
		
		
			if($user_list)
			{
				$user_list = $user_list.',{
				"id":"'.$user->uid.'",
				"modal_edit":"#modal-useredit",
				"modal_delete":"#modal-userdelete",
				"link_edit":"'.Yii::app()->createUrl('user/getusereditdialog').'",
				"link_delete":"'.Yii::app()->createUrl('user/getuserdeletedialog').'",
				"target":"#modal-main",
				"data":["'.$user->user_name.'","'.$user->real_name.'","'.$department_name.'","'.$position_name.'","'.$group_name.'"]
				}';
			}
			else
			{
				$user_list = '{
				"id":"'.$user->uid.'",
				"modal_edit":"#modal-useredit",
				"modal_delete":"#modal-userdelete",
				"link_edit":"'.Yii::app()->createUrl('user/getusereditdialog').'",
				"link_delete":"'.Yii::app()->createUrl('user/getuserdeletedialog').'",
				"target":"#modal-main",
				"data":["'.$user->user_name.'","'.$user->real_name.'","'.$department_name.'","'.$position_name.'","'.$group_name.'"]
				}';
			}
		}
		
		echo '{"result":"ok","item_page":"'.$page.'","item_pagenum":"'.$page_num.'","item_num":"'.$users_num.'","list":['.$user_list.']}';
		
		Yii::app()->end();
	}
	
	public function actionGetChangeOwnPasswordDialog()
	{
		$this->layout='//layouts/column_ajax';
		$this->render('changeownpassword');
	}
	
	public function actionGetLogoutDialog()
	{
		$this->layout='//layouts/column_ajax';
		$this->render('logout');
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
	
	public function actionSaveUser()
	{
		$transaction = Yii::app()->db->beginTransaction();
			
		try 
		{
			$criteria = new CDbCriteria;
			
			$criteria->addcondition("t.uid != '".$_POST['id']."'");
			$criteria->addcondition("(t.real_name = '".$_POST['realname']."' OR t.user_name = '".$_POST['username']."')");
			$criteria->addcondition("t.valid = 1");
			
			$user_num = User::model()->count($criteria);
			if($user_num > 0) throw new Exception(Yii::t('Base', 'User name or real name duplicate'));
		
			$user = User::model()->findByPk($_POST['id']);				
			if(!$user) $user = new User;
			
			$user->uid = uniqid('',true);	
			$user->real_name = $_POST['realname'];
			$user->user_name = $_POST['username'];
			if(strlen($_POST['password'])) $user->password = md5($_POST['password'].$user->password_salt);
			if (!$user->save()) throw new Exception(Yii::t('Base', 'Save user data fail, please contact administrator'));
				
			$userdepartmentposition = UserDepartmentPosition::model()->findByAttributes(array('user_uid'=>$user->uid));
			if(!$userdepartmentposition) $userdepartmentposition = new UserDepartmentPosition;
				
			$userdepartmentposition->user_uid = $user->uid;
			$userdepartmentposition->department_uid = $_POST['department'];
			$userdepartmentposition->position_uid = $_POST['position'];
			if (!$userdepartmentposition->save()) throw new Exception(Yii::t('Base', 'Save user department position relation fail, please contact administrator'));
				
			$usergroup = UserGroup::model()->findByAttributes(array('user_uid'=>$user->uid));
			if(!$usergroup) $usergroup = new UserGroup;
				
			$usergroup->user_uid = $user->uid;
			$usergroup->group_uid = $_POST['group'];
			if (!$usergroup->save()) throw new Exception(Yii::t('Base', 'Save user group relation fail, please contact administrator'));
				
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
	
	public function actionDeleteUser()
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
