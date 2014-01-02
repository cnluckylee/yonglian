
<div class="form" id="product-grid-search-form-form">

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
          <th width="100" align="right"><span class="row"><?php echo $form->label($model,'keywords'); ?>
</span></th>
        <td >
        <div class="row">
		
		
		<?php echo $form->textField($model,'keywords',array('size'=>60,'maxlength'=>200)); ?>
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
          <th width="100" align="right"><span class="row"><?php echo $form->label($model,'content'); ?>
</span></th>
        <td >
        <div class="row">
		
		
		<?php echo $form->textArea($model,'content',array('rows'=>6, 'cols'=>50)); ?>
		</div>
        </td>

	</tr>
	<tr>
          <th width="100" align="right"><span class="row"><?php echo $form->label($model,'class1'); ?>
</span></th>
        <td >
        <div class="row">
		
		
		<?php echo $form->textField($model,'class1'); ?>
		</div>
        </td>

	</tr>
	<tr>
          <th width="100" align="right"><span class="row"><?php echo $form->label($model,'class2'); ?>
</span></th>
        <td >
        <div class="row">
		
		
		<?php echo $form->textField($model,'class2'); ?>
		</div>
        </td>

	</tr>
	<tr>
          <th width="100" align="right"><span class="row"><?php echo $form->label($model,'class3'); ?>
</span></th>
        <td >
        <div class="row">
		
		
		<?php echo $form->textField($model,'class3'); ?>
		</div>
        </td>

	</tr>
	<tr>
          <th width="100" align="right"><span class="row"><?php echo $form->label($model,'order'); ?>
</span></th>
        <td >
        <div class="row">
		
		
		<?php echo $form->textField($model,'order'); ?>
		</div>
        </td>

	</tr>
	<tr>
          <th width="100" align="right"><span class="row"><?php echo $form->label($model,'wap_ok'); ?>
</span></th>
        <td >
        <div class="row">
		
		
		<?php echo $form->textField($model,'wap_ok'); ?>
		</div>
        </td>

	</tr>
	<tr>
          <th width="100" align="right"><span class="row"><?php echo $form->label($model,'new_ok'); ?>
</span></th>
        <td >
        <div class="row">
		
		
		<?php echo $form->textField($model,'new_ok'); ?>
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
          <th width="100" align="right"><span class="row"><?php echo $form->label($model,'imgurls'); ?>
</span></th>
        <td >
        <div class="row">
		
		
		<?php echo $form->textField($model,'imgurls',array('size'=>60,'maxlength'=>255)); ?>
		</div>
        </td>

	</tr>
	<tr>
          <th width="100" align="right"><span class="row"><?php echo $form->label($model,'displayimg'); ?>
</span></th>
        <td >
        <div class="row">
		
		
		<?php echo $form->textField($model,'displayimg',array('size'=>60,'maxlength'=>999)); ?>
		</div>
        </td>

	</tr>
	<tr>
          <th width="100" align="right"><span class="row"><?php echo $form->label($model,'com_ok'); ?>
</span></th>
        <td >
        <div class="row">
		
		
		<?php echo $form->textField($model,'com_ok'); ?>
		</div>
        </td>

	</tr>
	<tr>
          <th width="100" align="right"><span class="row"><?php echo $form->label($model,'hits'); ?>
</span></th>
        <td >
        <div class="row">
		
		
		<?php echo $form->textField($model,'hits'); ?>
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
          <th width="100" align="right"><span class="row"><?php echo $form->label($model,'addtime'); ?>
</span></th>
        <td >
        <div class="row">
		
		
		<?php echo $form->textField($model,'addtime'); ?>
		</div>
        </td>

	</tr>
	<tr>
          <th width="100" align="right"><span class="row"><?php echo $form->label($model,'pdf'); ?>
</span></th>
        <td >
        <div class="row">
		
		
		<?php echo $form->textField($model,'pdf',array('size'=>60,'maxlength'=>255)); ?>
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