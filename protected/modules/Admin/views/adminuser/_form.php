<div class="form">
<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'admin-user-form',
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
          <th width="100" align="right"><span style="float:left;">*</span>
		<?php echo $form->labelEx($model,'username'); ?>
        </th>
        <td >
        <div class="row">
		<?php echo $form->textField($model,'username',array('size'=>50,'maxlength'=>50)); ?>
		<?php echo $form->error($model,'username'); ?>
        </div>
        </td>
	</tr>

	<tr>
          <th width="100" align="right"><span style="float:left;">*</span>
		<?php echo $form->labelEx($model,'password'); ?>
        </th>
        <td >
        <div class="row">
		<?php echo $form->passwordField($model,'password',array('size'=>40,'maxlength'=>40,'value'=>'', 'autocomplete'=>"off")); ?>
			
		<?php echo $form->error($model,'password'); ?>
        </div>
        </td>
	</tr>

	<tr>
          <th width="100" align="right"><span style="float:left;">*</span>
		<?php echo $form->labelEx($model,'name'); ?>
        </th>
        <td >
        <div class="row">
		<?php echo $form->textField($model,'name',array('size'=>50,'maxlength'=>50)); ?>
		<?php echo $form->error($model,'name'); ?>
        </div>
        </td>
	</tr>

	<tr>
          <th width="100" align="right"><span style="float:left;">*</span>
		<?php echo $form->labelEx($model,'role_id'); ?>
        </th>
        <td >
        <div class="row">
		<?php echo $form->dropDownList($model,'role_id',  AdminRole::getDataList(), array('prompt'=>'')); ?>
		<?php echo $form->error($model,'role_id'); ?>
        </div>
        </td>
	</tr>

	<tr>
          <th width="100" align="right"><span style="float:left;">*</span>
		<?php echo $form->labelEx($model,'disabled'); ?>
        </th>
        <td >
        <div class="row">
		<?php echo $form->radioButtonList($model,'disabled', AdminUser::$iSDisabled); ?>
		<?php echo $form->error($model,'disabled'); ?>
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