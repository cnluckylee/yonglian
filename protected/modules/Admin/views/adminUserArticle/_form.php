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
          <th width="100" align="right">
		<?php echo $form->labelEx($model,'aname'); ?>   </th>
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
        <select name="UserArticle[CompanyID]" id="Article_CompanyID" onchange="loadUser()">
	
			
            <option value=''>请选择</option>
           
        </select>

        </div>
        </td>
	</tr>
  <tr>
          <th width="100" align="right">
		<?php echo $form->labelEx($model,'uid'); ?>
        </th>
        <td >
        <div class="row">
		<select name="UserArticle[uid]" id="select_uid" >
            <option value=''>请选择</option>
        </select>
		
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

    <?php echo $form->hiddenField($model,'aid',array('id'=>'hid_Ctid'));?>
    <?php echo $form->hiddenField($model,'uid',array('id'=>'hid_uid','name'=>'hid_uid'));?>
<?php $this->endWidget(); ?>
</div>

<script language="javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/js/common.js"></script>

<script language="javascript">
$(document).ready(function() {
	loadCssAndJs(jsUrl+'/fancybox/jquery.fancybox-1.3.4.pack.js','js');
	loadCssAndJs(jsUrl+'/fancybox/jquery.fancybox-1.3.4.css','css');
	setTimeout(function (){
		bindiframe("area");
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
 	var editor;
	KindEditor.ready(function(K) {
		editor = K.create('#UserArticle_content', {
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
					$("#select_uid option").remove();
					$("#select_uid").append("<option value=''>请选择</option>"); 
						$.each(obj,function(k,v){		
							if(v.id == uid)		
									var str = "<option value='"+v.id+"' selected='selected'>"+v.username+"</option>";
							else
								var str = "<option value='"+v.id+"'>"+v.username+"</option>";
								$("#select_uid").append(str); 						
							});
					}
					
				});
				
		}
		
	}
</script>
