<div id="panel-usermanagement" class="panel panel-default panel-container">
	<div class="panel-heading"><?php echo Yii::t('Base', 'User Management'); ?></div>
	<div class="panel-body usermanagementui-list">
		<div class="col-sm-2">
			<ul class="nav nav-pills nav-stacked" data-flag="true">
  				<li data-toggle="panel" data-target="#usermanagement-panel-item" data-panel="#panel-user" data-link="<?php echo Yii::app()->createUrl('user/getpanel'); ?>"><a><?php echo Yii::t('Base', 'Users'); ?></a></li>
  				<li data-toggle="panel" data-target="#usermanagement-panel-item" data-panel="#panel-department" data-link="<?php echo Yii::app()->createUrl('department/getpanel'); ?>"><a><?php echo Yii::t('Base', 'Departments'); ?></a></li>
  				<li data-toggle="panel" data-target="#usermanagement-panel-item" data-panel="#panel-position" data-link="<?php echo Yii::app()->createUrl('position/getpanel'); ?>"><a><?php echo Yii::t('Base', 'Positions'); ?></a></li>
                <li data-toggle="panel" data-target="#usermanagement-panel-item" data-panel="#panel-group" data-link="<?php echo Yii::app()->createUrl('group/getpanel'); ?>"><a><?php echo Yii::t('Base', 'Groups'); ?></a></li>
			</ul>
		</div> 
        <div id="usermanagement-panel-item" class="col-sm-10"></div>      
    </div>
    <script>
	$(document).ready(function(){
		$('#panel-usermanagement').find('[data-panel="#panel-user"]').trigger('click');
	});
	</script>  
</div>


