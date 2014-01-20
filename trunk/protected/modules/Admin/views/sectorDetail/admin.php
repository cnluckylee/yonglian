<?php
$this->breadcrumbs=array(
	'Sector Details'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List SectorDetail', 'url'=>array('index')),
	array('label'=>'Create SectorDetail', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('sector-detail-grid', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Manage Sector Details</h1>

<p>
You may optionally enter a comparison operator (<b>&lt;</b>, <b>&lt;=</b>, <b>&gt;</b>, <b>&gt;=</b>, <b>&lt;&gt;</b>
or <b>=</b>) at the beginning of each of your search values to specify how the comparison should be done.
</p>

<?php echo CHtml::link('Advanced Search','#',array('class'=>'search-button')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'sector-detail-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'id',
		'title',
		'imgurl',
		'remark',
		'addtime',
		'updtime',
		/*
		'pdf',
		'content',
		*/
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
