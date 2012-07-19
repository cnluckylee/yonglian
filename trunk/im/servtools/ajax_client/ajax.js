function InitAjax(){
	var ajax = false;
	//开始初始化XMLHttpRequest对象
	if(window.XMLHttpRequest){ //Mozilla 浏览器
		ajax = new XMLHttpRequest();
		if (ajax.overrideMimeType) {//设置MiME类别
			ajax.overrideMimeType("text/xml");
		}
	}else if(window.ActiveXObject){ // IE浏览器
		try{
			ajax = new ActiveXObject("Msxml2.XMLHTTP");
		}catch(e){
			try{
				ajax = new ActiveXObject("Microsoft.XMLHTTP");
			}catch(e){}
		}
	}

	if(!ajax){ // 异常，创建对象实例失败
		window.alert("不能创建XMLHttpRequest对象实例.");
		return false;
	}

	return ajax;
}

function i_im_ajax(url,action,data,callback,type,async) {
	if(!url) { return false; }
	if(!action) { action = 'get'; }
	if(!callback) { callback = ajaxCallback; }
	if(!type) { type = 'text'; }
	if(async!='false') { async = true; }
	action = action.toLowerCase();
	type = type.toLowerCase();

	var ajaxmessageid = document.getElementById("ajaxmessageid");
	if(ajaxmessageid) {
		ajaxmessageid.style.display = '';
	}
	var xmlhttp = InitAjax();
	xmlhttp.open(action,url,async);
	xmlhttp.setRequestHeader("x-requested-with","XMLHttpRequest");
	xmlhttp.setRequestHeader("Content-Type","application/x-www-form-urlencoded");
	xmlhttp.onreadystatechange = function(){
		if(xmlhttp.readyState==4 && xmlhttp.status==200) {
			var returndata = '';
			if(type=='json') {
				returndata = eval("(" + xmlhttp.responseText + ")");
			} else if (type=='xml') {
				returndata = xmlhttp.responseXML;
			} else {
				returndata = xmlhttp.responseText;
			}
			callback(returndata);
			if(ajaxmessageid) {
				ajaxmessageid.style.display = 'none';
			}
		}
	};
	xmlhttp.send(data);
}