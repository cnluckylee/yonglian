<?php
$this->breadcrumbs=array(
	'Company News'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List CompanyNews', 'url'=>array('index')),
	array('label'=>'Create CompanyNews', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('company-news-grid', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Manage Company News</h1>

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
	'id'=>'company-news-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'id',
		'title',
		'cid',
		'imgurl',
		'content',
		'remark',
		/*
		'addtime',
		'updtime',
		'IndustryID',
		'CompanyID',
		'pid',
		*/
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
