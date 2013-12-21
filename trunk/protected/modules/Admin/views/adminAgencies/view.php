<?php
$this->breadcrumbs=array(
	'Agencies'=>array('index'),
	$model->name,
);

$this->menu=array(
	array('label'=>'List Agencies', 'url'=>array('index')),
	array('label'=>'Create Agencies', 'url'=>array('create')),
	array('label'=>'Update Agencies', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete Agencies', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Agencies', 'url'=>array('admin')),
);
?>

<h1>View Agencies #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'name',
	),
)); ?>
