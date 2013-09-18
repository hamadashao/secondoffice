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
					<li><a class="topmenu-item" data-link="<?php echo Yii::app()->createUrl('user/getchangepasswordui'); ?>"><?php echo Yii::t('Base', 'Change Password'); ?></a></li>
                    <li class="divider"></li>               
                    <li><a class="topmenu-item" data-function="do_logout"><?php echo Yii::t('Base', 'Logout'); ?></a></li>
				</ul>
               
            </div>
            <div style="color:#bbbbbb;float: right; height:30px; background:url(./images/message.png) no-repeat; margin-right:20px;"><span style="padding-left:30px;">0</span></div>
        </div>		
    </div>
</div>

<div class="container">
<h1>Contact Us</h1>

<?php if(Yii::app()->user->hasFlash('contact')): ?>

<div class="flash-success">
	<?php echo Yii::app()->user->getFlash('contact'); ?>
</div>

<?php else: ?>

<p>
If you have business inquiries or other questions, please fill out the following form to contact us. Thank you. If you have business inquiries or other questions, please fill out the following form to contact us. Thank you. 
</p>
<p>
If you have business inquiries or other questions, please fill out the following form to contact us. Thank you.
</p>
<p>
If you have business inquiries or other questions, please fill out the following form to contact us. Thank you.
</p><p>
If you have business inquiries or other questions, please fill out the following form to contact us. Thank you.
</p>
<p>
If you have business inquiries or other questions, please fill out the following form to contact us. Thank you.
</p>
<p>
If you have business inquiries or other questions, please fill out the following form to contact us. Thank you.
</p>
<p>
If you have business inquiries or other questions, please fill out the following form to contact us. Thank you.
</p>
<p>
If you have business inquiries or other questions, please fill out the following form to contact us. Thank you.
</p>
<p>
If you have business inquiries or other questions, please fill out the following form to contact us. Thank you.
</p>
<p>
If you have business inquiries or other questions, please fill out the following form to contact us. Thank you.
</p>
<p>
If you have business inquiries or other questions, please fill out the following form to contact us. Thank you.
</p>
<p>
If you have business inquiries or other questions, please fill out the following form to contact us. Thank you.
</p>
<p>
If you have business inquiries or other questions, please fill out the following form to contact us. Thank you.
</p>
<p>
If you have business inquiries or other questions, please fill out the following form to contact us. Thank you.
</p>
<p>
If you have business inquiries or other questions, please fill out the following form to contact us. Thank you.
</p>
<p>
If you have business inquiries or other questions, please fill out the following form to contact us. Thank you.
</p>
<p>
If you have business inquiries or other questions, please fill out the following form to contact us. Thank you.
</p>
<p>
If you have business inquiries or other questions, please fill out the following form to contact us. Thank you.
</p>
<p>
If you have business inquiries or other questions, please fill out the following form to contact us. Thank you.
</p>
<p>
If you have business inquiries or other questions, please fill out the following form to contact us. Thank you.
</p>
<p>
If you have business inquiries or other questions, please fill out the following form to contact us. Thank you.
</p>
<p>
If you have business inquiries or other questions, please fill out the following form to contact us. Thank you.
</p>
<p>
If you have business inquiries or other questions, please fill out the following form to contact us. Thank you.
</p>
<p>
If you have business inquiries or other questions, please fill out the following form to contact us. Thank you.
</p>

<div class="form">

</div>
</div>



<?php endif; ?>



<script>
function do_logout() {
}

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
				},
				success: function(data){
					//$("#system-css").remove();
					//$.loadCss('<?php //echo Yii::app()->request->baseUrl; ?>/css/main.css');
					//$('body').empty();
					//$('body').html(data);
				}
			});
		});
	}
	else
	{
		//alert($(domEle).attr('data-function'));
		$(this).bind('click', function(event) {
			eval($(domEle).attr('data-function') + '()');
		});		
	}
}); 
</script>