<?php
$this->breadcrumbs=array(
	'Company Tuan Duis'=>array('index'),
	$model->name,
);

$this->menu=array(
	array('label'=>'List CompanyTuanDui', 'url'=>array('index')),
	array('label'=>'Create CompanyTuanDui', 'url'=>array('create')),
	array('label'=>'Update CompanyTuanDui', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete CompanyTuanDui', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage CompanyTuanDui', 'url'=>array('admin')),
);
?>

<h1>View CompanyTuanDui #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'name',
		'keywords',
		'desc',
		'content',
		'class1',
		'order',
		'imgurl',
		'imgurls',
		'cid',
		'updtime',
		'addtime',
		'pdf',
		'cname',
	),
)); ?>
