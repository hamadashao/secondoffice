<div id="panel-modulemanagement" class="panel panel-default panel-container">
	<div class="panel-heading"><?php echo Yii::t('Base', 'Module Management'); ?></div>
	<div class="panel-body modulemanagementui-list">
		<div class="col-sm-2">
			<ul class="nav nav-pills nav-stacked" data-flag="true">
  				<li data-toggle="panel" data-target="#modulemanagement-panel-item" data-panel="#panel-module" data-link="<?php echo Yii::app()->createUrl('module/getpanel'); ?>"><a><?php echo Yii::t('Base', 'Modules'); ?></a></li>
  				<li data-toggle="panel" data-target="#modulemanagement-panel-item" data-panel="#panel-workflow" data-link="<?php echo Yii::app()->createUrl('workflow/getpanel'); ?>"><a><?php echo Yii::t('Base', 'Workflows'); ?></a></li>
			</ul>
		</div> 
        <div id="modulemanagement-panel-item" class="col-sm-10"></div>      
    </div>
    <script>
	$(document).ready(function(){
		$('#panel-modulemanagement').find('[data-panel="#panel-module"]').trigger('click');
	});
	</script>  
</div>


