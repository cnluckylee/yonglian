<?php
$this->breadcrumbs=array(
	'Team Shine Sites'=>array('index'),
	$model->name,
);

$this->menu=array(
	array('label'=>'List TeamShineSite', 'url'=>array('index')),
	array('label'=>'Create TeamShineSite', 'url'=>array('create')),
	array('label'=>'Update TeamShineSite', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete TeamShineSite', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage TeamShineSite', 'url'=>array('admin')),
);
?>

<h1>View TeamShineSite #<?php echo $model->id; ?></h1>

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
