<?php
$this->breadcrumbs=array(
	'Companys'=>array('index'),
	$model->name,
);

$this->menu=array(
	array('label'=>'List Company', 'url'=>array('index')),
	array('label'=>'Create Company', 'url'=>array('create')),
	array('label'=>'Update Company', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete Company', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Company', 'url'=>array('admin')),
);
?>

<h1>View Company #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'name',
		'pinyin',
		'city',
		'city_id',
		'type',
		'desct',
		'product',
		'rec',
	),
)); ?>
