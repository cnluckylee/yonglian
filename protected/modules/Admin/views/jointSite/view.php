<?php
$this->breadcrumbs=array(
	'Joint Sites'=>array('index'),
	$model->name,
);

$this->menu=array(
	array('label'=>'List JointSite', 'url'=>array('index')),
	array('label'=>'Create JointSite', 'url'=>array('create')),
	array('label'=>'Update JointSite', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete JointSite', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage JointSite', 'url'=>array('admin')),
);
?>

<h1>View JointSite #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'name',
		'addtime',
		'updtime',
		'state',
	),
)); ?>
