<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="{{$cssurl}}selectForm.css?v={{$cssjsv}}" rel="stylesheet" type="text/css"/>

<div class="out" >
<br>
  <div class="one" >请选择行业</div>
 
  <div class="three">
  
<div class="sidebar">

<div id="districtList" class="districtList">
 
 <div class="city">
 	<div class="city_text" id="title_img0">2.请选一级行业</div>
 	<div class="sel_city">
		<ul class="city_list" id="industry1">
		</ul>
	</div>
 </div>
 
 
 
 <div class="area">
 	<div class="city_text" id="title_img1">2.请选二级行业</div>
 	<div class="sel_area">
		<ul class="city_list" id="industry2">
			<li><a href="javascript:void(0);">请选择</a></li>
		</ul>
	</div>
 </div>
 
 
 
 <div class="community">
 	<div class="city_text" id="title_img2">3.请选择三级行业</div>
 	<div class="sel_community">
		<ul class="city_list" id="industry3">
			<li><a href="javascript:void(0);">请选择</a></li>
		</ul>
	</div>
 
 </div>

 <div class="community">
 	<div class="city_text" id="title_img2">4.请选择四级行业</div>
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
<input type="hidden" id='districts' value='{{$IndustryJson}}' />
<script language="javascript" src="{{$jsurl}}/jquery.min.js?v={{$cssjsv}}"></script>

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
		$("#sel_city").html('<li><a href="javascript:void(0);">请选择</a></li>');
		c1=arr_data[k].id;
		cityname +=' '+arr_data[k].name;
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
		alert("请选择行业");
	else{
		var Company_Industry_id = c1;
		if(c2!=-1)
			Company_Industry_id+='_'+c2;
		if(c3!=-1)
			Company_Industry_id+='_'+c3;
		if(c4!=-1)
			Company_Industry_id+='_'+c4;
		$("#hid_IndustryID1",parent.document).val(c1);
		$("#hid_IndustryID2",parent.document).val(c2);
		$("#hid_IndustryID3",parent.document).val(c3);
		$("#hid_IndustryID4",parent.document).val(c4);
		$("#Company_Industry",parent.document).val(cityname);
		if($("#Company_Industry_id",parent.document).length>0)
		$("#Company_Industry_id",parent.document).val(Company_Industry_id);
		parent.$.fancybox.close(); 
	}
}

</script>
