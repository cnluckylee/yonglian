<?php
$this->breadcrumbs=array(
	'Joints'=>array('index'),
	$model->title,
);

$this->menu=array(
	array('label'=>'List Joint', 'url'=>array('index')),
	array('label'=>'Create Joint', 'url'=>array('create')),
	array('label'=>'Update Joint', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete Joint', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Joint', 'url'=>array('admin')),
);
?>

<h1>View Joint #<?php echo $model->id; ?></h1>

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
