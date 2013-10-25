<div class="form">
<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'technology-form',
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
		<?php echo $form->textField($model,'title',array('size'=>60,'maxlength'=>100)); ?>
		<?php echo $form->error($model,'title'); ?>
        </div>
        </td>
	</tr>

	<tr>
          <th width="100" align="right">
		<?php echo $form->labelEx($model,'fid'); ?>
        </th>
        <td >
        <div class="row">
		<?php echo $form->textField($model,'fid'); ?>
		<?php echo $form->error($model,'fid'); ?>
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
		<?php echo $form->labelEx($model,'CompanyID'); ?>
        </th>
        <td >
        <div class="row">
		<?php echo $form->textField($model,'CompanyID'); ?>
		<?php echo $form->error($model,'CompanyID'); ?>
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
		<?php echo $form->labelEx($model,'nid'); ?>
        </th>
        <td >
        <div class="row">
		<?php echo $form->textField($model,'nid'); ?>
		<?php echo $form->error($model,'nid'); ?>
        </div>
        </td>
	</tr>

	<tr>
          <th width="100" align="right">
		<?php echo $form->labelEx($model,'fxid'); ?>
        </th>
        <td >
        <div class="row">
		<?php echo $form->textField($model,'fxid'); ?>
		<?php echo $form->error($model,'fxid'); ?>
        </div>
        </td>
	</tr>

	<tr>
          <th width="100" align="right">
		<?php echo $form->labelEx($model,'qid'); ?>
        </th>
        <td >
        <div class="row">
		<?php echo $form->textField($model,'qid'); ?>
		<?php echo $form->error($model,'qid'); ?>
        </div>
        </td>
	</tr>

	<tr>
          <th width="100" align="right">
		<?php echo $form->labelEx($model,'rid'); ?>
        </th>
        <td >
        <div class="row">
		<?php echo $form->textField($model,'rid'); ?>
		<?php echo $form->error($model,'rid'); ?>
        </div>
        </td>
	</tr>

	<tr>
          <th width="100" align="right">
		<?php echo $form->labelEx($model,'cwid'); ?>
        </th>
        <td >
        <div class="row">
		<?php echo $form->textField($model,'cwid'); ?>
		<?php echo $form->error($model,'cwid'); ?>
        </div>
        </td>
	</tr>

	<tr>
          <th width="100" align="right">
		<?php echo $form->labelEx($model,'kid'); ?>
        </th>
        <td >
        <div class="row">
		<?php echo $form->textField($model,'kid'); ?>
		<?php echo $form->error($model,'kid'); ?>
        </div>
        </td>
	</tr>

	<tr>
          <th width="100" align="right">
		<?php echo $form->labelEx($model,'sid'); ?>
        </th>
        <td >
        <div class="row">
		<?php echo $form->textField($model,'sid'); ?>
		<?php echo $form->error($model,'sid'); ?>
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

</tbody>
      <tfoot>
        <tr class="title">
          <td colspan="2"><a buttype="submit" href="javascript:void(0)" class="button"><span>提交</span></a><a url="<?php echo $this->createUrl('index');?>" buttype="link" href="javascript:void(0)" class="button"><span>返回</span></a></td>
        </tr>
      </tfoot>
    </table>
	

<?php $this->endWidget(); ?>

</div>