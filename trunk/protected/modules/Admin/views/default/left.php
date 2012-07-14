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
										<a href="<?php echo $this->createUrl('/' . $menus[$id]['modules'] . '/' . $menus[$id]['controller'] . '/' . $menus[$id]['action']); ?>" target="layout_center"><?php echo $menus[$id]['name'] ?></a></li>
									<?php
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