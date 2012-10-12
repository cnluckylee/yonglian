<?php
$this->breadcrumbs=array(
	'Admin Articles'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List AdminArticle', 'url'=>array('index')),
	array('label'=>'Create AdminArticle', 'url'=>array('create')),
	array('label'=>'Update AdminArticle', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete AdminArticle', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage AdminArticle', 'url'=>array('admin')),
);
?>

<h1>View AdminArticle #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'cid',
		'imgurl',
		'content',
		'remark',
	),
)); ?>
