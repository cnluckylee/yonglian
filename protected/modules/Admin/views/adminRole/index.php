
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
			data: $('#admin-role-grid-search-form form').serialize()
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
	));
	?>
</div><!-- search-form -->

<?php
$this->widget('admin.widgets.grid.AdminGridView', array(
	'id' => 'admin-role-grid',
	'dataProvider' => $model->search(),
	'filter' => $model,
	'columns' => array(
//		array(
//			'class'=>'CCheckBoxColumn',
//			//'header'=>'全选',
//			'selectableRows'=>'2',
//			'checked'=>'false',
//			'checkBoxHtmlOptions'=>array('name'=>'selectdel[]'), //checkBoxHtmlOptions是数组类型
//			'headerHtmlOptions'=>array('width'=>'50px','value'=>'','checked'=>false),//在这里，我使用默认的。
//			//'footer' => '<button type="button" onclick="GetCheckbox();" style="width:76px">批量删除</button>',
//			//'visible'=>false,
//			//'footer'=>CHtml::button('批量删除',array('onclick'=>'GetCheckbox()','multi_del_url'=>CHtml::normalizeUrl(array('/post/delall/')),'id'=>'mdu')),
//			
//		),
		array(
			'name' => 'id',
			'htmlOptions' => array(
				'width' => '60',
			),
				'header'=>'自动序号',
		),
	
		array(
			'name' => 'name',
				'header'=>'用户名称',
		),
		
		array(
			'header' => '操作',
			'class' => 'CButtonColumn',
			'template' => '{priv} {update} {delete}',
			'buttons' => array(
				'priv' => array(
					'label' => '权限',
					'url' => 'Yii::app()->controller->createUrl("priv",array("id"=>$data->id))',
					'imageUrl' => $this->getModule()->getAssetsUrl().'/images/ico/action/1.gif'
				)
			)
		),
	),
));
?>
