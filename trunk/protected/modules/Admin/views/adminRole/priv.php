<?php
Yii::app()->clientScript->registerScriptFile($this->module->assetsUrl.'/js/jquery/ztree/jquery.ztree.all-3.2.min.js');
Yii::app()->clientScript->registerCssFile($this->module->assetsUrl.'/js/jquery/ztree/zTreeStyle.css');
?>
<SCRIPT type="text/javascript">
		<!--
		
		var setting = {
			check: {
				enable: true,
				chkboxType: { "Y" : "ps", "N" : "ps" }
			},
			data: {
				simpleData: {
					enable: true
				}
			}
		};
		
	var zNodes = <?php echo CJSON::encode($menus);?>;

		$(document).ready(function(){
			var treeObj = $.fn.zTree.init($("#treeDemo"), setting, zNodes);
			$('form').submit(function() {
				nodes = treeObj.getCheckedNodes(true);
				if(nodes.length>0) {
					menus = {"menu_id": []};
					$.each( nodes, function(i, n){
						menus.menu_id[i] = n.id;
					});
					$.post("<?php echo Yii::app()->getRequest()->getUrl();?>", menus,
					   function(data){
							if(!data.status) 
								alert(data.info);
							else if(data.status) {
								alert(data.info);
								window.location.href = '<?php echo $this->createUrl('index');?>';
							}
					   },"json");
				} else {
					alert('请选择节点！');
				}
				return false;
			});
			
		});
		//-->
	</SCRIPT>
    <style>
	ul.ztree {
    
 
    height: 360px;
   
    overflow-x: auto;
    overflow-y: scroll;
    
}
	</style>
    <form name="form1" method="post" action="<?php echo $this->createUrl('priv');?>">
<table width="100%" class="table_form table">
  <thead>
    <tr class="title">
      <th> 设置权限</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <td ><div class="zTreeDemoBackground left">
		<ul id="treeDemo" class="ztree"></ul>
	</div>  </td>
      </tr>
  </tbody>
  
   
  <tfoot>
    <tr class="title">
      <td><a class="button" href="javascript:void(0)" buttype="submit"><span>提交</span></a> <a class="button" href="javascript:void(0)" buttype="link" url="<?php echo $this->createUrl('index');?>"><span>返回</span></a></td>
    </tr>
  </tfoot>
</table>
</form>