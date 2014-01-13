<div class="form">
<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'company-product-form',
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
		<?php echo $form->labelEx($model,'keywords'); ?>
        </th>
        <td >
        <div class="row">
		<?php echo $form->textField($model,'keywords',array('size'=>60,'maxlength'=>200)); ?>
		<?php echo $form->error($model,'keywords'); ?>
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
		<?php echo $form->labelEx($model,'content'); ?>
        </th>
        <td >
        <div class="row">
		<?php echo $form->textArea($model,'content',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'content'); ?>
        </div>
        </td>
	</tr>

	<tr>
          <th width="100" align="right">
		<?php echo $form->labelEx($model,'class1'); ?>
        </th>
        <td >
        <div class="row">
		<?php echo $form->textField($model,'class1'); ?>
		<?php echo $form->error($model,'class1'); ?>
        </div>
        </td>
	</tr>

	<tr>
          <th width="100" align="right">
		<?php echo $form->labelEx($model,'class2'); ?>
        </th>
        <td >
        <div class="row">
		<?php echo $form->textField($model,'class2'); ?>
		<?php echo $form->error($model,'class2'); ?>
        </div>
        </td>
	</tr>

	<tr>
          <th width="100" align="right">
		<?php echo $form->labelEx($model,'class3'); ?>
        </th>
        <td >
        <div class="row">
		<?php echo $form->textField($model,'class3'); ?>
		<?php echo $form->error($model,'class3'); ?>
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

	<tr>
          <th width="100" align="right">
		<?php echo $form->labelEx($model,'imgurl'); ?>
        </th>
        <td >
        <div class="row">
		<?php echo $form->textField($model,'imgurl',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'imgurl'); ?>
        </div>
        </td>
	</tr>

	<tr>
          <th width="100" align="right">
		<?php echo $form->labelEx($model,'imgurls'); ?>
        </th>
        <td >
        <div class="row">
		<?php echo $form->textField($model,'imgurls',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'imgurls'); ?>
        </div>
        </td>
	</tr>

	<tr>
          <th width="100" align="right">
		<?php echo $form->labelEx($model,'cid'); ?>
        </th>
        <td >
        <div class="row">
		<?php echo $form->textField($model,'cid'); ?>
		<?php echo $form->error($model,'cid'); ?>
        </div>
        </td>
	</tr>

	<tr>
          <th width="100" align="right">
		<?php echo $form->labelEx($model,'updtime'); ?>
        </th>
        <td >
        <div class="row">
		<?php echo $form->textField($model,'updtime'); ?>
		<?php echo $form->error($model,'updtime'); ?>
        </div>
        </td>
	</tr>

	<tr>
          <th width="100" align="right">
		<?php echo $form->labelEx($model,'addtime'); ?>
        </th>
        <td >
        <div class="row">
		<?php echo $form->textField($model,'addtime'); ?>
		<?php echo $form->error($model,'addtime'); ?>
        </div>
        </td>
	</tr>

	<tr>
          <th width="100" align="right">
		<?php echo $form->labelEx($model,'pdf'); ?>
        </th>
        <td >
        <div class="row">
		<?php echo $form->textField($model,'pdf',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'pdf'); ?>
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