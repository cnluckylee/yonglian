<?php
Yii::app()->clientScript->registerScriptFile($this->module->assetsUrl . '/js/admin_index.js');
?>

<DIV class="ui-layout-north heaber" >
	<div class="heaber_top">

		<div class="heaber_top"> 欢迎你，<?php echo $this->getUser()->name; ?>(<?php echo $this->getUser()->role; ?>)&nbsp;&nbsp;[<a target="layout_center" title="设置" href="<?php echo $this->createUrl('my/index'); ?>">个人设置</a>]&nbsp;&nbsp;[<a title="退出登录" href="<?php echo $this->createUrl('logout'); ?>">退出</a>]
		</div>
	</div>
	<div class="heaber_nav">
		<ul class="ui_heaber_nav">
			<?php		
			$i = 0;
			foreach ($topmenus as $mid):
				$i++;
				?>
				<li class="ui_heaber_nav_item <?php if ($i == 1): ?>ui_heaber_nav_item_current<?php endif; ?>" <?php if ($i == 1): ?>state="current"<?php endif; ?>><span>
						<?php if ($i == 1): ?>
							<a href="<?php echo $this->createUrl('/' . $menus[$mid]['modules'] . '/' . $menus[$mid]['controller'] . '/' . $menus[$mid]['action']); ?>" target="layout_center" style="background:url(<?php echo $this->module->assetsUrl; ?>/images/ico/<?php echo $menus[$mid]['ico']; ?>) no-repeat" id="ui_heaber_nav_<?php echo $i ?>" menuid="<?php echo $menus[$mid]['id'] ?>"><?php echo $menus[$mid]['name']; ?></a>
						<?php else: ?>
							<a href="javascript:void(0)" style="background:url(<?php echo $this->module->assetsUrl; ?>/images/ico/<?php echo $menus[$mid]['ico']; ?>) no-repeat" id="ui_heaber_nav_<?php echo $i ?>" menuid="<?php echo $menus[$mid]['id'] ?>"><?php echo $menus[$mid]['name']; ?></a>
						<?php endif; ?>

					</span></li>
			<?php endforeach; ?>

		</ul>
	</div>
</DIV>
<DIV class="ui-layout-west">
	<?php
	foreach ($topmenus as $menuid):
		if (isset($menukeys[$menuid]) && is_array($menukeys[$menuid])):
			?>
			<div id="left_menu_<?php echo $menuid ?>" class="left_menu_accordion" style="display:none">
				<?php
				foreach ($menukeys[$menuid] as $mid):
					if (isset($menukeys[$mid]) && is_array($menukeys[$mid])):
						?>
						<h3><a href="javascript:void(0)"><?php echo $menus[$mid]['name'] ?></a></h3>
						<div>
							<ul>
								<?php
								foreach ($menukeys[$mid] as $id):
									?>
									<li class="left_menu_accordion_menu_item"><span class="ui-icon ui-icon-triangle-1-e"></span>
										<?php if($menus[$id]['modules'] == "yonglian"):?>
										<?php 
										
										echo CHtml::link($menus[$id]['name'],$menus[$id]['data'],array('target'=>'layout_center'));?>
									</li>
										<?php else: ?>
											<a href="<?php echo $this->createUrl('/' . $menus[$id]['modules'] . '/' . $menus[$id]['controller'] . '/' . $menus[$id]['action']); ?>" target="layout_center"><?php echo $menus[$id]['name'] ?></a></li>
									<?php	
										endif;									
								endforeach;
								?>
							</ul>
						</div>
						<?php
					endif;
				endforeach;
				?>
			</div>
			<?php
		endif;
	endforeach;
	?>
</DIV>
<iframe class="ui-layout-center" name="layout_center" src="<?php echo $this->createUrl('default/main'); ?>" frameborder="0" scrolling="auto" style="background:#e0eaf7"></iframe>
