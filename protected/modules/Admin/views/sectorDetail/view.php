<?php
$this->breadcrumbs=array(
	'Sector Details'=>array('index'),
	$model->title,
);

$this->menu=array(
	array('label'=>'List SectorDetail', 'url'=>array('index')),
	array('label'=>'Create SectorDetail', 'url'=>array('create')),
	array('label'=>'Update SectorDetail', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete SectorDetail', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage SectorDetail', 'url'=>array('admin')),
);
?>

<h1>View SectorDetail #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'title',
		'imgurl',
		'remark',
		'addtime',
		'updtime',
		'pdf',
		'content',
	),
)); ?>
