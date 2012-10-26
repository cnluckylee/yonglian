
<div class="form" id="all-type-grid-search-form-form">

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
          <th width="100" align="right"><span class="row"><?php echo $form->label($model,'parentid'); ?>
</span></th>
        <td >
        <div class="row">
		
		
		<?php echo $form->textField($model,'parentid'); ?>
		</div>
        </td>

	</tr>
	<tr>
          <th width="100" align="right"><span class="row"><?php echo $form->label($model,'name'); ?>
</span></th>
        <td >
        <div class="row">
		
		
		<?php echo $form->textField($model,'name',array('size'=>50,'maxlength'=>50)); ?>
		</div>
        </td>

	</tr>
	<tr>
          <th width="100" align="right"><span class="row"><?php echo $form->label($model,'type'); ?>
</span></th>
        <td >
        <div class="row">
		
		
		<?php echo $form->textField($model,'type'); ?>
		</div>
        </td>

	</tr>
	<tr>
          <th width="100" align="right"><span class="row"><?php echo $form->label($model,'listorder'); ?>
</span></th>
        <td >
        <div class="row">
		
		
		<?php echo $form->textField($model,'listorder'); ?>
		</div>
        </td>

	</tr>
	<tr>
          <th width="100" align="right"><span class="row"><?php echo $form->label($model,'display'); ?>
</span></th>
        <td >
        <div class="row">
		
		
		<?php echo $form->textField($model,'display'); ?>
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