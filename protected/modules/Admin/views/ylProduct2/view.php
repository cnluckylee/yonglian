<?php
$this->breadcrumbs=array(
	'Admin Industries'=>array('index'),
	$model->name,
);

$this->menu=array(
	array('label'=>'List adminIndustry', 'url'=>array('index')),
	array('label'=>'Create adminIndustry', 'url'=>array('create')),
	array('label'=>'Update adminIndustry', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete adminIndustry', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage adminIndustry', 'url'=>array('admin')),
);
?>

<h1>View adminIndustry #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'name',
		'pinyin',
		'parentid',
		'listorder',
		'addTime',
		'updTime',
	),
)); ?>
