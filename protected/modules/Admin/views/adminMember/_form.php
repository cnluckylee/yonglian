<div class="form">
<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'member-form',
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
		<?php echo $form->labelEx($model,'CompanyID'); ?>
        </th>
        <td >
        <div class="row">
		<select name="Member[CompanyID]" id="Member_CompanyID">
            <?php echo Company::getSelectTree('请选择');?>
          </select>
		<?php echo $form->error($model,'CompanyID'); ?>
        </div>
        </td>
	</tr>
	<tr>
          <th width="100" align="right">
		<?php echo $form->labelEx($model,'name'); ?>
        </th>
        <td >
        <div class="row">
		<?php echo $form->textField($model,'name'); ?>
		<?php echo $form->error($model,'name'); ?>
        </div>
        </td>
	</tr>

	<tr>
          <th width="100" align="right">
		<?php echo $form->labelEx($model,'pid'); ?>
        </th>
        <td >
        <div class="row">
		<select name="Member[pid]" id="Member_pid">
            <?php echo Post::getSelectTree();?>
        </select>
		<?php echo $form->error($model,'pid'); ?>
        </div>
        </td>
	</tr>
	<tr>
          <th width="100" align="right">
		<?php echo $form->labelEx($model,'cid'); ?>
        </th>
        <td >
        <div class="row">
		<select name="Member[cid]" id="Member_cid">
           <?php 
		   $cat = BaseData::CPTeamCategary();
		   foreach($cat as $cid =>$item):?>
          <option value="<?php echo $cid; ?>"><?php echo $item ?></option>
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
		<input id="Member_entrydate" type="text" name="Member[entrydate]" onclick="WdatePicker()">
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
	

<?php $this->endWidget(); ?>

</div>
<script language="javascript" type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/js/My97DatePicker/WdatePicker.js"></script>