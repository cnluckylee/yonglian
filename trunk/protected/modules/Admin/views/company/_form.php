<div class="form">
<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'company-form',
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
          <th width="100" align="right"><span style="float:left;">*</span>
		<?php echo $form->labelEx($model,'name'); ?>
        </th>
        <td >
        <div class="row">
		<?php echo $form->textField($model,'name',array('size'=>20,'maxlength'=>20)); ?>
		<?php echo $form->error($model,'name'); ?>
        </div>
        </td>
	</tr>

	<tr>
          <th width="100" align="right"><span style="float:left;">*</span>
		<?php echo $form->labelEx($model,'pinyin'); ?>
        </th>
        <td >
        <div class="row">
		<?php echo $form->textField($model,'pinyin',array('size'=>20,'maxlength'=>20)); ?>
		<?php echo $form->error($model,'pinyin'); ?>
        </div>
        </td>
	</tr>
	<tr>
          <th width="100" align="right"><span style="float:left;">*</span>
		<?php echo $form->labelEx($model,'city'); ?>
        </th>
        <td >
        <div class="row">
		<?php echo $form->textField($model,'city',array('size'=>30,'maxlength'=>50)); ?>
        <input type="button" value="请选择" id="area" />
		<?php echo $form->error($model,'city'); ?>
        </div>
        </td>
	</tr>



	<tr>
          <th width="100" align="right"><span style="float:left;">*</span>
		<?php echo $form->labelEx($model,'Industry'); ?>
        </th>
        <td >
        <div class="row">
		<?php echo $form->textField($model,'Industry',array('size'=>30,'maxlength'=>50)); ?>

        <input type="button" value="请选择" id="industry" />
		<?php echo $form->error($model,'Industry'); ?>
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
		<?php echo $form->labelEx($model,'accountdate'); ?>
        </th>
        <td >
        <div class="row">
		<?php echo $form->textField($model,'accountdate',array('size'=>10,'maxlength'=>10,'onClick'=>'WdatePicker()')); ?>
		<?php echo $form->error($model,'accountdate'); ?>
        </div>
        </td>
	</tr>
	
	<tr>
          <th width="100" align="right"><span style="float:left;">*</span>
		<?php echo $form->labelEx($model,'desc'); ?>
        </th>
        <td >
        <div class="row">
		<?php echo $form->textArea($model,'desc',array('rows'=>6, 'cols'=>50)); ?>
         
		<?php echo $form->error($model,'desc'); ?>
        </div>
        </td>
	</tr>

      <tr>
        <th align="right"><span style="float:left;">*</span><?php echo $form->labelEx($model,'recommend'); ?></th>
        <td valign="middle"><?php echo $form->radioButtonList($model,'recommend', Company::$isDisplay); ?><?php echo $form->error($model,'recommend'); ?> </td>
      </tr>
	<tr>
          <th width="100" align="right"><span style="float:left;">*</span>
		<?php echo $form->labelEx($model,'rank'); ?>
        </th>
        <td >
        <div class="row">
		<?php echo $form->textField($model,'rank'); ?>
		<?php echo $form->error($model,'rank'); ?>
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
	<input type="hidden" id="hid_city1"  name="Company[city1]" value="<?php echo $model->city1;?>"/>
    <input type="hidden" id="hid_city2"  name="Company[city2]" value="<?php echo $model->city2;?>"/>
    <input type="hidden" id="hid_city3"  name="Company[city3]" value="<?php echo $model->city3;?>"/>
    <input type="hidden" id="hid_city4"  name="Company[city4]" value="<?php echo $model->city4;?>"/>
    
    <input type="hidden" id="hid_IndustryID1"  name="Company[IndustryID1]" value="<?php echo $model->IndustryID1;?>"/>
    <input type="hidden" id="hid_IndustryID2"  name="Company[IndustryID2]" value="<?php echo $model->IndustryID2;?>"/>
    <input type="hidden" id="hid_IndustryID3"  name="Company[IndustryID3]" value="<?php echo $model->IndustryID3;?>"/>
    <input type="hidden" id="hid_IndustryID4"  name="Company[IndustryID4]" value="<?php echo $model->IndustryID4;?>"/>
    <input type="hidden" id="hid_IndustryID"  name="Company[IndustryID]" value="<?php echo $model->IndustryID;?>"/>
    <input type="hidden" id="hid_Ctid"  name="Company[Ctid]" value="<?php echo $model->Ctid;?>"/>
    
<?php $this->endWidget(); ?>

</div>
<script language="javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/js/common.js"></script>
<script language="javascript" type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/js/My97DatePicker/WdatePicker.js"></script>

<script language="javascript">
$(document).ready(function() {
	loadCssAndJs(jsUrl+'/fancybox/jquery.fancybox-1.3.4.pack.js','js');
	loadCssAndJs(jsUrl+'/fancybox/jquery.fancybox-1.3.4.css','css');
	setTimeout(function (){
		bindiframe("area");
		bindiframe("industry");
	},1000);	

});

</script>
