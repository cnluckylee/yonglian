<?php
$this->breadcrumbs=array(
	'Downloads'=>array('index'),
	$model->title=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Download', 'url'=>array('index')),
	array('label'=>'Create Download', 'url'=>array('create')),
	array('label'=>'View Download', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage Download', 'url'=>array('admin')),
);
?>

<h1>Update Download <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>