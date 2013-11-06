<?php

class DepartmentController extends Controller
{

	/**
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 * using two-column layout. See 'protected/views/layouts/column2.php'.
	 */
	public $layout='//layouts/column2';

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
			array('allow',  // allow all users to perform 'index' and 'view' actions
				'actions'=>array('index','view'),
				'users'=>array('*'),
			),
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('create','update','getpanel','geteditdialog','getlist','getdropdownlist','getitemdata','getdeletedialog','deleteitem','saveitem'),
				'users'=>array('@'),
			),
			array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions'=>array('admin','delete'),
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
		$model=new Department;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Department']))
		{
			$model->attributes=$_POST['Department'];
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

		if(isset($_POST['Department']))
		{
			$model->attributes=$_POST['Department'];
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
		$dataProvider=new CActiveDataProvider('Department');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new Department('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Department']))
			$model->attributes=$_GET['Department'];

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
		$model=Department::model()->findByPk($id);
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
		if(isset($_POST['ajax']) && $_POST['ajax']==='department-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
	
	public function actionGetPanel() 
	{
		$this->render('department_panel');
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
		$criteria = new CDbCriteria;
		
		$criteria->addcondition("t.valid = 1");
		$criteria->addcondition("t.uid != '".$_POST['filter']."'");
		
		$models = Department::model()->findAll($criteria);
		
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
		$criteria->with  = array('parent','user');
		$criteria->together = true;
		
		$criteria->addSearchCondition('t.name', $filter, true, 'OR');
		$criteria->addSearchCondition('parent.name', $filter, true, 'OR');
		$criteria->addSearchCondition('user.real_name', $filter, true, 'OR');
		
		$criteria->addcondition("t.valid = 1");
		
		$departments_num = Department::model()->count($criteria);
		
		if($page_num > 0) $criteria->limit	= $page_num;
		$criteria->offset 	= $page_num * ($page - 1);
		$criteria->order 	= $sort;		
		
		$departments = Department::model()->findAll($criteria);
		
		$department_list = "";
		
		foreach($departments as $department)		
		{
			$parent_name = "";
			$manager_name = "";
			
			if($department->parent) $parent_name = $department->parent->name;
			if($department->user) $manager_name = $department->user->real_name;
			
			$tool_edit = '
					"toggle":"modal",
					"link":"'.Yii::app()->createUrl('department/geteditdialog').'",
					"target":"#modal-main",
					"modal":"#modal-departmentedit",
					"class":"glyphicon glyphicon-pencil"
					 ';
					 
			$tool_delete = '
					"toggle":"modal",
					"link":"'.Yii::app()->createUrl('department/getdeletedialog').'",
					"target":"#modal-main",
					"modal":"#modal-departmentdelete",
					"class":"glyphicon glyphicon-remove"
					 ';
					 
			$tools = '{'.$tool_edit.'},{'.$tool_delete.'}';	
		
		
			if($department_list)
			{
				$department_list = $department_list.',{
				"id":"'.$department->uid.'",
				"data":["'.$department->name.'","'.$parent_name.'","'.$manager_name.'"]
				}';
			}
			else
			{
				$department_list = '{
				"id":"'.$department->uid.'",
				"data":["'.$department->name.'","'.$parent_name.'","'.$manager_name.'"]
				}';
			}
		}
		
		echo '{"result":"ok","item_page":"'.$page.'","item_pagenum":"'.$page_num.'","item_num":"'.$departments_num.'","checkbox":"yes","tools":['.$tools.'],"list":['.$department_list.']}';
		
		Yii::app()->end();
	}
	
	public function actionGetItemData()
	{
		if(isset($_POST['id']))
		{
			$model = Department::model()->findByPk($_POST['id']);
			
			if($model)
			{
				$parent_name = "";
				$manager_name = "";
				$parent_uid = "";
				$manager_uid = "";
			
				if($model->parent) 
				{
					$parent_name = $model->parent->name;
					$parent_uid = $model->parent->uid;
				}
				
				if($model->user) 
				{
					$manager_name = $model->user->real_name;
					$manager_uid = $model->user->uid;
				}
				
				echo '{"result":"ok","list":[
				{"data_name":"department_name","data_value":"'.$model->name.'"},
				{"data_name":"parent_id","data_value":"'.$parent_uid.'"},
				{"data_name":"parent_name","data_value":"'.$parent_name.'"},
				{"data_name":"manager_id","data_value":"'.$manager_uid.'"},
				{"data_name":"manager_name","data_value":"'.$manager_name.'"}]}';
			}
			else
			{
				echo '{"result":"fail"}';
			}			
		}
		
		Yii::app()->end();
	}
	
	public function actionSaveItem()
	{
		try 
		{
			$department = Department::model()->findByPk($_POST['id']);				
			if(!$department) 
			{
				$department = new Department;			
				$department->uid = uniqid('',true);
			}
		
			$department->name 		= $_POST['name'];
			$department->parentuid 	= $_POST['parent'];
			$department->manageruid = $_POST['manager'];
			
			if (!$department->save()) throw new Exception(Yii::t('Base', 'Save department fail, please contact administrator'));
			
			$auth_items = explode(',', $_POST['auth']);
			$auth 		= Yii::app()->authManager;
			
			if(!$auth->getAuthItem($department->uid)) $auth->createRole($department->uid, $department->name);
			
			$child_items = $auth->getItemChildren($department->uid);
			
			foreach($child_items as $child_item)
			{
				$auth->removeItemChild($department->uid, $child_item->getName());
			}
						
			foreach($auth_items as $auth_item)
			{
				if($auth_item) $auth->addItemChild($department->uid, $auth_item);				
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
	
	public function actionDeleteItem()
	{	
		try 
		{	
			$item = explode(',', $_POST['id']);
			
			$execute_num = Department::model()->updateByPk( $item, array("valid"=>0));	
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
}
