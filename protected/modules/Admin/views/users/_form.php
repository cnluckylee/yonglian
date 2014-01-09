<div class="form">
<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'users-form',
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
		<?php echo $form->labelEx($model,'companyname'); ?>
        </th>
        <td >
        <div class="row">
		<?php echo $form->textField($model,'companyname',array('size'=>60,'maxlength'=>100)); ?>
		<?php echo $form->error($model,'companyname'); ?>
        </div>
        </td>
	</tr>    
	<tr>
          <th width="100" align="right">
		<?php echo $form->labelEx($model,'username'); ?>
        </th>
        <td >
        <div class="row">
		<?php echo $form->textField($model,'username',array('size'=>60,'maxlength'=>100)); ?>
		<?php echo $form->error($model,'username'); ?>
        </div>
        </td>
	</tr>

	<tr>
          <th width="100" align="right">
		<?php echo $form->labelEx($model,'password'); ?>
        </th>
        <td >
        <div class="row">
		<?php echo $form->passwordField($model,'password',array('size'=>50,'maxlength'=>50)); ?>
		<?php echo $form->error($model,'password'); ?>
        </div>
        </td>
	</tr>

	<tr>
          <th width="100" align="right">
		<?php echo $form->labelEx($model,'linkuser'); ?>
        </th>
        <td >
        <div class="row">
		<?php echo $form->textField($model,'linkuser',array('size'=>60,'maxlength'=>100)); ?>
		<?php echo $form->error($model,'linkuser'); ?>
        </div>
        </td>
	</tr>

	<tr>
          <th width="100" align="right">
		<?php echo $form->labelEx($model,'tel'); ?>
        </th>
        <td >
        <div class="row">
		<?php echo $form->textField($model,'tel',array('size'=>60,'maxlength'=>100)); ?>
		<?php echo $form->error($model,'tel'); ?>
        </div>
        </td>
	</tr>

	<tr>
          <th width="100" align="right">
		<?php echo $form->labelEx($model,'mail'); ?>
        </th>
        <td >
        <div class="row">
		<?php echo $form->textField($model,'mail',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'mail'); ?>
        </div>
        </td>
	</tr>

	<tr>
          <th width="100" align="right">
		<?php echo $form->labelEx($model,'website'); ?>
        </th>
        <td >
        <div class="row">
		<?php echo $form->textField($model,'website',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'website'); ?>
        </div>
        </td>
	</tr>



	<tr>
          <th width="100" align="right">
		<?php echo $form->labelEx($model,'state'); ?>
        </th>
        <td >
        <div class="row">
		<?php echo $form->radioButtonList($model,'state', Users::$isState,array('separator'=>'')); ?>
		<?php echo $form->error($model,'state'); ?>
        </div>
        </td>
	</tr>

	<tr>
          <th width="100" align="right">
		<?php echo $form->labelEx($model,'type'); ?>
        </th>
        <td >
        <div class="row">
		<?php echo $form->radioButtonList($model,'type', Users::$isType,array('separator'=>'')); ?>
		<?php echo $form->error($model,'type'); ?>
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