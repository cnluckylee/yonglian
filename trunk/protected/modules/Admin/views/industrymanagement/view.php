<?php
$this->breadcrumbs=array(
	'Industrymanagements'=>array('index'),
	$model->name,
);

$this->menu=array(
	array('label'=>'List Industrymanagement', 'url'=>array('index')),
	array('label'=>'Create Industrymanagement', 'url'=>array('create')),
	array('label'=>'Update Industrymanagement', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete Industrymanagement', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Industrymanagement', 'url'=>array('admin')),
);
?>

<h1>View Industrymanagement #<?php echo $model->id; ?></h1>

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
