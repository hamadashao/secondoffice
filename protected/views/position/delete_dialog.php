<div id="modal-positiondelete" class="modal-dialog modal-container">
	<div class="modal-content">
        <div class="modal-header">
          	<h4 class="modal-title"><?php echo Yii::t('Base', 'Comfirm'); ?></h4>
        </div>
        <div class="modal-body">
          	<?php echo Yii::t('Base', 'Are you sure want to delete selected item/items?'); ?>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-primary" data-toggle="click.trigger" data-trigger="position:<?php echo Yii::app()->createUrl('position/deleteitem'); ?>" data-target="body" data-event="delete.listitem.secondoffice.system"><?php echo Yii::t('Base', 'Comfirm'); ?></button>
          	<button type="button" class="btn btn-default" data-dismiss="modal"><?php echo Yii::t('Base', 'Close'); ?></button>          		
        </div>
	</div>
</div>