<?php
$this->breadcrumbs=array(
	'Citymanagements'=>array('index'),
	$model->name,
);

$this->menu=array(
	array('label'=>'List Citymanagement', 'url'=>array('index')),
	array('label'=>'Create Citymanagement', 'url'=>array('create')),
	array('label'=>'Update Citymanagement', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete Citymanagement', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Citymanagement', 'url'=>array('admin')),
);
?>

<h1>View Citymanagement #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'name',
		'addtime',
		'updtime',
		'status',
	),
)); ?>
