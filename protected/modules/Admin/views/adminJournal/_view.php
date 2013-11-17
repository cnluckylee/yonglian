<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('title')); ?>:</b>
	<?php echo CHtml::encode($data->title); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('remark')); ?>:</b>
	<?php echo CHtml::encode($data->remark); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('addtime')); ?>:</b>
	<?php echo CHtml::encode($data->addtime); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('updtime')); ?>:</b>
	<?php echo CHtml::encode($data->updtime); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('downurl')); ?>:</b>
	<?php echo CHtml::encode($data->downurl); ?>
	<br />


</div>