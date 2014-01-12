<?php
$this->breadcrumbs=array(
	'Fixtures'=>array('index'),
	$model->name,
);

$this->menu=array(
	array('label'=>'List Fixtures', 'url'=>array('index')),
	array('label'=>'Create Fixtures', 'url'=>array('create')),
	array('label'=>'Update Fixtures', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete Fixtures', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Fixtures', 'url'=>array('admin')),
);
?>

<h1>View Fixtures #<?php echo $model->id; ?></h1>

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
