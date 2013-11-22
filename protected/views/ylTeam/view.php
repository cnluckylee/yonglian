<?php
$this->breadcrumbs=array(
	'Yl Teams'=>array('index'),
	$model->title,
);

$this->menu=array(
	array('label'=>'List YlTeam', 'url'=>array('index')),
	array('label'=>'Create YlTeam', 'url'=>array('create')),
	array('label'=>'Update YlTeam', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete YlTeam', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage YlTeam', 'url'=>array('admin')),
);
?>

<h1>View YlTeam #<?php echo $model->id; ?></h1>

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
