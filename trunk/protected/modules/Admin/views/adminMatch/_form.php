<div class="form">
<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'match-form',
	'enableAjaxValidation'=>true,
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
          <th width="100" align="right">
		<?php echo $form->labelEx($model,'title'); ?>
        </th>
        <td >
        <div class="row">
		<?php echo $form->textField($model,'title',array('size'=>60,'maxlength'=>100)); ?>
		<?php echo $form->error($model,'title'); ?>
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
		<?php echo $form->labelEx($model,'IndustryID'); ?>
        </th>
        <td >
        <div class="row">
		 <?php echo $form->dropDownList($model,'IndustryID',CHtml::listData(BaseData::NewTheory_SYHY(),'id','name')); ?>
		<?php echo $form->error($model,'IndustryID'); ?>
        </div>
        </td>
	</tr>

	

	<tr>
          <th width="100" align="right">
		<?php echo $form->labelEx($model,'zzid'); ?>
        </th>
        <td >
        <div class="row">
		<?php echo $form->dropDownList($model,'IndustryID',CHtml::listData(SubjectManagement::model()->findAll(),'id','name')); ?>
		<?php echo $form->error($model,'zzid'); ?>
        </div>
        </td>
	</tr>

	<tr>
          <th width="100" align="right">
		<?php echo $form->labelEx($model,'hxid'); ?>
        </th>
        <td >
        <div class="row">
		<?php echo $form->dropDownList($model,'hxid',CHtml::listData(HorizontalManagement::model()->findAll(),'id','name')); ?>
		<?php echo $form->error($model,'hxid'); ?>
        </div>
        </td>
	</tr>

	<tr>
          <th width="100" align="right">
		<?php echo $form->labelEx($model,'zxid'); ?>
        </th>
        <td >
        <div class="row">
		<?php echo $form->dropDownList($model,'zxid',CHtml::listData(VerticalManagement::model()->findAll(),'id','name')); ?>
		<?php echo $form->error($model,'zxid'); ?>
        </div>
        </td>
	</tr>
	
	<tr>
          <th width="100" align="right">
		<?php echo $form->labelEx($model,'fid'); ?>
        </th>
        <td >
        <div class="row">
		 <?php echo $form->dropDownList($model,'fid',CHtml::listData(ConsolidatedOther::model()->findAll(),'id','name')); ?>
		<?php echo $form->error($model,'fid'); ?>
        </div>
        </td>
	</tr>

	<tr>
          <th width="100" align="right">
		<?php echo $form->labelEx($model,'stopdate'); ?>
        </th>
        <td >
        <div class="row">

		<input id="Match_stopdate" type="text" name="Match[stopdate]" onclick="WdatePicker()">
		<?php echo $form->error($model,'stopdate'); ?>
        </div>
        </td>
	</tr>

	<tr>
          <th width="100" align="right">
		<?php echo $form->labelEx($model,'sszb'); ?>
        </th>
        <td >
        <div class="row">
        <table>
         <tr>
        <?php 
		$company = Company::model()->findAll();
			foreach($company as $k=>$v): ?>
        <?php if (($k+1)%5==0):?>
        </tr><tr>
         <?php endif;?>
        <td><input type="checkbox" value="<?php echo $v->id; ?>"  name="sszb[]" <?php if($model->sszb && in_array($v->id,$model->sszb)):?> checked="checked" <?php endif; ?>/><?php echo $v->name ?></td>
       
        <?php endforeach; ?>
        </tr>
        </table>
        
		
		
        </div>
        </td>
	</tr>

	<tr>
          <th width="100" align="right">
		<?php echo $form->labelEx($model,'ssxb'); ?>
        </th>
        <td >
        <div class="row">
		 <table>
         <tr>
        <?php 
		
			foreach($company as $k=>$v): ?>
        <?php if (($k+1)%5==0):?>
        </tr><tr>
         <?php endif;?>
        <td><input type="checkbox" value="<?php echo $v->id; ?>"  name="ssxb[]" <?php if($model->ssxb && in_array($v->id,$model->ssxb)):?> checked="checked" <?php endif; ?>/><?php echo $v->name ?></td>
       
        <?php endforeach; ?>
        </tr>
        </table>
        </div>
        </td>
	</tr>

	<tr>
          <th width="100" align="right">
		<?php echo $form->labelEx($model,'ssxs'); ?>
        </th>
        <td >
        <div class="row">
		<?php echo $form->dropDownList($model,'ssxs',CHtml::listData(RaceForms::model()->findAll(),'id','name')); ?>
		<?php echo $form->error($model,'ssxs'); ?>
        </div>
        </td>
	</tr>

	<tr>
          <th width="100" align="right">
		<?php echo $form->labelEx($model,'ctid'); ?>
        </th>
        <td >
        <div class="row">
		<?php echo $form->dropDownList($model,'ctid',CHtml::listData(City::getCityList(),'id','name')); ?>
		<?php echo $form->error($model,'ctid'); ?>
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
<script language="javascript" type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/js/My97DatePicker/WdatePicker.js"></script>
<script language="javascript">
 	var editor;
	KindEditor.ready(function(K) {
		editor = K.create('#Match_content', {
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