<div id="modal-departmentedit" class="modal-dialog modal-container" data-link="<?php echo Yii::app()->createUrl('department/getitemdata'); ?>">
		<div class="modal-content">
        	<div class="modal-header">
          		<h4 class="modal-title"><?php echo Yii::t('Base', 'Department Edit'); ?></h4>
        	</div>
        	<div class="modal-body">
  				<div class="form-group">
    				<label><?php echo Yii::t('Base', 'Department Name'); ?></label>
    				<input data-name="department_name" type="text" class="form-control" placeholder="<?php echo Yii::t('Base', 'Department Name'); ?>">
  				</div>
  				<div class="form-group">
    				<label><?php echo Yii::t('Base', 'Parent Department'); ?></label>
    				<div class="btn-group btn-group-fullwidth dropdown-list" data-filter="true" data-name="parent_id" data-maxnum=5 data-type="preload" data-filter="" data-link="<?php echo Yii::app()->createUrl('department/getdropdownlist'); ?>" >
        				<button class="btn btn-default dropdown-toggle" data-toggle="dropdown" type="button"><span class="dropdown-string" data-name="parent_name"></span><span class="caret"></span></button>
						<ul class="dropdown-menu" role="menu"></ul>
					</div>
  				</div>
                <div class="form-group">
    				<label><?php echo Yii::t('Base', 'Manager'); ?></label>
    				<div class="btn-group btn-group-fullwidth dropdown-list" data-name="manager_id" data-maxnum=5 data-type="preload" data-filter="" data-link="<?php echo Yii::app()->createUrl('user/getdropdownlist'); ?>" >
        				<button class="btn btn-default dropdown-toggle" data-toggle="dropdown" type="button"><span class="dropdown-string" data-name="manager_name"></span><span class="caret"></span></button>
						<ul class="dropdown-menu" role="menu"></ul>
					</div>
  				</div>
        	</div>
        	<div class="modal-footer">
            	<button type="button" class="btn btn-primary" data-toggle="click.trigger" data-target="body" data-event="save.user.secondoffice.system"><?php echo Yii::t('Base', 'Save'); ?></button>
          		<button type="button" class="btn btn-default" data-dismiss="modal"><?php echo Yii::t('Base', 'Close'); ?></button>
        	</div>
      	</div>
    </div>