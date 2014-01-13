<div class="form">
<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'match-entries-form',
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
		<?php echo $form->labelEx($model,'title'); ?>
        </th>
        <td >
        <div class="row">
		<?php echo $form->textField($model,'title',array('size'=>60,'maxlength'=>200)); ?>
		<?php echo $form->error($model,'title'); ?>
        </div>
        </td>
	</tr>

	<tr>
          <th width="100" align="right">
		<?php echo $form->labelEx($model,'mid'); ?>
        </th>
        <td >
        <div class="row">
		<?php echo $form->textField($model,'mid'); ?>
		<?php echo $form->error($model,'mid'); ?>
        </div>
        </td>
	</tr>

	<tr>
          <th width="100" align="right">
		<?php echo $form->labelEx($model,'type'); ?>
        </th>
        <td >
        <div class="row">
		<?php echo $form->textField($model,'type'); ?>
		<?php echo $form->error($model,'type'); ?>
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
		<?php echo $form->labelEx($model,'remark'); ?>
        </th>
        <td >
        <div class="row">
		<?php echo $form->textArea($model,'remark',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'remark'); ?>
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
		<?php echo $form->labelEx($model,'pdf'); ?>
        </th>
        <td >
        <div class="row">
		<?php echo $form->textField($model,'pdf',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'pdf'); ?>
        </div>
        </td>
	</tr>

	<tr>
          <th width="100" align="right">
		<?php echo $form->labelEx($model,'mname'); ?>
        </th>
        <td >
        <div class="row">
		<?php echo $form->textField($model,'mname',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'mname'); ?>
        </div>
        </td>
	</tr>

	<tr>
          <th width="100" align="right">
		<?php echo $form->labelEx($model,'author'); ?>
        </th>
        <td >
        <div class="row">
		<?php echo $form->textField($model,'author',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'author'); ?>
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