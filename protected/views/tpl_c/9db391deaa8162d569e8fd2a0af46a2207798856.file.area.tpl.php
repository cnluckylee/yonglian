<?php /* Smarty version Smarty-3.1.12, created on 2013-10-11 10:55:03
         compiled from "E:\wwwroot\yonglian\protected\views\tpl\api\area.tpl" */ ?>
<?php /*%%SmartyHeaderCode:133415257bce755cea6-45774695%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '9db391deaa8162d569e8fd2a0af46a2207798856' => 
    array (
      0 => 'E:\\wwwroot\\yonglian\\protected\\views\\tpl\\api\\area.tpl',
      1 => 1381224539,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '133415257bce755cea6-45774695',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'cssurl' => 0,
    'cssjsv' => 0,
    'IndustryJson' => 0,
    'jsurl' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.12',
  'unifunc' => 'content_5257bce76fd1e5_13231353',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5257bce76fd1e5_13231353')) {function content_5257bce76fd1e5_13231353($_smarty_tpl) {?><meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="<?php echo $_smarty_tpl->tpl_vars['cssurl']->value;?>
selectForm.css?v=<?php echo $_smarty_tpl->tpl_vars['cssjsv']->value;?>
" rel="stylesheet" type="text/css"/>

<div class="out" >
<br>
  <div class="one" >请选择地区</div>
 
  <div class="three">
  
<div class="sidebar">

<div id="districtList" class="districtList">
 
 <div class="city">
 	<div class="city_text" id="title_img0">2.请选一级地区</div>
 	<div class="sel_city">
		<ul class="city_list" id="industry1">
		</ul>
	</div>
 </div>
 
 
 
 <div class="area">
 	<div class="city_text" id="title_img1">2.请选二级地区</div>
 	<div class="sel_area">
		<ul class="city_list" id="industry2">
			<li><a href="javascript:void(0);">请选择</a></li>
		</ul>
	</div>
 </div>
 
 
 
 <div class="community">
 	<div class="city_text" id="title_img2">3.请选择三级地区</div>
 	<div class="sel_community">
		<ul class="city_list" id="industry3">
			<li><a href="javascript:void(0);">请选择</a></li>
		</ul>
	</div>
 
 </div>

 <div class="community">
 	<div class="city_text" id="title_img2">4.请选择四级地区</div>
 	<div class="sel_community">
		<ul class="city_list" id="industry4">
			<li><a href="javascript:void(0);">请选择</a></li>
		</ul>
	</div>
 
 </div>
 
 </div> 
</div>
 <div class="last"><button class="btn" id="b1" onclick="reloadParent()" >确定</button></div>
</div>
<input type="hidden" id='districts' value='<?php echo $_smarty_tpl->tpl_vars['IndustryJson']->value;?>
' />
<script language="javascript" src="<?php echo $_smarty_tpl->tpl_vars['jsurl']->value;?>
/jquery.min.js?v=<?php echo $_smarty_tpl->tpl_vars['cssjsv']->value;?>
"></script>

<script language="javascript">
/**
*小区显示隐藏
*/
var c1=c2=c3=c4=-1;
var cityname = '';
$(document).ready(function() { 
	setDefalutDistrict();
}); 
function selectCity(k,k2,k3,k4)
{
	var val = $("#districts").val(); 
	var str = '';
	var arr_data = jQuery.parseJSON(val);
	var data = arr_data[k]['child'];
	var html_id ='';
	
	if(k4>=0)
	{
		$("#d_"+k4).addClass("ind4_background");
		c4=arr_data[k]['child'][k2]['child'][k3]['child'][k4].id;
		cityname +=' '+arr_data[k]['child'][k2]['child'][k3]['child'][k4].name;
		reloadParent();
	}else if(k3>=0)
	{
		data = arr_data[k]['child'][k2]['child'][k3]['child'];
		html_id = 'industry4';
		$('.city_background').removeClass("ind3_background");
		$("#c_"+k3).addClass("ind3_background");
		c3=arr_data[k]['child'][k2]['child'][k3].id;
		cityname +=' '+arr_data[k]['child'][k2]['child'][k3].name;
	}else if(k2>=0)
	{
		data = arr_data[k]['child'][k2]['child'];
		html_id = 'industry3';
		$('.city_background').removeClass("ind2_background");
		$("#b_"+k2).addClass("ind2_background");
		c2=arr_data[k]['child'][k2].id;
		cityname +=' '+arr_data[k]['child'][k2].name;
	}else if(k>=0){
		html_id = 'industry2';
		$(".dist_background").removeClass("ind1_background");
		$("#a_"+k).addClass("ind1_background");
		c1=arr_data[k].id;
		cityname +=' '+arr_data[k].name;
		$("#sel_city").html('<li><a href="javascript:void(0);">请选择</a></li>');
	}
	$.each(data,function(kk,v){
		if(k3>=0)
			str +='<li id="d_'+kk+'"><a href="javascript:void(0);" onClick="selectCity('+k+','+k2+','+k3+','+kk+')">'+v.name+'</a></li>';
		else if(k2>=0)
			str +='<li id="c_'+kk+'"><a href="javascript:void(0);" onClick="selectCity('+k+','+k2+','+kk+',-1)">'+v.name+'</a></li>';
		else if(k>=0)	
			str +='<li id="b_'+kk+'"><a href="javascript:void(0);" onClick="selectCity('+k+','+kk+',-1,-1)">'+v.name+'</a></li>';
	});
	if(html_id)
	$('#'+html_id).html(str);
}
/**
*	设置默认小区
*/
function setDefalutDistrict()
{
	var val = $("#districts").val(); 
	var html = '';
	var data = jQuery.parseJSON(val);
	$.each(data,function(k,v){
		html +='<li id="a_'+k+'"><a onclick="selectCity('+k+',-1,-1,-1)"   href="javascript:void(0);">'+v.name+'</a></li>';		
	});
	$("#industry1").html(html);
}
function reloadParent()
{
	if(c1<0)
		alert("请选择地区");
	else{
		$("#hid_city1",parent.document).val(c1);
		$("#hid_city2",parent.document).val(c2);
		$("#hid_city3",parent.document).val(c3);
		$("#hid_city4",parent.document).val(c4);
		var Company_city_id = c1;
		if(c2!=-1)
			Company_city_id+='_'+c2;
		if(c3!=-1)
			Company_city_id+='_'+c3;
		if(c4!=-1)
			Company_city_id+='_'+c4;
		
		$("#Company_city",parent.document).val(cityname);
		if($("#Company_city_id",parent.document).length>0)
		$("#Company_city_id",parent.document).val(Company_city_id);
		parent.$.fancybox.close(); 
	}
}

</script>
<?php }} ?>