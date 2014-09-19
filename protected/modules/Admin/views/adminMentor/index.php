
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
						'value' => '$row+1'
						
				),

			array(

						'name' => 'title',
						
						//'htmlOptions' => array(
								//'width' => '60',
						//),
				),

			array(

						'name' => 'cid',
						'value' =>array($this,"getValueByKey"),
					
						//'htmlOptions' => array(
								//'width' => '60',
						//),
				),

			array(

						'name' => 'CompanyID',
						'value' =>array($this,"getValueByCompanyID"),
						//'htmlOptions' => array(
								//'width' => '60',
						//),
				),	

			array(
						'name' => 'uname',
						
						'htmlOptions' => array(
								//'class' => 'thumbimage_100',
						),
				),

			
			

		array(
			'header'=>'操作功能',
			'class'=>'CButtonColumn',
			'class' => 'CButtonColumn',
			'template' => '{update} {delete}',
		),
	),
)); ?>
