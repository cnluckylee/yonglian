<div class="form">
<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'match-entries-form',
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
		<?php echo $form->labelEx($model,'mname'); ?>
        </th>
        <td >
        <div class="row">
		<?php echo $form->textField($model,'mname',array('readonly'=>'true')); ?>
		<?php echo $form->error($model,'mname'); ?>
        </div>
        </td>
	</tr>

	<tr>
          <th width="100" align="right">
		<?php echo $form->labelEx($model,'type'); ?>
        </th>
        <td >
        <div class="row">
		<?php echo $form->dropDownList($model,'type',CHtml::listData(EntriesSite::getList(),'id','name')); ?>
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
		<?php echo $form->labelEx($model,'pdf'); ?>
        </th>
        <td >
        <div class="row">
		 <?php echo $form->fileField($model,'pdf',array('size'=>50)); 
			 if(!empty($model->pdf))
			  	echo $model->pdf;
		?>
		<?php echo $form->error($model,'pdf'); ?>
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
	
	
	<tr>
          <th width="100" align="right">
		<?php echo $form->labelEx($model,'isRecommend'); ?>
        </th>
        <td >
        <div class="row">
		<?php echo $form->radioButtonList($model,'isRecommend', MatchEntries::$isRecommend); ?>
		<?php echo $form->error($model,'isRecommend'); ?>
        </div>
        </td>
	</tr>
	
 	
   	<tr>
          <th width="100" align="right">
		<?php echo $form->labelEx($model,'times'); ?>
        </th>
        <td >
        <div class="row">
		<?php echo $form->textField($model,'times',array('size'=>20,'maxlength'=>155)); ?>
		<?php echo $form->error($model,'times'); ?>
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
		<?php echo $form->labelEx($model,'content'); ?>
        </th>
        <td >
        <div class="row">
		<?php echo $form->textArea($model,'content',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'content'); ?>
        </div>
        </td>
	</tr>

	<?php echo $form->hiddenField($model,'mid'); ?>

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
		editor = K.create('#MatchEntries_content', {
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