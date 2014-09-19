
<div class="topBut">
<a class="button" href="javascript:void(0)" buttype="link" url="<?php echo $this->createUrl('create');?>"><span>添加</span></a>

</div>

<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('admin.widgets.grid.AdminGridView', array(
	'id'=>'company-product-grid',
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
			
					'name' => 'class1',
					'value'=>array($this,'getValueBykey'),
					//'htmlOptions' => array(
					//'width' => '60',
					//),
			),
		array(

						'name' => 'cname',

						//'htmlOptions' => array(
								//'width' => '60',
						//),
				),
		
			
		/*	array(

						'name' => 'desc',

						//'htmlOptions' => array(
								//'width' => '60',
						//),
				),

		

		

			
		array(

						'name' => 'class2',

						//'htmlOptions' => array(
								//'width' => '60',
						//),
				),

			array(

						'name' => 'class3',

						//'htmlOptions' => array(
								//'width' => '60',
						//),
				),

			array(

						'name' => 'order',

						//'htmlOptions' => array(
								//'width' => '60',
						//),
				),

			array(

						'name' => 'imgurl',

						//'htmlOptions' => array(
								//'width' => '60',
						//),
				),

			array(

						'name' => 'imgurls',

						//'htmlOptions' => array(
								//'width' => '60',
						//),
				),

			array(

						'name' => 'cid',

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

						'name' => 'pdf',

						//'htmlOptions' => array(
								//'width' => '60',
						//),
				),

			*/
		array(
			'header'=>'操作功能',
			'class'=>'CButtonColumn',
			'class' => 'CButtonColumn',
			'template' => '{update} {view} {delete}',
		),
	),
)); ?>
