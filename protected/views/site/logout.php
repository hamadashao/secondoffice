<div class="modal-dialog">
	<div class="modal-content">
		<div class="modal-header">
			<h4 class="modal-title"><?php echo Yii::t('Base', 'Comfirm'); ?></h4>
        </div>
        <div class="modal-body">
          	<?php echo Yii::t('Base', 'Are you sure want to logout?'); ?>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-primary" id="logout-comfirm"><?php echo Yii::t('Base', 'Comfirm'); ?></button>
          	<button type="button" class="btn btn-default" data-dismiss="modal"><?php echo Yii::t('Base', 'Close'); ?></button>          		
        </div>
    </div>
</div>
<script>
$('#logout-comfirm').bind('click', function() {
	$.ajax({
   		type: "get",
   		url: "<?php echo Yii::app()->createUrl('user/logout'); ?>",
		dataType: "json",
		error: function() {
			$('#Modal').modal('hide');
			alert("error");
		},
		success: function(data){
			if(data.result == "ok")
			{					
				window.location.href = "<?php echo Yii::app()->baseUrl; ?>";
			}
			else
			{
				$('#Modal').modal('hide');
			}
		}
	});
});
</script>