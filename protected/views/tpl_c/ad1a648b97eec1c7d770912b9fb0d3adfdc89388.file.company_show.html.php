<?php /* Smarty version Smarty-3.1.12, created on 2013-01-19 08:15:38
         compiled from "E:\wwwroot\yonglian\protected\views\tpl\site\company_show.html" */ ?>
<?php /*%%SmartyHeaderCode:2463650fa481ae62e06-35168432%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'ad1a648b97eec1c7d770912b9fb0d3adfdc89388' => 
    array (
      0 => 'E:\\wwwroot\\yonglian\\protected\\views\\tpl\\site\\company_show.html',
      1 => 1357895252,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '2463650fa481ae62e06-35168432',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'industry' => 0,
    'key' => 0,
    'item' => 0,
    'company' => 0,
    'adv' => 0,
    'city' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.12',
  'unifunc' => 'content_50fa481af0d573_97657566',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_50fa481af0d573_97657566')) {function content_50fa481af0d573_97657566($_smarty_tpl) {?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>无标题文档</title>
<head>
<link href="/css/qyqm.css" rel="stylesheet" />
</head>

<body>
<style type="text/css">
<!--
*{ margin:0; padding:0;}
* html{ background-image:url(about:blank); background-attachment:fixed;}
.wrap{ height:5000px;}
.btn{ position:fixed; _position:absolute; left:50%; top:50%; display:block; width:200px; height:50px; font:18px/50px Microsoft Yahei,Arial,'\5b8b\4f53',sans-serif; margin-left:-100px; margin-top:-25px; line-height:50px; text-align:center; color:#666; border:1px solid #999; -moz-box-shadow:0 0 5px #ccc; -webkit-box-shadow:0 0 5px #ccc; box-shadow:0 0 5px #ccc;}
.btn:hover{ color:#111; border-color:#111;}

.popup_box{ width:400px; padding:15px; background:#fff; border:5px solid #444; font-family:Arial,'\5b8b\4f53',sans-serif; -moz-border-radius:10px; -webkit-border-radius:10px; border-radius:10px; -moz-box-shadow:0 0 5px #ccc; -webkit-box-shadow:0 0 5px #ccc; box-shadow:0 0 5px #ccc; display:none}

.popup_box .close{}
.popup_box_head{ height:18px;}
.popup_box_head .h_tl{ float:left; font:18px/1 Microsoft Yahei,'\5b8b\4f53',sans-serif;}
.popup_box_head .close{ float:right; font-style:normal; font:bold 14px/1 Tahoma,'\5b8b\4f53',sans-serif; color:#666; text-decoration:none;}
.popup_box_head .close:hover{ color:#333;}
.popup_box_content{ padding-top:10px; line-height:1.5; font-size:14px; color:#474747;}
-->
</style>

<div style="width: 1030px; margin: 0pt auto; position: relative; height: 2500;">

<div id="Layer1"><img src="images/site title/site-title4.gif" width="1010" height="350" /></div>

<div id="Layer2"><img src="images/Column is introduced/Enterprise show platform.gif" width="690" height="250" /></div>

<div id="Layer3"><img src="images/site title/site-title2.gif" width="880" height="65" /></div>

<div id="Layer4">
  <table width="525" border="0">
    <tr>
      <td width="68" height="32"><span class="STYLE2">企业秀台</span></td>
      <td width="69"><span class="STYLE2">企业动态</span></td>
      <td width="68"><span class="STYLE2">携手发展</span></td>
      <td width="68"><span class="STYLE2">舵主风采</span></td>
      <td width="68"><span class="STYLE2">团队闪耀</span></td>
      <td width="68"><span class="STYLE2"></span></td>
      <td width="70"><span class="STYLE2"></span></td>
    </tr>
  </table>
</div>


<div id="Layer6">
  <table width="100%" border="0">
  <tr>
    <td width="150"><img src="images/Window button/Choose area.gif" width="40" height="30" />&nbsp;&nbsp;<input type="text" size="10" id="search_city_name" value="请选地区" onclick="$('#popup_box').window('open')"/></td>
    <td width="150"><img src="images/Window button/Choose industry.gif" width="40" height="30" />&nbsp;&nbsp;<select id="search_industry" name="search_industry">
      	<?php  $_smarty_tpl->tpl_vars['item'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['item']->_loop = false;
 $_smarty_tpl->tpl_vars['key'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['industry']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['item']->key => $_smarty_tpl->tpl_vars['item']->value){
$_smarty_tpl->tpl_vars['item']->_loop = true;
 $_smarty_tpl->tpl_vars['key']->value = $_smarty_tpl->tpl_vars['item']->key;
?>
        	<option value="<?php echo $_smarty_tpl->tpl_vars['key']->value;?>
"><?php echo $_smarty_tpl->tpl_vars['item']->value->name;?>
</option>
        <?php } ?>
      </select></td>
    <td width="150" height="40"><input type="text" value="输入企业名称" name="search_company"  id="search_company" onclick="check_value()" onblur="check_value()"/></td>
    <td>&nbsp;&nbsp;<img src="images/easyui/searchbox_button.png"/></td>
  </tr>
  </table>
</div>



<div id="Layer11">
  <div id="Layer14">
    <table width="687" border="0"cellpadding=0 cellspacing=0>
      <tr>
        <td width="24">&nbsp;</td>
        <td width="180"><div align="center"><strong>企业名称</strong></div></td>
        <td width="150"><div align="center"><strong>合作信息</strong></div></td>
        <td width="150"><div align="center"><strong>活动信息</strong></div></td>
        <td width="149"><div align="center"><strong>主营产品</strong></div></td>
      </tr>
      <?php  $_smarty_tpl->tpl_vars['item'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['item']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['company']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['item']->key => $_smarty_tpl->tpl_vars['item']->value){
$_smarty_tpl->tpl_vars['item']->_loop = true;
?>
      <tr>
        <td>
          <input type="checkbox" name="checkbox" value="checkbox" />
        </td>
        <td><?php echo $_smarty_tpl->tpl_vars['item']->value['name'];?>
</td>
        <td><?php echo $_smarty_tpl->tpl_vars['item']->value['desct'];?>
</td>
        <td>&nbsp;</td>
        <td><?php echo $_smarty_tpl->tpl_vars['item']->value['product'];?>
</td>
      </tr>
      <?php } ?>

    </table>
  </div>
  <img src="images/background/background2.gif" width="710" height="600" /></div>
<div id="Layer13"><img src="images/site title/site-title3.gif" width="280" height="30" /></div>

<div id="Layer15">
  <table width="710" border="0"cellpadding=0 cellspacing=0>
    <tr>
      <td width="90"></td>
      <td width="85" height="30">&nbsp;</td>
      <td width="90"><img src="images/Web button/Start page.gif" width="90" height="30" /></td>
      <td width="90"><img src="images/Web button/The next page.gif" width="90" height="30" /></td>
      <td width="90"><img src="images/Web button/Previous page.gif" width="90" height="30" /></td>
      <td width="90"><img src="images/Web button/End page.gif" width="90" height="30" /></td>
      <td width="85">&nbsp;</td>
      <td width="90"><img src="images/Window button/Browse camp.gif" width="90" height="30" /></td>
    </tr>
  </table>
</div>

<div id="Layer16">
  <div id="Layer17">
    <table width="660" border="0"cellpadding=0 cellspacing=0>
      <tr>
        <td
width="132" height="40" ><span class="STYLE3">著名商标：</span></td>
        <td width="132"style="BORDER-RIGHT: #666666 2PX DASHED;BORDER-BOTTOM: #666666 2PX DASHED"><img src="images/famous trademark/famous trademark1.gif" width="120" height="30" /></td>
        <td width="132"style="BORDER-RIGHT: #666666 2PX DASHED;BORDER-BOTTOM: #666666 2PX DASHED"><img src="images/famous trademark/famous trademark2.gif" width="120" height="30" /></td>
        <td width="132"style="BORDER-RIGHT: #666666 2PX DASHED;BORDER-BOTTOM: #666666 2PX DASHED"><img src="images/famous trademark/famous trademark3.gif" width="120" height="30" /></td>
        <td width="132"style="BORDER-BOTTOM: #666666 2PX DASHED"><img src="images/famous trademark/famous trademark4.gif" width="120" height="30" /></td>
      </tr>
      <tr>
        <td height="40" style="BORDER-RIGHT: #666666 2PX DASHED;BORDER-BOTTOM: #666666 2PX DASHED"><img src="images/famous trademark/famous trademark5.gif" width="120" height="30" /></td>
        <td style="BORDER-RIGHT: #666666 2PX DASHED;BORDER-BOTTOM: #666666 2PX DASHED"><img src="images/famous trademark/famous trademark6.gif" width="120" height="30" /></td>
        <td style="BORDER-RIGHT: #666666 2PX DASHED;BORDER-BOTTOM: #666666 2PX DASHED"><img src="images/famous trademark/famous trademark7.gif" width="120" height="30" /></td>
        <td style="BORDER-RIGHT: #666666 2PX DASHED;BORDER-BOTTOM: #666666 2PX DASHED"><img src="images/famous trademark/famous trademark8.gif" width="120" height="30" /></td>
        <td style="BORDER-BOTTOM: #666666 2PX DASHED">&nbsp;</td>
      </tr>
      <tr>
        <td height="40" style="BORDER-RIGHT: #666666 2PX DASHED;">&nbsp;</td>
        <td style="BORDER-RIGHT: #666666 2PX DASHED;">&nbsp;</td>
        <td style="BORDER-RIGHT: #666666 2PX DASHED;">&nbsp;</td>
        <td style="BORDER-RIGHT: #666666 2PX DASHED;">&nbsp;</td>
        <td>&nbsp;</td>
      </tr>
    </table>
  </div>

  <img src="images/background/background3.gif" width="710" height="200" /></div>
  <div class="main_body_left">
     <ul>
    <?php  $_smarty_tpl->tpl_vars['item'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['item']->_loop = false;
 $_smarty_tpl->tpl_vars['key'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['adv']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['item']->key => $_smarty_tpl->tpl_vars['item']->value){
$_smarty_tpl->tpl_vars['item']->_loop = true;
 $_smarty_tpl->tpl_vars['key']->value = $_smarty_tpl->tpl_vars['item']->key;
?>
    <li><a href="<?php echo $_smarty_tpl->tpl_vars['item']->value['imglink'];?>
" target="_blank"><img src="<?php echo $_smarty_tpl->tpl_vars['item']->value['imgurl'];?>
"></a></li> 
	<?php } ?>
 	</ul>
  </div>
	
</div>
<div id="popup_box" class="easyui-window" title="Modal Window" data-options="modal:true,closed:true,iconCls:'icon-save'" style="width:500px;height:200px;padding:10px;">
	<select id="city" name="city" onchange="changecity()">
   	 <option value="">请选择</option>
     <?php  $_smarty_tpl->tpl_vars['item'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['item']->_loop = false;
 $_smarty_tpl->tpl_vars['key'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['city']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['item']->key => $_smarty_tpl->tpl_vars['item']->value){
$_smarty_tpl->tpl_vars['item']->_loop = true;
 $_smarty_tpl->tpl_vars['key']->value = $_smarty_tpl->tpl_vars['item']->key;
?>
     	<option value="<?php echo $_smarty_tpl->tpl_vars['key']->value;?>
"><?php echo $_smarty_tpl->tpl_vars['item']->value;?>
</option>
     <?php } ?>
    </select>
    &nbsp;&nbsp;&nbsp;&nbsp;
    <select id="city_id" name="city_id">
    	<option value="">请选择</option>
    </select>
    
    <input type="button" value="确定"  onclick="set_data()" />
</div>
<input type="hidden" id="search_city" name="search_city" />
<script language="javascript" src="js/jquery-1.8.0.min.js"></script>
<script language="javascript" src="js/easyui/jquery.easyui.min.js"></script>
<script src="weblive/welive.php" language="javascript"></script>
<link rel="stylesheet" type="text/css" href="js/easyui/themes/default/easyui.css">
<link rel="stylesheet" type="text/css" href="js/easyui/themes/icon.css">
<link rel="stylesheet" type="text/css" href="js/easyui/demo.css">
<script language="javascript">
	
	function changecity()
	{
		var city = $("#city").val();
		if(city)
		{
			$.ajax({
				  type: "Post",
				  url: "?r=site/getcity",
				  data: "city="+city,
				  success: function(msg){
							 $("#city_id").html(msg);
						   }
				}); 
		}else{
			 $("#city_id").html('<option value="">请选择</option>');
		}
		
	}
	function set_data()
	{
		var search_city = $("#city_id").val();
		$("#search_city_name").val($("#city_id>option:selected").get(0).text); 
		$("#search_city").val(search_city);
		$('#popup_box').window('close');
	}
	function check_value()
	{
		if($("#search_company").val()=="输入企业名称")
			$("#search_company").val("");
		else
			$("#search_company").val("输入企业名称");
	}
</script>
</body>
</html>
<?php }} ?>