<div id="panel-home" class="panel panel-default panel-container panel-noborder">
<?php
	$operation_num = 0;
	$total_operations = 0;
	
	echo '<table class="table-module"><thead><tr><th></th><th></th><th></th><th></th><th></th></tr></thead><tbody>';
	
	foreach (glob(Yii::app()->getModulePath().'/*', GLOB_ONLYDIR) as $moduleDirectory)
	{
		$module = Yii::app()->getModule(basename($moduleDirectory));
		
		if( $module->hasActive() && $module->checkModuleAccess() )
		{			
			$flag = $operation_num % 5;
				
			if($flag == 0) 	echo "<tr>";
			
			echo '<td align="center">'.
				 '<div class="table-module-item">'.
				 '<div class="table-module-item-icon" style="background:url(images/'.$module->getIcon().') no-repeat bottom left;" data-toggle="panel" data-link="'.Yii::app()->createUrl($module->getID().'/default/getpanel').'" data-target="#container-main" data-panel="#panel-module-'.$module->getID().'" ><span class="badge"></span></div>'.
				 '<span class="table-module-item-name">'.$module->getName().'</span>'.
				 '</div>'.
			     '</td>';
			
				
			if(($flag == 4) || ($operation_num == ($total_operations + 1))) echo "</tr>";	
				
			$operation_num++;
		}
	}
	
	echo '</tbody></table>';
?>
</div>