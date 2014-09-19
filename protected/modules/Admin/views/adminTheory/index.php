
<div class="topBut">
<a class="button" href="javascript:void(0)" buttype="link" url="<?php echo $this->createUrl('create');?>"><span>添加</span></a>

</div>

<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('admin.widgets.grid.AdminGridView', array(
	'id'=>'theory-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		array(

						'name' => 'id',
						'value' => '$row+1',
						'header' => '序号',

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

	/*		array(

						'name' => 'zzid',
						'value' =>array($this,"getValueByzzid"),
						//'htmlOptions' => array(
								//'width' => '60',
						//),
				),
			array(

						'name' => 'hxid',
						'value' =>array($this,"getValueByhxid"),
						//'htmlOptions' => array(
								//'width' => '60',
						//),
				),
			array(

						'name' => 'zxid',
						'value' =>array($this,"getValueByzxid"),
						//'htmlOptions' => array(
								//'width' => '60',
						//),
				),*/
			array(

						'name' => 'CompanyID',
						'value' =>array($this,"getValueByCompanyID"),
					
						//'htmlOptions' => array(
								//'width' => '60',
						//),
				),		
	/*		array(

						'name' => 'IndustryID',
						'value' =>array($this,"getValueByIndustryID"),
						//'htmlOptions' => array(
								//'width' => '60',
						//),
				),	*/
			
			array(

						'name' => 'mname',

						//'htmlOptions' => array(
								//'width' => '60',
						//),
				),
			array(
						
					'name' => 'remark',
					//	'value' =>array($this,"getValueByCompanyID"),
			
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
			'header'=>"操作功能",
			'class'=>'CButtonColumn',
			'class' => 'CButtonColumn',
			'template' => '{update} {delete}',
		),
	),
)); ?>
