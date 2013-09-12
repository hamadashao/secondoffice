<div class="container">
	<div class="div-singin">
		<h2 class="form-signin-heading"><?php echo Yii::t('Base', 'Please sign in'); ?></h2>
		<input type="text" class="form-control user-name" placeholder="<?php echo Yii::t('Base', 'User Name'); ?>" autofocus>
		<input type="password" class="form-control user-password spacing-b-m" placeholder="<?php echo Yii::t('Base', 'Password'); ?>">
		<div class="result-text text-danger"></div>
		<div class="btn btn-lg btn-primary btn-block has-spinner"><span class="spinner-signingin"><div class="glyphicon glyphicon-refresh"></div><?php echo Yii::t('Base', 'Signing in'); ?></span><span class="spinner-signin"><?php echo Yii::t('Base', 'Sign in'); ?></span></div>
	</div>
</div>
<script language="javascript">
$('.btn').data("active_flag", true);

function signinform_enable(flag) {
	$('.btn').data("active_flag", flag);
	
	if(flag)
	{		
		if($('.btn').hasClass('active')) $('.btn').removeClass('active');
		if($('.glyphicon-refresh').hasClass('roll')) $('.glyphicon-refresh').removeClass('roll');
		
		$('.form-control').	removeClass('disable');
		$('.form-control').	removeAttr("disabled");
	}
	else
	{		
		if(!($('.btn').hasClass('active'))) $('.btn').addClass('active');
		if(!($('.glyphicon-refresh').hasClass('roll'))) $('.glyphicon-refresh').addClass('roll');
		
		$('.form-control').	addClass('disable');
		$('.form-control').	attr("disabled", "disabled");
	}
}

function display_signinform_info(info) {
	$('.result-text').stop(true);
	$('.result-text').html(info);
					
	$('.result-text').fadeIn(1000,function(){
		$(".result-text").delay(5000).fadeOut(2000);
 	});
}

function init_main_ui() {
	$.ajax({
   		type: "get",
   		url: "<?php echo Yii::app()->createUrl('site/getmainui'); ?>",
		dataType: "html",
		error: function() {
			signinform_enable(true);					
			display_signinform_info("<?php echo Yii::t('Base', 'Server error, initialize main UI fail!'); ?>");
		},
		success: function(data){
			$("#system-css").remove();
			$.loadCss('<?php echo Yii::app()->request->baseUrl; ?>/css/main.css');
			$('body').empty();
			$('body').html(data);
		}
	});
}

function do_signin() {
	$('.result-text').html("");
	$('.result-text').css("display","none");
			
	signinform_enable(false);
			
	$.ajax({
   		type: "post",
   		url: "<?php echo Yii::app()->createUrl('user/signin'); ?>",
  		data: "name=" + jQuery(".user-name").val() + "&password=" + hex_md5(jQuery(".user-password").val()),
		dataType: "json",
		error: function() {
			signinform_enable(true);					
			display_signinform_info("<?php echo Yii::t('Base', 'Server error, please contact administrator!'); ?>");
		},
   		success: function(data){
			signinform_enable(true);
					
			if(data.result != "ok")
			{					
				display_signinform_info("<?php echo Yii::t('Base', 'User name or password invalid'); ?>"); 
			}
			else
			{
				init_main_ui();
			}
					
					//temp = JSON.parse(data);
					//alert(temp.result);					
								
     				//if(status == "success")
					//{
						//$("#signin-css").remove();
						/*
						
						$.loadCss('/url/of/the.css', function(){
    // do something
	alert("test3");
	$('.result-text').html("test");
}, true);

	$.loadJs('/application/secondoffice/js/test.js', function(){
    // do something
	alert("test23423");
});
*/
						
					//	alert(data[0].result);
					//}
					//else
					//{
					//	$('.result-text').html("Hello <b>world</b>!");
					//}					
   		}
	});
}

$(function(){
    $('.btn').click(function() {
		if($('.btn').data("active_flag") == true) do_signin();
    });
	
	$("input").keydown(function(event) {
        if (event.keyCode == "13") $('.btn').click();
    });	
});
</script>