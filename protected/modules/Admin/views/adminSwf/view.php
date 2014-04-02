<?php
$this->breadcrumbs=array(
	'Swfs'=>array('index'),
	$model->name,
);

$this->menu=array(
	array('label'=>'List Swf', 'url'=>array('index')),
	array('label'=>'Create Swf', 'url'=>array('create')),
	array('label'=>'Update Swf', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete Swf', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Swf', 'url'=>array('admin')),
);
?>

<h1>View Swf #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'name',
		'url',
		'addtime',
		'updtime',
		'status',
		'pdf',
		'imgurl',
	),
)); ?>
