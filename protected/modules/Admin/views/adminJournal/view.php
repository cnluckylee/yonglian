<?php
$this->breadcrumbs=array(
	'Journals'=>array('index'),
	$model->title,
);

$this->menu=array(
	array('label'=>'List Journal', 'url'=>array('index')),
	array('label'=>'Create Journal', 'url'=>array('create')),
	array('label'=>'Update Journal', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete Journal', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Journal', 'url'=>array('admin')),
);
?>

<h1>View Journal #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'title',
		'remark',
		'addtime',
		'updtime',
		'downurl',
	),
)); ?>
