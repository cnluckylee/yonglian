<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('title')); ?>:</b>
	<?php echo CHtml::encode($data->title); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('aid')); ?>:</b>
	<?php echo CHtml::encode($data->aid); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('imgurl')); ?>:</b>
	<?php echo CHtml::encode($data->imgurl); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('content')); ?>:</b>
	<?php echo CHtml::encode($data->content); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('remark')); ?>:</b>
	<?php echo CHtml::encode($data->remark); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('addtime')); ?>:</b>
	<?php echo CHtml::encode($data->addtime); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('updtime')); ?>:</b>
	<?php echo CHtml::encode($data->updtime); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('IndustryID')); ?>:</b>
	<?php echo CHtml::encode($data->IndustryID); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('CompanyID')); ?>:</b>
	<?php echo CHtml::encode($data->CompanyID); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('score')); ?>:</b>
	<?php echo CHtml::encode($data->score); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('type')); ?>:</b>
	<?php echo CHtml::encode($data->type); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('pdf')); ?>:</b>
	<?php echo CHtml::encode($data->pdf); ?>
	<br />

	*/ ?>

</div>