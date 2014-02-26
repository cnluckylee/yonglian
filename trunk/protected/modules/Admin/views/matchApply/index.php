
<div class="topBut">
<a class="button" href="javascript:void(0)" buttype="link" url="<?php echo $this->createUrl('create');?>"><span>æ·»å </span></a>

</div>

<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('admin.widgets.grid.AdminGridView', array(
	'id'=>'match-apply-grid',
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

						'name' => 'title',

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

						'name' => 'remark',

						//'htmlOptions' => array(
								//'width' => '60',
						//),
				),

			array(

						'name' => 'content',

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
/*
			array(

						'name' => 'pdf',

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

			*/
				array(
    		'header' => '操作',
   		'class'=>'CButtonColumn',
   	   'headerHtmlOptions' => array('width'=>'90'),
   	   'htmlOptions' => array('align'=>'center'),
  	      'template'=>'{update} {delete}{matchquery}',
   	   'buttons'=>array(
         
          'matchquery' => array(
            'label'=>'作品',
            'imageUrl'=>Yii::app()->request->baseUrl.'/images/ico/entries.png',
            'options' => array('class'=>'ico_16'),
            'url'=>'Yii::app()->createUrl("admin/MatchQuery/", array("mid"=>$data->id))',
          ),
   	 ),
   	  ),

	),
)); ?>
