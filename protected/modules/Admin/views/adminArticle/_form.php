<div class="form">
<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'admin-article-form',
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
		<?php echo $form->textField($model,'cid'); ?>
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
        <?php Yii::app()->clientScript->registerScript("AdminArticle_content","KE.show({id:'AdminArticle_content'});")?>
        <td >
        
        <div class="row">
		<?php echo $form->textArea($model,'content',array('style'=>'width:70%;height:300px')); ?>
		<?php echo $form->error($model,'content'); ?>
        </div>
        </td>
	</tr>
<tr>
<td colspan="2">
	<div style="width:90%;margin-left:5%">
		<fieldset>
    		<legend><strong>相关设置</strong></legend>
    		
    		<?php 
    		if(Yii::app()->params['recommend']['article_display']){
    		?>
    		<div class="row">
			<?php echo $form->labelEx($model,'recommend'); ?>
			<?php echo $form->dropDownList($model,'recommend',Yii::app()->params['recommend']['article']); ?>
			</div>
			<?php }?>
    		<?php 
    		if(Yii::app()->params['recommend_level']['article_display']){
    		?>
    		<div class="row">
			<?php echo $form->labelEx($model,'recommend_level'); ?>
			<?php echo $form->dropDownList($model,'recommend_level',Yii::app()->params['recommend_level']['article']); ?>
			<p class="hint">数值越大排序越靠前</p>
			</div>
			<?php }?>
    		
			<div class="row">
			<?php echo $form->labelEx($model,'remark'); ?>
			<?php echo $form->textArea($model,'remark',array('cols'=>45,'rows'=>5)); ?>
			</div>
  		</fieldset>
	</div>
   </td> 
<tr>
</tbody>
      <tfoot>
        <tr class="title">
          <td colspan="2"><a buttype="submit" href="javascript:void(0)" class="button"><span>提交</span></a><a url="<?php echo $this->createUrl('index');?>" buttype="link" href="javascript:void(0)" class="button"><span>返回</span></a></td>
        </tr>
      </tfoot>
    </table>
	

<?php $this->endWidget(); ?>

</div>