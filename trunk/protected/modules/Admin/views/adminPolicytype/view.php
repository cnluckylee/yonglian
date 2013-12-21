<?php
$this->breadcrumbs=array(
	'Policytypes'=>array('index'),
	$model->name,
);

$this->menu=array(
	array('label'=>'List Policytype', 'url'=>array('index')),
	array('label'=>'Create Policytype', 'url'=>array('create')),
	array('label'=>'Update Policytype', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete Policytype', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Policytype', 'url'=>array('admin')),
);
?>

<h1>View Policytype #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'name',
	),
)); ?>
