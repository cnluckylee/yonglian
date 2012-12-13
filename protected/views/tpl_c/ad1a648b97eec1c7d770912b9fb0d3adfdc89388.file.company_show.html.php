<?php /* Smarty version Smarty-3.1.12, created on 2012-12-13 16:45:28
         compiled from "E:\wwwroot\yonglian\protected\views\tpl\site\company_show.html" */ ?>
<?php /*%%SmartyHeaderCode:2752550c995a8ee34a2-82338645%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'ad1a648b97eec1c7d770912b9fb0d3adfdc89388' => 
    array (
      0 => 'E:\\wwwroot\\yonglian\\protected\\views\\tpl\\site\\company_show.html',
      1 => 1355388289,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '2752550c995a8ee34a2-82338645',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'company' => 0,
    'item' => 0,
    'adv' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.12',
  'unifunc' => 'content_50c995a8f09d95_80302278',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_50c995a8f09d95_80302278')) {function content_50c995a8f09d95_80302278($_smarty_tpl) {?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>无标题文档</title>
<head>
<link href="/css/qyqm.css" rel="stylesheet" />
</head>

<body>
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

<div id="Layer5">
  <table width="30" height="20" border="0">
    <tr>
      <td width="40" height="30"><img src="images/Window button/Choose area.gif" width="40" height="30" /></td>
    </tr>
  </table>
</div>

<div id="Layer6">
  <table width="106" border="0">
    <tr>
      <td style="BORDER-top: blue 1px solid;BORDER-left: blue 1px solid;BORDER-right: blue 1px solid;BORDER-bottom: blue 1px solid;"width="62">请选地区</td>
    </tr>
  </table>
</div>

<div id="Layer7">
  <table width="40" height="30" border="0">
    <tr>
      <td width="40" height="30"><img src="images/Window button/Choose industry.gif" width="40" height="30" /></td>
    </tr>
  </table>
</div>

<div id="Layer8">
  <table width="301" border="0">
    <tr>
      <td style="BORDER-top: blue 1px solid;BORDER-left: blue 1px solid;BORDER-right: blue 1px solid;BORDER-bottom: blue 1px solid;"width="248">请选行业</td>
    </tr>
  </table>
</div>

<div id="Layer9">
  <table width="40" height="30" border="0">
    <tr>
      <td width="40" height="30"><img src="images/Web button/Increase search.gif" width="40" height="30" /></td>
    </tr>
  </table>
</div>

<div id="Layer10">
  <table width="40" height="30" border="0">
    <tr>
      <td width="40" height="30"><img src="images/Web button/Reduce search.gif" width="40" height="30" /></td>
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

<div id="Layer12">
  <table width="368" border="0">
    <tr>
      <td width="362" style="BORDER-top: blue 1px solid;BORDER-left: blue 1px solid;BORDER-right: blue 1px solid;BORDER-bottom: blue 1px solid;">请填企业名称</td>
    </tr>
  </table>
</div>

<div id="Layer13"><img src="images/site title/site-title3.gif" width="280" height="30" /></div>

<div id="Layer15">
  <table width="710" border="0"cellpadding=0 cellspacing=0>
    <tr>
      <td width="90"><img src="images/Window button/Online communication1.gif" width="90" height="30" /></td>
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
</body>
</html>
<?php }} ?>