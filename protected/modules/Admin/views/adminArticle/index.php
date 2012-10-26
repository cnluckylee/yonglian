

<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php 
$pager = Yii::app()->params['type'];

$this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'admin-article-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		array(

						'name' => 'id',
						'value' => '$row+1',
						'header' => '序号'
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

						'name' => 'imgurl',
						'type' => 'image',
						
						'htmlOptions' => array(
								'class' => 'thumbimage_100',
						),
				),

			array(

						'name' => 'content',

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

						'name' => 'addtime',
						'value' => 'date("Y-m-d",$data->addtime)',
						//'htmlOptions' => array(
								//'width' => '60',
						//),
				),
			array(

						'name' => 'updtime',
						'value' => 'date("Y-m-d",$data->updtime)',
						//'htmlOptions' => array(
								//'width' => '60',
						//),
				),				
			array(
			'class'=>'CButtonColumn',
			'class'=>'CButtonColumn',
			'class' => 'CButtonColumn',
			'template' => '{view} {update} {delete}',
		),
	),
)); ?>
