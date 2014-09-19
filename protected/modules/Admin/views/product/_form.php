<div class="form">
<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'product-form',
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
          <th width="100" align="right"><span style="float:left;">*</span>
		<?php echo $form->labelEx($model,'name'); ?>
        </th>
        <td >
        <div class="row">
		<?php echo $form->textField($model,'name',array('size'=>60,'maxlength'=>200)); ?>
		<?php echo $form->error($model,'name'); ?>
        </div>
        </td>
	</tr>
	
	
		<tr>
       <th width="100" align="right"><span style="float:left;">*</span>
		<?php echo $form->labelEx($model,'aid'); ?>
        </th>
        <td >
        <div class="row">
		  <input type="text" size="30" maxlength="50" name="Product[aname]" id="Company_city" value="<?php echo $model->aname;?>">
        <input type="button" id="area" value="请选择">
        </div>
        </td>
	</tr>




	<tr>
          <th width="100" align="right"><span style="float:left;">*</span>
		<?php echo $form->labelEx($model,'cid'); ?>
        </th>
        <td >
        <div class="row">
			<select name="Product[cid]" id="Article_CompanyID" onchange="loadUser()">
	
			
            <option value=''>请选择</option>
           
        </select>
		
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
	<tr style="display:none;">
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
	<?php echo $form->hiddenField($model,'aid',array('id'=>'hid_Ctid')); ?>

<?php $this->endWidget(); ?>

</div>
<script language="javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/js/common.js"></script>

<script language="javascript">
$(document).ready(function() {
	loadCssAndJs(jsUrl+'/fancybox/jquery.fancybox-1.3.4.pack.js','js');
	loadCssAndJs(jsUrl+'/fancybox/jquery.fancybox-1.3.4.css','css');
	setTimeout(function (){
		bindiframe("area");
	},1000);	
	<?php if ($model->aid>0 && $model->cid>0):?>
			fun(<?php echo $model->aid?>,<?php echo $model->cid?>);
			
	<?php endif;?>
});

</script>
<script language="javascript">
 	var editor;
	KindEditor.ready(function(K) {
		editor = K.create('#Product_content', {
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
		
		var type = 2;
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
									str=str+'<td><input type="radio" value="'+v.id+'" checked="checked"  name="Theory[mid]" />'+v.linkuser+'</td>';
								else
									str=str+'<td><input type="radio" value="'+v.id+'"  name="Theory[mid]" />'+v.linkuser+'</td>';
       				});
      					str=str+'</tr>';
      					$("#tab_User").html(str);
					}
					
				});
				
		}
		
	}

</script>