
<div class="form" id="company-grid-search-form-form">

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
          <th width="100" align="right"><span class="row"><?php echo $form->label($model,'name'); ?>
</span></th>
        <td >
        <div class="row">
		
		
		<?php echo $form->textField($model,'name',array('size'=>60,'maxlength'=>200)); ?>
		</div>
        </td>

	</tr>
	<tr>
          <th width="100" align="right"><span class="row"><?php echo $form->label($model,'pinyin'); ?>
</span></th>
        <td >
        <div class="row">
		
		
		<?php echo $form->textField($model,'pinyin',array('size'=>60,'maxlength'=>200)); ?>
		</div>
        </td>

	</tr>
	<tr>
          <th width="100" align="right"><span class="row"><?php echo $form->label($model,'summary'); ?>
</span></th>
        <td >
        <div class="row">
		
		
		<?php echo $form->textArea($model,'summary',array('rows'=>6, 'cols'=>50)); ?>
		</div>
        </td>

	</tr>
	<tr>
          <th width="100" align="right"><span class="row"><?php echo $form->label($model,'desc'); ?>
</span></th>
        <td >
        <div class="row">
		
		
		<?php echo $form->textArea($model,'desc',array('rows'=>6, 'cols'=>50)); ?>
		</div>
        </td>

	</tr>
	<tr>
          <th width="100" align="right"><span class="row"><?php echo $form->label($model,'addr'); ?>
</span></th>
        <td >
        <div class="row">
		
		
		<?php echo $form->textField($model,'addr',array('size'=>60,'maxlength'=>200)); ?>
		</div>
        </td>

	</tr>
	<tr>
          <th width="100" align="right"><span class="row"><?php echo $form->label($model,'zip'); ?>
</span></th>
        <td >
        <div class="row">
		
		
		<?php echo $form->textField($model,'zip'); ?>
		</div>
        </td>

	</tr>
	<tr>
          <th width="100" align="right"><span class="row"><?php echo $form->label($model,'mail'); ?>
</span></th>
        <td >
        <div class="row">
		
		
		<?php echo $form->textField($model,'mail',array('size'=>60,'maxlength'=>200)); ?>
		</div>
        </td>

	</tr>
	<tr>
          <th width="100" align="right"><span class="row"><?php echo $form->label($model,'fax'); ?>
</span></th>
        <td >
        <div class="row">
		
		
		<?php echo $form->textField($model,'fax',array('size'=>60,'maxlength'=>200)); ?>
		</div>
        </td>

	</tr>
	<tr>
          <th width="100" align="right"><span class="row"><?php echo $form->label($model,'salesline'); ?>
</span></th>
        <td >
        <div class="row">
		
		
		<?php echo $form->textField($model,'salesline',array('size'=>60,'maxlength'=>200)); ?>
		</div>
        </td>

	</tr>
	<tr>
          <th width="100" align="right"><span class="row"><?php echo $form->label($model,'serviceline'); ?>
</span></th>
        <td >
        <div class="row">
		
		
		<?php echo $form->textField($model,'serviceline',array('size'=>60,'maxlength'=>200)); ?>
		</div>
        </td>

	</tr>
	<tr>
          <th width="100" align="right"><span class="row"><?php echo $form->label($model,'website'); ?>
</span></th>
        <td >
        <div class="row">
		
		
		<?php echo $form->textField($model,'website',array('size'=>60,'maxlength'=>200)); ?>
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