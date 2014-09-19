<div class="topBut">
	<a class="button" href="javascript:void(0)" buttype="link" url="<?php echo $this->createUrl('create'); ?>"><span>添加</span></a>

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
			'value' =>array($this,"getValueByKey"),

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
