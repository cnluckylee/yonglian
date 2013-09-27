<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="{{$cssurl}}District.css?v={{$cssjsv}}" rel="stylesheet" type="text/css"/>

<div class="out" >
<br>
  <div class="one" >欢迎来到我查查超市代购</div>
  <div class="two"></div>
  <div class="three"><p><br>请选择配送范围:</p>
  
<div class="sidebar">

<div class="downBtn" onclick="showDistrict()" ><div class="downBtn_img">  
<span class="districtName" id="districtName" >上海市 浦东新区 张江地区</span></div></div>




<div id="districtList" class="districtList">
 
 <div class="city">
 	<div class="city_text" id="title_img0">1.请选择您所在的城市</div>
 	<div class="sel_city">
		<p class="hot_city">热门城市</p>
		<ul class="city_list">
        {{foreach from=$areas item=city}}
			<li id="d_{{$city.ctid}}"><a onclick="selectCity({{$city.ctid}},-1)"   href="javascript:void(0);">{{$city.name}}</a></li>
        {{/foreach}}
		</ul>
		<p class="line"></br>&nbsp;&nbsp;&nbsp;城市选择</p>
		
		<table class="tab" id='ctiy_tab' >
			
		</table>
		
	</div>
 </div>
 
 
 
 <div class="area">
 	<div class="city_text" id="title_img1">1.请选行政区</div>
 	<div class="sel_area">
		<ul class="city_list" id="sel_province">
			<li><a href="javascript:void(0);">请选择</a></li>
			
		</ul>
	</div>
 </div>
 
 
 
 <div class="community">
 	<div class="city_text" id="title_img2">1.请选择地区</div>
 	<div class="sel_community">
		<ul class="city_list" id="sel_city">
			<li><a href="javascript:void(0);">请选择</a></li>
		</ul>
	</div>
 
 </div>

 </div> 
</div>
</div>
<input type="hidden" id="hidPName"  value="浦东新区" />
<input type="hidden" id="hidDSID"  value="1"/>
<input type="hidden" id="hidCTName"  value="上海市"/>
<input type="hidden" id="hidCTID"  value="1"/>
<input type="hidden" id='districts' value='{{$data.districts}}' />
<script language="javascript" src="{{$jsurl}}/jquery.js?v={{$cssjsv}}"></script>
<script language="javascript" src="{{$jsurl}}/jquery.cookie.js?v={{$cssjsv}}"></script>
<script language="javascript">
/**
*小区显示隐藏
*/
var isShow = 0;
$(document).ready(function() { 
 
	setDefalutDistrict();
}); 

function showDistrict()
{
	if(isShow == 1)
	{
		$("#districtList").fadeOut("slow");
		$("#three").fadeIn("slow");
		isShow = 0;
	}else{
		$("#districtList").fadeIn("slow");
		$("#three").fadeOut("slow");
		isShow = 1;
		createCity();
	}
}

function createCity()
{
	var val = $("#districts").val(); 
	var data =eval("("+ val+")");//转换为json对象
	var str = '<tr>';
	var c= 0;
	$.each(data,function(k,v){
		str +='<td id="a_'+k+'"><a onclick="selectCity('+k+',-1)"   href="javascript:void(0);">'+v.name+'</a></td>';
		c++;
		if(c%4 == 0)
		{
			str+="</tr><tr>";	
		}
	})
	str +='</tr>';
	$('#ctiy_tab').html(str);
}


function selectCity(k,k2)
{
	var val = $("#districts").val(); 
	var str = '';
	var arr_data = jQuery.parseJSON(val);
	var data = arr_data[k]['districts'];
	var html_id = 'sel_province';
	$(".dist_background").removeClass("dist_background");
	$("#a_"+k).addClass("dist_background");
	if($("#d_"+k).length>0)
	{
		$("#d_"+k).addClass("dist_background");
	}
	if(k2>=0)
	{
		data = arr_data[k]['districts'][k2]['communities'];
		html_id = 'sel_city';
		var ctname = arr_data[k]['name'];
		var dgctid = k;
		var dsid = k2;
		var pname = arr_data[k]['districts'][k2]['name'];
		$('.city_background').removeClass("city_background");
		$("#b_"+k2).addClass("city_background");
	}else{
		$("#sel_city").html('<li><a href="javascript:void(0);">请选择</a></li>');
	}
	$.each(data,function(kk,v){
		if(k2>=0)
			str +='<li id="c_'+kk+'"><a href="javascript:void(0);" onClick="selectDistrict('+dgctid+',\''+ctname+'\',\''+dsid+'\',\''+pname+'\',\''+v.heid+'\',\''+v.name+'\',\''+kk+'\')">'+v.name+'</a></li>';
		else	
			str +='<li id="b_'+kk+'"><a href="javascript:void(0);" onClick="selectCity('+k+','+kk+')">'+v.name+'</a></li>';
	});
	$('#'+html_id).html(str);
}
/**
*	选择小区
*/
function selectDistrict(dgctid,ctname,dsid,pname,heid,hname,key)
{
	$(".heid_background").removeClass("heid_background");
	$("#c_"+heid).addClass("heid_background");
	$.cookie("dgheid",heid,{ expires: 365, path: '/',domain:hostUrl });
	$.cookie("dghname",hname,{ expires: 365, path: '/',domain:hostUrl });
	$.cookie("dgdsid",dsid,{ expires: 365, path: '/',domain:hostUrl });
	$.cookie("dgpname",pname,{ expires: 365, path: '/',domain:hostUrl });
	$.cookie("dgctid",dgctid,{ expires: 365, path: '/',domain:hostUrl });
	$.cookie("dgctname",ctname,{ expires: 365, path: '/',domain:hostUrl });
	if(hname.length>6)
		hname = hname.substr(0,6)+'...';
	$("#districtName").text(ctname+" "+pname+" "+hname);
	selectstore(dgctid,dsid,key);
	showDistrict();
}

function selectstore(dgctid,dsid,heid)
{
	var val = $("#districts").val(); 
	var html = '<tr>';
	var ii = 0;
	var arr_data = jQuery.parseJSON(val);
	var data = arr_data[dgctid]['districts'][dsid]['communities'][heid]['stores'];
	$.each(data,function(k,v){
		ii++;
		html +='<td><a href="javascript:void(0);" stid="'+k+'" stname="'+v.stname+'" onClick="setStore($(this))">'+v.bname+'-'+v.stname+'</a></td>';
		if(ii%3 == 0)
		{
			html +="</tr><tr>";		
		}
	});
	html +='</tr>';

	$("#storesList").html(html);

	$("#storeNum").text(ii);
}

function setStore(obj)
{
	var flag = arguments[1]?arguments[1]:null; 
	if(flag)
	{
		setDefalutDistrict();
	}
	var stid = obj.attr("stid");
	var stname = obj.attr("stname");
	$.cookie("dgstid",stid,{ expires: 365, path: '/',domain:hostUrl });
	$.cookie("dgstname",stname,{ expires: 365, path: '/',domain:hostUrl });
	if(controller == 'dgshopping')
	{
		parent.window.location.href= httpUrl+'/'+controller+'/brand?stid='+stid;
	}else if(controller == 'seckill'){
		parent.window.location.href= httpUrl+'/'+controller+'/index?stid='+stid;
	}	
}

function reloadParent()
{
	try{
		var dgheid = $.cookie("dgheid");
		if(!dgheid)
		{
			setDefalutDistrict();
		}
	}catch(err)
	{	}
	var url = parent.window.location.href;
	if(url.indexOf("dgshopping/brand")>=0 || url.indexOf("dgshopping_brand")>=0)
	{
		var aa = $("#storesList td a");
		try{
			stid = aa.eq(0).attr('stid');
		}catch(err)
		{
			stid = 1;
		}
		url = httpUrl+'/dgshopping/brand?stid='+stid;
	}else if(url.indexOf("dgshopping/search")>=0){
		var reg=new RegExp("stid_str=(\\d+)*(\,\\d+)*(\\d+)*",'gmi');
		url=url.replace(reg,'');
	}
	if(controller == "seckill")
	{
		url = httpUrl+'/seckill.html';
	}
	parent.window.location.href = url;
	parent.$.fancybox.close(); 
}

/**
*	设置默认小区
*/
function setDefalutDistrict()
{
/*	
	$.cookie("dgheid",226,{ expires: 365, path: '/',domain:hostUrl });
	$.cookie("dghname","张江地区",{ expires: 365, path: '/',domain:hostUrl });
	$.cookie("dgdsid",1,{ expires: 365, path: '/',domain:hostUrl });
	$.cookie("dgpname","浦东新区",{ expires: 365, path: '/',domain:hostUrl });
	$.cookie("dgctid",1,{ expires: 365, path: '/',domain:hostUrl });
	$.cookie("dgctname","上海市",{ expires: 365, path: '/',domain:hostUrl });
	$("#districtName").text("上海市 浦东新区 张江地区");
*/	
	try{
		var dghname = $.cookie("dghname");
		var dgpname = $.cookie("dgpname");
		var dgctname = $.cookie("dgctname");
		if(dghname.length>6)
			dghname = dghname.substr(0,6)+'...';
		$("#districtName").text(dgctname+" "+dgpname+" "+dghname);
	}catch(err)
	{
		$("#districtName").text("上海市 浦东新区 张江地区");
	}
	
}

</script>
