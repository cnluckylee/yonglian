<div class="form">
<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'article-form',
	'enableAjaxValidation'=>true,
	'focus'=>array($model,'title'),
	'htmlOptions'=>array('enctype'=>'multipart/form-data','onsubmit'=>'setData()'),
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
          
		<?php echo $form->labelEx($model,'url'); ?>
        </th>
        <td >
        <div class="row">
		<?php echo $form->textField($model,'url',array('size'=>60,'maxlength'=>200)); ?>
		<?php echo $form->error($model,'url'); ?>
        </div>
        </td>
	</tr>
	<tr>
        <th width="100" align="right"><span style="float:left;">*</span>
        
		<?php echo $form->labelEx($model,'cid'); ?>
        </th>
        <td >
        <div class="row">
				<select name="RecColum[cid]" id="Article_cid">
            <?php echo Alltype::getSelectTree('请选择',$model->cid,6);?>
        </select>
		<?php echo $form->error($model,'cid'); ?>
        </div>
        </td>
	</tr>
		<tr>
        <th width="100" align="right"><span style="float:left;">*</span>
        
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
          <th width="100" align="right"><span style="float:left;">*</span>
          
		<?php echo $form->labelEx($model,'remark'); ?>
        </th>
        <td >
        <div class="row">
		<?php echo $form->textArea($model,'remark',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'remark'); ?>
        </div>
        </td>
	</tr>
	
<tr style="display:none;">
          <th width="100" align="right">
		<?php echo $form->labelEx($model,'content'); ?>
        </th>
        <td >
        <div class="row" style="width:800px; height:500px">
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
		editor = K.create('#RecColum_content', {
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
