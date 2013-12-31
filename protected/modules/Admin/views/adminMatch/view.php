<?php
$this->breadcrumbs=array(
	'Matches'=>array('index'),
	$model->title,
);

$this->menu=array(
	array('label'=>'List Match', 'url'=>array('index')),
	array('label'=>'Create Match', 'url'=>array('create')),
	array('label'=>'Update Match', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete Match', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Match', 'url'=>array('admin')),
);
?>

<h1>View Match #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'title',
		'fid',
		'imgurl',
		'content',
		'remark',
		'addtime',
		'updtime',
		'IndustryID',
		'CompanyID',
		'zzid',
		'hxid',
		'zxid',
		'stopdate',
		'sszb',
		'ssxb',
		'ssxs',
		'ctid',
	),
)); ?>
