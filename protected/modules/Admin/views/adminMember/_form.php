<div class="form">
<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'member-form',
	'enableAjaxValidation'=>true,
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
          <th width="100" align="right"><span style="float:left;">*</span>
		<?php echo $form->labelEx($model,'IndustryName'); ?>       </th>
        <td>
        <div class="row">
        <?php echo $form->textField($model,'IndustryName',array('id'=>'Company_Industry')); ?>
       
        <input type="button" id="industry" value="请选择">
       
	</div>
        </td>
	</tr>
	<tr>
      <th width="100" align="right"><span style="float:left;">*</span>
		<?php echo $form->labelEx($model,'aname'); ?>   </th>
        <td>
        <div class="row">
       <?php echo $form->textField($model,'aname',array('id'=>'Company_city')); ?>
        <input type="button" id="area" value="请选择">
		</div>
        </td>
	</tr>

	<tr>
          <th width="100" align="right"><span style="float:left;">*</span>
		<?php echo $form->labelEx($model,'CompanyID'); ?>
        </th>
        <td >
        <div class="row">
        <select name="Member[CompanyID]" id="Article_CompanyID" onchange="getUserName()">
            <option value=''>请选择</option>
        </select>

        </div>
        </td>
	</tr>
	<tr>
          <th width="100" align="right"><span style="float:left;">*</span>
		<?php echo $form->labelEx($model,'name'); ?>
        </th>
        <td >
        <div class="row">
		 <select name="Member[name]" id="Article_name">
            <option value=''>请选择</option>
        </select>
        </div>
        </td>
	</tr>

	<tr>
          <th width="100" align="right"><span style="float:left;">*</span>
		<?php echo $form->labelEx($model,'postname'); ?>
        </th>
        <td >
        <div class="row">
		<?php echo $form->textField($model,'postname',array('size'=>60,'maxlength'=>200)); ?>
		<?php echo $form->error($model,'postname'); ?>
        </div>
        </td>
	</tr>
	<tr>
          <th width="100" align="right"><span style="float:left;">*</span>
		<?php echo $form->labelEx($model,'cid'); ?>
        </th>
        <td >
        <div class="row">
		<select name="Member[cid]" id="Member_cid">
           <?php 
		   $cat = BaseData::CPTeamCategary();
		   foreach($cat as $cid =>$item):?>
          <option value="<?php echo $cid; ?>" <?php if($model->cid == $cid):?>selected<?php endif;?>><?php echo $item ?></option>
          <?php endforeach; ?>
        </select>
		<?php echo $form->error($model,'cid'); ?>
        </div>
        </td>
	</tr>
	

		
		
	<tr>
          <th width="100" align="right">
		<?php echo $form->labelEx($model,'entrydate'); ?>
        </th>
        <td >
        <div class="row">
		<input id="Member_entrydate" type="text" name="Member[entrydate]" value="<?php echo $model->entrydate;?>">
		<?php echo $form->error($model,'entrydate'); ?>
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
	  <?php echo $form->hiddenField($model,'IndustryID',array('id'=>'Company_Industry_id'));?>
    <?php echo $form->hiddenField($model,'aid',array('id'=>'hid_Ctid'));?>
   
    <input type="hidden" id="hid_name" value="<?php echo $model->name?>">

<?php $this->endWidget(); ?>

</div>
<script language="javascript" type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/js/My97DatePicker/WdatePicker.js"></script>

<script language="javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/js/common.js"></script>

<script language="javascript">
$(document).ready(function() {
	loadCssAndJs(jsUrl+'/fancybox/jquery.fancybox-1.3.4.pack.js','js');
	loadCssAndJs(jsUrl+'/fancybox/jquery.fancybox-1.3.4.css','css');
	setTimeout(function (){
		bindiframe("area");
		bindiframe("industry");
		<?php if ($model->aid>0 && $model->CompanyID>0):?>
			fun(<?php echo $model->aid?>,<?php echo $model->CompanyID?>);
		<?php endif;?>
		<?php if($model->name):?>
			getUserName(<?php echo $model->CompanyID?>);
		<?php endif?>
	},1000);	

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
	
	function getUserName()
	{
		var Name = $("#hid_name").val();
		var aid = arguments[0]>0?arguments[0]:0;
		if(aid==0)
			var aid = $("#Article_CompanyID").val();
		if(aid>0 )
		{
			$.ajax({
				url:'?r=admin/adminMember/Getuserbycompany',
				data:{id:aid},
				type:'POST',
				dataType:'json',
				success:function(obj){
					$("#Article_name option").remove();
					$("#Article_name").append("<option value=''>请选择</option>"); 
						$.each(obj,function(k,v){		
							if(v.username == Name)		
									var str = "<option value='"+v.username+"' selected='selected'>"+v.username+"</option>";
							else
								var str = "<option value='"+v.username+"'>"+v.username+"</option>";
								$("#Article_name").append(str); 						
							});
					}
				});
		}
		
	}

</script>