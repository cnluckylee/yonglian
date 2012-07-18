<?php
$this->breadcrumbs=array(
	'Admin Areas'=>array('index'),
	$model->name,
);

$this->menu=array(
	array('label'=>'List adminArea', 'url'=>array('index')),
	array('label'=>'Create adminArea', 'url'=>array('create')),
	array('label'=>'Update adminArea', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete adminArea', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage adminArea', 'url'=>array('admin')),
);
?>

<h1>View adminArea #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'name',
		'pinyin',
	),
)); ?>
