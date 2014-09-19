
<div class="topBut">
<a class="button" href="javascript:void(0)" buttype="link" url="<?php echo $this->createUrl('create');?>"><span>添加</span></a>

</div>

<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('admin.widgets.grid.AdminGridView', array(
	'id'=>'adminjoint-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		array(

						'name' => 'id',
						'value' => '$row+1',
						'header' => '自动序号'
				),

			array(

						'name' => 'title',
						'header' => '文章标题'
						//'htmlOptions' => array(
								//'width' => '60',
						//),
				),

			array(

						'name' => 'cid',
						'value' =>array($this,"getValueByKey"),
						'header' => '类型图标'
						//'htmlOptions' => array(
								//'width' => '60',
						//),
				),
			array(
			
					'name' => 'pid',
					'value' =>array($this,"getValueByPid"),
					'header' => '文章类别'
					//'htmlOptions' => array(
					//'width' => '60',
					//),
			),
			array(

						'name' => 'CompanyID',
						'value' =>array($this,"getValueByCompanyID"),
						'header' => '用户名称'
						//'htmlOptions' => array(
								//'width' => '60',
						//),
				),	


			array(

						'name' => 'updtime',
						'header' => '更新日期'
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
