<div class="form">
<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'mentor-form',
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
		<?php echo $form->dropDownList($model,'cid',CHtml::listData(MentorSite::model()->findAll(),'id','name')); ?>
		<?php echo $form->error($model,'cid'); ?>
        </div>
        </td>
	</tr>

	<tr>
          <th width="100" align="right"><span style="float:left;">*</span>
		<?php echo $form->labelEx($model,'IndustryName'); ?>       </th>
        <td>
        <div class="row">
        <?php echo $form->textField($model,'IndustryName',array('id'=>'Company_Industry','readonly'=>'true')); ?>
       
        <input type="button" id="industry" value="请选择">
      
	</div>
        </td>
	</tr>
	<tr>
          <th width="100" align="right"><span style="float:left;">*</span>
		<?php echo $form->labelEx($model,'aname'); ?>   </th>
        <td>
        <div class="row">
       <?php echo $form->textField($model,'aname',array('id'=>'Company_city','readonly'=>'true')); ?>
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
        <select name="Mentor[CompanyID]" id="Article_CompanyID" onchange="loadUser()">
	
			
            <option value=''>请选择</option>
           
        </select>

        </div>
        </td>
	</tr>
	<tr>
      <th width="100" align="right"><span style="float:left;">*</span>
		<?php echo $form->labelEx($model,'uname'); ?>
        </th>
        <td >
        <div class="row">
        <table id="tab_User">
        </table>
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
	
    <?php echo $form->hiddenField($model,'IndustryID',array('id'=>'hid_IndustryID'));?>
    <?php echo $form->hiddenField($model,'aid',array('id'=>'hid_Ctid'));?>
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
		<?php if ($model->aid>0 && $model->CompanyID>0):?>
			fun(<?php echo $model->aid?>,<?php echo $model->CompanyID?>);
			<?php if($model->uid>0):?>
			loadUser(<?php echo $model->uid?>,<?php echo $model->CompanyID?>);
			<?php endif;?>
		<?php endif;?>
	},1000);	

});

</script>
<script language="javascript">

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
	
	function loadUser()
	{
		
		var type = 3;
		var uid = arguments[0]>0?arguments[0]:0;
		var aid = arguments[1]>0?arguments[1]:0;
		if(aid == 0)
			 aid = $("#Article_CompanyID").val();
		if(aid>0 )
		{
			$.ajax({
				url:'?r=admin/Users/GetUsers',
				data:{type:type,CompanyID:aid},
				type:'POST',
				dataType:'json',
				success:function(obj){
					var str = "<tr>";
						$.each(obj,function(k,v){	
							if(k>0 && k%5==0)	
								str=str+'</tr><tr>';
								if(v.id == uid)
									str=str+'<td><input type="radio" value="'+v.id+'" checked="checked"  name="Mentor[uid]" />'+v.linkuser+'</td>';
								else
									str=str+'<td><input type="radio" value="'+v.id+'"  name="Mentor[uid]" />'+v.linkuser+'</td>';
       				});
      					str=str+'</tr>';
      					$("#tab_User").html(str);
					}
					
				});
				
		}
		
	}

</script>