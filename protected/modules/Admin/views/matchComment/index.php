<?php if($mid>0):?>
<div class="topBut">

<a class="button" href="javascript:void(0)" buttype="link" url="<?php echo $this->createUrl('create',array('mid'=>$mid));?>"><span>添加</span></a>
&nbsp;&nbsp;&nbsp;&nbsp;(赛事名称:<font color="red"> <?php echo $matchname;?></font>)
</div>
<?php else:?>
所有评论
<? endif;?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('admin.widgets.grid.AdminGridView', array(
	'id'=>'match-comment-grid',
	'dataProvider'=>$model->search($mid),
	'filter'=>$model,
	'columns'=>array(
		array(

						'name' => 'id',
						'value'=>'$row+1',

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

						'name' => 'mname',

						//'htmlOptions' => array(
								//'width' => '60',
						//),
				),

			array(

						'name' => 'type',
						'value'=>array($this,'getType'),
						//'htmlOptions' => array(
								//'width' => '60',
						//),
				),

			array(

						'name' => 'imgurl',

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

			/*
		array(

						'name' => 'remark',

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

						'name' => 'pdf',

						//'htmlOptions' => array(
								//'width' => '60',
						//),
				),

			*/
		array(
			'class'=>'CButtonColumn',
			'class' => 'CButtonColumn',
			'template' => '{update} {delete}',
		),
	),
)); ?>
