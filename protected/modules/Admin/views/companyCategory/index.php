
<div class="topBut">
<a class="button" href="javascript:void(0)" buttype="link" url="<?php echo $this->createUrl('create',array('cid'=>$cid));?>"><span>添加</span></a>

</div>

<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php 
	
	$this->widget('admin.widgets.grid.AdminGridView', array(
	'id'=>'company-category-grid',
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

						'name' => 'name',

						//'htmlOptions' => array(
								//'width' => '60',
						//),
				),

			array(

						'name' => 'companyName',

						//'htmlOptions' => array(
								//'width' => '60',
						//),
				),

			
			array(
					'header'=>'操作功能',
			'class'=>'CButtonColumn',
			'class' => 'CButtonColumn',
			'template' => '{update} {delete}',
		),
	),
)); ?>
