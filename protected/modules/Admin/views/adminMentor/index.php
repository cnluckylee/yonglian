
<div class="topBut">
<a class="button" href="javascript:void(0)" buttype="link" url="<?php echo $this->createUrl('create');?>"><span>添加</span></a>

</div>

<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('admin.widgets.grid.AdminGridView', array(
	'id'=>'adminmentor-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		array(

						'name' => 'id',
						'value' => '$row+1',
						'header' => '序号'
				),

			array(

						'name' => 'title',
						'header' => '项目标题'
						//'htmlOptions' => array(
								//'width' => '60',
						//),
				),

			array(

						'name' => 'cid',
						'value' =>array($this,"getValueByKey"),
						'header' => '分类'
						//'htmlOptions' => array(
								//'width' => '60',
						//),
				),

			array(

						'name' => 'CompanyID',
						'value' =>array($this,"getValueByCompanyID"),
						'header' => '公司'
						//'htmlOptions' => array(
								//'width' => '60',
						//),
				),	

			array(

						'name' => 'imgurl',
						'type' => 'image',
						'header' => '图片',
						'htmlOptions' => array(
								'class' => 'thumbimage_100',
						),
				),

			array(

						'name' => 'remark',
						'header' => '摘要',
						'value' => 'Helper::truncate_utf8_string($data->remark,30)',
						'htmlOptions' => array(
								'width' => '60',
						),
				),

			
			

		array(
			'header'=>'操作',
			'class'=>'CButtonColumn',
			'class' => 'CButtonColumn',
			'template' => '{update} {delete}',
		),
	),
)); ?>
