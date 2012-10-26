<?php
$this->breadcrumbs=array(
	'All Types'=>array('index'),
	$model->name,
);

$this->menu=array(
	array('label'=>'List AllType', 'url'=>array('index')),
	array('label'=>'Create AllType', 'url'=>array('create')),
	array('label'=>'Update AllType', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete AllType', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage AllType', 'url'=>array('admin')),
);
?>

<h1>View AllType #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'parentid',
		'name',
		'type',
		'listorder',
		'display',
	),
)); ?>
