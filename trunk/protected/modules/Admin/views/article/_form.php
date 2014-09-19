<div class="form">
<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'article-form',
	'enableAjaxValidation'=>true,
	'focus'=>array($model,'title'),

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
				<select name="Article[cid]" id="Article_cid">
            <?php echo Alltype::getSelectTree('请选择',$model->cid,1);?>
        </select>
		<?php echo $form->error($model,'cid'); ?>
        </div>
        </td>
	</tr>
	<tr>
          <th width="100" align="right"><span style="float:left;">*</span>
		<label for="Article_IndustryID">所属行业</label>        </th>
        <td>
        <div class="row">
			<input type="text" size="30" maxlength="50" name="Article[IndustryID]" id="Company_Industry" value="<?php echo $model->IndustryID;?>">
        <input type="button" id="industry" value="请选择">
		<div style="display:none" id="Article_IndustryID_em_" class="errorMessage"></div>        </div>
        </td>
	</tr>
	
	<tr>
          <th width="100" align="right"><span style="float:left;">*</span>
		<label for="Article_aid">所在地区</label>        </th>
        <td>
        <div class="row">
        <input type="text" size="30" maxlength="50" name="Article[aname]" id="Company_city" value="<?php echo $model->aname;?>">
        <input type="button" id="area" value="请选择">
		<div style="display:none" id="Article_aid_em_" class="errorMessage"></div>        </div>
        </td>
	</tr>

	<tr>
          <th width="100" align="right"><span style="float:left;">*</span>
		<?php echo $form->labelEx($model,'CompanyID'); ?>
        </th>
        <td >
        <div class="row">
		<select name="Article[CompanyID]" id="Article_CompanyID">
	
			
            <option value=''>请选择</option>
           
        </select>
		<?php echo $form->error($model,'CompanyID'); ?>
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

    <input type="hidden" id="Company_Industry_id"  name="Article[IndustryID]" value="<?php echo $model->IndustryID;?>"/>
    <input type="hidden" id="hid_Ctid"  name="Article[aid]" value="<?php echo $model->aid;?>"/>
    
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
		<?php if ($model->aid>0):?>
			fun(<?php echo $model->aid?>,<?php echo $model->CompanyID?>);
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

</script>
