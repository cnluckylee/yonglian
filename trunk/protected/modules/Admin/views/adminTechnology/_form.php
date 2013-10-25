<div class="form">
<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'theory-form',
	'enableAjaxValidation'=>true,
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
		<?php echo $form->labelEx($model,'fid'); ?>
        </th>
        <td >
        <div class="row">
		 <?php echo $form->dropDownList($model,'fid',CHtml::listData(BaseData::NewTheory_JYZL(),'id','name')); ?>
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
		<?php echo $form->labelEx($model,'CompanyID'); ?>
        </th>
        <td >
        <div class="row">
		<?php echo $form->dropDownList($model,'CompanyID',CHtml::listData(Company::getTreeDATA(),'id','name')); ?>
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
		 <?php echo $form->dropDownList($model,'cid',CHtml::listData(BaseData::NewTheory_CGGY(),'id','name')); ?>
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
		 <?php echo $form->dropDownList($model,'nid',CHtml::listData(BaseData::NewTheory_NBYY(),'id','name')); ?>
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
		 <?php echo $form->dropDownList($model,'fxid',CHtml::listData(BaseData::NewTheory_FXPS(),'id','name')); ?>
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
		 <?php echo $form->dropDownList($model,'qid',CHtml::listData(BaseData::NewTheory_QYZZ(),'id','name')); ?>
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
		 <?php echo $form->dropDownList($model,'rid',CHtml::listData(BaseData::NewTheory_RLZY(),'id','name')); ?>
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
		 <?php echo $form->dropDownList($model,'cwid',CHtml::listData(BaseData::NewTheory_CWSS(),'id','name')); ?>
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
		 <?php echo $form->dropDownList($model,'kid',CHtml::listData(BaseData::NewTheory_KFZL(),'id','name')); ?>
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
        <?php echo $form->dropDownList($model,'sid',CHtml::listData(BaseData::NewTheory_SYHY(),'id','name')); ?>
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
		<?php echo $form->dropDownList($model,'mid',CHtml::listData(Member::model()->findAll(),'id','name')); ?>
		<?php echo $form->error($model,'mid'); ?>
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
</tbody>
      <tfoot>
        <tr class="title">
          <td colspan="2"><a buttype="submit" href="javascript:void(0)" class="button"><span>提交</span></a><a url="<?php echo $this->createUrl('index');?>" buttype="link" href="javascript:void(0)" class="button"><span>返回</span></a></td>
        </tr>
      </tfoot>
    </table>
	

<?php $this->endWidget(); ?>

</div>
</div>
<script language="javascript">
 	var editor;
	KindEditor.ready(function(K) {
		editor = K.create('#Technology_content', {
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