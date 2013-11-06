<?php


class ModuleController extends Controller
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
				'actions'=>array('getlist','getmanagementpanel','getpanel'),
				'users'=>array('@'),
			),
			array('deny',
				'users'=>array('*'),
			),
		);
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
		
		/*		
		$criteria = new CDbCriteria;
		
		$criteria->addSearchCondition('t.name', $filter, true, 'OR');
		$criteria->addSearchCondition('t.version', $filter, true, 'OR');
		$criteria->addSearchCondition('t.author', $filter, true, 'OR');
				
		$modules_num = Module::model()->count($criteria);
		
		if($page_num > 0) $criteria->limit	= $page_num;
		$criteria->offset 	= $page_num * ($page - 1);
		$criteria->order 	= $sort;		
		
		$modules = Module::model()->findAll($criteria);
		
		$module_list = "";
		
		foreach($modules as $module)		
		{
			$active_flag = Yii::t('Base', 'Yes');
			$install_flag = Yii::t('Base', 'Yes');
			
			if(!$module->active) $active_flag = Yii::t('Base', 'No');
			if(!$module->install) $install_flag = Yii::t('Base', 'No');
			
			$tool_config = '
					"toggle":"modal",
					"link":"'.Yii::app()->createUrl('user/geteditdialog').'",
					"target":"#modal-main",
					"modal":"#modal-useredit",
					"class":"glyphicon glyphicon-cog"
					 ';
					 
			$tool_install = '
					"toggle":"modal",
					"link":"'.Yii::app()->createUrl('user/getdeletedialog').'",
					"target":"#modal-main",
					"modal":"#modal-userdelete",
					"class":"glyphicon glyphicon-save"
					 ';
					 
			$tool_enable = '
					"toggle":"modal",
					"link":"'.Yii::app()->createUrl('user/getdeletedialog').'",
					"target":"#modal-main",
					"modal":"#modal-userdelete",
					"class":"glyphicon glyphicon-ok-sign"
					 ';
					 
			$tools = '{'.$tool_config.'},{'.$tool_install.'},{'.$tool_enable.'}';	
				
			if($module_list)
			{
				$module_list = $module_list.',{
				"id":"'.$module->uid.'",
				"data":["'.$module->name.'","'.$module->version.'","'.$module->author.'","'.$install_flag.'","'.$active_flag.'"]
				}';
			}
			else
			{
				$module_list = '{
				"id":"'.$module->uid.'",
				"data":["'.$module->name.'","'.$module->version.'","'.$module->author.'","'.$install_flag.'","'.$active_flag.'"]
				}';
			}
		}
		*/
		
		
			
		$module_list = "";	
		$modules_num = 0;
		
		foreach (glob(dirname(dirname(__FILE__)).'/modules/*', GLOB_ONLYDIR) as $moduleDirectory) 
		{
			$module = Yii::app()->getModule(basename($moduleDirectory));
			
			$tool_config = '
					"toggle":"modal",
					"link":"'.Yii::app()->createUrl($module->getID().'/default/getconfigdialog').'",
					"target":"#modal-main",
					"modal":"#modal-'.$module->getID().'config",
					"class":"glyphicon glyphicon-cog"
					 ';
					 
			$tool_install = '
					"toggle":"modal",
					"link":"'.Yii::app()->createUrl($module->getID().'/default/getinstalldialog').'",
					"target":"#modal-main",
					"modal":"#modal-'.$module->getID().'install",
					"class":"glyphicon glyphicon-save"
					 ';
					 
			$tool_enable = '
					"toggle":"modal",
					"link":"'.Yii::app()->createUrl($module->getID().'/default/getenabledialog').'",
					"target":"#modal-main",
					"modal":"#modal-'.$module->getID().'enable",
					"class":"glyphicon glyphicon-ok-sign"
					 ';
					 
			$tools = '{'.$tool_config.'},{'.$tool_install.'},{'.$tool_enable.'}';
			
			$active_flag = Yii::t('Base', 'Yes');
			$install_flag = Yii::t('Base', 'Yes');
			
			if(!$module->hasActive()) $active_flag = Yii::t('Base', 'No');
			if(!$module->hasInstall()) $install_flag = Yii::t('Base', 'No');
			
			if($module_list)
			{
				$module_list = $module_list.',{
				"id":"'.$module->getID().'",
				"tools":['.$tools.'],
				"data":["'.$module->getName().'","'.$module->getVersion().'","'.$module->getAuthor().'","'.$install_flag.'","'.$active_flag.'"]
				}';
			}
			else
			{
				$module_list = '{
				"id":"'.$module->getID().'",
				"tools":['.$tools.'],
				"data":["'.$module->getName().'","'.$module->getVersion().'","'.$module->getAuthor().'","'.$install_flag.'","'.$active_flag.'"]
				}';
			}
    	}
		
		echo '{"result":"ok","item_page":"'.$page.'","item_pagenum":"'.$page_num.'","item_num":"'.$modules_num.'","checkbox":"no","tools":[],"list":['.$module_list.']}';
		
		Yii::app()->end();
	}
	
	public function actionGetManagementPanel()
	{
		$this->render('management_panel');
	}
	
	public function actionGetPanel() 
	{
		$this->render('module_panel');
	}
}