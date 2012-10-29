<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'admin-pic-form',
	'enableAjaxValidation'=>false,
	'htmlOptions' => array('enctype' => 'multipart/form-data'), 
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
		<?php echo $form->labelEx($model,'标题'); ?>
        </th>
        <td >
        <div class="row">
		<?php echo $form->textField($model,'title',array('size'=>20,'maxlength'=>20)); ?>
		<?php echo $form->error($model,'title'); ?>
        </div>
        </td>
	</tr>

	<tr>
      <th width="100" align="right">
		<?php echo $form->labelEx($model,'类型'); ?>
        </th>
        <td >
        <div class="row">

		<?php echo $form->dropDownList($model,'type',AllType::getAllPicType()); ?>
		<?php echo $form->error($model,'type'); ?>
        </div>
        </td>
	</tr>
    <tr>
      <th width="100" align="right">
		<?php echo $form->labelEx($model,'图片链接'); ?>
        </th>
        <td >
        <div class="row">
		<?php echo $form->textField($model,'imglink',array('size'=>50,'maxlength'=>50)); ?>
			
		<?php echo $form->error($model,'imglink'); ?>
        </div>
        </td>
	</tr>
    <tr>
      <th width="100" align="right">
		<?php echo $form->labelEx($model,'上传图片'); ?>
        </th>
        <td >
        <div class="row">
		<?php echo $form->fileField($model,'imgurl',array('size'=>50)); 
			 if(!empty($model->imgurl))
			  	echo "<img src='".$model->imgurl."' title='缩略图' class='thumbimage'/>";
		?>
		<?php echo $form->error($model,'imgurl'); ?>
        </div>
        
        
        </td>
	</tr>
    <tr>
      <th width="100" align="right">
		<?php echo $form->labelEx($model,'摘要'); ?>
        </th>
        <td >
        <div class="row">
		<?php echo $form->textArea($model,'remark',array('rows'=>5, 'cols'=>75)); ?>
			
		<?php echo $form->error($model,'remark'); ?>
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

</div><!-- form -->
