<?php
/**
 * The following variables are available in this template:
 * - $this: the CrudCode object
 */
?>

<?php
echo "<?php\n";

?>
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
			data: $('#<?php echo $this->class2id($this->modelClass); ?>-grid-search-form form').serialize()
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
<a class="button" href="javascript:void(0)" buttype="link" url="<?php echo "<?php echo \$this->createUrl('create');?>"?>"><span>添加</span></a>
<a class="button search-button" href="javascript:void(0)" ><span>高级搜索</span></a>
</div>

<div class="search-form" style="display:none">
<?php echo "<?php \$this->renderPartial('_search',array(
	'model'=>\$model,
)); ?>\n"; ?>
</div><!-- search-form -->

<?php echo "<?php"; ?> $this->widget('admin.widgets.grid.AdminGridView', array(
	'id'=>'<?php echo $this->class2id($this->modelClass); ?>-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
<?php
$count=0;
foreach($this->tableSchema->columns as $column)
{
	if(++$count==7)
		echo "\t\t/*\n";
	
	echo "\t\tarray(\n
			\t\t\t'name' => '".$column->name."',\n
			\t\t\t//'htmlOptions' => array(
				\t\t\t\t//'width' => '60',
			\t\t\t//),
		\t\t),\n
	";
}
if($count>=7)
	echo "\t\t*/\n";
?>
		array(
			'class'=>'CButtonColumn',
			'class' => 'CButtonColumn',
			'template' => '{update} {delete}',
		),
	),
)); ?>
