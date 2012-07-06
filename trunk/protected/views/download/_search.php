<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'id'); ?>
		<?php echo $form->textField($model,'id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'title'); ?>
		<?php echo $form->textField($model,'title',array('size'=>60,'maxlength'=>200)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'keywords'); ?>
		<?php echo $form->textField($model,'keywords',array('size'=>60,'maxlength'=>200)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'description'); ?>
		<?php echo $form->textArea($model,'description',array('rows'=>6, 'cols'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'content'); ?>
		<?php echo $form->textArea($model,'content',array('rows'=>6, 'cols'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'class1'); ?>
		<?php echo $form->textField($model,'class1'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'class2'); ?>
		<?php echo $form->textField($model,'class2'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'class3'); ?>
		<?php echo $form->textField($model,'class3'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'no_order'); ?>
		<?php echo $form->textField($model,'no_order'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'new_ok'); ?>
		<?php echo $form->textField($model,'new_ok'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'wap_ok'); ?>
		<?php echo $form->textField($model,'wap_ok'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'downloadurl'); ?>
		<?php echo $form->textField($model,'downloadurl',array('size'=>60,'maxlength'=>255)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'filesize'); ?>
		<?php echo $form->textField($model,'filesize',array('size'=>60,'maxlength'=>100)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'com_ok'); ?>
		<?php echo $form->textField($model,'com_ok'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'hits'); ?>
		<?php echo $form->textField($model,'hits'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'updatetime'); ?>
		<?php echo $form->textField($model,'updatetime'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'addtime'); ?>
		<?php echo $form->textField($model,'addtime'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'issue'); ?>
		<?php echo $form->textField($model,'issue',array('size'=>60,'maxlength'=>100)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'access'); ?>
		<?php echo $form->textField($model,'access'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'top_ok'); ?>
		<?php echo $form->textField($model,'top_ok'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'downloadaccess'); ?>
		<?php echo $form->textField($model,'downloadaccess'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'filename'); ?>
		<?php echo $form->textField($model,'filename',array('size'=>60,'maxlength'=>255)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'lang'); ?>
		<?php echo $form->textField($model,'lang',array('size'=>50,'maxlength'=>50)); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->