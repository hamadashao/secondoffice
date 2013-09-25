<div class="navbar navbar-fixed-top">
	<div class="container">
		<span class="visuallyhidden">Twitter</span>
    	<div class="pull-left">
        	<div class="pull-left nav-item topmenu-item" data-target="main" data-link="/"><img src="./images/home.png" /></div>
            <div class="dropdown pull-left nav-item app-nav" style="display:none;">
            	<span href="#" class="dropdown-toggle" data-toggle="dropdown"><img src="./images/applications.png" /></span>
                <ul class="dropdown-menu app-nav-list">
                </ul>
            </div>            
        </div>
        <div class="pull-right">
        	<div class="dropdown pull-right nav-item">            	
                <span href="#" class="dropdown-toggle" data-toggle="dropdown"><img src="./images/personal.png" />Ram</span>
       			<ul class="dropdown-menu">
                	<li>User Group: Admin</li>
                	<li class="divider"></li>
                    <li><a class="topmenu-item" data-target="user" data-link="<?php echo Yii::app()->createUrl('user/getusermanagementui'); ?>"><?php echo Yii::t('Base', 'User Management'); ?></a></li>
                    <li><a class="topmenu-item" data-target="module" data-link="<?php echo Yii::app()->createUrl('module/getmodulemanagementui'); ?>"><?php echo Yii::t('Base', 'Module Management'); ?></a></li>
					<li><a class="topmenu-item" data-toggle="modal" data-target="#ChangePasswordModal"><?php echo Yii::t('Base', 'Change Password'); ?></a></li>
                    <li class="divider"></li>               
                    <li><a class="topmenu-item" data-toggle="modal" data-target="#LogoutModal"><?php echo Yii::t('Base', 'Logout'); ?></a></li>
				</ul>               
            </div>
            <div class="pull-right nav-item"><img src="./images/message.png" /><span>0</span></div>
        </div>		
    </div>
</div>

<div class="container container-main">  
	<div class="panel-container panel-main">fhjfgj</div>	
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
            	<button type="button" class="btn btn-primary" id="logout-comfirm"><?php echo Yii::t('Base', 'Comfirm'); ?></button>
          		<button type="button" class="btn btn-default" data-dismiss="modal"><?php echo Yii::t('Base', 'Close'); ?></button>          		
        	</div>
      	</div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<div class="modal fade" id="ChangePasswordModal" tabindex="-1" role="dialog" aria-labelledby="ChangePasswordModalLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
        	<div class="modal-header">
          		<h4 class="modal-title"><?php echo Yii::t('Base', 'Change Password'); ?></h4>
        	</div>
        	<div class="modal-body">
          		<input type="password" class="form-control old-password spacing-b-m" placeholder="<?php echo Yii::t('Base', 'Old Password'); ?>">
                <input type="password" class="form-control new-password spacing-b-m" placeholder="<?php echo Yii::t('Base', 'New Password'); ?>">
                <input type="password" class="form-control retype-password spacing-b-m" placeholder="<?php echo Yii::t('Base', 'Retype New Password'); ?>">
        	</div>
        	<div class="modal-footer">
            	<button type="button" class="btn btn-primary" id="changepassword-comfirm"><?php echo Yii::t('Base', 'Save'); ?></button>
          		<button type="button" class="btn btn-default" data-dismiss="modal"><?php echo Yii::t('Base', 'Close'); ?></button>          		
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
					alert("error");
				},
				success: function(data){
					$('.panel-container').hide();
					$('.container-main').append(data);
				}
			});
		});
	}
}); 
</script>