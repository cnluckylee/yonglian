<?php
$this->breadcrumbs=array(
	'Company News Sites'=>array('index'),
	$model->name,
);

$this->menu=array(
	array('label'=>'List CompanyNewsSite', 'url'=>array('index')),
	array('label'=>'Create CompanyNewsSite', 'url'=>array('create')),
	array('label'=>'Update CompanyNewsSite', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete CompanyNewsSite', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage CompanyNewsSite', 'url'=>array('admin')),
);
?>

<h1>View CompanyNewsSite #<?php echo $model->id; ?></h1>

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
