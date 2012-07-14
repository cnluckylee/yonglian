<script language="javascript">$(document).ready(function(){
	$("form").ajaxForm({ 
		dataType:'json',
		success:   function processJson(data) { 
			if(!data.status) 
				alert(data.info);
			else if(data.status) {
				alert(data.info);
				if(data.data) {
					if(top!=self && self!=top)
						top.location= data.data;
					else 
						window.location.href = data.data;
				} 
			}
		}
	}); 
	
});
</script>
<form name="form1" method="post" action="<?php echo $this->createUrl('userinfo');?>">
  <table width="100%" class="table_form table">
    <thead>
      <tr class="title">
        <th colspan='2'> 个人信息</th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <th width="100" align="right">姓名</th>
        <td><input type="text" name="info[name]" id="info_name" value="<?php echo $model->name;?>"></td>
      </tr>
    </tbody>
    <tfoot>
      <tr class="title">
        <td colspan='2'><a class="button" href="javascript:void(0)" buttype="submit"><span>提交</span></a></td>
      </tr>
    </tfoot>
  </table>
</form>
<form name="form1" method="post" action="<?php echo $this->createUrl('password');?>">
  <table width="100%" class="table_form table">
    <thead>
      <tr class="title">
        <th colspan='2'>修改密码</th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <th width="100" align="right">原始密码</th>
        <td><input type="password" name="info[olbpassword]" id="info_name" value=""></td>
      </tr>
      <tr>
        <th align="right">新密码</th>
        <td><input type="password" name="info[password]" id="info_name2" value="" /></td>
      </tr>
      <tr>
        <th align="right">确认新密码</th>
        <td><input type="password" name="info[repassword]" id="info_name3" value="" /></td>
      </tr>
    </tbody>
    <tfoot>
      <tr class="title">
        <td colspan='2'><a class="button" href="javascript:void(0)" buttype="submit"><span>提交</span></a></td>
      </tr>
    </tfoot>
  </table>
</form>
<form name="form1" method="post" action="<?php echo $this->createUrl('setting');?>">
  <table width="100%" class="table_form table">
    <thead>
      <tr class="title">
        <th colspan='2'>个人设置</th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <th width="100" align="right">分页条数</th>
        <td><input type="text" name="info[page_listrows]" id="info_name" value="<?php echo $model->setting['page_listrows'];?>"></td>
      </tr>
    </tbody>
    <tfoot>
      <tr class="title">
        <td colspan='2'><a class="button" href="javascript:void(0)" buttype="submit"><span>提交</span></a></td>
      </tr>
    </tfoot>
  </table>
  
</form>
<div class="fn-clear"></div>
