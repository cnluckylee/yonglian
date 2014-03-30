
<div class="topBut">
<a class="button" href="javascript:void(0)" buttype="link" url="<?php echo $this->createUrl('create',array('uid'=>$uid));?>"><span>添加</span></a>
 (用户名称:
<font color="red"><?php echo $username;?></font>
) 
</div>

<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('admin.widgets.grid.AdminGridView', array(
	'id'=>'article-grid',
	'dataProvider'=>$model->search($uid),
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

						'name' => 'uid',
						'value' =>array($this,"getUserByUid"),

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
