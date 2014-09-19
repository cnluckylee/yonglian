<script language="javascript">
$(document).ready(function(){
$('.del').click(function(){
		affirm = confirm($(this).attr('msg'));
		if(affirm) {
			$.ajax({
				url:$(this).attr('href'),
				type: 'post',
				dataType : 'json',
				success:function(data){
					if(data.status) {
						window.location.reload()
					} else {
						alert(data.info);
					}
	  			},
				
				error: function(XMLHttpRequest, textStatus, errorThrown){
					alert(XMLHttpRequest.responseText);
				}
			});
		}
		return false;
	});
	$("form").submit(function() {
		$this = $(this);
		
  		var formdata = $(this).formSerialize();
		
		$.post('<?php echo $this->createUrl('listorder');?>', formdata,function(data){
			if(!data.status) 
				alert(data.info);
			else if(data.status) {
				window.location.reload();
			}
		 },"json");
		 return false;
	});
});
</script>
<div class="topBut"><a class="button" href="javascript:void(0)" buttype="link" url="<?php echo $this->createUrl('create');?>"><span>添加</span></a></div>
<form action="<?php echo $this->createUrl('listorder');?>" method="post" name="form1" id="form1">
  <table width="100%" class="table_list table">
    <thead>
      <tr>
        <th width="80" style="text-align:center">排列序号</th>
        <th>地区名称</th>
       
        <th>管理操作</th>
      </tr>
    </thead>
    <tbody>
    
    <?php
    	if($data):
    	 foreach($data as $i):?>
     <tr>
					<td><input name="listorders[<?php echo $i->id;?>]" type='text' size='6' value="<?php echo $i->sort;?>" class='input-text-c'></td>
					<td ><?php echo $i->name;?></td>
					<td class="button-column"><a href="/index.php?r=admin/Citymanagement/update&id=<?php echo $i->id;?>" title="更新" class="update"><img alt="更新" src="/assets/5e0d41a2/gridview/update.png"></a> 
					<a href="/index.php?r=admin/Citymanagement/delete&id=<?php echo $i->id;?>" msg="确定要删除,<?php echo $i->name;?>" title="删除" class="del" ><img alt="删除" src="/assets/5e0d41a2/gridview/delete.png"></a></td>
		</tr>
	<?php endforeach;
		else:	
	?>
	<tr><td colspan="4">暂无数据</td></tr>
	<?php endif;?>
    </tbody>
    <tfoot>
      <tr>
        <th style="padding:5px" colspan="4"><a buttype="submit" href="javascript:void(0)" class="button"><span>排序</span></a></th>
      </tr>
    </tfoot>
  </table>
</form>