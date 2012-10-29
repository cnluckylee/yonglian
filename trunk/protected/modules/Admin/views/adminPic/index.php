﻿
<?php

Yii::app()->clientScript->registerScript('search', "
var searchFromHtml = '';
var searchFromDialog = null;
var getSearchFromHtml = function() {
	if(searchFromHtml== '') {
		searchFromHtml = $('.search-form').html();
		$('.search-form').remove();
	}
	
	return searchFromHtml;	
}
var searchFromDialog = art.dialog({
	title: '高级搜索',
	okValue: '搜索',
	visible: false,
	padding: '5px 5px',
	ok:function(){
		$.fn.yiiGridView.update('admin-role-grid', {
			data: $('#admin-user-grid-search-form form').serialize()
		});
		this.hidden();
		return false;
	},
	content:getSearchFromHtml()
});
$('.search-button').click(function(){
	searchFromDialog.visible();
	return false;
});

");
?>
<div class="topBut">
	<a class="button" href="javascript:void(0)" buttype="link" url="<?php echo $this->createUrl('create'); ?>"><span>添加</span></a>
	<a class="button search-button" href="javascript:void(0)" ><span>高级搜索</span></a>
</div>

<div class="search-form" style="display:none">
	<?php
	
	$this->renderPartial('_search', array(
		'model' => $model,
		'picType' => $picType,
	));
	?>
</div><!-- search-form -->

<?php
$this->widget('admin.widgets.grid.AdminGridView', array(
	'id' => 'admin-pic-grid',
	'dataProvider' => $model->search(),
	'filter' => $model,
	
	
	'columns' => array(
		array(
			'name' => 'id',
			'value' => '$row+1',
			'htmlOptions' => array(
				'width' => '60',
			),
		),
		array(
			'name' => 'title',
		//'htmlOptions' => array(
		//'width' => '60',
		//),
		),
		
		array(
			'name' => 'type',
			'value' => $picType[$data->type],
			
		//'htmlOptions' => array(
		//'width' => '60',
		//),
		),
		array(
			'name' => 'imgurl',
			'type' => 'image',
			'htmlOptions' => array(
				'class' => 'thumbimage_100',
			),
		),
		array(
			'name' => 'addtime',
			'value'=>'date("Y-m-d", $data->addtime)',
		//'htmlOptions' => array(
		//'width' => '60',
		//),
		),
		array(
			'name' => 'updtime',
			'value'=>'date("Y-m-d", $data->updtime)',
		//'htmlOptions' => array(
		//'width' => '60',
		//),
		),
		array(
			
			'class' => 'CButtonColumn',
			'class' => 'CButtonColumn',
			'header'=>'操作',
			'template' => '{update}{delete}',
		),
	),
));
?>
