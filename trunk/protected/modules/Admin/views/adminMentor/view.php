<?php
$this->breadcrumbs=array(
	'Mentors'=>array('index'),
	$model->title,
);

$this->menu=array(
	array('label'=>'List Mentor', 'url'=>array('index')),
	array('label'=>'Create Mentor', 'url'=>array('create')),
	array('label'=>'Update Mentor', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete Mentor', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Mentor', 'url'=>array('admin')),
);
?>

<h1>View Mentor #<?php echo $model->id; ?></h1>

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
