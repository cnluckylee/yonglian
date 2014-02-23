<!--
<div class="topBut">
<a class="button" href="javascript:void(0)" buttype="link" url="<?php echo $this->createUrl('create');?>"><span>添加</span></a>

</div>
-->
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('admin.widgets.grid.AdminGridView', array(
	'id'=>'match-awards-grid',
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

						'name' => 'Prize',

						//'htmlOptions' => array(
								//'width' => '60',
						//),
				),

			array(

						'name' => 'Prize2',

						//'htmlOptions' => array(
								//'width' => '60',
						//),
				),

			array(

						'name' => 'Prize3',

						//'htmlOptions' => array(
								//'width' => '60',
						//),
				),

			array(

						'name' => 'PostName',

						//'htmlOptions' => array(
								//'width' => '60',
						//),
				),

			array(

						'name' => 'Post',

						//'htmlOptions' => array(
								//'width' => '60',
						//),
				),

			array(

						'name' => 'Post2Name',

						//'htmlOptions' => array(
								//'width' => '60',
						//),
				),

			array(

						'name' => 'Post2',

						//'htmlOptions' => array(
								//'width' => '60',
						//),
				),

			array(

						'name' => 'Post3Name',

						//'htmlOptions' => array(
								//'width' => '60',
						//),
				),

			array(

						'name' => 'Post3',

						//'htmlOptions' => array(
								//'width' => '60',
						//),
				),

			
		array(
			'header'=>'操作',
			'class'=>'CButtonColumn',
			'class' => 'CButtonColumn',
			'template' => '{update}',
		),
	),
)); ?>
