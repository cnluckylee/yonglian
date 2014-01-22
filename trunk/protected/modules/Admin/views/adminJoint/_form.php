<div class="form">
<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'joint-form',
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
		<?php echo $form->textField($model,'title',array('size'=>60,'maxlength'=>200)); ?>
		<?php echo $form->error($model,'title'); ?>
        </div>
        </td>
	</tr>

	<tr>
          <th width="100" align="right">
		<?php echo $form->labelEx($model,'cid'); ?>
        </th>
        <td >
        <div class="row">
		<?php echo $form->dropDownList($model,'cid',CHtml::listData(Alltype::getAllType(4),'id','name')); ?>
		<?php echo $form->error($model,'cid'); ?>
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
		<?php echo $form->labelEx($model,'IndustryName'); ?>       </th>
        <td>
        <div class="row">
        <?php echo $form->textField($model,'IndustryName',array('id'=>'Company_Industry')); ?>
       
        <input type="button" id="industry" value="请选择">
      
	</div>
        </td>
	</tr>
	<tr>
          <th width="100" align="right">
		<?php echo $form->labelEx($model,'aname'); ?>   </th>
        <td>
        <div class="row">
       <?php echo $form->textField($model,'aname',array('id'=>'Company_city')); ?>
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
        <select name="Joint[CompanyID]" id="Article_CompanyID">
	
			
            <option value=''>请选择</option>
           
        </select>

        </div>
        </td>
	</tr>

	<tr>
          <th width="100" align="right">
		<?php echo $form->labelEx($model,'pid'); ?>
        </th>
        <td >
        <div class="row">

        <?php echo $form->dropDownList($model,'pid',CHtml::listData(BaseData::CPDevelopCategary(),'id','name')); ?>
        
		<?php echo $form->error($model,'pid'); ?>
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
	
    <?php echo $form->hiddenField($model,'IndustryID',array('id'=>'Company_Industry_id'));?>
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
		<?php if ($model->aid>0):?>
			fun(<?php echo $model->aid?>,<?php echo $model->CompanyID?>);
		<?php endif;?>
	},1000);	

});

</script>
<script language="javascript">
 	var editor;
	KindEditor.ready(function(K) {
		editor = K.create('#Joint_content', {
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