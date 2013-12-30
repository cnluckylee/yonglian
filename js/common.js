var httpUrl = "http://www.yonglian.net.tf";
var favorite ="����";
function FormatFloat(src, pos)
{
    return Math.round(src*Math.pow(10, pos))/Math.pow(10, pos);
}


/**
*	��̬����js,css
*	e:·��
*	d:���� css js
*/
function loadCssAndJs(e, d) {
  var fun=arguments[2]?arguments[2]:null; 
  var controller=arguments[3]?arguments[3]:null; 
  var f = "";
  if (d == "js") {
    f = document.createElement("script");
    f.setAttribute("type", "text/javascript");
    f.setAttribute("src", e)
  } else {
    if (d == "css") {
      f = document.createElement("link");
      f.setAttribute("rel", "stylesheet");
      f.setAttribute("type", "text/css");
      f.setAttribute("href", e)
    }
  }
  if (typeof f != "undefined") {
    document.getElementsByTagName("head")[0].appendChild(f);
  }
};


//��Ϊ��ҳ
function setHomepage() {
  if (document.all) {
    document.body.style.behavior = "url(#default#homepage)";
    document.body.setHomePage(httpUrl)
  } else {
    if (window.sidebar) {
      if (window.netscape) {
        try {
          netscape.security.PrivilegeManager.enablePrivilege("UniversalXPConnect")
        } catch(c) {
          alert("�ò�����������ܾ�����������øù��ܣ����ڵ�ַ�������� about:config,Ȼ���� signed.applets.codebase_principal_support ֵ��Ϊtrue")
        }
      }
      var d = Components.classes["@mozilla.org/preferences-service;1"].getService(Components.interfaces.nsIPrefBranch);
      d.setCharPref("browser.startup.homepage", httpUrl)
    }
  }
}
//�����ղؼ�
function bookmark() {
	
  if (document.all) {
    window.external.AddFavorite(httpUrl, favorite);
  }else if(window.sidebar){
  	window.sidebar.addPanel(favorite, httpUrl, "");
  }else{
  	alert("����������޷���ɴ˲���,�����ֶ���ӻ�Ctrl+D��лл���Ĺ�ע��");
  }
}


function bindiframe(controller)
{
	$("#"+controller).fancybox({
				'width'				: 637,
				'height'			: 462,
				'href'              : httpUrl+'?r=api/'+controller,
				'padding': 0,
				'transitionIn': 'elastic',
				'transitionOut': 'elastic',
				'type': 'iframe',
				'showCloseButton': true,
				'hideOnOverlayClick':false,
				'autoScale': false,
				'overlayOpacity':0.2,
				'scrolling':'no'
	   });
}

function formatFloat(floatvar, pos)
{
	var f_x = parseFloat(floatvar); 
	if (isNaN(f_x)) 
	{ 
	//alert('is not num'); 
	return false; 
	} 
	var f_x = Math.round(f_x*100)/100;
	var s_x = f_x.toString();
	var pos_decimal = s_x.indexOf('.');
	if (pos_decimal < 0)
	{
	pos_decimal = s_x.length;
	s_x += '.';
	}
	while (s_x.length <= pos_decimal + 2)
	{
	s_x += '0';
	}
	if(s_x == '0.00'){
		s_x = 0;
	}
	return s_x;
    //return Math.round(src*Math.pow(10, pos))/Math.pow(10, pos);
}
function UrlEncode(str){
  var ret="";
  var strSpecial="!\"#$%&'()*+,/:;<=>?[]^`{|}~%";
  var tt= "";

  for(var i=0;i<str.length;i++){
   var chr = str.charAt(i);
    var c=str2asc(chr);
    tt += chr+":"+c+"n";
    if(parseInt("0x"+c) > 0x7f){
      ret+="%"+c.slice(0,2)+"%"+c.slice(-2);
    }else{
      if(chr==" ")
        ret+="+";
      else if(strSpecial.indexOf(chr)!=-1)

        ret+="%"+c.toString(16);
      else
        ret+=chr;
    }
  }
  return ret;
}

function UrlDecode(str){
  var ret="";
  for(var i=0;i<str.length;i++){
   var chr = str.charAt(i);
    if(chr == "+"){
      ret+=" ";
    }else if(chr=="%"){
     var asc = str.substring(i+1,i+3);
     if(parseInt("0x"+asc)>0x7f){
      ret+=asc2str(parseInt("0x"+asc+str.substring(i+4,i+6)));
      i+=5;
     }else{
      ret+=asc2str(parseInt("0x"+asc));
      i+=2;
     }
    }else{
      ret+= chr;
    }
  }
  return ret;
}



function DataLength(fData)
{
var intLength=0
for (var i=0;i<fData.length;i++)
{
   if ((fData.charCodeAt(i) < 0) || (fData.charCodeAt(i) > 255))
    intLength=intLength+1
   else
    intLength=intLength+1
}
return intLength
}

function SetString(str,len)
 {
  var strlen = 0; 
  var s = "";
  for(var i = 0;i < str.length;i++)
  {
   if(str.charCodeAt(i) > 128){
    strlen += 2;
   }else{ 
    strlen++;
   }
   s += str.charAt(i);
   if(strlen >= len){ 
    return s ;
   }
  }
 return s;
 }


 /*
  *����ʱ���÷���
  *s:��ʼʱ��ʱ���
  *e:����ʱ��ʱ���
  *d:��Ҫչʾ����ʱ��div��id
 */
 
 
 var pageTimer = {} ;
 
 function timer(s,e,d){
 	 var n = Math.round(new Date().getTime()/1000);
 	 var diff;
 	 var type;//��ʶ 1:�뿪ʼ 2�������
 	 if(n < s){
 	 	//�뿪ʼ
 	 	diff = s - n;
 	 	type = 1;
 	 }else if(n > e){
 	 	//�ѽ���
 	 	$("#"+d).html('�ѽ���');
	 	return;
 	 }else{
 	 	//�࿪ʼ
 	 	diff = e - n;
 	 	type = 2;
 	 }
	 pageTimer[d] = setInterval(function(){
	 	 if(diff >= 0){
	 	 	var str = formatTime(diff,7);
	 		 $("#"+d).html(str);
	 		 diff--;
	 	 }else{
	 	 	 if(type == 1){
	 	 	 	$("#"+d).html('�ѿ�ʼ');
	 	 	 }else if(type == 2){
	 	 	 	$("#"+d).html('�ѽ���');
	 	 	 }
	 	 	clearInterval(pageTimer[d]);
	 	 }
	 },1000)
 }
 
 function numberFormatLeadZero(num,len){
	num=(""+ Math.floor(num));
	for(;num.length<len;){
		num="0"+num;
	}
	return num;
}


function formatTime(t,format){
	t=Math.floor(t);
	t<0&&(t=0);
	if(format==2){ //00:00
		return numberFormatLeadZero(t/60,2)+":"+numberFormatLeadZero(t%60,2);
	}else if(format==3){ //00:00:00
		return numberFormatLeadZero(t/3600,2)+":"+numberFormatLeadZero(t/60%60,2)+":"+numberFormatLeadZero(t%60,2);
	}else if(format==4){
		return t<60?"�ղ�":t<3600?""+Math.floor(t/60)+"����ǰ":t<86400?""+Math.floor(t/3600)+"Сʱ"+Math.floor(t/60%60)+"����ǰ":""+Math.floor(t/86400)+"��ǰ";
	}else if(format==5){
		return t<=0?"0��":t<60?t+"��":t<3600?Math.floor(t/60)+"��":t<86400?Math.floor(t/3600)+"ʱ"+Math.floor(t/60%60)+"��":Math.floor(t/86400)+"��";
	}else if(format==6){
		return t<=0?"0��":t<60?numberFormatLeadZero(t,2)+"��":t<3600?numberFormatLeadZero(Math.floor(t/60),2)+"��":t<86400?numberFormatLeadZero(Math.floor(t/3600),2)+"ʱ"+numberFormatLeadZero(Math.floor(t/60%60),2)+"��":Math.floor(t/86400)+"��"+numberFormatLeadZero(Math.floor(t%86400/3600),2)+"ʱ"+numberFormatLeadZero(Math.floor(t/60%60),2)+"��";
	}else if(format==7){
		return t<=0?"00��00ʱ00��00��":t<60?"00��00ʱ00��"+numberFormatLeadZero(t,2)+"��":t<3600?"00��00ʱ"+numberFormatLeadZero(Math.floor(t/60),2)+"��"+numberFormatLeadZero(Math.floor(t%60),2)+"��":t<86400?"00��"+numberFormatLeadZero(Math.floor(t/3600),2)+"ʱ"+numberFormatLeadZero(Math.floor(t/60%60),2)+"��"+numberFormatLeadZero(Math.floor(t%60),2)+"��":Math.floor(t/86400)+"��"+numberFormatLeadZero(Math.floor(t%86400/3600),2)+"ʱ"+numberFormatLeadZero(Math.floor(t/60%60),2)+"��"+numberFormatLeadZero(Math.floor(t%60),2)+"��";
	}else if(format==8){
		return t<=0?"0����":t<60?"00��"+"00ʱ"+"00��":t<3600?"00��"+"00ʱ"+numberFormatLeadZero(Math.floor(t/60),2)+"��":t<86400?"00��"+numberFormatLeadZero(Math.floor(t/3600),2)+"ʱ"+numberFormatLeadZero(Math.floor(t/60%60),2)+"��":Math.floor(t/86400)+"��"+numberFormatLeadZero(Math.floor(t%86400/3600),2)+"ʱ"+numberFormatLeadZero(Math.floor(t/60%60),2)+"��";
	}else{
		bug();
	}
}
var delflag = true;
function cartdel(PKID,stid){
	url = httpUrl+"/cart/delshowcart";
	var username = "";
	try{
		  username = $.cookie("username");
	 }catch(err){
 
	 }	
	 if(!delflag){
	 	return;
	 }
	  delflag = false;
	$.ajax({
		   type:"POST",
		   url:url,
		   dataType: "json", 
		   data:{'PKID':PKID,'stid':stid,'type':3,'username':username},
		   success: function(o){
			    var allprice = $("#cart_"+PKID+"_"+stid).attr("allprice");
				var amount = $("#cart_"+PKID+"_"+stid).attr("amount");
				var hidAllPrice = $("#hidAllPrice").val();
				var hidAllAmount = $("#in_cart_num").text();
				var newhidAllPrice =  parseFloat(hidAllPrice)-parseFloat(allprice);
				var newAllPrice = formatFloat(parseFloat(hidAllPrice)-parseFloat(allprice),2);
				var newAllAmount = parseInt(hidAllAmount)-parseInt(amount);
		   		$("#cart_"+PKID+"_"+stid).remove();
		   		$("#cart_"+PKID+"_"+stid).next().remove();
		   		$("#allamount").html(newAllAmount);
		   		$("#allprice").html('��'+newAllPrice);
				$("#hidAllPrice").val(newhidAllPrice);
		   		$("#in_cart_num").html(newAllAmount);
				delflag = true;
		   },
		   unsuccessful:function(u){
			   delflag = true;
		  }
	});
}
