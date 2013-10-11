// JavaScript Document

SecondOffice = {}; 
 
SecondOffice.System = {
	InitMainUI:function() {
		$.ajax({
   			type: "get",
   			url: "<?php echo Yii::app()->createUrl('site/getmainui'); ?>",
			dataType: "html",
			error: function() {
				signinform_enable(true);
				$.SmartNotification.show("<?php echo Yii::t('Base', 'Server error, initialize main UI fail!'); ?>", "error");
			
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
			if(!($('.btn').hasClass('active'))) $('.btn').addClass('active');
						
			$('.div-singin').find('.form-control').	addClass('disable');
			$('.div-singin').find('.form-control').	attr("disabled", "disabled");
		}
		else
		{
			if($('.btn').hasClass('active')) $('.btn').removeClass('active');
			
			$('.div-singin').find('.form-control').	removeClass('disable');
			$('.div-singin').find('.form-control').	removeAttr("disabled");
		}
	},
	Login:function() {
		$.SmartNotification.show("<?php echo Yii::t('Base', 'Signing in'); ?>", "info", "true");			
		signinform_enable(false);
			
		$.ajax({
   			type: "post",
   			url: "<?php echo Yii::app()->createUrl('user/signin'); ?>",
  			data: "name=" + jQuery(".user-name").val() + "&password=" + hex_md5(jQuery(".user-password").val()),
			dataType: "json",
			error: function() {
				signinform_enable(true);
				$.SmartNotification.show("<?php echo Yii::t('Base', 'Server error, please contact administrator!'); ?>", "error");
			},
   			success: function(data){
				signinform_enable(true);
					
				if(data.result != "ok")
				{
					$.SmartNotification.show("<?php echo Yii::t('Base', 'User name or password invalid'); ?>", "error");
				}
				else
				{
					SecondOffice.System.InitMainUI();
				}		
   			}
		});
	}
}; 