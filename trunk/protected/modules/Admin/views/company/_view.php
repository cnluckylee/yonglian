<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('name')); ?>:</b>
	<?php echo CHtml::encode($data->name); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('pinyin')); ?>:</b>
	<?php echo CHtml::encode($data->pinyin); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('city')); ?>:</b>
	<?php echo CHtml::encode($data->city); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('distid')); ?>:</b>
	<?php echo CHtml::encode($data->distid); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('provid')); ?>:</b>
	<?php echo CHtml::encode($data->provid); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('ctid')); ?>:</b>
	<?php echo CHtml::encode($data->ctid); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('IndustryID')); ?>:</b>
	<?php echo CHtml::encode($data->IndustryID); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('desc')); ?>:</b>
	<?php echo CHtml::encode($data->desc); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('recommend')); ?>:</b>
	<?php echo CHtml::encode($data->recommend); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('rank')); ?>:</b>
	<?php echo CHtml::encode($data->rank); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('updTime')); ?>:</b>
	<?php echo CHtml::encode($data->updTime); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('addTime')); ?>:</b>
	<?php echo CHtml::encode($data->addTime); ?>
	<br />

	*/ ?>

</div>