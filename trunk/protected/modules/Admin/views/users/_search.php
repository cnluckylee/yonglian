
<div class="form" id="users-grid-search-form-form">

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
		
		
		<?php echo $form->textField($model,'id'); ?>
		</div>
        </td>

	</tr>
	<tr>
          <th width="100" align="right"><span class="row"><?php echo $form->label($model,'username'); ?>
</span></th>
        <td >
        <div class="row">
		
		
		<?php echo $form->textField($model,'username',array('size'=>60,'maxlength'=>100)); ?>
		</div>
        </td>

	</tr>
	<tr>
          <th width="100" align="right"><span class="row"><?php echo $form->label($model,'comp_name'); ?>
</span></th>
        <td >
        <div class="row">
		
		
		<?php echo $form->textField($model,'comp_name',array('size'=>60,'maxlength'=>100)); ?>
		</div>
        </td>

	</tr>
	<tr>
          <th width="100" align="right"><span class="row"><?php echo $form->label($model,'comp_id'); ?>
</span></th>
        <td >
        <div class="row">
		
		
		<?php echo $form->textField($model,'comp_id'); ?>
		</div>
        </td>

	</tr>
	<tr>
          <th width="100" align="right"><span class="row"><?php echo $form->label($model,'create_time'); ?>
</span></th>
        <td >
        <div class="row">
		
		
		<?php echo $form->textField($model,'create_time'); ?>
		</div>
        </td>

	</tr>
	<tr>
          <th width="100" align="right"><span class="row"><?php echo $form->label($model,'edit_time'); ?>
</span></th>
        <td >
        <div class="row">
		
		
		<?php echo $form->textField($model,'edit_time'); ?>
		</div>
        </td>

	</tr>
	<tr>
          <th width="100" align="right"><span class="row"><?php echo $form->label($model,'last_login_time'); ?>
</span></th>
        <td >
        <div class="row">
		
		
		<?php echo $form->textField($model,'last_login_time'); ?>
		</div>
        </td>

	</tr>
	<tr>
          <th width="100" align="right"><span class="row"><?php echo $form->label($model,'action'); ?>
</span></th>
        <td >
        <div class="row">
		
		
		<?php echo $form->textField($model,'action',array('size'=>60,'maxlength'=>200)); ?>
		</div>
        </td>

	</tr>
	<tr>
          <th width="100" align="right"><span class="row"><?php echo $form->label($model,'downurl'); ?>
</span></th>
        <td >
        <div class="row">
		
		
		<?php echo $form->textField($model,'downurl',array('size'=>60,'maxlength'=>255)); ?>
		</div>
        </td>

	</tr>
	

    </tbody>
      <tfoot>
        <tr class="title">
          <td colspan="3">条件操作符 (<b>&lt;</b>, <b>&lt;=</b>, <b>&gt;</b>, <b>&gt;=</b>, <b>&lt;&gt;</b>
	或 <b>=</b>) 。</td>
        </tr>
      </tfoot>
    </table>
	

<?php $this->endWidget(); ?>

</div><!-- search-form -->