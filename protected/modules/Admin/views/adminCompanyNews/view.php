<?php
$this->breadcrumbs=array(
	'Company News'=>array('index'),
	$model->title,
);

$this->menu=array(
	array('label'=>'List CompanyNews', 'url'=>array('index')),
	array('label'=>'Create CompanyNews', 'url'=>array('create')),
	array('label'=>'Update CompanyNews', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete CompanyNews', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage CompanyNews', 'url'=>array('admin')),
);
?>

<h1>View CompanyNews #<?php echo $model->id; ?></h1>

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
