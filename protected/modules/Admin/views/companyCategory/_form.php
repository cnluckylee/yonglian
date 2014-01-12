<div class="form">
<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'company-category-form',
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
		<?php echo $form->labelEx($model,'companyName'); ?>
        </th>
        <td >
        <div class="row">
		<?php echo $form->textField($model,'companyName',array('size'=>60,'maxlength'=>255,'readonly'=>'true')); ?>
		<?php echo $form->hiddenField($model,'cid'); ?>
		<?php echo $form->error($model,'companyName'); ?>
        </div>
        </td>
	</tr>

	<tr>
          <th width="100" align="right">
		<?php echo $form->labelEx($model,'name'); ?>
        </th>
        <td >
        <div class="row">
		<?php echo $form->textField($model,'name',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'name'); ?>
        </div>
        </td>
	</tr>

	<tr>
          <th width="100" align="right">
		<?php echo $form->labelEx($model,'order'); ?>
        </th>
        <td >
        <div class="row">
		<?php echo $form->textField($model,'order'); ?>
		<?php echo $form->error($model,'order'); ?>
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