<?php
$this->breadcrumbs=array(
	'Cwpolicys'=>array('index'),
	$model->title,
);

$this->menu=array(
	array('label'=>'List Cwpolicy', 'url'=>array('index')),
	array('label'=>'Create Cwpolicy', 'url'=>array('create')),
	array('label'=>'Update Cwpolicy', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete Cwpolicy', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Cwpolicy', 'url'=>array('admin')),
);
?>

<h1>View Cwpolicy #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'title',
		'aid',
		'imgurl',
		'content',
		'remark',
		'addtime',
		'updtime',
		'IndustryID',
		'CompanyID',
		'Agency',
	),
)); ?>
