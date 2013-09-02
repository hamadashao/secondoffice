<div class="div-singin">
<h2 class="form-signin-heading"><?php echo Yii::t('Base', 'Please sign in'); ?></h2>
<input type="text" class="form-control" placeholder="<?php echo Yii::t('Base', 'User Name'); ?>" autofocus>
<input type="password" class="form-control spacing-b-m" placeholder="<?php echo Yii::t('Base', 'Password'); ?>">
<label class="result-text text-danger"></label>
<button class="btn btn-lg btn-primary btn-block has-spinner" type="submit" ><span class="spinner-signingin"><div class="glyphicon glyphicon-refresh"></div><?php echo Yii::t('Base', 'Signing in'); ?></span><span class="spinner-signin"><?php echo Yii::t('Base', 'Sign in'); ?></span></button>
</div>
<script language="javascript">
$(function(){
    $('button').click(function() {
        $(this).toggleClass('active');
		$(this).attr("disable","");
		$('.glyphicon-refresh').toggleClass('roll');
    });
});
</script>