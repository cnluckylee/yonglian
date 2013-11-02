<?php
$this->breadcrumbs=array(
	'Theories'=>array('index'),
	$model->title,
);

$this->menu=array(
	array('label'=>'List Theory', 'url'=>array('index')),
	array('label'=>'Create Theory', 'url'=>array('create')),
	array('label'=>'Update Theory', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete Theory', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Theory', 'url'=>array('admin')),
);
?>

<h1>View Theory #<?php echo $model->id; ?></h1>

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
		'cid',
		'nid',
		'fxid',
		'qid',
		'rid',
		'cwid',
		'kid',
		'sid',
		'mid',
	),
)); ?>
