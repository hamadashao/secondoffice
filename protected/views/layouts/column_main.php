<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title><?php echo CHtml::encode($this->pageTitle); ?></title>
	<meta content="width=device-width, initial-scale=1.0" name="viewport">
	<meta content="" name="description">
	<meta content="" name="author">
	<link href="<?php echo Yii::app()->request->baseUrl; ?>/css/bootstrap.min.css" rel="stylesheet" media="screen">
    <link href="<?php echo Yii::app()->request->baseUrl; ?>/css/bootstrap-theme.min.css" rel="stylesheet" media="screen">
    <link href="<?php echo Yii::app()->request->baseUrl; ?>/css/secondoffice.system.global.css" rel="stylesheet" media="screen">
    <link id="system-css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/secondoffice.system.main.css" rel="stylesheet" media="screen">
    <script src="<?php echo Yii::app()->request->baseUrl; ?>/js/jquery-2.0.3.min.js"></script>
    <script src="<?php echo Yii::app()->request->baseUrl; ?>/js/bootstrap.min.js"></script>
    <script src="<?php echo Yii::app()->request->baseUrl; ?>/js/md5.js"></script>
    <script src="<?php echo Yii::app()->request->baseUrl; ?>/js/miscellaneous.js"></script>
    <script src="<?php echo Yii::app()->request->baseUrl; ?>/js/jquery.smartnotification.js"></script>
</head>
<body>
	<?php $this->beginContent('//layouts/main'); ?>
		<?php echo $content; ?>
	<?php $this->endContent(); ?>
    <?php $this->beginContent('//site/javascript'); ?>
		<?php echo $content; ?>
	<?php $this->endContent(); ?>
    <script>
	$(document).ready(function(){
		$('.navbar').find('[data-panel="#panel-home"]').trigger('click');
	});
	</script>
</body>
</html>