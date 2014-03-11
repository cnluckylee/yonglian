<div class="form">
<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'users-form',
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
		<?php echo $form->labelEx($model,'username'); ?>
        </th>
        <td >
        <div class="row">
		<?php echo $form->textField($model,'username',array('size'=>60,'maxlength'=>100)); ?>
		<?php echo $form->error($model,'username'); ?>
        </div>
        </td>
	</tr>

	<tr>
          <th width="100" align="right">
		<?php echo $form->labelEx($model,'password'); ?>
        </th>
        <td >
        <div class="row">
		<?php echo $form->passwordField($model,'password',array('size'=>50,'maxlength'=>50)); ?>
		<?php echo $form->error($model,'password'); ?>
        </div>
        </td>
	</tr>

	<tr>
          <th width="100" align="right">
		<?php echo $form->labelEx($model,'linkuser'); ?>
        </th>
        <td >
        <div class="row">
		<?php echo $form->textField($model,'linkuser',array('size'=>60,'maxlength'=>100)); ?>
		<?php echo $form->error($model,'linkuser'); ?>
        </div>
        </td>
	</tr>

	<tr>
          <th width="100" align="right">
		<?php echo $form->labelEx($model,'tel'); ?>
        </th>
        <td >
        <div class="row">
		<?php echo $form->textField($model,'tel',array('size'=>60,'maxlength'=>100)); ?>
		<?php echo $form->error($model,'tel'); ?>
        </div>
        </td>
	</tr>

	<tr>
          <th width="100" align="right">
		<?php echo $form->labelEx($model,'mail'); ?>
        </th>
        <td >
        <div class="row">
		<?php echo $form->textField($model,'mail',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'mail'); ?>
        </div>
        </td>
	</tr>

	<tr>
          <th width="100" align="right">
		<?php echo $form->labelEx($model,'website'); ?>
        </th>
        <td >
        <div class="row">
		<?php echo $form->textField($model,'website',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'website'); ?>
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
		<?php echo $form->labelEx($model,'state'); ?>
        </th>
        <td >
        <div class="row">
		<?php echo $form->radioButtonList($model,'state', Users::$isState,array('separator'=>'')); ?>
		<?php echo $form->error($model,'state'); ?>
        </div>
        </td>
	</tr>

	<tr>
          <th width="100" align="right">
		<?php echo $form->labelEx($model,'aid'); ?>   </th>
        <td>
        <div class="row">
       <?php echo $form->textField($model,'aname',array('id'=>'Company_city','readonly'=>'true')); ?>
        <input type="button" id="area" value="请选择">
		</div>
        </td>
	</tr>

	<tr>
          <th width="100" align="right">
		<?php echo $form->labelEx($model,'CompanyID'); ?>
        </th>
        <td >
        <div class="row">
        <select name="Users[CompanyID]" id="Article_CompanyID">
            <option value=''>请选择</option>
        </select>

        </div>
        </td>
	</tr>
	<tr>
          <th width="100" align="right">
		<?php echo $form->labelEx($model,'type'); ?>
        </th>
        <td >
        <div class="row">
		<?php echo $form->radioButtonList($model,'type', Users::$isType,array('separator'=>'')); ?>
		<?php echo $form->error($model,'type'); ?>
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
    <?php echo $form->hiddenField($model,'aid',array('id'=>'hid_Ctid')); ?>
    <?php echo $form->hiddenField($model,'IndustryID',array('id'=>'hid_IndustryID')); ?>


<?php $this->endWidget(); ?>

</div>


<script language="javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/js/common.js"></script>

<script language="javascript">
$(document).ready(function() {
	loadCssAndJs(jsUrl+'/fancybox/jquery.fancybox-1.3.4.pack.js','js');
	loadCssAndJs(jsUrl+'/fancybox/jquery.fancybox-1.3.4.css','css');
	setTimeout(function (){
		bindiframe("area");
		bindiframe("industry");
	},1000);	
	<?php if ($model->aid>0 && $model->CompanyID>0):?>
			fun(<?php echo $model->aid?>,<?php echo $model->CompanyID?>);
	<?php endif;?>
});
		function fun()
	{
		var aid = arguments[0]>0?arguments[0]:0;
		var CompanyID = arguments[1]>0?arguments[1]:0;
		if(aid<0)
			var aid = $("#hid_Ctid").val();
		if(aid>0 )
		{
			$.ajax({
				url:'?r=admin/article/getCompany',
				data:{aid:aid},
				type:'POST',
				dataType:'json',
				success:function(obj){
					$("#Article_CompanyID option").remove();
					$("#Article_CompanyID").append("<option value=''>请选择</option>"); 
						$.each(obj,function(k,v){		
							if(v.id == CompanyID)		
									var str = "<option value='"+v.id+"' selected='selected'>"+v.name+"</option>";
							else
								var str = "<option value='"+v.id+"'>"+v.name+"</option>";
								$("#Article_CompanyID").append(str); 						
							});
					}
				});
		}
		
	}
</script>