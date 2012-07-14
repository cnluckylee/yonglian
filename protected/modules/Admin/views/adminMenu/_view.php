<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('name')); ?>:</b>
	<?php echo CHtml::encode($data->name); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('parentid')); ?>:</b>
	<?php echo CHtml::encode($data->parentid); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('modules')); ?>:</b>
	<?php echo CHtml::encode($data->modules); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('controller')); ?>:</b>
	<?php echo CHtml::encode($data->controller); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('action')); ?>:</b>
	<?php echo CHtml::encode($data->action); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('data')); ?>:</b>
	<?php echo CHtml::encode($data->data); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('ico')); ?>:</b>
	<?php echo CHtml::encode($data->ico); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('listorder')); ?>:</b>
	<?php echo CHtml::encode($data->listorder); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('display')); ?>:</b>
	<?php echo CHtml::encode($data->display); ?>
	<br />

	*/ ?>

</div>