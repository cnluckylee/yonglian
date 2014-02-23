<div class="form">
<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'match-awards-form',
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
		<?php echo $form->labelEx($model,'Prize'); ?>
        </th>
        <td >
        <div class="row">
		<?php echo $form->textField($model,'Prize',array('size'=>120,'maxlength'=>120)); ?>
		<?php echo $form->error($model,'Prize'); ?>
        </div>
        </td>
	</tr>	<tr>
          <th width="100" align="right">
		<?php echo $form->labelEx($model,'Prize2'); ?>
        </th>
        <td >
        <div class="row">
		<?php echo $form->textField($model,'Prize2',array('size'=>120,'maxlength'=>120)); ?>
		<?php echo $form->error($model,'Prize2'); ?>
        </div>
        </td>
	</tr>	<tr>
          <th width="100" align="right">
		<?php echo $form->labelEx($model,'Prize3'); ?>
        </th>
        <td >
        <div class="row">
		<?php echo $form->textField($model,'Prize3',array('size'=>120,'maxlength'=>120)); ?>
		<?php echo $form->error($model,'Prize3'); ?>
        </div>
        </td>
	</tr>	<tr>
          <th width="100" align="right">
		<?php echo $form->labelEx($model,'PostName'); ?>
        </th>
        <td >
        <div class="row">
		<?php echo $form->textField($model,'PostName',array('size'=>20,'maxlength'=>20)); ?>
		<?php echo $form->error($model,'PostName'); ?>
        </div>
        </td>
	</tr>	<tr>
          <th width="100" align="right">
		<?php echo $form->labelEx($model,'Post'); ?>
        </th>
        <td >
        <div class="row">
		<?php echo $form->textField($model,'Post',array('size'=>60,'maxlength'=>100)); ?>(请以“,”分割)
		<?php echo $form->error($model,'Post'); ?>
        </div>
        </td>
	</tr>	<tr>
          <th width="100" align="right">
		<?php echo $form->labelEx($model,'Post2Name'); ?>
        </th>
        <td >
        <div class="row">
		<?php echo $form->textField($model,'Post2Name',array('size'=>20,'maxlength'=>20)); ?>
		<?php echo $form->error($model,'Post2Name'); ?>
        </div>
        </td>
	</tr>	<tr>
          <th width="100" align="right">
		<?php echo $form->labelEx($model,'Post2'); ?>
        </th>
        <td >
        <div class="row">
		<?php echo $form->textField($model,'Post2',array('size'=>60,'maxlength'=>100)); ?>(请以“,”分割)
		<?php echo $form->error($model,'Post2'); ?>
        </div>
        </td>
	</tr>	<tr>
          <th width="100" align="right">
		<?php echo $form->labelEx($model,'Post3Name'); ?>
        </th>
        <td >
        <div class="row">
		<?php echo $form->textField($model,'Post3Name',array('size'=>20,'maxlength'=>20)); ?>
		<?php echo $form->error($model,'Post3Name'); ?>
        </div>
        </td>
	</tr>

<tr>
          <th width="100" align="right">
		<?php echo $form->labelEx($model,'Post3'); ?>
        </th>
        <td >
        <div class="row">
		<?php echo $form->textField($model,'Post3',array('size'=>60,'maxlength'=>100)); ?>(请以“,”分割)
		<?php echo $form->error($model,'Post3'); ?>
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