<?php
$this->breadcrumbs=array(
	'Admin Menus'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List AdminMenu', 'url'=>array('index')),
	array('label'=>'Create AdminMenu', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('admin-menu-grid', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Manage Admin Menus</h1>

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

<?php 
    $dataProvider = $model->search();
    $dataProvider->setPagination(array('pageSize'=>2));
    
$this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'admin-menu-grid',
	'dataProvider'=>$dataProvider,
       // 'enablePagination' => false,
	'filter'=>$model,
        
	'columns'=>array(
		'id',
		'name',
		'parentid',
		'modules',
		'controller',
		'action',
		/*
		'data',
		'ico',
		'listorder',
		'display',
		*/
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
