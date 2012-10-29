<?php
$this->breadcrumbs=array(
	'Admin Areas'=>array('index'),
	$model->name,
);

$this->menu=array(
	array('label'=>'List adminPic', 'url'=>array('index')),
	array('label'=>'Create adminPic', 'url'=>array('create')),
	array('label'=>'Update adminPic', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete adminPic', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'确定要删除吗？')),
	array('label'=>'Manage adminPic', 'url'=>array('admin')),
);
?>

<h1>View adminPic #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'name',
		'pinyin',
	),
)); ?>
