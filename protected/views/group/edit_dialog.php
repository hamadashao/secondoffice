<div id="modal-groupedit" class="modal-dialog modal-container" data-link="<?php echo Yii::app()->createUrl('group/getitemdata'); ?>">
		<div class="modal-content">
        	<div class="modal-header">
          		<h4 class="modal-title"><?php echo Yii::t('Base', 'Group Edit'); ?></h4>
        	</div>
        	<div class="modal-body">
  				<div class="form-group">
    				<label><?php echo Yii::t('Base', 'Group Name'); ?></label>
    				<input data-name="group_name" type="text" class="form-control" placeholder="<?php echo Yii::t('Base', 'Group Name'); ?>">
  				</div>
                <div class="form-group">
                	<label><?php echo Yii::t('Base', 'Authorization'); ?></label>
                    <div class="item-accordion" data-link="<?php echo Yii::app()->createUrl('auth/getroleauthaccordion'); ?>" data-name="accordion_list"></div>
				</div>
        	</div>
        	<div class="modal-footer">
            	<button type="button" class="btn btn-primary" data-toggle="click.trigger" data-target="body" data-event="save.group.secondoffice.system"><?php echo Yii::t('Base', 'Save'); ?></button>
          		<button type="button" class="btn btn-default" data-dismiss="modal"><?php echo Yii::t('Base', 'Close'); ?></button>
        	</div>
      	</div>
    </div>