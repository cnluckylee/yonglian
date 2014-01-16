<?php
$this->breadcrumbs=array(
	'Company Xie Shous'=>array('index'),
	$model->name,
);

$this->menu=array(
	array('label'=>'List CompanyXieShou', 'url'=>array('index')),
	array('label'=>'Create CompanyXieShou', 'url'=>array('create')),
	array('label'=>'Update CompanyXieShou', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete CompanyXieShou', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage CompanyXieShou', 'url'=>array('admin')),
);
?>

<h1>View CompanyXieShou #<?php echo $model->id; ?></h1>

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
