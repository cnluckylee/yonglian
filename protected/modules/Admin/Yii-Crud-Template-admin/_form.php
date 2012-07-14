<?php
/**
 * The following variables are available in this template:
 * - $this: the CrudCode object
 */
?>
<div class="form">
<?php echo "<?php \$form=\$this->beginWidget('CActiveForm', array(
	'id'=>'".$this->class2id($this->modelClass)."-form',
	'enableAjaxValidation'=>true,
)); ?>\n"; ?>
<table width="100%" class="table_form table">
      <thead>
        <tr class="title">
          <th colspan="2"> <?php echo "<?php echo \$formTatle;?>"?> </th>
        </tr>
      </thead>
      <tbody>
<?php
foreach($this->tableSchema->columns as $column)
{
	if($column->autoIncrement)
		continue;
?>
	<tr>
          <th width="100" align="right">
		<?php echo "<?php echo ".$this->generateActiveLabel($this->modelClass,$column)."; ?>\n"; ?>
        </th>
        <td >
        <div class="row">
		<?php echo "<?php echo ".$this->generateActiveField($this->modelClass,$column)."; ?>\n"; ?>
		<?php echo "<?php echo \$form->error(\$model,'{$column->name}'); ?>\n"; ?>
        </div>
        </td>
	</tr>

<?php
}
?>
</tbody>
      <tfoot>
        <tr class="title">
          <td colspan="2"><a buttype="submit" href="javascript:void(0)" class="button"><span>提交</span></a><a url="<?php echo "<?php echo \$this->createUrl('index');?>"; ?>" buttype="link" href="javascript:void(0)" class="button"><span>返回</span></a></td>
        </tr>
      </tfoot>
    </table>
	

<?php echo "<?php \$this->endWidget(); ?>\n"; ?>

</div>