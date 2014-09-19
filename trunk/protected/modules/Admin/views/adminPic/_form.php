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
          <th width="100" align="right"><span style="float:left;">*</span>
		<?php echo $form->labelEx($model,'广告标题'); ?>
        </th>
        <td >
        <div class="row">
		<?php echo $form->textField($model,'title',array('size'=>20,'maxlength'=>20)); ?>
		<?php echo $form->error($model,'title'); ?>
        </div>
        </td>
	</tr>

	<tr>
      <th width="100" align="right"><span style="float:left;">*</span>
		<?php echo $form->labelEx($model,'栏目位置'); ?>
        </th>
        <td >
        <div class="row">
		<select name="adminPic[type]" id="adminPic_type">
            <?php echo Alltype::getSelectTree('',$model->type,2);?>
        </select>
        (一定要选择具体的位置)
		<?php echo $form->error($model,'type'); ?>
        </div>
        </td>
	</tr>
    <tr>
      <th width="100" align="right"><span style="float:left;">*</span>
		<?php echo $form->labelEx($model,'用户跳码'); ?>
        </th>
        <td >
        <div class="row">
		<?php echo $form->textField($model,'imglink',array('size'=>50,'maxlength'=>50)); ?>
			
		<?php echo $form->error($model,'imglink'); ?>
        </div>
        </td>
	</tr>
    <tr>
      <th width="100" align="right"><span style="float:left;">*</span>
		<?php echo $form->labelEx($model,'图片上传'); ?>
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
    
</tbody>
      <tfoot>
        <tr class="title">
          <td colspan="2"><a buttype="submit" href="javascript:void(0)" class="button"><span>提交</span></a><a url="<?php echo $this->createUrl('index');?>" buttype="link" href="javascript:void(0)" class="button"><span>返回</span></a></td>
        </tr>
      </tfoot>
    </table>
<?php $this->endWidget(); ?>

</div><!-- form -->
