<div class="navbar navbar-fixed-top">
	<div class="container">
		<span style="color:#FFFFFF;">Twitter</span>
    	<div class="pull-left">
        	<div class="pull-left nav-item" data-toggle="panel" data-target=".container-main" data-panel="#panel-home" data-link="<?php echo Yii::app()->createUrl('site/gethomepanel'); ?>" ><span class="glyphicon glyphicon-home"></span></div>
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

<script>
/*
$("input[type='password']").keydown(function(event) {
   if (event.keyCode == "13") $('#changepassword-comfirm').click();
});		

$('#changepassword-comfirm').bind('click', function() {
	if(jQuery(".new-password").val() != jQuery(".retype-password").val())
	{
		$('#ChangePasswordModal').modal('hide');
		jQuery("input[type='password']").val("");
		return;
	}
	
	$.ajax({
   		type: "post",
   		url: "<?php echo Yii::app()->createUrl('user/changepassword'); ?>",
		data: "old_password=" + hex_md5(jQuery(".old-password").val()) + "&new_password=" + hex_md5(jQuery(".new-password").val()),
		dataType: "json",
		error: function() {
			jQuery("input[type='password']").val("");
			$('#ChangePasswordModal').modal('hide');			
			alert("error");
		},
		success: function(data){
			jQuery("input[type='password']").val("");
			$('#ChangePasswordModal').modal('hide');
			
			if(data.result == "ok")
			{					
				alert("ok");
			}
			else
			{
				alert("fail");
			}
		}
	});
});

$('#logout-comfirm').bind('click', function() {
	$.ajax({
   		type: "get",
   		url: "<?php echo Yii::app()->createUrl('user/logout'); ?>",
		dataType: "json",
		error: function() {
			$('#LogoutModal').modal('hide');
			alert("error");
		},
		success: function(data){
			if(data.result == "ok")
			{					
				window.location.href = "<?php echo Yii::app()->baseUrl; ?>";
			}
			else
			{
				$('#LogoutModal').modal('hide');
			}
		}
	});
});


$('.topmenu-item').each(function(index, domEle){
	if($(domEle).attr('data-link') && ($(domEle).attr('data-toggle') == 'panel'))
	{		
		$(this).bind('click', {msg: $(domEle).attr('data-link')}, function(event) {
			if($('.panel-' + $(domEle).attr('data-target')).html())
			{
				$('.panel-container').hide();
				$('.panel-' + $(domEle).attr('data-target')).show();
				return;
			}
		
			$.ajax({
   				type: "get",
   				url: event.data.msg,
				dataType: "html",
				error: function() {
					$.SmartNotification.Show("<?php echo Yii::t('Base', 'Server error, please contact administrator'); ?>", "error");
				},
				success: function(data){
					$('.panel-container').hide();
					$('.container-main').append(data);
				}
			});
		});
	}
}); 



*/
$(document).ready(function(){
	$('.navbar').find('[data-panel="#panel-home"]').trigger('click');
});
</script>