<?php

class AuthController extends Controller
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
				'actions'=>array('initsystemauth','getroleauthaccordion'),
				'users'=>array('@'),
			),
		);
	}
	
	public function actionInitSystemAuth()
	{
		$auth = Yii::app()->authManager;
		
		$system_task = $auth->createTask('secondoffice-sysytem', Yii::t('Base', 'System Auth'));
		
		$auth->createOperation('secondoffice-sysytem-user-management', Yii::t('Base', 'User Management'));
		$auth->createOperation('secondoffice-sysytem-module-management', Yii::t('Base', 'Module Management'));
		$auth->createOperation('secondoffice-sysytem-config', Yii::t('Base', 'System Config'));
		
		$system_task->addChild('secondoffice-sysytem-user-management');
		$system_task->addChild('secondoffice-sysytem-module-management');
		$system_task->addChild('secondoffice-sysytem-config');
		
		
		$profile_task = $auth->createTask('secondoffice-profile', Yii::t('Base', 'Profile Auth'));
		
		$auth->createOperation('secondoffice-profile-data-management', Yii::t('Base', 'Data Management'));
		$auth->createOperation('secondoffice-profile-experience-management', Yii::t('Base', 'Experience Management'));
		
		$profile_task->addChild('secondoffice-profile-data-management');
		$profile_task->addChild('secondoffice-profile-experience-management');
	}
	
	/*	
	public function actionGetTaskList()
	{
		$tasks = Yii::app()->authManager->getTasks();
		$task_list = "";
						
		foreach($tasks as $task)
		{
			if($task_list)
			{
				$task_list= $task_list.',{
				"id":"'.str_replace(".", "_", $task->getName()).'",
				"name":"'.$task->getDescription().'"
				}';
			}
			else
			{
				$task_list= '{
				"id":"'.str_replace(".", "_", $task->getName()).'",
				"name":"'.$task->getDescription().'"
				}';
			}
		}
		
		echo '{"result":"ok","list":['.$task_list.']}';
		Yii::app()->end();
	}
	*/
	
	public function actionGetRoleAuthAccordion()
	{
		$output_data = "";
		$auth = Yii::app()->authManager;
		$tasks = $auth->getTasks();
		
		foreach($tasks as $task)
		{		
			$operations = $auth->getItemChildren($task->getName());
			
			$total_operations = count($operations);			
			$operation_num = 0;
			$operation_list = "";
			
			foreach($operations as $operation)
			{
				$flag = $operation_num % 3;
				$status = '';
				
				if($flag == 0) 	$operation_list = $operation_list."<tr>";
				
				if($auth->hasItemChild($_POST['id'], $operation->getName())) $status = "checked='checked'";
				$operation_list = $operation_list."<td><input type='checkbox' ".$status." data-name='".$operation->getName()."'>".$operation->getDescription()."</td>";
				
				if(($flag == 2) || ($operation_num == ($total_operations + 1))) $operation_list = $operation_list."</tr>";	
				
				$operation_num++;						
			}
			
			$output_data = "<div class='panel panel-default panel-bottom-10'><div class='panel-heading'><span class='accordion-toggle' data-toggle='collapse' data-parent='.item-accordion' href='#".$task->getName()."'>".$task->getDescription()."</span></div><div id='".$task->getName()."' class='panel-collapse collapse'><div class='panel-body'><table class='table navbar-right table-checklist table-list-3'><tr><th></th><th></th><th></th></tr>".$operation_list."</table></div></div></div>".$output_data;
		}
		
		echo '{"result":"ok","output":"'.$output_data.'"}';
		Yii::app()->end();
	}
}

?>