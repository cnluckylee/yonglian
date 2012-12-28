<div class="form">
<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'company-form',
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
          <th width="100" align="right">
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
          <th width="100" align="right">
		<?php echo $form->labelEx($model,'pinyin'); ?>
        </th>
        <td >
        <div class="row">
		<?php echo $form->textField($model,'pinyin',array('size'=>60,'maxlength'=>100)); ?>
		<?php echo $form->error($model,'pinyin'); ?>
        </div>
        </td>
	</tr>

	<tr>
        <th width="100" align="right">
		<?php echo $form->labelEx($model,'city'); ?>
        </th>
        <td >
        <div class="row">
		<?php  echo CHtml::dropDownList('Company[city]',$model->city, AllType::getCity(1),
										array(
										'ajax' => array(
										'type'=>'POST', //url请求类型
										'url'=>CController::createUrl('AllType/getCity'), //要调用的url.
										//Style: CController::createUrl('currentController/methodToCall')
										'update'=>'#Company_city_id', //ajax请求要更新的目的元素，这里是城市下拉列表
										//'data'=>'js:javascript statement'
										//这里不设置data，默认将传递当前表单form中的所有元素数据
										)));
 		?>
        &nbsp;&nbsp;
        <?php  echo CHtml::dropDownList('Company[city_id]','',array('请选择'));?>
		<?php echo $form->error($model,'city_id'); ?>
        </div>
        </td>
	</tr>

	<tr>
          <th width="100" align="right">
		<?php echo $form->labelEx($model,'type'); ?>
        </th>
        <td >
        <div class="row">
		<?php echo $form->dropDownList($model,'type',CHtml::listData(AllType::getAllType(3),'id','name')); ?>
		<?php echo $form->error($model,'type'); ?>
        </div>
        </td>
	</tr>

	<tr>
          <th width="100" align="right">
		<?php echo $form->labelEx($model,'desct'); ?>
        </th>
        <td >
        <div class="row">
		<?php echo $form->textArea($model,'desct',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'desct'); ?>
        </div>
        </td>
	</tr>

	<tr>
          <th width="100" align="right">
		<?php echo $form->labelEx($model,'product'); ?>
        </th>
        <td >
        <div class="row">
		<?php echo $form->textField($model,'product',array('size'=>60,'maxlength'=>200)); ?>
		<?php echo $form->error($model,'product'); ?>
        </div>
        </td>
	</tr>

	<tr>
          <th width="100" align="right">
		<?php echo $form->labelEx($model,'rec'); ?>
        </th>
        <td >
        <div class="row">
        <?php echo CHtml::checkBox('Company[rec]', $model->rec) ?>
		<?php echo $form->error($model,'rec'); ?>
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