<?php
$this->breadcrumbs=array(
	'Subject Managements'=>array('index'),
	$model->name,
);

$this->menu=array(
	array('label'=>'List SubjectManagement', 'url'=>array('index')),
	array('label'=>'Create SubjectManagement', 'url'=>array('create')),
	array('label'=>'Update SubjectManagement', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete SubjectManagement', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage SubjectManagement', 'url'=>array('admin')),
);
?>

<h1>View SubjectManagement #<?php echo $model->id; ?></h1>

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
