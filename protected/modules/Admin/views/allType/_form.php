<div class="form">
<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'all-type-form',
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
		<?php echo $form->labelEx($model,'parentid'); ?>
        </th>
        <td >
        <div class="row">
		<select name="Alltype[parentid]" id="AllType_parentid">
            <?php echo AllType::getSelectTree('顶级菜单',$model->parentid,$model->type);?>
        </select>
		<?php echo $form->error($model,'parentid'); ?>
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
		<?php echo $form->labelEx($model,'type'); ?>
        </th>
        <td >
        <div class="row">
        	<select name="Alltype[type]" id="AllType_type">
            	<?php echo AllType::getAllTypeForSelect($model->type);?>
            </select>
		<?php echo $form->error($model,'type'); ?>
        </div>
        </td>
	</tr>

	<tr>
          <th width="100" align="right"><span style="float:left;">*</span>
		<?php echo $form->labelEx($model,'listorder'); ?>
        </th>
        <td >
        <div class="row">
		<?php echo $form->textField($model,'listorder'); ?>
		<?php echo $form->error($model,'listorder'); ?>
        </div>
        </td>
	</tr>

	<tr>
          <th width="100" align="right"><span style="float:left;">*</span>
		<?php echo $form->labelEx($model,'display'); ?>
        </th>
        <td >
        <div class="row">
		<?php echo $form->radioButtonList($model,'display', AllType::$isDisplay); ?>
		<?php echo $form->error($model,'display'); ?>
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
