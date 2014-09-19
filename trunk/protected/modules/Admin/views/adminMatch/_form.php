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
          <th width="100" align="right"><span style="float:left;">*</span>
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
          <th width="100" align="right"><span style="float:left;">*</span>
		<?php echo $form->labelEx($model,'IndustryID'); ?>
        </th>
        <td >
        <div class="row">
		 <?php echo $form->dropDownList($model,'IndustryID',CHtml::listData(Industrymanagement::getList(),'id','name')); ?>
		<?php echo $form->error($model,'IndustryID'); ?>
        </div>
        </td>
	</tr>

	

	<tr>
          <th width="100" align="right"><span style="float:left;">*</span>
		<?php echo $form->labelEx($model,'zzid'); ?>
        </th>
        <td >
        <div class="row">
		<?php echo $form->dropDownList($model,'zzid',CHtml::listData(SubjectManagement::model()->findAll(),'id','name')); ?>
		<?php echo $form->error($model,'zzid'); ?>
        </div>
        </td>
	</tr>

	<tr>
          <th width="100" align="right"><span style="float:left;">*</span>
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
          <th width="100" align="right"><span style="float:left;">*</span>
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
          <th width="100" align="right"><span style="float:left;">*</span>
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
        <th width="100" align="right"><span style="float:left;">*</span>
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
          <th width="100" align="right"><span style="float:left;">*</span>
		<?php echo $form->labelEx($model,'sszb'); ?>
        </th>
        <td >
        <div class="row">
        <table id="tab_sszb">
        
        </table>
        
		
		
        </div>
        </td>
	</tr>
	
	<tr>
          <th width="100" align="right"><span style="float:left;">*</span>
		<?php echo $form->labelEx($model,'ssxb'); ?>
        </th>
        <td >
        <div class="row">
		 <table id="tab_ssxb">
        
        </table>
        </div>
        </td>
	</tr>

	<tr>
          <th width="100" align="right"><span style="float:left;">*</span>
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
          <th width="100" align="right"><span style="float:left;">*</span>
		<?php echo $form->labelEx($model,'ctid'); ?>
        </th>
        <td >
        <div class="row">
		<?php echo $form->dropDownList($model,'ctid',CHtml::listData(City::getCityList(),'id','name')); ?>
		<?php echo $form->error($model,'ctid'); ?>
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
<?php echo $form->hiddenField($model,'aid',array('id'=>'hid_Ctid'));?>	
<?php echo $form->hiddenField($model,'aid2',array('id'=>'hid_Ctid2'));?>	
<?php $this->endWidget(); ?>

</div>
<script language="javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/js/common.js"></script>

<script language="javascript">
$(document).ready(function() {
	loadCssAndJs(jsUrl+'/fancybox/jquery.fancybox-1.3.4.pack.js','js');
	loadCssAndJs(jsUrl+'/fancybox/jquery.fancybox-1.3.4.css','css');
	setTimeout(function (){
		bindiframe("area");
		bindiframe("area2");
		var sszb = new Array();
		var ssxb = new Array();
		<?php if ( $model->aid>0 && $model->sszb):
			foreach($model->sszb as $k=>$i):?>
			sszb[<?php echo $k;?>] = <?php echo $i;?>; 
			<?php endforeach;?>
			fun3(<?php echo $model->aid?>,sszb,'sszb');			
		<?php endif;?>
		
		<?php if ( $model->aid>0 && $model->ssxb):
			foreach($model->ssxb as $k=>$i):?>
			ssxb[<?php echo $k;?>] = <?php echo $i;?>; 
			<?php endforeach;?>
			fun3(<?php echo $model->aid?>,ssxb,'ssxb');			
		<?php endif;?>
	},2000);	

});

</script>
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
	
	function fun()
	{
		var aid = arguments[0]>0?arguments[0]:0;
		var CompanyIDs = arguments[1]>0?arguments[1]:0;

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
					var str = "<tr>";
						$.each(obj,function(k,v){	
							if(k>0 && k%5==0)	
								str=str+'</tr><tr>';

							if(CompanyIDs[v.id]>0)
								str=str+'<td><input type="checkbox" value="'+v.id+'"  name="sszb[]" checked="checked" />'+v.name+'</td>';
							else
								str=str+'<td><input type="checkbox" value="'+v.id+'"  name="sszb[]" />'+v.name+'</td>';
       				});
      					str=str+'</tr>';
      					$("#tab_sszb").html(str);
					}
					
				});
				
		}
		
	}
	
	
	function fun2()
	{
		var aid = arguments[0]>0?arguments[0]:0;
		var CompanyID = arguments[1]>0?arguments[1]:0;
		if(aid<=0)
			var aid = $("#hid_Ctid2").val();
		if(aid>0 )
		{
			$.ajax({
				url:'?r=admin/article/getCompany',
				data:{aid:aid},
				type:'POST',
				dataType:'json',
				success:function(obj){
					var str = "<tr>";
						$.each(obj,function(k,v){	
							if(k>0 && k%5==0)	
								str=str+'</tr><tr>';
							str=str+'<td><input type="checkbox" value="'+v.id+'"  name="ssxb[]" />'+v.name+'</td>';
       				});
      					str=str+'</tr>';
      					$("#tab_ssxb").html(str);
					}
				});
				
		}
		
	}
	
	function fun3(aid,CompanyIDs,opt)
	{
		if(aid>0 )
		{
			$.ajax({
				url:'?r=admin/article/getCompany',
				data:{aid:aid},
				type:'POST',
				dataType:'json',
				success:function(obj){
					var str = "<tr>";
						$.each(obj,function(k,v){	
						var flag = 0;
							if(k>0 && k%5==0)	
								str=str+'</tr><tr>';
							for(var i=0;i<CompanyIDs.length;i++)
							{
								if(CompanyIDs[i] == v.id)
								{
									flag = 1;
									break;
								}
							}
							if(flag>0)
								str=str+'<td><input type="checkbox" value="'+v.id+'"  name="'+opt+'[]" checked="checked" />'+v.name+'</td>';
							else
								str=str+'<td><input type="checkbox" value="'+v.id+'"  name="'+opt+'[]" />'+v.name+'</td>';
       				});
      					str=str+'</tr>';
      					$("#tab_"+opt).html(str);
					}
					
				});
				
		}
		
	}
</script>