<div class="navbar navbar-fixed-top">
	<div class="container">
		<span style="color:#FFFFFF;">Twitter</span>
    	<div class="pull-left">
        	<div class="pull-left nav-item" data-toggle="panel" data-target="#container-main" data-panel="#panel-home" data-link="<?php echo Yii::app()->createUrl('site/gethomepanel'); ?>" ><span class="glyphicon glyphicon-home"></span></div>
            <div class="dropdown pull-left nav-item app-nav">
            	<span href="#" class="dropdown-toggle" data-toggle="dropdown"><span class="glyphicon glyphicon-th"></span></span>
                <ul class="dropdown-menu app-nav-list">
                </ul>
            </div>            
        </div>
        <div class="pull-right">
        	<div class="dropdown pull-right nav-item">            	
                <span href="#" class="dropdown-toggle" data-toggle="dropdown"><span class="glyphicon glyphicon-user spacing-right-5"></span><?php echo Yii::app()->user->name; ?></span>
       			<ul class="dropdown-menu">
                	<li>User Group: Admin</li>
                	<li class="divider"></li>
                    <li data-toggle="panel" data-link="<?php echo Yii::app()->createUrl('user/getusermanagementpanel'); ?>" data-target="#container-main" data-panel="#panel-usermanagement"><a><?php echo Yii::t('Base', 'User Management'); ?></a></li>
                    <li data-toggle="panel" data-link="<?php echo Yii::app()->createUrl('module/getmodulemanagementpanel'); ?>" data-target="#container-main" data-panel="#panel-modulemanagement"><a><?php echo Yii::t('Base', 'Module Management'); ?></a></li>
					<li data-toggle="modal" data-link="<?php echo Yii::app()->createUrl('site/getchangepassworddialog'); ?>" data-target="#modal-main" data-modal="#modal-changepassword"><a><?php echo Yii::t('Base', 'Change Password'); ?></a></li>
                    <li class="divider"></li>               
                    <li data-toggle="modal" data-link="<?php echo Yii::app()->createUrl('site/getlogoutdialog'); ?>" data-target="#modal-main" data-modal="#modal-logout"><a><?php echo Yii::t('Base', 'Logout'); ?></a></li>
				</ul>               
            </div>
            <div class="pull-right nav-item"><span class="glyphicon glyphicon-envelope spacing-right-5"></span><span>0</span></div>
        </div>		
    </div>
</div>

<div id="container-main" class="container"></div>
<div id="modal-main" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="ModalLabel" aria-hidden="true">
</div>