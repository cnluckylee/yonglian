<div class="form">
<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'admin-article-form',
	'enableAjaxValidation'=>true,
	'focus'=>array($model,'title'),
	'htmlOptions'=>array('enctype'=>'multipart/form-data'),
)); ?>

<table width="100%" class="table_form table">
      <thead>
        <tr class="title">
          <th colspan="2"> <?php echo $formTatle;?> </th>
        </tr>
      </thead>
      
      <tbody>
      
    <tr>
        <th width="100" align="left" colspan="2" style="text-align:left">
			以下<span class="required">*</span>为必填项.
        </th>
       
	</tr>
	<tr>
        <th width="100" align="right">
		<?php echo $form->labelEx($model,'title'); ?>
        </th>
        <td >
        <div class="row">
		<?php echo $form->textField($model,'title'); ?>
		<?php echo $form->error($model,'title'); ?>
        </div>
        </td>
	</tr>    
	<tr>
        <th width="100" align="right">
		<?php echo $form->labelEx($model,'cid'); ?>
        </th>
        <td >
        <div class="row">
        <select name="AdminArticle[cid]" id="AdminArticle_cid">
            <?php echo AllType::getSelectTree();?>
        </select>
		<?php echo $form->error($model,'cid'); ?>
        </div>
        </td>
	</tr>

	<tr>
          <th width="100" align="right">
		<?php echo $form->labelEx($model,'imgurl'); ?>
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
		<?php echo $form->labelEx($model,'content'); ?>
        </th>
        <td >
        <div class="row">
         <?php Yii::app()->clientScript->registerScript("AdminArticle_content","KE.show({id:'AdminArticle_content'});")?>
		<?php echo $form->textArea($model,'content',array('style'=>'width:70%;height:300px')); ?>
		<?php echo $form->error($model,'content'); ?>
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