<?php
$this->breadcrumbs=array(
	'Downloads'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Download', 'url'=>array('index')),
	array('label'=>'Manage Download', 'url'=>array('admin')),
);
?>

<h1>Create Download</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>