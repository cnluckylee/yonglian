<?php
$this->breadcrumbs=array(
	'Race Forms'=>array('index'),
	$model->name,
);

$this->menu=array(
	array('label'=>'List RaceForms', 'url'=>array('index')),
	array('label'=>'Create RaceForms', 'url'=>array('create')),
	array('label'=>'Update RaceForms', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete RaceForms', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage RaceForms', 'url'=>array('admin')),
);
?>

<h1>View RaceForms #<?php echo $model->id; ?></h1>

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
