<?php
$this->breadcrumbs=array(
	'Yl Products'=>array('index'),
	$model->title,
);

$this->menu=array(
	array('label'=>'List YlProduct', 'url'=>array('index')),
	array('label'=>'Create YlProduct', 'url'=>array('create')),
	array('label'=>'Update YlProduct', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete YlProduct', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage YlProduct', 'url'=>array('admin')),
);
?>

<h1>View YlProduct #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'title',
		'cid',
		'imgurl',
		'content',
		'remark',
		'addtime',
		'updtime',
		'IndustryID',
		'CompanyID',
		'pid',
	),
)); ?>
