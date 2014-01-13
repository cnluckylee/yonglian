<?php
$this->breadcrumbs=array(
	'Company Products'=>array('index'),
	$model->name,
);

$this->menu=array(
	array('label'=>'List CompanyProduct', 'url'=>array('index')),
	array('label'=>'Create CompanyProduct', 'url'=>array('create')),
	array('label'=>'Update CompanyProduct', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete CompanyProduct', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage CompanyProduct', 'url'=>array('admin')),
);
?>

<h1>View CompanyProduct #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'name',
		'keywords',
		'desc',
		'content',
		'class1',
		'class2',
		'class3',
		'order',
		'imgurl',
		'imgurls',
		'cid',
		'updtime',
		'addtime',
		'pdf',
	),
)); ?>
