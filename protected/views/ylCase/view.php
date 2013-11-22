<?php
$this->breadcrumbs=array(
	'Yl Cases'=>array('index'),
	$model->title,
);

$this->menu=array(
	array('label'=>'List YlCase', 'url'=>array('index')),
	array('label'=>'Create YlCase', 'url'=>array('create')),
	array('label'=>'Update YlCase', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete YlCase', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage YlCase', 'url'=>array('admin')),
);
?>

<h1>View YlCase #<?php echo $model->id; ?></h1>

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
