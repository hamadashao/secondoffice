<?php
$this->breadcrumbs=array(
	'Departments'=>array('index'),
	$model->name=>array('view','id'=>$model->uid),
	'Update',
);

$this->menu=array(
	array('label'=>'List Department', 'url'=>array('index')),
	array('label'=>'Create Department', 'url'=>array('create')),
	array('label'=>'View Department', 'url'=>array('view', 'id'=>$model->uid)),
	array('label'=>'Manage Department', 'url'=>array('admin')),
);
?>

<h1>Update Department <?php echo $model->uid; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>