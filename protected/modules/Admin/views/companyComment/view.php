<?php
$this->breadcrumbs=array(
	'Company Duo Zhus'=>array('index'),
	$model->name,
);

$this->menu=array(
	array('label'=>'List CompanyDuoZhu', 'url'=>array('index')),
	array('label'=>'Create CompanyDuoZhu', 'url'=>array('create')),
	array('label'=>'Update CompanyDuoZhu', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete CompanyDuoZhu', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage CompanyDuoZhu', 'url'=>array('admin')),
);
?>

<h1>View CompanyDuoZhu #<?php echo $model->id; ?></h1>

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
