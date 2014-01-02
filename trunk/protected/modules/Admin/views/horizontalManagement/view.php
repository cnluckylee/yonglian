<?php
$this->breadcrumbs=array(
	'Horizontal Managements'=>array('index'),
	$model->name,
);

$this->menu=array(
	array('label'=>'List HorizontalManagement', 'url'=>array('index')),
	array('label'=>'Create HorizontalManagement', 'url'=>array('create')),
	array('label'=>'Update HorizontalManagement', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete HorizontalManagement', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage HorizontalManagement', 'url'=>array('admin')),
);
?>

<h1>View HorizontalManagement #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'name',
		'addtime',
		'updtime',
		'state',
	),
)); ?>
