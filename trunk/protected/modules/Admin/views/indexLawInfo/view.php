<?php
$this->breadcrumbs=array(
	'Index Market Infos'=>array('index'),
	$model->title,
);

$this->menu=array(
	array('label'=>'List IndexMarketInfo', 'url'=>array('index')),
	array('label'=>'Create IndexMarketInfo', 'url'=>array('create')),
	array('label'=>'Update IndexMarketInfo', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete IndexMarketInfo', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage IndexMarketInfo', 'url'=>array('admin')),
);
?>

<h1>View IndexMarketInfo #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'title',
		'imgurl',
		'content',
		'remark',
		'addtime',
		'updtime',
		'pid',
	),
)); ?>
