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
				'actions'=>array('logout','changepassword','getusermanagementui','getuserui','getuserdata'),
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
	
	public function actionGetUserManagementUI() 
	{
		$this->render('management_ui');
	}
	
	public function actionGetUserUI() 
	{
		$this->render('user_ui');
	}
	
	public function actionGetUserData()
	{
		if(isset($_POST['id']))
		{
		/*
			if(!$_POST['id'])
			{
				echo '{"result":"fail"}';		
				Yii::app()->end();
			}
			else
			{
				echo '{"result":"'.$_POST['id'].'"}';		
				Yii::app()->end();
			}
			*/
			$model = User::model()->findByPk($_POST['id']);
			if($model)
			{
				echo '{"result":"ok","url":"'.$_GET['r'].'","list":[{"data_name":"name","data_value":"'.$model->name.'"},{"data_name":"user_name","data_value":"'.$model->user_name.'"}]}';
			}
			else
			{
				echo '{"result":"fail"}';
			}			
		}
		
		Yii::app()->end();
	}
}
