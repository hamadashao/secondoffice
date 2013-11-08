<div id="panel-profile" class="panel panel-default panel-container">
	<div class="panel-heading"><?php echo Yii::t('Profile', 'Personal Profile'); ?></div>
	<div class="panel-body">
		<div class="col-sm-2">
			<ul class="nav nav-pills nav-stacked" data-flag="true">
  				<li data-toggle="panel" data-target="#profile-panel-item" data-panel="#panel-profile-staffprofile" data-link="<?php echo Yii::app()->createUrl('user/getpanel'); ?>"><a><?php echo Yii::t('Profile', 'Staff Profile'); ?></a></li>
  				<li data-toggle="panel" data-target="#profile-panel-item" data-panel="#panel-profile-talentpool" data-link="<?php echo Yii::app()->createUrl('department/getpanel'); ?>"><a><?php echo Yii::t('Profile', 'Talent Pool'); ?></a></li>
			</ul>
		</div> 
        <div id="profile-panel-item" class="col-sm-10"></div>
    </div>
</div>


