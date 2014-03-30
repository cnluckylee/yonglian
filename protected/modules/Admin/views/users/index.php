
<div class="topBut">
<a class="button" href="javascript:void(0)" buttype="link" url="<?php echo $this->createUrl('create',array('type'=>$type));?>"><span>添加</span></a>

</div>

<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('admin.widgets.grid.AdminGridView', array(
	'id'=>'users-grid',
	'dataProvider'=>$model->search($type),
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

						'name' => 'username',

						//'htmlOptions' => array(
								//'width' => '60',
						//),
				),

			array(

						'name' => 'companyname',

						//'htmlOptions' => array(
								//'width' => '60',
						//),
				),

			array(

						'name' => 'linkuser',

						//'htmlOptions' => array(
								//'width' => '60',
						//),
				),

			array(

						'name' => 'tel',

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

			/*
		array(

						'name' => 'website',

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

						'name' => 'updtime',

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

			array(

						'name' => 'type',

						//'htmlOptions' => array(
								//'width' => '60',
						//),
				),

			*/
		array(
			'class'=>'CButtonColumn',
			'class' => 'CButtonColumn',
			'template' => '{update} {delete}{article}',
			'buttons'=>array(
         'article' => array(
            'label'=>'评论',
            'imageUrl'=>Yii::app()->request->baseUrl.'/images/ico/comment.png',
            'options' => array('class'=>'ico_16'),
            'url'=>'Yii::app()->createUrl("admin/adminUserArticle/Article", array("id"=>$data->id))',
          ),
    ),
),
	),
)); ?>
