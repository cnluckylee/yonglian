
<div class="topBut">
<a class="button" href="javascript:void(0)" buttype="link" url="<?php echo $this->createUrl('create');?>"><span>添加</span></a>

</div>

<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('admin.widgets.grid.AdminGridView', array(
	'id'=>'article-grid',
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
						'header' => '文章标题'
						//'htmlOptions' => array(
								//'width' => '60',
						//),
				),

			array(

						'name' => 'cid',
						'value' =>array($this,"getValueByKey"),
						'header' => '文章分类'
						//'htmlOptions' => array(
								//'width' => '60',
						//),
				),
			array(

						'name' => 'IndustryID',
						'value' =>array($this,"getValueByIndustryID"),
						'header' => '行业'
						//'htmlOptions' => array(
								//'width' => '60',
						//),
				),	
			array(

						'name' => 'aname',
						
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

						'name' => 'updtime',
						
						//'htmlOptions' => array(
								//'width' => '60',
						//),
				),
		array(
			'header'=>'操作',
			'class'=>'CButtonColumn',
			'class' => 'CButtonColumn',
			'template' => '{update} {delete}',
		),
	),
)); ?>
