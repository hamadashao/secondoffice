<div class="container">
	<div class="div-signin">
		<h2 class="form-signin-heading"><?php echo Yii::t('Base', 'Please sign in'); ?></h2>
		<input type="text" class="form-control user-name" placeholder="<?php echo Yii::t('Base', 'User Name'); ?>" autofocus>
		<input type="password" class="form-control user-password spacing-b-m" placeholder="<?php echo Yii::t('Base', 'Password'); ?>">
		<div class="btn btn-lg btn-primary btn-block has-spinner"><span class="spinner-signin"><?php echo Yii::t('Base', 'Sign in'); ?></span></div>
	</div>
</div>
<script language="javascript">
$('.div-signin').find('.btn').click(function() {
	if(!($('.div-signin').find('.btn').hasClass('active'))) SecondOffice.System.SignIn();
});
	
$('.div-signin').find("input").keydown(function(event) {
	if (event.keyCode == "13") $('.btn').click();
});	

SecondOffice = {}; 
 
SecondOffice.System = {
	InitMainUI:function() {
		$.ajax({
   			type: "get",
   			url: "<?php echo Yii::app()->createUrl('site/getmainui'); ?>",
			dataType: "html",
			error: function() {
				SecondOffice.System.HideSigninForm(false);
				$.SmartNotification.Show("<?php echo Yii::t('Base', 'Server error, initialize main UI fail!'); ?>", "error");
			
			},
			success: function(data){
				$("#system-css").remove();
				$.loadCss('<?php echo Yii::app()->request->baseUrl; ?>/css/main.css');
				$('body').empty();
				$('body').html(data);
			}
		});
	},
	HideSigninForm:function(flag) {
		if(flag)
		{			
			if(!($('.div-signin').find('.btn').hasClass('active'))) $('.btn').addClass('active');
						
			$('.div-signin').find('.form-control').	addClass('disable');
			$('.div-signin').find('.form-control').	attr("disabled", "disabled");
		}
		else
		{
			if($('.div-signin').find('.btn').hasClass('active')) $('.btn').removeClass('active');
			
			$('.div-signin').find('.form-control').	removeClass('disable');
			$('.div-signin').find('.form-control').	removeAttr("disabled");
		}
	},
	SignIn:function() {
		if( ($('.div-signin').find(".user-name").val() == "") || ($('.div-signin').find(".user-password").val() == "") )
		{
			$.SmartNotification.Show("<?php echo Yii::t('Base', 'User name or/and password is empty'); ?>", "error");	
			return;
		}
	
		$.SmartNotification.Show("<?php echo Yii::t('Base', 'Signing in'); ?>", "info", "true");			
		SecondOffice.System.HideSigninForm(true);
			
		$.ajax({
   			type: "post",
   			url: "<?php echo Yii::app()->createUrl('user/signin'); ?>",
  			data: "name=" + $('.div-signin').find(".user-name").val() + "&password=" + hex_md5($('.div-signin').find(".user-password").val()),
			dataType: "json",
			error: function() {
				SecondOffice.System.HideSigninForm(false);
				$.SmartNotification.Show("<?php echo Yii::t('Base', 'Server error, please contact administrator'); ?>", "error");
			},
   			success: function(data){
				SecondOffice.System.HideSigninForm(false);
					
				if(data.result != "ok")
				{
					$.SmartNotification.Show("<?php echo Yii::t('Base', 'User name or password invalid'); ?>", "error");
				}
				else
				{
					SecondOffice.System.InitMainUI();
				}		
   			}
		});
	}
}; 
</script>