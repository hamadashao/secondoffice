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
			
		$module_list = "";	
		$modules_num = 0;
		
		foreach (glob(dirname(dirname(__FILE__)).'/modules/*', GLOB_ONLYDIR) as $moduleDirectory)
		{
			$module = Yii::app()->getModule(basename($moduleDirectory));
			
			$tool_config = 
					"data-toggle='modal' ".
					"data-link='".Yii::app()->createUrl($module->getID().'/default/getconfigdialog')."' ".
					"data-target='#modal-main' ".
					"data-modal='#modal-".$module->getID()."config' ".
					"class='glyphicon glyphicon-cog' ";
					 
			$tool_install = 
					"data-toggle='click.trigger' ".
					"data-trigger='".Yii::app()->createUrl($module->getID().'/default/changeinstallstatus')."' ".
					"data-target='body' ".
					"data-event='changemodulestatus.secondoffice.system' ".
					"class='glyphicon glyphicon-save' ";
					 
			$tool_enable = 
					"data-toggle='click.trigger' ".
					"data-trigger='".Yii::app()->createUrl($module->getID().'/default/changeactivestatus')."' ".
					"data-target='body' ".
					"data-event='changemodulestatus.secondoffice.system' ".
					"class='glyphicon glyphicon-ok-sign' ";
					 
			$tools = '["'.$tool_config.'","'.$tool_install.'","'.$tool_enable.'"]';
			
			$active_flag = Yii::t('Base', 'Yes');
			$install_flag = Yii::t('Base', 'Yes');
			
			if(!$module->hasActive()) $active_flag = Yii::t('Base', 'No');
			if(!$module->hasInstall()) $install_flag = Yii::t('Base', 'No');
			
			if($module_list)
			{
				$module_list = $module_list.',{
				"id":"'.$module->getID().'",
				"tools":'.$tools.',
				"data":["'.$module->getName().'","'.$module->getVersion().'","'.$module->getAuthor().'","'.$install_flag.'","'.$active_flag.'"]
				}';
			}
			else
			{
				$module_list = '{
				"id":"'.$module->getID().'",
				"tools":'.$tools.',
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