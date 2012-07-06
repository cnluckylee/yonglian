<?php
$this->breadcrumbs=array(
	'Down',
);?>
<?php if(!empty($_GET['tag'])): ?>
<h1>Posts Tagged with <i><?php echo CHtml::encode($_GET['tag']); ?></i></h1>
<?php endif; ?>

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'download-grid',
	'dataProvider'=>$dataProvider,
	'htmlOptions'=>array('width'=>'100%'),
	'columns'=>array(
	array('name'=>'序号',value=>id,'htmlOptions'=>array('width'=>'40')),
	array('name'=>'标题','value'=>'StrUtils::truncate_utf8_string($data->title,20,false)'),
	array('name'=>'更新时间','value'=>'date("Y-m-d", strtotime($data->updatetime))'),
	array('name'=>'简介','value'=>'StrUtils::truncate_utf8_string($data->content,30,false)'),

	array(
			'class'=>'CLinkColumn',
			'label'=>'下载地址',
			'urlExpression'=>'$data->downloadurl',
			'htmlOptions'=>array('width'=>'50'),
            
        ),
			
			
	)
)); ?>