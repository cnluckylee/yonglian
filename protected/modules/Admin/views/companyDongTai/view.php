<?php
$this->breadcrumbs=array(
	'Company Dong Tais'=>array('index'),
	$model->name,
);

$this->menu=array(
	array('label'=>'List CompanyDongTai', 'url'=>array('index')),
	array('label'=>'Create CompanyDongTai', 'url'=>array('create')),
	array('label'=>'Update CompanyDongTai', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete CompanyDongTai', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage CompanyDongTai', 'url'=>array('admin')),
);
?>

<h1>View CompanyDongTai #<?php echo $model->id; ?></h1>

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
