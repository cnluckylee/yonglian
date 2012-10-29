<div class="form">
<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'company-form',
	'enableAjaxValidation'=>true,
)); ?>
<table width="100%" class="table_form table">
      <thead>
        <tr class="title">
          <th colspan="2"> <?php echo $formTatle;?> </th>
        </tr>
      </thead>
      <tbody>
	<tr>
          <th width="100" align="right">
		<?php echo $form->labelEx($model,'name'); ?>
        </th>
        <td >
        <div class="row">
		<?php echo $form->textField($model,'name',array('size'=>60,'maxlength'=>200)); ?>
		<?php echo $form->error($model,'name'); ?>
        </div>
        </td>
	</tr>

	<tr>
          <th width="100" align="right">
		<?php echo $form->labelEx($model,'pinyin'); ?>
        </th>
        <td >
        <div class="row">
		<?php echo $form->textField($model,'pinyin',array('size'=>60,'maxlength'=>200)); ?>
		<?php echo $form->error($model,'pinyin'); ?>
        </div>
        </td>
	</tr>

	<tr>
          <th width="100" align="right">
		<?php echo $form->labelEx($model,'summary'); ?>
        </th>
        <td >
        <div class="row">
		<?php echo $form->textArea($model,'summary',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'summary'); ?>
        </div>
        </td>
	</tr>

	<tr>
          <th width="100" align="right">
		<?php echo $form->labelEx($model,'desc'); ?>
        </th>
        <td >
        <div class="row">
		<?php echo $form->textArea($model,'desc',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'desc'); ?>
        </div>
        </td>
	</tr>

	<tr>
          <th width="100" align="right">
		<?php echo $form->labelEx($model,'addr'); ?>
        </th>
        <td >
        <div class="row">
		<?php echo $form->textField($model,'addr',array('size'=>60,'maxlength'=>200)); ?>
		<?php echo $form->error($model,'addr'); ?>
        </div>
        </td>
	</tr>

	<tr>
          <th width="100" align="right">
		<?php echo $form->labelEx($model,'zip'); ?>
        </th>
        <td >
        <div class="row">
		<?php echo $form->textField($model,'zip'); ?>
		<?php echo $form->error($model,'zip'); ?>
        </div>
        </td>
	</tr>

	<tr>
          <th width="100" align="right">
		<?php echo $form->labelEx($model,'mail'); ?>
        </th>
        <td >
        <div class="row">
		<?php echo $form->textField($model,'mail',array('size'=>60,'maxlength'=>200)); ?>
		<?php echo $form->error($model,'mail'); ?>
        </div>
        </td>
	</tr>

	<tr>
          <th width="100" align="right">
		<?php echo $form->labelEx($model,'fax'); ?>
        </th>
        <td >
        <div class="row">
		<?php echo $form->textField($model,'fax',array('size'=>60,'maxlength'=>200)); ?>
		<?php echo $form->error($model,'fax'); ?>
        </div>
        </td>
	</tr>

	<tr>
          <th width="100" align="right">
		<?php echo $form->labelEx($model,'salesline'); ?>
        </th>
        <td >
        <div class="row">
		<?php echo $form->textField($model,'salesline',array('size'=>60,'maxlength'=>200)); ?>
		<?php echo $form->error($model,'salesline'); ?>
        </div>
        </td>
	</tr>

	<tr>
          <th width="100" align="right">
		<?php echo $form->labelEx($model,'serviceline'); ?>
        </th>
        <td >
        <div class="row">
		<?php echo $form->textField($model,'serviceline',array('size'=>60,'maxlength'=>200)); ?>
		<?php echo $form->error($model,'serviceline'); ?>
        </div>
        </td>
	</tr>

	<tr>
          <th width="100" align="right">
		<?php echo $form->labelEx($model,'website'); ?>
        </th>
        <td >
        <div class="row">
		<?php echo $form->textField($model,'website',array('size'=>60,'maxlength'=>200)); ?>
		<?php echo $form->error($model,'website'); ?>
        </div>
        </td>
	</tr>

</tbody>
      <tfoot>
        <tr class="title">
          <td colspan="2"><a buttype="submit" href="javascript:void(0)" class="button"><span>提交</span></a><a url="<?php echo $this->createUrl('index');?>" buttype="link" href="javascript:void(0)" class="button"><span>返回</span></a></td>
        </tr>
      </tfoot>
    </table>
	

<?php $this->endWidget(); ?>

</div>