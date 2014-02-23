<?php
$this->breadcrumbs=array(
	'Match Awards'=>array('index'),
	$model->title,
);

$this->menu=array(
	array('label'=>'List MatchAwards', 'url'=>array('index')),
	array('label'=>'Create MatchAwards', 'url'=>array('create')),
	array('label'=>'Update MatchAwards', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete MatchAwards', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage MatchAwards', 'url'=>array('admin')),
);
?>

<h1>View MatchAwards #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'title',
		'imgurl',
		'content',
		'remark',
		'addtime',
		'updtime',
		'ctid',
		'Prize',
		'Prize2',
		'Prize3',
		'PostName',
		'Post',
		'Post2Name',
		'Post2',
		'Post3Name',
		'Post3',
		'pdf',
		'aid',
		'aname',
		'aid2',
		'aname2',
	),
)); ?>
