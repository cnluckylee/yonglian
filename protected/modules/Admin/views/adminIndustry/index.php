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
      <tr class="title">
        <th colspan="4"> 行业管理 </th>
      </tr>
      <tr>
        <th width="80" style="text-align:center">排列序号</th>
        <th>行业名称</th>
        <th>URL</th>
        <th>管理操作</th>
      </tr>
    </thead>
    <tbody>
      <?php echo $menuTree;?>
    </tbody>
    <tfoot>
      <tr>
        <th style="padding:5px" colspan="4"><a buttype="submit" href="javascript:void(0)" class="button"><span>排序</span></a></th>
      </tr>
    </tfoot>
  </table>
</form>

