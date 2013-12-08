
<div class="form" id="cwpolicy-grid-search-form-form">

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
          <th width="100" align="right"><span class="row"><?php echo $form->label($model,'title'); ?>
</span></th>
        <td >
        <div class="row">
		
		
		<?php echo $form->textField($model,'title',array('size'=>60,'maxlength'=>200)); ?>
		</div>
        </td>

	</tr>
	<tr>
          <th width="100" align="right"><span class="row"><?php echo $form->label($model,'aid'); ?>
</span></th>
        <td >
        <div class="row">
		
		
		<?php echo $form->textField($model,'aid'); ?>
		</div>
        </td>

	</tr>
	<tr>
          <th width="100" align="right"><span class="row"><?php echo $form->label($model,'imgurl'); ?>
</span></th>
        <td >
        <div class="row">
		
		
		<?php echo $form->textField($model,'imgurl',array('size'=>60,'maxlength'=>255)); ?>
		</div>
        </td>

	</tr>
	<tr>
          <th width="100" align="right"><span class="row"><?php echo $form->label($model,'content'); ?>
</span></th>
        <td >
        <div class="row">
		
		
		<?php echo $form->textArea($model,'content',array('rows'=>6, 'cols'=>50)); ?>
		</div>
        </td>

	</tr>
	<tr>
          <th width="100" align="right"><span class="row"><?php echo $form->label($model,'remark'); ?>
</span></th>
        <td >
        <div class="row">
		
		
		<?php echo $form->textArea($model,'remark',array('rows'=>6, 'cols'=>50)); ?>
		</div>
        </td>

	</tr>
	<tr>
          <th width="100" align="right"><span class="row"><?php echo $form->label($model,'addtime'); ?>
</span></th>
        <td >
        <div class="row">
		
		
		<?php echo $form->textField($model,'addtime'); ?>
		</div>
        </td>

	</tr>
	<tr>
          <th width="100" align="right"><span class="row"><?php echo $form->label($model,'updtime'); ?>
</span></th>
        <td >
        <div class="row">
		
		
		<?php echo $form->textField($model,'updtime'); ?>
		</div>
        </td>

	</tr>
	<tr>
          <th width="100" align="right"><span class="row"><?php echo $form->label($model,'IndustryID'); ?>
</span></th>
        <td >
        <div class="row">
		
		
		<?php echo $form->textField($model,'IndustryID'); ?>
		</div>
        </td>

	</tr>
	<tr>
          <th width="100" align="right"><span class="row"><?php echo $form->label($model,'CompanyID'); ?>
</span></th>
        <td >
        <div class="row">
		
		
		<?php echo $form->textField($model,'CompanyID'); ?>
		</div>
        </td>

	</tr>
	<tr>
          <th width="100" align="right"><span class="row"><?php echo $form->label($model,'Agency'); ?>
</span></th>
        <td >
        <div class="row">
		
		
		<?php echo $form->textField($model,'Agency',array('size'=>60,'maxlength'=>100)); ?>
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