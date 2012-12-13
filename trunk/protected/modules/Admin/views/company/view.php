<?php
$this->breadcrumbs=array(
	'Companys'=>array('index'),
	$model->name,
);

$this->menu=array(
	array('label'=>'List company', 'url'=>array('index')),
	array('label'=>'Create company', 'url'=>array('create')),
	array('label'=>'Update company', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete company', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage company', 'url'=>array('admin')),
);
?>

<h1>View company #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'name',
		'city',
		'city_id',
		'type',
		'desc',
		'product',
	),
)); ?>
