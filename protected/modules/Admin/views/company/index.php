
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
			data: $('#company-grid-search-form form').serialize()
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
<a class="button" href="javascript:void(0)" buttype="link" url="<?php echo $this->createUrl('create');?>"><span>添加</span></a>
<a class="button search-button" href="javascript:void(0)" ><span>高级搜索</span></a>
</div>

<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('admin.widgets.grid.AdminGridView', array(
	'id'=>'company-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		array(

						'name' => 'id',
						'value' => '$row+1',
						//'htmlOptions' => array(
								//'width' => '60',
						//),
				),

			array(

						'name' => 'name',

						//'htmlOptions' => array(
								//'width' => '60',
						//),
				),

			array(

						'name' => 'pinyin',

						//'htmlOptions' => array(
								//'width' => '60',
						//),
				),

			array(

						'name' => 'summary',

						//'htmlOptions' => array(
								//'width' => '60',
						//),
				),

			array(

						'name' => 'desc',

						//'htmlOptions' => array(
								//'width' => '60',
						//),
				),

			array(

						'name' => 'addr',

						//'htmlOptions' => array(
								//'width' => '60',
						//),
				),

			/*
		array(

						'name' => 'zip',

						//'htmlOptions' => array(
								//'width' => '60',
						//),
				),

			array(

						'name' => 'mail',

						//'htmlOptions' => array(
								//'width' => '60',
						//),
				),

			array(

						'name' => 'fax',

						//'htmlOptions' => array(
								//'width' => '60',
						//),
				),

			array(

						'name' => 'salesline',

						//'htmlOptions' => array(
								//'width' => '60',
						//),
				),

			array(

						'name' => 'serviceline',

						//'htmlOptions' => array(
								//'width' => '60',
						//),
				),

			array(

						'name' => 'website',

						//'htmlOptions' => array(
								//'width' => '60',
						//),
				),

			*/
		array(
			'header' => '操作',
			'class'=>'CButtonColumn',
			'class' => 'CButtonColumn',
			'template' => '{update} {delete}',
		),
	),
)); ?>
