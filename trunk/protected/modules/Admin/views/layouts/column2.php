<?php $this->beginContent('/layouts/main'); ?>
<div class="container">
	<div class="span-5 last">
		<div id="sidebar">
		<?php
			$this->beginWidget('zii.widgets.CPortlet', array(
				'title'=>'Operations',
			));
			$this->widget('zii.widgets.CMenu', array(
				'items'=>$this->menu,
				'htmlOptions'=>array('class'=>'operations'),
			));
			$this->widget('zii.widgets.CMenu', array(
				'items'=>$this->dataProvider,
				'htmlOptions'=>array('class'=>'operations'),
			));
			$this->endWidget();
			
//			 $this->widget('AdminMenu', array('htmlOptions'=>array('class'=>'operations'),));
			// $this->widget('DownandImgMenu', array('htmlOptions'=>array('class'=>'operations'),));
			// $this->widget('AdminToolsMenu', array('htmlOptions'=>array('class'=>'operations'),));
			//$this->widget('Menu', array('htmlOptions'=>array('class'=>'operations'),));
		?>
		
		</div><!-- sidebar -->
	</div>
	<div class="span-19">
		<div id="content">
			<?php echo $content; ?>
		</div><!-- content -->
	</div>


</div>
<?php $this->endContent(); ?>