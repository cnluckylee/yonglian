<div class="form" id="admin-area-grid-search-form-form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>


<table width="100%" class="table_form table">
      <thead>
        <tr class="title">
          <th colspan="3"> 高级搜索 </th>
        </tr>
      </thead>
      <tbody>
		  	<tr>
          <th width="100" align="right"><span class="row"><?php echo $form->label($model,'id'); ?>
</span></th>
        <td >
        <div class="row">
		
		
		<?php echo $form->textField($model,'id',array('size'=>10,'maxlength'=>10)); ?>
		</div>
        </td>

	</tr>
	<tr>
          <th width="100" align="right"><span class="row"><?php echo $form->label($model,'name'); ?>
</span></th>
        <td >
        <div class="row">
		
		
		<?php echo $form->textField($model,'name',array('size'=>20,'maxlength'=>20)); ?>
		</div>
        </td>

	</tr>
	<tr>
          <th width="100" align="right"><span class="row"><?php echo $form->label($model,'pinyin'); ?>
</span></th>
        <td >
        <div class="row">
		
		
		<?php echo $form->textField($model,'pinyin',array('size'=>50,'maxlength'=>50)); ?>
		</div>
        </td>

	</tr>
	
	

    </tbody>

    </table>
<?php $this->endWidget(); ?>

</div><!-- search-form -->
