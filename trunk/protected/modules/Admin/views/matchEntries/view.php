<?php
$this->breadcrumbs=array(
	'Match Entries'=>array('index'),
	$model->title,
);

$this->menu=array(
	array('label'=>'List MatchEntries', 'url'=>array('index')),
	array('label'=>'Create MatchEntries', 'url'=>array('create')),
	array('label'=>'Update MatchEntries', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete MatchEntries', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage MatchEntries', 'url'=>array('admin')),
);
?>

<h1>View MatchEntries #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'title',
		'mid',
		'type',
		'imgurl',
		'content',
		'remark',
		'addtime',
		'updtime',
		'pdf',
		'mname',
		'author',
	),
)); ?>
