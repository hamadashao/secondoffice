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
</script>