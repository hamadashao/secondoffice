<div class="container">
	<div class="div-signin">
		<h2 class="form-signin-heading"><?php echo Yii::t('Base', 'Please sign in'); ?></h2>
		<input type="text" class="form-control user-name" data-toggle="enter.trigger" data-target="body" data-event="signin.secondoffice.system" placeholder="<?php echo Yii::t('Base', 'User Name'); ?>" autofocus>
		<input type="password" class="form-control user-password spacing-b-m" data-toggle="enter.trigger" data-target="body" data-event="signin.secondoffice.system" placeholder="<?php echo Yii::t('Base', 'Password'); ?>">
		<div class="btn btn-lg btn-primary btn-block has-spinner" data-toggle="click.trigger" data-target="body" data-event="signin.secondoffice.system"><span class="spinner-signin"><?php echo Yii::t('Base', 'Sign in'); ?></span></div>
	</div>
</div>