<?php
$this->breadcrumbs=array(
	'Yl Recruits'=>array('index'),
	$model->title,
);

$this->menu=array(
	array('label'=>'List YlRecruit', 'url'=>array('index')),
	array('label'=>'Create YlRecruit', 'url'=>array('create')),
	array('label'=>'Update YlRecruit', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete YlRecruit', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage YlRecruit', 'url'=>array('admin')),
);
?>

<h1>View YlRecruit #<?php echo $model->id; ?></h1>

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
