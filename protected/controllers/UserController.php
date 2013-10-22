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
				'actions'=>array('logout','changepassword','getusermanagementpanel','getuserpanel','getusereditdialog','getuserdeletedialog','getuserdata','getuserlist'),
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

	/**
	 * Displays a particular model.
	 * @param integer $id the ID of the model to be displayed
	 */
	public function actionView($id)
	{
		$this->render('view',array(
			'model'=>$this->loadModel($id),
		));
	}

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate()
	{
		$model=new User;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['User']))
		{
			$model->attributes=$_POST['User'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->uid));
		}

		$this->render('create',array(
			'model'=>$model,
		));
	}

	/**
	 * Updates a particular model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 * @param integer $id the ID of the model to be updated
	 */
	public function actionUpdate($id)
	{
		$model=$this->loadModel($id);

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['User']))
		{
			$model->attributes=$_POST['User'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->uid));
		}

		$this->render('update',array(
			'model'=>$model,
		));
	}

	/**
	 * Deletes a particular model.
	 * If deletion is successful, the browser will be redirected to the 'admin' page.
	 * @param integer $id the ID of the model to be deleted
	 */
	public function actionDelete($id)
	{
		if(Yii::app()->request->isPostRequest)
		{
			// we only allow deletion via POST request
			$this->loadModel($id)->delete();

			// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
			if(!isset($_GET['ajax']))
				$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
		}
		else
			throw new CHttpException(400,'Invalid request. Please do not repeat this request again.');
	}

	/**
	 * Lists all models.
	 */
	public function actionIndex()
	{
		$dataProvider=new CActiveDataProvider('User');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new User('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['User']))
			$model->attributes=$_GET['User'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer the ID of the model to be loaded
	 */
	public function loadModel($id)
	{
		$model=User::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param CModel the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='user-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
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
	
	public function actionChangePassword()
	{
		if(!(isset($_POST['old_password'])) || !(isset($_POST['new_password'])) )
		{
			echo '{"result":"fail"}';
			Yii::app()->end();
		}

		$user = User::model()->findByPk(Yii::app()->user->id);
		
		if($user->password != md5($_POST['old_password'].$user->password_salt))
		{
			echo '{"result":"fail"}';
			Yii::app()->end();
		}
		
		$user->password = md5($_POST['new_password'].$user->password_salt);
		$user->save();
		
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
				{"data_name":"name","data_value":"'.$model->name.'"},
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
		$sort = "";
		
		if(isset($_POST['filter'])) 	$filter = $_POST['filter'];
		if(isset($_POST['page'])) 		$page = intval($_POST['page']);
		if(isset($_POST['page_num'])) 	$page_num = intval($_POST['page_num']);
		if(isset($_POST['sort'])) 		$sort = $_POST['sort'];
		
		
		$criteria = new CDbCriteria;
		$criteria->with  = array('department','position','group');
		$criteria->together = true;
		
		$criteria->addSearchCondition('t.name', $filter, true, 'OR');
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
				"name":"'.$user->name.'",
				"user_name":"'.$user->user_name.'",
				"department":"'.$department_name.'",
				"position":"'.$position_name.'",
				"group":"'.$group_name.'"
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
				"name":"'.$user->name.'",
				"user_name":"'.$user->user_name.'",
				"department":"'.$department_name.'",
				"position":"'.$position_name.'",
				"group":"'.$group_name.'"
				}';
			}
		}
		
		echo '{"result":"ok","item_page":"'.$page.'","item_pagenum":"'.$page_num.'","item_num":"'.$users_num.'","list":['.$user_list.']}';
		
		Yii::app()->end();
	}
}
