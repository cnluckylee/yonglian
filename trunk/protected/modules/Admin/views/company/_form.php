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
		<?php echo $form->textField($model,'name',array('size'=>20,'maxlength'=>20)); ?>
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
		<?php echo $form->textField($model,'pinyin',array('size'=>60,'maxlength'=>100)); ?>
		<?php echo $form->error($model,'pinyin'); ?>
        </div>
        </td>
	</tr>

	<tr>
          <th width="100" align="right">
		<?php echo $form->labelEx($model,'city'); ?>
        </th>
        <td >
        <div class="row">
		<?php echo $form->textField($model,'city',array('size'=>20,'maxlength'=>20)); ?>
		<?php echo $form->error($model,'city'); ?>
        </div>
        </td>
	</tr>

	<tr>
          <th width="100" align="right">
		<?php echo $form->labelEx($model,'distid'); ?>
        </th>
        <td >
        <div class="row">
		<?php echo $form->textField($model,'distid'); ?>
		<?php echo $form->error($model,'distid'); ?>
        </div>
        </td>
	</tr>

	<tr>
          <th width="100" align="right">
		<?php echo $form->labelEx($model,'provid'); ?>
        </th>
        <td >
        <div class="row">
		<?php echo $form->textField($model,'provid'); ?>
		<?php echo $form->error($model,'provid'); ?>
        </div>
        </td>
	</tr>

	<tr>
          <th width="100" align="right">
		<?php echo $form->labelEx($model,'ctid'); ?>
        </th>
        <td >
        <div class="row">
		<?php echo $form->textField($model,'ctid'); ?>
		<?php echo $form->error($model,'ctid'); ?>
        </div>
        </td>
	</tr>

	<tr>
          <th width="100" align="right">
		<?php echo $form->labelEx($model,'IndustryID'); ?>
        </th>
        <td >
        <div class="row">
		<?php echo $form->textField($model,'IndustryID'); ?>
		<?php echo $form->error($model,'IndustryID'); ?>
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
		<?php echo $form->labelEx($model,'recommend'); ?>
        </th>
        <td >
        <div class="row">
		<?php echo $form->textField($model,'recommend'); ?>
		<?php echo $form->error($model,'recommend'); ?>
        </div>
        </td>
	</tr>

	<tr>
          <th width="100" align="right">
		<?php echo $form->labelEx($model,'rank'); ?>
        </th>
        <td >
        <div class="row">
		<?php echo $form->textField($model,'rank'); ?>
		<?php echo $form->error($model,'rank'); ?>
        </div>
        </td>
	</tr>

	<tr>
          <th width="100" align="right">
		<?php echo $form->labelEx($model,'updTime'); ?>
        </th>
        <td >
        <div class="row">
		<?php echo $form->textField($model,'updTime'); ?>
		<?php echo $form->error($model,'updTime'); ?>
        </div>
        </td>
	</tr>

	<tr>
          <th width="100" align="right">
		<?php echo $form->labelEx($model,'addTime'); ?>
        </th>
        <td >
        <div class="row">
		<?php echo $form->textField($model,'addTime'); ?>
		<?php echo $form->error($model,'addTime'); ?>
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