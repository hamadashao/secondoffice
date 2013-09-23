<div class="navbar navbar-fixed-top">
	<div class="container">
		<span class="visuallyhidden" style="line-height:28px;">Twitter</span>
    	<div role="navigation" style="float:left; height:28px;">
        	<div style="color:#FFFFFF; float:left; height:30px; width:30px; background-color:#CCCC00; margin-right:10px;"></div>
            <div style="color:#FFFFFF; float:left; line-height:28px;"><img src="./images/applications.png" />1234</div>
            <div style="color:#FFFFFF; float:left; line-height:28px;"><img src="./images/home.png" />567</div>
        </div>
        <div style="float: right; line-height:30px;">
        	<div class="dropdown pull-right" style="color:#bbbbbb;float: right; height:30px; cursor:pointer; background-color: #575757;">            	
                <span style="padding-right:5px;" href="#" class="dropdown-toggle" data-toggle="dropdown"><img src="./images/personal.png" />Ram </span>                
       			<ul class="dropdown-menu">
                	<li>User Group: Admin</li>
                	<li class="divider"></li>
                    <li><a class="topmenu-item" data-link="<?php echo Yii::app()->createUrl('user/getusermanagementui'); ?>"><?php echo Yii::t('Base', 'User Management'); ?></a></li>
                    <li><a class="topmenu-item" data-link="<?php echo Yii::app()->createUrl('module/getmodulemanagementui'); ?>"><?php echo Yii::t('Base', 'Module Management'); ?></a></li>
					<li><a class="topmenu-item" data-toggle="modal" data-target="#ChangePasswordModal"><?php echo Yii::t('Base', 'Change Password'); ?></a></li>
                    <li class="divider"></li>               
                    <li><a class="topmenu-item" data-toggle="modal" data-target="#LogoutModal"><?php echo Yii::t('Base', 'Logout'); ?></a></li>
				</ul>
               
            </div>
            <div style="color:#bbbbbb;float: right; height:30px; background:url(./images/message.png) no-repeat; margin-right:20px;"><span style="padding-left:30px;">0</span></div>
        </div>		
    </div>
</div>

<div class="container main-container">  	
</div>



<div class="modal fade" id="LogoutModal" tabindex="-1" role="dialog" aria-labelledby="LogoutModalLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
        	<div class="modal-header">
          		<h4 class="modal-title">Comfirm</h4>
        	</div>
        	<div class="modal-body">
          		Are you sure want to logout?
        	</div>
        	<div class="modal-footer">
            	<button type="button" class="btn btn-primary" id="logout-comfirm">Comfirm</button>
          		<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>          		
        	</div>
      	</div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<div class="modal fade" id="ChangePasswordModal" tabindex="-1" role="dialog" aria-labelledby="ChangePasswordModalLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
        	<div class="modal-header">
          		<h4 class="modal-title">Change Password</h4>
        	</div>
        	<div class="modal-body">
          		<input type="password" class="form-control old-password spacing-b-m" placeholder="<?php echo Yii::t('Base', 'Old Password'); ?>">
                <input type="password" class="form-control new-password spacing-b-m" placeholder="<?php echo Yii::t('Base', 'New Password'); ?>">
                <input type="password" class="form-control retype-password spacing-b-m" placeholder="<?php echo Yii::t('Base', 'Retype New Password'); ?>">
        	</div>
        	<div class="modal-footer">
            	<button type="button" class="btn btn-primary" id="changepassword-comfirm">Save</button>
          		<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>          		
        	</div>
      	</div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->



<script>
$.ajax({
   	type: "get",
   	url: "<?php echo Yii::app()->createUrl('module/getlist'); ?>",
	dataType: "json",
	error: function() {			
		alert("error");
	},
	success: function(data){			
		if(data.result == "ok")
		{					
			//alert("ok");
		}
		else
		{
			//alert("fail");
		}
	}
});

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
	if($(domEle).attr('data-link'))
	{
		$(this).bind('click', {msg: $(domEle).attr('data-link')}, function(event) {
			$.ajax({
   				type: "get",
   				url: event.data.msg,
				dataType: "html",
				error: function() {
					//signinform_enable(true);					
					//display_signinform_info("<?php //echo Yii::t('Base', 'Server error, initialize main UI fail!'); ?>");
					alert("error");
				},
				success: function(data){
					//$("#system-css").remove();
					//$.loadCss('<?php //echo Yii::app()->request->baseUrl; ?>/css/main.css');
					//$('body').empty();
					//$('body').html(data);
					$('.main-container').empty();
					$('.main-container').html(data);
				}
			});
		});
	}
}); 
</script>