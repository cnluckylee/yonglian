<div class="form">
<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'post-form',
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
		<?php echo $form->textField($model,'name',array('size'=>60,'maxlength'=>255)); ?>
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
		<?php echo $form->textField($model,'pinyin',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'pinyin'); ?>
        </div>
        </td>
	</tr>

	<tr>
          <th width="100" align="right">
		<?php echo $form->labelEx($model,'parentid'); ?>
        </th>
        <td >
        <div class="row">
		<select name="Post[parentid]" id="Post_parentid">
            <?php echo Post::getSelectTree('最高职位',$model->parentid);?>
          </select>
		<?php echo $form->error($model,'parentid'); ?>
        </div>
        </td>
	</tr>

	<tr>
          <th width="100" align="right">
		<?php echo $form->labelEx($model,'listorder'); ?>
        </th>
        <td >
        <div class="row">
		<?php echo $form->textField($model,'listorder'); ?>
		<?php echo $form->error($model,'listorder'); ?>
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