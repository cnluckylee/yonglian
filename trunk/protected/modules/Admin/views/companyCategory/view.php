<?php
$this->breadcrumbs=array(
	'Company Categories'=>array('index'),
	$model->name,
);

$this->menu=array(
	array('label'=>'List CompanyCategory', 'url'=>array('index')),
	array('label'=>'Create CompanyCategory', 'url'=>array('create')),
	array('label'=>'Update CompanyCategory', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete CompanyCategory', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage CompanyCategory', 'url'=>array('admin')),
);
?>

<h1>View CompanyCategory #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'cid',
		'name',
		'order',
	),
)); ?>
