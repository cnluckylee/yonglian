
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
	));
	?>
</div><!-- search-form -->

<?php
$this->widget('admin.widgets.grid.AdminGridView', array(
	'id' => 'admin-user-grid',
	'dataProvider' => $model->search(),
	'filter' => $model,
	'columns' => array(
		array(
			'name' => 'id',
			'htmlOptions' => array(
				'width' => '60',
			),
				'header'=>'自动序号',
		),
		array(
			'name' => 'username',
				'header'=>'用户名称',
		//'htmlOptions' => array(
		//'width' => '60',
		//),
		),
		
		array(
			'name' => 'name',
				'header'=>'员工姓名',
		//'htmlOptions' => array(
		//'width' => '60',
		//),
		),
		array(
			'name' => 'role_id',
			'value' => 'AdminRole::getDataList($data->role_id)',
			'filter' => AdminRole::getDataList(),
				'header'=>'角色名称',
		//'htmlOptions' => array(
		//'width' => '60',
		//),
		),
		array(
			'name' => 'disabled',
			'value' => 'AdminUser::$iSDisabled[$data->disabled]',
			'filter' => AdminUser::$iSDisabled, //显示一个下拉列表，多个,所以是复数
				'header'=>'禁用控制',
		//'htmlOptions' => array(
		//'width' => '60',
		//),
		),
		/*
		  array(

		  'name' => 'setting',

		  //'htmlOptions' => array(
		  //'width' => '60',
		  //),
		  ),

		 */
		array(
			
			'class' => 'CButtonColumn',
			'class' => 'CButtonColumn',
			'header' => '操作功能',
			'template' => '{update} {delete}',
		),
	),
));
?>
