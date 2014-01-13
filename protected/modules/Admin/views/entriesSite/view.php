<?php
$this->breadcrumbs=array(
	'Entries Sites'=>array('index'),
	$model->name,
);

$this->menu=array(
	array('label'=>'List EntriesSite', 'url'=>array('index')),
	array('label'=>'Create EntriesSite', 'url'=>array('create')),
	array('label'=>'Update EntriesSite', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete EntriesSite', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage EntriesSite', 'url'=>array('admin')),
);
?>

<h1>View EntriesSite #<?php echo $model->id; ?></h1>

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
