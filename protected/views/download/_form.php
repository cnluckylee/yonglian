<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'download-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'title'); ?>
		<?php echo $form->textField($model,'title',array('size'=>60,'maxlength'=>200)); ?>
		<?php echo $form->error($model,'title'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'keywords'); ?>
		<?php echo $form->textField($model,'keywords',array('size'=>60,'maxlength'=>200)); ?>
		<?php echo $form->error($model,'keywords'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'description'); ?>
		<?php echo $form->textArea($model,'description',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'description'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'content'); ?>
		<?php echo $form->textArea($model,'content',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'content'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'class1'); ?>
		<?php echo $form->textField($model,'class1'); ?>
		<?php echo $form->error($model,'class1'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'class2'); ?>
		<?php echo $form->textField($model,'class2'); ?>
		<?php echo $form->error($model,'class2'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'class3'); ?>
		<?php echo $form->textField($model,'class3'); ?>
		<?php echo $form->error($model,'class3'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'no_order'); ?>
		<?php echo $form->textField($model,'no_order'); ?>
		<?php echo $form->error($model,'no_order'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'new_ok'); ?>
		<?php echo $form->textField($model,'new_ok'); ?>
		<?php echo $form->error($model,'new_ok'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'wap_ok'); ?>
		<?php echo $form->textField($model,'wap_ok'); ?>
		<?php echo $form->error($model,'wap_ok'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'downloadurl'); ?>
		<?php echo $form->textField($model,'downloadurl',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'downloadurl'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'filesize'); ?>
		<?php echo $form->textField($model,'filesize',array('size'=>60,'maxlength'=>100)); ?>
		<?php echo $form->error($model,'filesize'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'com_ok'); ?>
		<?php echo $form->textField($model,'com_ok'); ?>
		<?php echo $form->error($model,'com_ok'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'hits'); ?>
		<?php echo $form->textField($model,'hits'); ?>
		<?php echo $form->error($model,'hits'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'updatetime'); ?>
		<?php echo $form->textField($model,'updatetime'); ?>
		<?php echo $form->error($model,'updatetime'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'addtime'); ?>
		<?php echo $form->textField($model,'addtime'); ?>
		<?php echo $form->error($model,'addtime'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'issue'); ?>
		<?php echo $form->textField($model,'issue',array('size'=>60,'maxlength'=>100)); ?>
		<?php echo $form->error($model,'issue'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'access'); ?>
		<?php echo $form->textField($model,'access'); ?>
		<?php echo $form->error($model,'access'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'top_ok'); ?>
		<?php echo $form->textField($model,'top_ok'); ?>
		<?php echo $form->error($model,'top_ok'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'downloadaccess'); ?>
		<?php echo $form->textField($model,'downloadaccess'); ?>
		<?php echo $form->error($model,'downloadaccess'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'filename'); ?>
		<?php echo $form->textField($model,'filename',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'filename'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'lang'); ?>
		<?php echo $form->textField($model,'lang',array('size'=>50,'maxlength'=>50)); ?>
		<?php echo $form->error($model,'lang'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->