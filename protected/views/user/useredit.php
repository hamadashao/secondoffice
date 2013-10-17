<div id="modal-useredit" class="modal-dialog modal-container" data-link="<?php echo Yii::app()->createUrl('user/getuserdata'); ?>">
		<div class="modal-content">
        	<div class="modal-header">
          		<h4 class="modal-title"><?php echo Yii::t('Base', 'User Edit'); ?></h4>
        	</div>
        	<div class="modal-body">
  				<div class="form-group">
    				<label><?php echo Yii::t('Base', 'User Name'); ?></label>
    				<input data-name="user_name" type="text" class="form-control" placeholder="<?php echo Yii::t('Base', 'User Name'); ?>">
  				</div>
  				<div class="form-group">
    				<label><?php echo Yii::t('Base', 'Password'); ?></label>
    				<input data-name="password" type="password" class="form-control" placeholder="<?php echo Yii::t('Base', 'Password'); ?>">
  				</div>
                <div class="form-group">
    				<label><?php echo Yii::t('Base', 'Name'); ?></label>
    				<input data-name="name" type="text" class="form-control" placeholder="<?php echo Yii::t('Base', 'Name'); ?>">
  				</div>
  				<div class="form-group">
    				<label><?php echo Yii::t('Base', 'Department'); ?></label>
    				<div class="btn-group btn-group-fullwidth dropdown-list" data-name="department_id" data-maxnum=5 data-type="preload" data-filter="" data-link="<?php echo Yii::app()->createUrl('department/getlist'); ?>" >
        				<button class="btn btn-default dropdown-toggle" data-toggle="dropdown" type="button"><span class="dropdown-string" data-name="department_name"></span><span class="caret"></span></button>
						<ul class="dropdown-menu" role="menu"></ul>
					</div>
  				</div>
                <div class="form-group">
    				<label><?php echo Yii::t('Base', 'Position'); ?></label>
    				<div class="btn-group btn-group-fullwidth dropdown-list" data-name="position_id" data-maxnum=5 data-type="preload" data-filter="" data-link="<?php echo Yii::app()->createUrl('position/getlist'); ?>" >
        				<button class="btn btn-default dropdown-toggle" data-toggle="dropdown" type="button"><span class="dropdown-string" data-name="position_name"></span><span class="caret"></span></button>
						<ul class="dropdown-menu" role="menu"></ul>
					</div>
  				</div>
                <div class="form-group">
    				<label><?php echo Yii::t('Base', 'Group'); ?></label>
    				<div class="btn-group btn-group-fullwidth dropdown-list" data-name="group_id" data-maxnum=5 data-type="preload" data-filter="" data-link="<?php echo Yii::app()->createUrl('group/getlist'); ?>" >
        				<button class="btn btn-default dropdown-toggle" data-toggle="dropdown" type="button"><span class="dropdown-string" data-name="group_name"></span><span class="caret"></span></button>
						<ul class="dropdown-menu" role="menu"></ul>
					</div>
  				</div>
        	</div>
        	<div class="modal-footer">
            	<button type="button" class="btn btn-primary" id="delete-comfirm"><?php echo Yii::t('Base', 'Save'); ?></button>
          		<button type="button" class="btn btn-default" data-dismiss="modal"><?php echo Yii::t('Base', 'Close'); ?></button>
        	</div>
      	</div>
    </div>