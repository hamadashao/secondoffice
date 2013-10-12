<div class="modal-dialog">
	<div class="modal-content">
		<div class="modal-header">
        	<h4 class="modal-title"><?php echo Yii::t('Base', 'Change Password'); ?></h4>
        </div>
        <div class="modal-body">
          	<input type="password" class="form-control old-password spacing-b-m spacing-bottom-20" placeholder="<?php echo Yii::t('Base', 'Old Password'); ?>">
            <input type="password" class="form-control new-password spacing-b-m spacing-bottom-5" placeholder="<?php echo Yii::t('Base', 'New Password'); ?>">
            <input type="password" class="form-control retype-password spacing-b-m" placeholder="<?php echo Yii::t('Base', 'Retype New Password'); ?>">
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-primary" id="changepassword-comfirm"><?php echo Yii::t('Base', 'Save'); ?></button>
          	<button type="button" class="btn btn-default" data-dismiss="modal"><?php echo Yii::t('Base', 'Close'); ?></button>          		
        </div>
    </div>
</div>