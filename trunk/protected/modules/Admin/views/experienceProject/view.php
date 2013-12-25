<?php
$this->breadcrumbs=array(
	'Experience Projects'=>array('index'),
	$model->title,
);

$this->menu=array(
	array('label'=>'List ExperienceProject', 'url'=>array('index')),
	array('label'=>'Create ExperienceProject', 'url'=>array('create')),
	array('label'=>'Update ExperienceProject', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete ExperienceProject', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage ExperienceProject', 'url'=>array('admin')),
);
?>

<h1>View ExperienceProject #<?php echo $model->id; ?></h1>

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
		'score',
		'type',
		'pdf',
	),
)); ?>
