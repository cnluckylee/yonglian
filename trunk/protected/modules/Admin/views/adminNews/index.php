
<div class="topBut">
<a class="button" href="javascript:void(0)" buttype="link" url="<?php echo $this->createUrl('create');?>"><span>添加</span></a>

</div>

<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('admin.widgets.grid.AdminGridView', array(
	'id'=>'news-grid',
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

						'name' => 'title',

						//'htmlOptions' => array(
								//'width' => '60',
						//),
				),

			array(

						'name' => 'keywords',

						//'htmlOptions' => array(
								//'width' => '60',
						//),
				),

			array(

						'name' => 'remark',

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
						//'htmlOptions' => array(
								//'width' => '60',
						//),
				),

			/*
		array(

						'name' => 'imgurls',

						//'htmlOptions' => array(
								//'width' => '60',
						//),
				),

			array(

						'name' => 'updtime',

						//'htmlOptions' => array(
								//'width' => '60',
						//),
				),

			array(

						'name' => 'addtime',

						//'htmlOptions' => array(
								//'width' => '60',
						//),
				),

			array(

						'name' => 'state',

						//'htmlOptions' => array(
								//'width' => '60',
						//),
				),

			*/
		array(
			'class'=>'CButtonColumn',
			'class' => 'CButtonColumn',
			'template' => '{update} {delete}',
		),
	),
)); ?>
