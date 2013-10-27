<?php
$this->breadcrumbs=array(
	'Admin Columns'=>array('index'),
	$model->title,
);

$this->menu=array(
	array('label'=>'List AdminColumn', 'url'=>array('index')),
	array('label'=>'Create AdminColumn', 'url'=>array('create')),
	array('label'=>'Update AdminColumn', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete AdminColumn', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage AdminColumn', 'url'=>array('admin')),
);
?>

<h1>View AdminColumn #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'title',
		'imgurl',
		'memo',
		'addtime',
		'updtime',
	),
)); ?>
