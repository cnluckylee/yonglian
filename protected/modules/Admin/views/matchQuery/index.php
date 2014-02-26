
<div class="topBut">
<a class="button" href="javascript:void(0)" buttype="link" url="<?php echo $this->createUrl('create',array('mid'=>$cid));?>"><span>添加</span></a>
&nbsp;&nbsp;&nbsp;&nbsp;(赛事查询名称:<font color="red"> <?php echo $cname;?></font>)
</div>

<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('admin.widgets.grid.AdminGridView', array(
	'id'=>'match-query-grid',
	'dataProvider'=>$model->search($cid),
	'filter'=>$model,
	'columns'=>array(
		array(

						'name' => 'id',
						'value' =>'$row+1',

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
			array(

						'name' => 'title',

						//'htmlOptions' => array(
								//'width' => '60',
						//),
				),

			array(

						'name' => 'subject',

						//'htmlOptions' => array(
								//'width' => '60',
						//),
				),

			array(

						'name' => 'condition',

						//'htmlOptions' => array(
								//'width' => '60',
						//),
				),

			array(

						'name' => 'other',

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

			
		array(

						'name' => 'pdf',

						//'htmlOptions' => array(
								//'width' => '60',
						//),
				),
/*
			array(

						'name' => 'addtime',

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

			*/
		array(
			'class'=>'CButtonColumn',
			'class' => 'CButtonColumn',
			'template' => '{update} {delete}',
		),
	),
)); ?>
