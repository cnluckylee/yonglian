<div class="form">
<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'experience-form',
	'enableAjaxValidation'=>true,
	'htmlOptions' => array('enctype' => 'multipart/form-data','onsubmit'=>'setData()'), 
)); ?>
<table width="100%" class="table_form table">
      <thead>
        <tr class="title">
          <th colspan="2"> <?php echo $formTatle;?> </th>
        </tr>
      </thead>
      <tbody>
	

 	 <tr>
        <th width="100" align="right"><span style="float:left;">*</span> <?php echo $form->labelEx($model,'aid'); ?> </th>
        <td ><div class="row"> <?php echo $form->dropDownList($model,'aid',CHtml::listData(ExperienceProject::model()->findAll(),'id','title')); ?> <?php echo $form->error($model,'aid'); ?> </div></td>
      </tr>

	  <tr>
        <th width="100" align="right"><span style="float:left;">*</span> <?php echo $form->labelEx($model,'imgurl'); ?> </th>
        <td ><div class="row"> <?php echo $form->fileField($model,'imgurl',array('size'=>50)); 
			 if(!empty($model->imgurl))
			  	echo "<img src='".$model->imgurl."' title='缩略图' class='thumbimage'/>";
		?> <?php echo $form->error($model,'imgurl'); ?> </div></td>
      </tr>
	 <tr>
        <th width="100" align="right"> <span style="float:left;">*</span><?php echo $form->labelEx($model,'pdf'); ?> </th>
        <td ><div class="row"> <?php echo $form->fileField($model,'pdf',array('size'=>50)); 
			 if(!empty($model->pdf))
			  	echo $model->pdf;
		?> <?php echo $form->error($model,'pdf'); ?> </div></td>
      </tr>
	<tr>
     <th width="100" align="right"><span style="float:left;">*</span>
		<?php echo $form->labelEx($model,'score'); ?>
        </th>
        <td >
        <div class="row">
		<?php echo $form->dropDownList($model,'score',CHtml::listData(BaseData::Pingyujibie(),'id','name')); ?>
		<?php echo $form->error($model,'score'); ?>
        </div>
        </td>
	</tr>	
	<tr>
          <th width="100" align="right"><span style="float:left;">*</span>
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
          <th width="100" align="right"><span style="float:left;">*</span>
		<?php echo $form->labelEx($model,'cid'); ?>
        </th>
        <td >
        <div class="row">
		<?php echo $form->dropDownList($model,'cid',CHtml::listData(City::getCityList(),'id','name')); ?>
		<?php echo $form->error($model,'cid'); ?>
        </div>
        </td>
	</tr>
	<tr>
          <th width="100" align="right"><span style="float:left;">*</span>
		<?php echo $form->labelEx($model,'uname'); ?>
        </th>
        <td >
        <div class="row">
		<?php echo $form->textField($model,'uname');?>
		<?php echo $form->error($model,'uname'); ?>
        </div>
        </td>
	</tr>
	<tr>
          <th width="100" align="right"><span style="float:left;">*</span>
		<?php echo $form->labelEx($model,'IndustryID'); ?>
        </th>
        <td >
        <div class="row">
         <?php echo $form->dropDownList($model,'IndustryID',CHtml::listData(BaseData::NewTheory_SYHY(),'id','name')); ?>
		<?php echo $form->error($model,'IndustryID'); ?>
        </div>
        </td>
	</tr>
	<tr style="display:none;">
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
</tbody>
      <tfoot>
        <tr class="title">
          <td colspan="2"><a buttype="submit" href="javascript:void(0)" class="button"><span>提交</span></a><a url="<?php echo $this->createUrl('index');?>" buttype="link" href="javascript:void(0)" class="button"><span>返回</span></a></td>
        </tr>
      </tfoot>
    </table>
	

<?php $this->endWidget(); ?>

</div>

<script language="javascript">

 	var editor;
	KindEditor.ready(function(K) {
		editor = K.create('#Experience_content', {
					width:'800px',
					height:'500px',
					resizeType : 2,
					uploadJson : '<?php echo $this->module->assetsUrl;?>/js/plugins/kindeditor/php/upload_json.php' // 相对于当前页面的路径
		});
	});
	function setData()
	{
		editor.sync(); 
	}
</script>