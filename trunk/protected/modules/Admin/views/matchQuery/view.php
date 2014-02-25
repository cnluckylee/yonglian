<?php
$this->breadcrumbs=array(
	'Match Queries'=>array('index'),
	$model->title,
);

$this->menu=array(
	array('label'=>'List MatchQuery', 'url'=>array('index')),
	array('label'=>'Create MatchQuery', 'url'=>array('create')),
	array('label'=>'Update MatchQuery', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete MatchQuery', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage MatchQuery', 'url'=>array('admin')),
);
?>

<h1>View MatchQuery #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'title',
		'subject',
		'condition',
		'other',
		'imgurl',
		'pdf',
		'addtime',
		'updtime',
	),
)); ?>
