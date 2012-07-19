var i_im_isIE = (document.all) ? true : false;

Array.prototype.in_array = function(e) {
    for(i=0;i<this.length;i++)
    {
        if(this[i] == e)
        return true;
    }
    return false;
}

var i_im_$ = function (id) {
	return "string" == typeof id ? document.getElementById(id) : id;
};

var i_im_Class = {
	create: function() {
		return function() { this.initialize.apply(this, arguments); }
	}
}

var i_im_Extend = function(destination, source) {
	for (var property in source) {
		destination[property] = source[property];
	}
}

var i_im_Bind = function(object, fun) {
	return function() {
		return fun.apply(object, arguments);
	}
}

var i_im_BindAsEventListener = function(object, fun) {
	return function(event) {
		return fun.call(object, (event || window.event));
	}
}

var i_im_CurrentStyle = function(element) {
	return element.currentStyle || document.defaultView.getComputedStyle(element, null);
}
//添加事件
function i_im_addEventHandler(oTarget, sEventType, fnHandler) {
	if (oTarget.addEventListener) {
		oTarget.addEventListener(sEventType, fnHandler, false);
	} else if (oTarget.attachEvent) {
		oTarget.attachEvent("on" + sEventType, fnHandler);
	} else {
		oTarget["on" + sEventType] = fnHandler;
	}
}
//删除事件
function i_im_removeEventHandler(oTarget, sEventType, fnHandler) {
    if (oTarget.removeEventListener) {
        oTarget.removeEventListener(sEventType, fnHandler, false);
    } else if (oTarget.detachEvent) {
        oTarget.detachEvent("on" + sEventType, fnHandler);
    } else {
        oTarget["on" + sEventType] = null;
    }
}

// 删除左右两端的空格
String.prototype.trim=function() {
	return this.replace(/(^\s*)|(\s*$)/g,'');
}

// 删除左边的空格
String.prototype.ltrim=function() {
	return this.replace(/(^\s*)/g,'');
}

// 删除右边的空格
String.prototype.rtrim=function() {
	return this.replace(/(\s*$)/g,'');
}

//拖放程序
var i_im_Drag = i_im_Class.create();
i_im_Drag.prototype = {
  //拖放对象
  initialize: function(drag, options) {
	this.Drag = i_im_$(drag);//拖放对象
	this._x = this._y = 0;//记录鼠标相对拖放对象的位置
	this._marginLeft = this._marginTop = 0;//记录margin
	//事件对象(用于绑定移除事件)
	this._fM = i_im_BindAsEventListener(this, this.Move);
	this._fS = i_im_Bind(this, this.Stop);

	this.SetOptions(options);

	this.Limit = !!this.options.Limit;
	this.mxLeft = parseInt(this.options.mxLeft);
	this.mxRight = parseInt(this.options.mxRight);
	this.mxTop = parseInt(this.options.mxTop);
	this.mxBottom = parseInt(this.options.mxBottom);

	this.LockX = !!this.options.LockX;
	this.LockY = !!this.options.LockY;
	this.Lock = !!this.options.Lock;

	this.onStart = this.options.onStart;
	this.onMove = this.options.onMove;
	this.onStop = this.options.onStop;

	this._Handle = i_im_$(this.options.Handle) || this.Drag;

	this._mxContainer = i_im_$(this.options.mxContainer) || null;

	this.Drag.style.position = "absolute";
	//透明
	if(i_im_isIE && !!this.options.Transparent) {
		//填充拖放对象
		with(this._Handle.appendChild(document.createElement("div")).style) {
			width = height = "100%"; backgroundColor = "#fff"; filter = "alpha(opacity:0)"; fontSize = 0;
		}
	}
	//修正范围
	this.Repair();
	i_im_addEventHandler(this._Handle, "mousedown", i_im_BindAsEventListener(this, this.Start));
  },
  //设置默认属性
  SetOptions: function(options) {
	this.options = {//默认值
		Handle:			"",//设置触发对象（不设置则使用拖放对象）
		Limit:			false,//是否设置范围限制(为true时下面参数有用,可以是负数)
		mxLeft:			0,//左边限制
		mxRight:		9999,//右边限制
		mxTop:			0,//上边限制
		mxBottom:		9999,//下边限制
		mxContainer:	"",//指定限制在容器内
		LockX:			false,//是否锁定水平方向拖放
		LockY:			false,//是否锁定垂直方向拖放
		Lock:			false,//是否锁定
		Transparent:	false,//是否透明
		onStart:		function(){},//开始移动时执行
		onMove:			function(){},//移动时执行
		onStop:			function(){}//结束移动时执行
	};
	i_im_Extend(this.options, options || {});
  },
  //准备拖动
  Start: function(oEvent) {
	if(this.Lock){ return; }
	this.Repair();
	//记录鼠标相对拖放对象的位置
	this._x = oEvent.clientX - this.Drag.offsetLeft;
	this._y = oEvent.clientY - this.Drag.offsetTop;
	//记录margin
	this._marginLeft = parseInt(i_im_CurrentStyle(this.Drag).marginLeft) || 0;
	this._marginTop = parseInt(i_im_CurrentStyle(this.Drag).marginTop) || 0;
	//mousemove时移动 mouseup时停止
	i_im_addEventHandler(document, "mousemove", this._fM);
	i_im_addEventHandler(document, "mouseup", this._fS);
	if(i_im_isIE){
		//焦点丢失
		i_im_addEventHandler(this._Handle, "losecapture", this._fS);
		//设置鼠标捕获
		this._Handle.setCapture();
	}else{
		//焦点丢失
		i_im_addEventHandler(window, "blur", this._fS);
		//阻止默认动作
		oEvent.preventDefault();
	};
	//附加程序
	this.onStart();
  },
  //修正范围
  Repair: function() {

	if(this.Limit){
		//修正错误范围参数
		this.mxRight = Math.max(this.mxRight, this.mxLeft + this.Drag.offsetWidth);
		this.mxBottom = Math.max(this.mxBottom, this.mxTop + this.Drag.offsetHeight);
		//如果有容器必须设置position为relative或absolute来相对或绝对定位，并在获取offset之前设置
		!this._mxContainer || i_im_CurrentStyle(this._mxContainer).position == "relative" || i_im_CurrentStyle(this._mxContainer).position == "absolute" || (this._mxContainer.style.position = "relative");
	}
  },
  //拖动
  Move: function(oEvent) {
	//判断是否锁定
	if(this.Lock){ this.Stop(); return; };
	//清除选择
	window.getSelection ? window.getSelection().removeAllRanges() : document.selection.empty();
	//设置移动参数
	var iLeft = oEvent.clientX - this._x, iTop = oEvent.clientY - this._y;
	//设置范围限制
	if(this.Limit){
		//设置范围参数
		var mxLeft = this.mxLeft, mxRight = this.mxRight, mxTop = this.mxTop, mxBottom = this.mxBottom;
		//如果设置了容器，再修正范围参数
		if(!!this._mxContainer){
			mxLeft = Math.max(mxLeft, 0);
			mxTop = Math.max(mxTop, 0);
			mxRight = Math.min(mxRight, this._mxContainer.clientWidth);
			mxBottom = Math.min(mxBottom, this._mxContainer.clientHeight);
		};
		//修正移动参数
		iLeft = Math.max(Math.min(iLeft, mxRight - this.Drag.offsetWidth), mxLeft);
		iTop = Math.max(Math.min(iTop, mxBottom - this.Drag.offsetHeight), mxTop);
	}
	//设置位置，并修正margin
	if(!this.LockX){ this.Drag.style.left = iLeft - this._marginLeft + "px"; }
	if(!this.LockY){ this.Drag.style.top = iTop - this._marginTop + "px"; }
	//附加程序
	this.onMove();
  },
  //停止拖动
  Stop: function() {
	//移除事件
	i_im_removeEventHandler(document, "mousemove", this._fM);
	i_im_removeEventHandler(document, "mouseup", this._fS);
	if(i_im_isIE){
		i_im_removeEventHandler(this._Handle, "losecapture", this._fS);
		this._Handle.releaseCapture();
	}else{
		i_im_removeEventHandler(window, "blur", this._fS);
	};
	//附加程序
	this.onStop();
  }
};
//显示、隐藏样式
function i_im_show(obj) {
	i_im_$(obj).style.display = (i_im_$(obj).style.display == 'none')?'block':'none';
}

function i_im_setHidden(obj) {
	if(i_im_$(obj+'_c').value=='') {
		i_im_$(obj).style.display='none';
	}
}
function i_im_setShow(obj) {
	i_im_$(obj).style.display = (i_im_$(obj).style.display == 'none')?'block':'none';
	i_im_readyBlur(obj);
}
function i_im_readyBlur(obj) {
	i_im_$(obj+'_c').focus();
}

var i_im_timeout;
function i_im_setOnShowPara(obj) {
	i_im_$(obj+'_c').value='1';
	clearTimeout(i_im_timeout);
}
function i_im_setHiddenPara(obj) {
	i_im_$(obj+'_c').value='';
}

function i_im_timerSetHidden(obj, t_time) {
	i_im_setHiddenPara(obj);
	i_im_timeout = setTimeout("i_im_setHidden('"+obj+"')",t_time);
}

function i_im_lengthValidator (obj, id) {
	if(obj.value.length > 149) {
		obj.value=obj.value.substr(0,149);
	}
	i_im_$("txt_num"+id).value = 149-obj.value.length;
}
//切换隐藏、显示
function i_im_show_hidden(idpre, id, num) {
	for(var i=1;i<=num;i++) {
		i_im_$(idpre+i).style.display = 'none';
	}
	i_im_$(idpre+id).style.display = '';
}

//追加、移除样式
function i_im_addClass (obj, newClass) {
	var re = new RegExp(newClass,"gi");
	var r = obj.className.search(re);
	if(r==-1) {
		obj.className = obj.className + ' ' +newClass;
		return true;
	} else {
		return false;
	}
}
function i_im_removeClass(obj, newclass) {
	var re = new RegExp(newclass,"gi");
	obj.className = obj.className.replace(re, "");
}

//改变样式
function i_im_changeClass (obj, name) {
	var parentNode = obj.parentNode;
	var tags = parentNode.getElementsByTagName("ul");
	if(obj.parentNode.className == name)
	{
		for(var i=0;i<tags.length;i++){
			if(tags[i].getElementsByTagName("li").length==0){
				tags[i].style.display = 'none';
			}
		}
		obj.parentNode.className = name + ' ' + name+'-on';
	}else{
		obj.parentNode.className = name;
	}
}

//弹出窗口
function i_im_popWrap(obj, name) {
	var t=obj.offsetTop;
    var l=obj.offsetLeft;
	var pt=obj.parentNode.parentNode.parentNode.parentNode.scrollTop;
	var bt;
	if(document.body.scrollTop){
		bt = document.body.scrollTop;
	}else{
		bt = document.documentElement.scrollTop
	}
	var height=obj.offsetHeight;
    var width=obj.offsetWidth;
    while(obj=obj.offsetParent) {
        t+=obj.offsetTop;
        l+=obj.offsetLeft;
    }
    i_im_$(name).style.top = (t+bt-pt+303) + 'px';
	var browser=navigator.appName;
	var b_version=navigator.appVersion;
	var version=b_version.split(";");
	var trim_Version=version[1].replace(/[ ]/g,"");
	if(browser=="Microsoft Internet Explorer" && trim_Version=="MSIE6.0")
	{
		i_im_$(name).style.top = (t-pt+303) + 'px';
	}
	i_im_$(name).style.display = 'block';
	i_im_$(name).style.left = (l+50) + 'px';
}

//聊天窗口
var i_im_zindex = 900;
var getFriendInfo_id=0;
//打开聊天窗口
var poststyle='';		//发送方式
function i_im_talkWin(id,name) {

	i_im_clearNewMsg(id);
	i_im_changeTitle();
	if(i_im_my_uid==id) {
		return false;
	}
	// 是否已存在
	var parentnode = i_im_$('im_container');
	var divs = parentnode.childNodes;
	for(i=0;i<parentnode.childNodes.length;i++){
		if(parentnode.childNodes[i].id==name+'_'+id){
			i_im_$(name+'_'+id).style.display = '';
			return false;
		}
		parentnode.childNodes[i].className = 'inactive';	//
	}
	//修改消息数
	msgnums--;
	if(msgnums<0){
		msgnums = 0;
	}
	i_im_$("msgnums").innerHTML = msgnums;

	// 获取即将打开的好友的详情
	if(name == 'imWin'){
		//更新最近联系人
		i_im_updateCloseContacted(id);

		if(frendlistarrayobj[id]) {
			var pals_obj = frendlistarrayobj[id];
		} else {
			i_im_getFriendInfo(id);
			if(getFriendInfo_id!=id) {
				setTimeout("i_im_talkWin('"+id+"','"+name+"')",1000);
				getFriendInfo_id = id;
			}
			return false
		}
	} else if(name=='imWin_talk') {
		var pals_obj = grouplistarrayobj[id];
	}

	// 初始化窗口数据
	var verify_code = '';
	i_im_ajax(i_im_baseUrl+"ajax.php?act=initwin","POST","id="+id,function(data){
		verify_code = data;
	});

	// 创建窗口
	var imwin=document.createElement("div");
	imwin.id = name+'_'+id;
	imwin.style.top = 50+Math.random()*50+'px';
	imwin.style.left = 250+Math.random()*250+'px';

	imwin.style.zIndex = i_im_zindex;
	imwin.style.display = '';
	i_im_zindex = i_im_zindex + 2;

	if(!pals_obj.pals_intro) {
		pals_obj.pals_intro = '';
	}
	var sub_pals_intro = pals_obj.pals_intro.substr(0,23)+"...";
	pals_obj.pals_ico = pals_obj.pals_ico.substr(0,7).toLowerCase() == 'http://' ? pals_obj.pals_ico : i_im_baseUrl+pals_obj.pals_ico;
	var talk_win_element = {'id':id,'imwin_id':imwin.id,'src_pals_ico':'src="'+pals_obj.pals_ico+'"','pals_id':pals_obj.pals_id,'pals_name':pals_obj.pals_name,'pals_intro':sub_pals_intro,'pals_intro_full':pals_obj.pals_intro};
	var jstempo = new jsTempo('room_talk_win');
	imwin.innerHTML = jstempo.set(talk_win_element);

	parentnode.appendChild(imwin);

	if(name=='imWin_talk') {
		if(i_im_$("list_btns"+id)) {
			i_im_$("list_btns"+id).innerHTML = '';
			i_im_$("list_btns"+id).style.height = 0+'px';
		}
		// 获取讨论组好友信息
		i_im_getGroupFrendList(id);
	}

	// 表情处理。
	i_im_smileControl(imwin.id);

	//启动拖拽
	var drag = new i_im_Drag(imwin.id);

	i_im_$("head_pnl"+id).onmouseover = function(){ drag.Lock = false;}
	i_im_$("head_pnl"+id).onmouseout = function(){ drag.Lock = true; }
	i_im_$("list_btns"+id).onmouseover = function(){ drag.Lock = true; }
	i_im_$("contentPnl"+id).onmouseover = function(){ drag.Lock = true; }

	//激活窗口
	var temp_win = '';
	i_im_$(imwin.id).onmousedown = function() {
		for(i=0;i<divs.length;i++) {
			divs[i].className = 'inactive';
		}
		var obj_setting = i_im_$("setting");
		if(obj_setting.style.display == 'block') {
			i_im_addClass(obj_setting,'inactive');
		}

		if(temp_win) {//for FF
			temp_win.className = 'imwinInt';
			temp_win.style.zIndex = i_im_zindex;
			parentnode.style.zIndex = i_im_zindex;
			i_im_zindex = i_im_zindex + 2;
			temp_win = '';
		} else {
			imwin.className = 'imwinInt';
			imwin.style.zIndex = i_im_zindex;
			parentnode.style.zIndex = i_im_zindex;
			i_im_zindex = i_im_zindex + 2;
		}
	}

	// 发送消息
	f_sendMessage = function () {
		var obj_textarea = i_im_$('msginput'+imwin.id);
		var v = obj_textarea.value;
		if(v) {
			obj_textarea.disabled = true;
			v = encodeURIComponent(v);
			i_im_ajax(i_im_baseUrl+"ajax.php?act=postnewmessage","POST","pals="+pals_obj.pals_id+"&v="+v+"&vc="+verify_code,function(data){
				obj_textarea.disabled = false;
				if(data==1) {
					i_im_$('msginput'+imwin.id).value = '';
					i_im_getMessage();
				}
				i_im_$('msginput'+imwin.id).focus();
			});
		}
	}
	var cookieArray = document.cookie.split("; ");
	for (var i=0; i < cookieArray.length; i++)
	{
		var cookies = cookieArray[i].split("=");
		if ('poststyle' == cookies[0]){
			poststyle = cookies[1];
			break;
		}
	}
	if(!poststyle) {
		poststyle = 'Enter';
	}
	i_im_$('msginput'+imwin.id).onkeydown = function(evt) {
		var n_event = (evt) ? evt : ((window.event) ? window.event : ""); //兼容IE和Firefox获得keyBoardEvent对象
		var key = n_event.keyCode ? n_event.keyCode : n_event.which;
		if ((n_event.keyCode==13 && n_event.ctrlKey && poststyle=='CtrlEnter')||(n_event.keyCode==13 && !n_event.ctrlKey && poststyle=='Enter') || (n_event.altKey && n_event.keyCode==83 && poststyle=='AltS')) {
			var obj_textarea = i_im_$('msginput'+imwin.id);
			var v = obj_textarea.value;
			if(v) {
				obj_textarea.disabled = true;
				v = encodeURIComponent(v);
				i_im_ajax(i_im_baseUrl+"ajax.php?act=postnewmessage","POST","pals="+pals_obj.pals_id+"&v="+v+"&vc="+verify_code,function(data){
					obj_textarea.disabled = false;
					if(data==1) {
						i_im_$('msginput'+imwin.id).value = '';
						i_im_getMessage();
					}
					i_im_$('msginput'+imwin.id).focus();
				});
			}
		}
		i_im_lengthValidator(this,id);
	}
	i_im_$("sendmessage_"+id).onclick = f_sendMessage;
	for(var i=1;i<=3;i++) {
		i_im_removeClass(i_im_$("postStyle_"+i),'cuntermark');
	}
	switch(poststyle) {
	case 'Enter':
		i_im_addClass(i_im_$("postStyle_1"),'cuntermark');
		break;
	case 'CtrlEnter':
		i_im_addClass(i_im_$("postStyle_2"),'cuntermark');
		break;
	case 'AltS':
		i_im_addClass(i_im_$("postStyle_3"),'cuntermark');
		break;
	}

	//关闭窗口
	i_im_$("dlgCloseBtn"+imwin.id).onclick = function(){
		var max_zindex = 0;
		parentnode.removeChild(i_im_$(imwin.id));
		i_im_removeMinFriendList();	// 删除边上的小窗口
		for(i=0;i<divs.length;i++){
			if(divs[i].nodeType == 1){
				if(divs[i].style.zIndex){
					max_zindex = divs[i].style.zIndex > max_zindex?divs[i].style.zIndex:max_zindex;
				}
			}
		}
		for(i=0;i<divs.length;i++){
			if(divs[i].nodeType == 1){
				if(divs[i].style.zIndex == max_zindex){
					temp_win = divs[i];//for FF
					divs[i].className = 'imwinInt';//for IE
				}
			}
		}
	}

	submitform = function (){
		if(!i_im_checkFileType("impostfile")){
			alert(i_im_lang_file.PermitFileType);
			return false;
		}
		if(!i_im_checkFileSize("impostfile")){
			alert(i_im_lang_file.OutRestraint);
			return false;
		}
		var msg_transferfile = document.createElement("div");
		msg_transferfile.className = "msgSys";
		var msg = i_im_lang_talkwin.NowTransferFile + i_im_$("impostfile").value;
		msg_transferfile.innerHTML = msg;
		i_im_$("message_content_"+id).appendChild(msg_transferfile);
		i_im_$("pbform"+id).submit();
		i_im_$("impostfile").value = "";
	}

	//文件传输后回调函数
	backAutoSendMsg = function(id,msg) {
		var v = msg;
		var id = id;
		if(v) {
			// 获取好友的详情
			if(frendlistarrayobj[id]) {
				var pals_obj = frendlistarrayobj[id];
			} else {
				i_im_getFriendInfo(id);
				if(getFriendInfo_id!=id) {
					setTimeout("i_im_talkWin('"+id+"','"+name+"')",1000);
					getFriendInfo_id = id;
				}
				return false;
			}
			i_im_ajax(i_im_baseUrl+"ajax.php?act=postnewmessage","POST","pals="+pals_obj.pals_id+"&v="+v+"&vc="+verify_code,function(data){
				if(data==1) {
					i_im_getMessage();
				} else {
					alert(i_im_lang_talkwin.NowTransferFile);
				}
			});
		}
	}
	//文件失败后回调函数
	backTransferFileError = function(msg){
		alert(msg);
		var msg_transferfile = document.createElement("div");
		msg_transferfile.className = "msgSys";
		var msg = i_im_lang_file.TransferFailed;
		msg_transferfile.innerHTML = msg;
		i_im_$("message_content_"+id).appendChild(msg_transferfile);
	}
	//发送图片
	i_im_checkForm = function(form){
		var i_im_alow_post_img = 'jpg,gif,bmp,png';
		var fileName = form.impostfile.value.toLowerCase();
		var pos = fileName.lastIndexOf(".");
		var ext = fileName.substring(pos+1,fileName.length)
		var i_im_alow_img_array = i_im_alow_post_img.split(",");
		var notalow = 0;
		for(var i=0;i<i_im_alow_img_array.length;i++){
			if(ext==i_im_alow_img_array[i]){
				notalow = 1;
			}
		}
		if(notalow==0){
			alert(i_im_lang_file.PermitFileType);
			return false;
		}
		form.submit();
		form.impostfile.value='';
	}
	//发送图片成功回调函数
	backSubmitImg = function (msg){
		i_im_$('msginput'+imwin.id).value = i_im_$('msginput'+imwin.id).value + msg;
	}
	// 初始化好窗口后 取消息。
	i_im_getMessage();
}
//打开视频窗口
function openvideo(pals_id, action) {
	if(i_im_$("video_win_"+pals_id)) {return;}

	var obj_talk_win = i_im_$("talk_win_"+pals_id);
	obj_talk_win.className = "imDialog w_620";

	i_im_$("talkwin_right_"+pals_id).style.display = 'block';
	i_im_$("nav_video_"+pals_id).style.display = 'block';
	i_im_$("nav_video_"+pals_id).className = 'on';

	i_im_$("move_pan"+pals_id).style.marginLeft = -440 +'px';
	i_im_$("his_pnl"+pals_id).style.height = 402+'px';
	i_im_$("history_pal_"+pals_id).style.height = 365+'px';

	i_im_$("msgHistoryid_"+pals_id).style.height = 300+'px';

	var parentobj = i_im_$('video_room_'+pals_id);
	var imvideowin=document.createElement("div");
	var vhtml = "<div id=\"flashcontent_"+pals_id+"\" style=\"height:100%;\"></div>";
	imvideowin.className = "w_240 flleft";
	imvideowin.id = "video_win_"+pals_id;
	imvideowin.style.height = 402 + 'px';
	imvideowin.innerHTML = vhtml;

	parentobj.appendChild(imvideowin);

	var	script = document.createElement("script");
	i_im_ajax(i_im_baseUrl+"plugins/video/load_video.php","POST","swfid="+pals_id,function(data){
		script.text= data;
	});
	script.type='text/javascript';
    script.charset="utf-8";
	imvideowin.appendChild(script);
	if(action=='p'){
		update_video_status(pals_id,action);
	}else if(action=='g'){
		getoppositeid(pals_id);
	}
}
//获取对方标识
function getoppositeid(pals_id) {
	i_im_ajax(i_im_baseUrl+"ajax.php?act=getpeerid","POST","pals_id="+pals_id,function(data){
		if(data!='-1' && data!=''){
			connect(data,pals_id);
		}else{
			i_im_ajax(i_im_baseUrl+"ajax.php?act=getvideostatus","POST","pals_id="+pals_id,function(data){
				if(data=='1') {
					setTimeout("getoppositeid('"+pals_id+"')",1000);
				} else {
					var sysinfo = document.createElement("div");
					sysinfo.innerHTML = "<div>"+i_im_lang_talkwin.VideoIsCanceled+"</div>";
					i_im_$("message_content_"+pals_id).appendChild(sysinfo);
					connectClosed(pals_id);
				}
			});
		}
	});
}

/* *** 视频插件接口函数 Begin *** */
var my_peerid = '';
/* JS调用SWF的方法 */
// 连接另外一个用户
function connect(peerid, pals_id){
	if(my_peerid!='') {
		mainSwf(pals_id).setAnotherIdentity(peerid);
		mainSwf(pals_id).connect();
		my_peerid = '';
		update_video_status(pals_id,'g');
		var sysinfo = document.createElement("div");
		sysinfo.innerHTML = "<div>"+i_im_lang_talkwin.VideoContacted+"</div>";
		i_im_$("message_content_"+pals_id).appendChild(sysinfo);
	} else {
		setTimeout("connect('"+peerid+"',"+pals_id+")",200);
	}
}

// 关闭连接
function closeLink(swfid)
{
	mainSwf(swfid).closeLink();
	connectClosed(swfid);
}

/* SWF调用JS的方法 */
// SWF的消息提示
function sendMessage(swfid, msg) {
	if(i_im_$("message_content_"+swfid)) {
		var sysinfo = document.createElement("div");
		sysinfo.innerHTML = "<div>"+msg+"</div>";
		i_im_$("message_content_"+swfid).appendChild(sysinfo);
	}
}
// 连接服务器成功后返回本用户的标识号
function sendIdentity(swfid, identity) {
	my_peerid = identity;
	i_im_ajax(i_im_baseUrl+"ajax.php?act=updatepeerid","POST","peerid="+identity+"&calluser="+swfid,function(){});
}
//链接失败回调关闭视频窗口
function connectClosed(swfid) {
	i_im_$("video_room_"+swfid).innerHTML = '';
	i_im_$("nav_video_"+swfid).style.display = 'none';
	i_im_$("his_pnl"+swfid).style.height = 300+'px'
	//切换显示聊天记录窗口
	var obj_talk_win = i_im_$("talk_win_"+swfid);
	var obj_msgHistoryid = i_im_$("msgHistoryid_"+swfid);
	if(i_im_$("nav_history_msg_"+swfid).style.display=='block') {
		i_im_$("move_pan"+swfid).style.marginLeft = 0 +'px';
		i_im_$("nav_history_msg_"+swfid).className = 'on';
	} else {
		i_im_$("talkwin_right_"+swfid).style.display = 'none';
		obj_talk_win.className = "imDialog w_385";
	}
	i_im_$("history_pal_"+swfid).style.height = 270+'px';
	obj_msgHistoryid.style.height = 200+'px';
	sendIdentity('','');
	my_peerid = '';
	update_video_status(swfid,'c');
}
function mainSwf(pals_id) {
	return i_im_$("P2PClient_"+pals_id);
}
function update_video_status(pals_id,action) {
	i_im_ajax(i_im_baseUrl+"ajax.php?act=updatevideostatus","POST","pals="+pals_id+"&action="+action,function(){});
}
/* *** 视频插件接口函数 End *** */

// 鼠标移动到好友上时 显示详情
function i_im_friendlistmouseover(obj, id) {
	i_im_addClass(obj,'buddyItem-hover');
	i_im_$('imPopWrap_'+id).style.display = '';
	i_im_popWrap(obj,'imPopWrap_'+id);
}
function i_im_friendlistmouseout(obj, id) {
	i_im_removeClass(obj,'buddyItem-hover');
	i_im_$('imPopWrap_'+id).style.display = 'none';
}

//加入到好友最小化列表
function i_im_addMinFriendList(id, name) {
	// 如果不存在，并且有好友相关信息时 加入到最小化列表
	var u_ico = i_im_baseUrl+"skin/default/images/d_ico_0_small.gif";
	if(name=='imWin') {
		if(!frendlistarrayobj[id]) {
			if(i_im_stranger[id]) {
				frendlistarrayobj[id] = i_im_stranger[id];
			} else {
				i_im_getFriendInfo(id);
				setTimeout("i_im_addMinFriendList('"+id+"','"+name+"')",1000);
			}
		} else {
			if(frendlistarrayobj[id].pals_ico) {
				u_ico = frendlistarrayobj[id].pals_ico;
			}
			u_ico = u_ico.substr(0,7).toLowerCase() == 'http://' ? u_ico : i_im_baseUrl+u_ico;
			i_im_$('imminbox').innerHTML = "<div class='imTinyItem-msg'><img onclick=\"i_im_talkWin('"+id+"','"+name+"')\" class='avatar-20' alt='"+frendlistarrayobj[id].pals_name+"' title='"+frendlistarrayobj[id].pals_name+"' src='"+u_ico+"' style='margin: 1px 0 0 1px;height:20px;width:20px;' /><b onclick=\"i_im_talkWin('"+id+"','"+name+"')\"></b></div>";
		}
	} else {
		if(grouplistarrayobj[id].pals_ico) {
			u_ico = grouplistarrayobj[id].pals_ico;
		}
		i_im_$('imminbox').innerHTML = "<div class='imTinyItem-msg'><img onclick=\"i_im_talkWin('"+id+"','"+name+"')\" class='avatar-20' alt='"+grouplistarrayobj[id].pals_name+"' title='"+grouplistarrayobj[id].pals_name+"' src='"+u_ico+"' style='margin: 1px 0pt 0pt 1px;height:20px;width:20px;' /><b onclick=\"i_im_talkWin('"+id+"','"+name+"')\"></b></div>";
	}
}

//好友最小化列表中删除
function i_im_removeMinFriendList() {
	if(i_im_$("imminbox")!=null){
		i_im_$('imminbox').innerHTML = '';
	}
}

// 获取某个用户信息
function i_im_getFriendInfo(id) {
	i_im_ajax(i_im_baseUrl+"ajax.php?act=getfriendinfo","POST","sid="+id,function(data){
		if(data!='-1') {
			frendlistarrayobj[data.pals_id] = data;
		}
	},'JSON');
}

// 加为好友
function i_im_addFriends(id, obj) {
	if(i_im_$("answer_question_"+id)) {
		i_im_$("answer_question_"+id).style.zIndex = i_im_zindex;
		return;
	}
	i_im_ajax(i_im_baseUrl+"ajax.php?act=addtomyfriend","POST","uid="+id,function(data){
		switch(data[0]) {
		case "1":
			alert(i_im_lang_talkwin.AddFriendSuccessfully);
			i_im_getFriendList();
			break;
		case "-1":
			alert(i_im_lang_talkwin.HasBeenInFriendList);
			break;
		case "-3":
			alert(i_im_lang_talkwin.RefuseToBeFriend);
			break;
		case "-2":
			var answerwin=document.createElement("div");
			answerwin.id = "answer_question_"+id;
			answerwin.className='question';
			if(typeof obj == 'object') {
				var t=obj.offsetTop;
			    var l=obj.offsetLeft;
			    var height=obj.offsetHeight;
			    var width=obj.offsetWidth;
			    while(obj=obj.offsetParent){
			        t+=obj.offsetTop;
			        l+=obj.offsetLeft;
			    }
			    if (document.documentElement && document.documentElement.scrollTop)
				    sTop = document.documentElement.scrollTop;
				else if (document.body)
					sTop = document.body.scrollTop;
			    t = t-sTop;
			    answerwin.style.top = (t) + 'px';
			    answerwin.style.left = (l) + 'px';
			} else {
				answerwin.style.top = 50+Math.random()*50+'px';
				answerwin.style.left = 250+Math.random()*250+'px';
			}


			answerwin.style.zIndex = i_im_zindex;
			i_im_zindex = i_im_zindex + 2;
			var parentnode = i_im_$('i_im_question_answer_div');
			var question_win_element = {'id':id,'question':data[1]};
			var jstempo = new jsTempo('room_answer_question');
			answerwin.innerHTML = jstempo.set(question_win_element);
			parentnode.appendChild(answerwin);
			answerwin.onmousedown = function() {
				answerwin.style.zIndex = i_im_zindex;
				i_im_zindex = i_im_zindex +2;
			}
			var drag = new i_im_Drag(answerwin.id);
			i_im_$("question_waring_"+id).onmouseover = function(){drag.Lock = false; }
			i_im_$("question_waring_"+id).onmouseout = function(){drag.Lock = true; }
			i_im_$("question_info_"+id).onmouseover = function(){ drag.Lock = true; }
			break;
		default:
			alert(i_im_lang_talkwin.AddFriendFailed);
		}
	},'JSON');
}
//加为好友--回答问题
function i_im_answerQuestion(id) {
	var obj_answer = i_im_$("answer_"+id);
	var answer = '';
	if(obj_answer!=null) {
		answer = obj_answer.value;
		if(answer.trim()=='') {
			alert(i_im_lang_talkwin.InputTheAnswer);
			return;
		}
	}else{
		return;
	}

	i_im_ajax(i_im_baseUrl+"ajax.php?act=addtomyfriend","POST","uid="+id+"&answer="+answer,function(data){
		switch(data[0]) {
		case "1":
			alert(i_im_lang_talkwin.AddFriendSuccessfully);
			i_im_getFriendList();
			break;
		case "-1":
			alert(i_im_lang_talkwin.HasBeenInFriendList);
			break;
		case "-3":
			alert(i_im_lang_talkwin.RefuseToBeFriend);
			break;
		case "-5":
			alert(i_im_lang_talkwin.WrongAnswer);
			break;
		}
	},'JSON');
}
//关闭添加好友问题窗口
function i_im_closeQuestion(id) {
	var parentnode = i_im_$('i_im_question_answer_div');
	var obj_child = i_im_$("answer_question_"+id);
	if(obj_child) {
		parentnode.removeChild(obj_child);
	}
}

// 获取讨论组好友信息
function i_im_getGroupFrendList(id) {
	var obj_talk_win = i_im_$("talk_win_"+id);
	var obj_nav_group_info = i_im_$("nav_group_info_"+id);
	obj_talk_win.className = "imDialog w_620";
	i_im_$("talkwin_right_"+id).style.display = 'block';
	obj_nav_group_info.style.display = 'block';
	obj_nav_group_info.className = 'on';
	i_im_$("move_pan"+id).style.marginLeft = -220 +'px';

	i_im_ajax(i_im_baseUrl+"ajax.php?act=getfriendlist","POST","sid="+id,function(data){
		if(data!='-1') {
			var gnum = i_im_$("gnum_"+id);
			var member_list = new Array();
			var onlineNum = 0;
			var allListNum = 0;
			for(var i=0; i<data.length; i++){
				data[i].pals_ico = data[i].pals_ico.substr(0,7).toLowerCase() == 'http://' ? data[i].pals_ico : i_im_baseUrl+data[i].pals_ico;
				member_list[i] = {'pals_id':data[i].pals_id,'pals_name':data[i].pals_name,'pals_ico':'src="'+data[i].pals_ico+'"','line_status':data[i].line_status};
				if(data[i].line_status>0 && data[i].line_status!=2) {
					onlineNum++;
				}
				allListNum++;
			}
			var jstempo = new jsTempo('room_gmlist');
			i_im_$('glist_'+id).innerHTML = jstempo.setArray(member_list).join('');
			gnum.innerHTML = onlineNum+"/"+allListNum;
			grouplistarrayobj[id].num = allListNum;
		}
	},'JSON');
}

//切换消息、群成员
function i_im_showNavigate(id,mark) {
	var obj_nav = i_im_$("talk_win_nav_"+id).childNodes;
	for(var i=0;i<obj_nav.length;i++) {
		obj_nav[i].className = '';
	}
	var move_pan = i_im_$("move_pan"+id);
	switch(mark) {
		case 'msg':
			i_im_$("nav_history_msg_"+id).className = 'on';
			move_pan.style.marginLeft = 0 +'px';
			break;
		case 'info':
			i_im_$("nav_group_info_"+id).className = 'on';
			move_pan.style.marginLeft = -220 +'px';
			break;
		case 'video':
			i_im_$("nav_video_"+id).className = 'on';
			move_pan.style.marginLeft = -440 +'px';
			break;
	}
}

//获取自定义好友分组
function i_im_getCustomGroup() {
	var obj_friends_list = i_im_$("friends_list");
	obj_friends_list.innerHTML = '';
	//系统默认分组-在线好友
	var obj_customGroup = document.createElement("div");
	obj_customGroup.className = 'pan_scr';
	customGroup = {'customGroupName':i_im_lang_basic.OnlineFriend,'customGroupId':'online'};
	var jstempo = new jsTempo('room_custom_group');
	obj_customGroup.innerHTML = jstempo.set(customGroup);
	obj_friends_list.appendChild(obj_customGroup);
	//系统默认分组-我的好友
	var obj_customGroup = document.createElement("div");
	obj_customGroup.className = 'pan_scr';
	customGroup = {'customGroupName':i_im_lang_basic.MyFriend,'customGroupId':'0'};
	var jstempo = new jsTempo('room_custom_group');
	obj_customGroup.innerHTML = jstempo.set(customGroup);
	obj_friends_list.appendChild(obj_customGroup);
	//自定义分组
	i_im_ajax(i_im_baseUrl+"ajax.php?act=getCustomGroup","GET","",function(data){
		var obj_friends_list = i_im_$("friends_list");
		if(data!='-1') {
			var obj_friends_list = i_im_$("friends_list");
			for(var i=0;i<data.length;i++) {
				if(i_im_$("customGroup_"+data[i].id)) {
					continue;
				}
				var obj_customGroup = document.createElement("div");
				obj_customGroup.className = 'pan_scr';
				customGroup = {'customGroupName':data[i].groupName,'customGroupId':data[i].id};
				var jstempo = new jsTempo('room_custom_group');
				obj_customGroup.innerHTML = jstempo.set(customGroup);
				obj_friends_list.appendChild(obj_customGroup);
			}
		}
		//系统默认分组-陌生人
		var obj_customGroup = document.createElement("div");
		obj_customGroup.className = 'pan_scr';
		customGroup = {'customGroupName':i_im_lang_basic.Stranger,'customGroupId':'stranger'};
		var jstempo = new jsTempo('room_custom_group');
		obj_customGroup.innerHTML = jstempo.set(customGroup);
		obj_friends_list.appendChild(obj_customGroup);
	},'JSON');
}
/* 获取好友列表 */
function i_im_getFriendList() {
	var popFriendWrap = i_im_$("impopFriendWrap");
	var onlinefriendListNum = i_im_$("customGroupUsersNum_online");
	var onlinefriendlist = i_im_$("customGroup_online");
	var showonlinenum = i_im_$("imonlinenum");
	var onlineNum = 0;
	i_im_ajax(i_im_baseUrl+"ajax.php?act=getfriendlist","GET","",function(data){
		if(data!='-1') {
			var htmlOnlineFriendList = "";
			var htmlFriendPopWrap = "";
			var htmlFriends = new Array;
			var onlineNums = new Array;
			var groupFriendsNum = new Array;
			for(var i=0; i<data.length; i++) {
				// 好友列表
				if(!htmlFriends[data[i].groupId]) htmlFriends[data[i].groupId] = '';
				if(!onlineNums[data[i].groupId]) onlineNums[data[i].groupId] = 0;
				if(!groupFriendsNum[data[i].groupId]) groupFriendsNum[data[i].groupId] = 0;
				data[i].pals_ico = data[i].pals_ico.substr(0,7).toLowerCase() == 'http://' ? data[i].pals_ico : i_im_baseUrl+data[i].pals_ico;
				htmlFriends[data[i].groupId] += "<li id='friendlist_pals_"+data[i].pals_id+"' class='buddyItem buddyItem-"+i_im_lineStatusToStyle(data[i].line_status)+"'  ondblclick=\"i_im_talkWin('"+data[i].pals_id+"','imWin');\" >" +
												"<div class='buddyAvatar' onmouseover=\"i_im_friendlistmouseover(this,'"+data[i].pals_id+"');\" onmouseout=\"i_im_friendlistmouseout(this,'"+data[i].pals_id+"');\"><a href='javascript:void(0)' title='"+data[i].pals_name+"' hidefocus='true'><img class='avatar-20' src='"+data[i].pals_ico+"' alt='"+data[i].pals_name+"'><em></em><b></b></a></div>" +
												"<div class='buddyInfo'><strong class='buddyName'><a href='javascript:void(0)' title='"+data[i].pals_name+"'  hidefocus='true'>"+data[i].pals_name+"</a></strong></div></li>";

				// 鼠标移动显示详细信息
				if(i_im_$("imPopWrap_"+data[i].pals_id)) {
					i_im_$("imPopWrap_"+data[i].pals_id).parentNode.removeChild(i_im_$("imPopWrap_"+data[i].pals_id));
				}
				htmlFriendPopWrap	+= 	"<div id='imPopWrap_"+data[i].pals_id+"' style='display:none; position:absolute;z-index:10000;' onmouseover=\"javascript:this.style.display = ''\" onmouseout=\"javascript:this.style.display = 'none'\"><div class='imCard imCard-"+i_im_lineStatusToStyle(data[i].line_status)+"'>" +
										"<div class=\"imCardAvatar\" id=\"imPopWrapIntro\"><img class=\"avatar-48\" src='"+data[i].pals_ico+"' alt='"+data[i].pals_name+"' ></div>" +
										"<div class=\"imCardInfo\"><strong class=\"imCardName\">"+data[i].pals_name+"</strong><span class=\"imCardImStatus\">"+i_im_lineStatusShowToChar(data[i].line_status)+"</span><span class=\"imCardUserStatus\"></span></div>" +
										"</div></div>";


				// 加载在线好友列表
				if(data[i].line_status>0 && data[i].line_status!=2) {
					onlineNum++;
					onlineNums[data[i].groupId]++;
					htmlOnlineFriendList += "<li id='online_friend_"+data[i].pals_id+"' class='buddyItem buddyItem-"+i_im_lineStatusToStyle(data[i].line_status)+"' onmouseover=\"i_im_friendlistmouseover(this,'"+data[i].pals_id+"');\" onmouseout=\"i_im_friendlistmouseout(this,'"+data[i].pals_id+"');\" ondblclick=\"i_im_talkWin('"+data[i].pals_id+"','imWin');\" >" +
											"<div class='buddyAvatar'><a href='javascript:void(0)' title='"+data[i].pals_name+"' hidefocus='true'><img class='avatar-20' src='"+data[i].pals_ico+"' alt='"+data[i].pals_name+"'><em></em><b></b></a></div>" +
											"<div class='buddyInfo'><strong class='buddyName'><a href='javascript:void(0)' title='"+data[i].pals_name+"'  hidefocus='true'>"+data[i].pals_name+"</a></strong></div></li>";
				}
				groupFriendsNum[data[i].groupId]++;
				frendlistarrayobj[data[i].pals_id] = data[i];
			}

			for(var i in htmlFriends) {
				if(i_im_$("customGroup_"+i)) {
					i_im_$("customGroup_"+i).innerHTML = htmlFriends[i];
					i_im_$("customGroupUsersNum_"+i).innerHTML = '['+onlineNums[i]+'/'+groupFriendsNum[i]+']';
				}
			}
			onlinefriendlist.innerHTML = htmlOnlineFriendList; // 更新好友在线列表
			popFriendWrap.innerHTML = popFriendWrap.innerHTML+htmlFriendPopWrap;	// 用户详细pop框
			onlinefriendListNum.innerHTML = '['+onlineNum+']';	// 显示在线好友数
			showonlinenum.innerHTML = onlineNum;	// 显示在线人数
		}
	},'JSON');
}

//获取陌生人
function i_im_getStranger() {
	i_im_ajax(i_im_baseUrl+"ajax.php?act=getStranger","POST","",function(data){
		if(data!='-1') {
			var popFriendWrap = i_im_$("impopFriendWrap");
			var obj_customGroup_stranger = i_im_$("customGroup_stranger");
			if(obj_customGroup_stranger) {
				var htmlFriends = '';
				var onlineNums = 0;
				var FriendsNum = 0;
				var htmlFriendPopWrap = '';
				i_im_stranger = [];
				for(var i=0;i<data.length;i++) {
					data[i].pals_ico = data[i].pals_ico.substr(0,7).toLowerCase() == 'http://' ? data[i].pals_ico : i_im_baseUrl+data[i].pals_ico;
					htmlFriends += "<li id='friendlist_pals_"+data[i].pals_id+"' class='buddyItem buddyItem-"+i_im_lineStatusToStyle(data[i].line_status)+"' onmouseover=\"i_im_friendlistmouseover(this,'"+data[i].pals_id+"');\" onmouseout=\"i_im_friendlistmouseout(this,'"+data[i].pals_id+"');\" ondblclick=\"i_im_talkWin('"+data[i].pals_id+"','imWin');\" >" +
									"<div class='buddyAvatar'><a href='javascript:void(0)' title='"+data[i].pals_name+"' hidefocus='true'><img class='avatar-20' src='"+data[i].pals_ico+"' alt='"+data[i].pals_name+"'><em></em><b></b></a></div>" +
									"<div class='buddyInfo'><strong class='buddyName'><a href='javascript:void(0)' title='"+data[i].pals_name+"'  hidefocus='true'>"+data[i].pals_name+"</a></strong></div></li>";

					// 鼠标移动显示详细信息
					if(i_im_$("imPopWrap_"+data[i].pals_id)) {
						i_im_$("imPopWrap_"+data[i].pals_id).parentNode.removeChild(i_im_$("imPopWrap_"+data[i].pals_id));
					}
					htmlFriendPopWrap	+= 	"<div id='imPopWrap_"+data[i].pals_id+"' style='display:none;z-index:10000;position:absolute;' onmouseover=\"javascript:this.style.display = ''\" onmouseout=\"javascript:this.style.display = 'none'\"><div class='imCard imCard-"+i_im_lineStatusToStyle(data[i].line_status)+"'>" +
											"<div class=\"imCardAvatar\" id=\"imPopWrapIntro\"><img class=\"avatar-48\" src='"+data[i].pals_ico+"' alt='"+data[i].pals_name+"' ></div>" +
											"<div class=\"imCardInfo\"><strong class=\"imCardName\">"+data[i].pals_name+"</strong><span class=\"imCardImStatus\">"+i_im_lineStatusShowToChar(data[i].line_status)+"</span><span class=\"imCardUserStatus\"></span></div>" +
											"</div></div>";

					// 加载在线好友列表
					if(data[i].line_status>0 && data[i].line_status!=2) {
						onlineNums++;
					}
					FriendsNum++;
					i_im_stranger[i] = data[i];
				}
				i_im_$("customGroupUsersNum_stranger").innerHTML = '['+onlineNums+'/'+FriendsNum+']';
				obj_customGroup_stranger.innerHTML = htmlFriends;
				popFriendWrap.innerHTML = popFriendWrap.innerHTML+htmlFriendPopWrap;	// 用户详细pop框
			}
		}
	},'JSON');
}

var msgnums = 0;
var groupinfo = [];
// 获取聊天信息
function i_im_getMessage() {
	msgnums = 0;
	var divs = i_im_$('im_container').childNodes;
	var pals = '';
	for(var i=0;i<divs.length;i++){
		if(divs[i].id) {
			pals += divs[i].id.replace(/imWin_(talk_)?/g,"")+'|';
		}
	}

	pals = '|'+pals;
	i_im_ajax(i_im_baseUrl+"ajax.php?act=getmessagelist","POST","pals="+pals,function(data){
		var message_content,temp,html,tempid;
		var reg_g = /g_/g;
		if(data!="-1") {
			for(var i=0; i<data.length; i++) {
				if(data[i].winopen==1) {
					html = '';
					message_content = i_im_$("message_content_"+data[i].pals_id);
					temp = data[i].message;
					if(data[i].video_status==1){
						//视频邀请
						openvideo(data[i].pals_id,'g');
					}
					if(temp=="-1") continue;
					for(var j=0; j<temp.length; j++) {
						temp[j].txt = i_im_encode_html(temp[j].txt);
						if(temp[j].id=='0') {
							html = html+"<div class='msgPostA'>"+i_im_lang_talkwin.SystemNotice+"("+temp[j].time+"):</div><div class='msgGetH msgLimitD'><span class='msgLimitS'>"+temp[j].txt+"</span></div>";
						} else if(temp[j].id==i_im_my_uid) {
							html = html+"<div class='msgPostA'>"+i_im_my_uname+" ("+temp[j].time+"):</div><div class='msgGetH msgLimitD'><span class='msgLimitS'>"+temp[j].txt+"</span></div>";
						} else {
							if(!frendlistarrayobj[temp[j].id]) {
								i_im_getFriendInfo(temp[j].id);
							}
							html = html+"<div class='msgGetA'>"+frendlistarrayobj[temp[j].id].pals_name+" ("+temp[j].time+"):</div><div class='msgGetH msgLimitD'><span class='msgLimitS'>"+temp[j].txt+"</span></div>";
						}
					}
					message_content.innerHTML = message_content.innerHTML+html;
					i_im_$("msgHistoryid_"+data[i].pals_id).scrollTop = i_im_$("msgHistoryid_"+data[i].pals_id).scrollTop+1000;

					// 判断是否为缩小,如果是的话提示新消息.
					tempid = data[i].pals_id.search(reg_g);
					if(tempid=='-1') {
						if(i_im_$("imWin_"+data[i].pals_id).style.display == "none"){
							i_im_setNewMsg(data[i].pals_id);
						}
					} else {
						if(i_im_$("imWin_talk_"+data[i].pals_id).style.display == "none"){
							i_im_setNewMsg(data[i].pals_id);
						}
					}
				} else {
					msgnums++;
					i_im_setNewMsg(data[i].pals_id);
				}
			}
			i_im_$("msgnums").innerHTML = msgnums;
		}else{
			i_im_$("imminbox").innerHTML = '';
		}
	},'JSON');
}

// 获取聊天历史记录
function i_im_getHistoryMessage(id, page, s) {
	var hide = true;
	if(!s) {
		i_im_show("nav_history_msg_"+id);
		var nav_history_msg = i_im_$("nav_history_msg_"+id);
		var obj_nav = i_im_$("talk_win_nav_"+id).childNodes;
		for(var i=0;i<obj_nav.length;i++) {
			obj_nav[i].className = '';
		}
		if(i_im_$("nav_history_msg_"+id).style.display == 'none'){
			hide=false;
			var obj_talk_win = i_im_$("talk_win_"+id);
			if(i_im_$("nav_group_info_"+id).style.display=='block') {
				i_im_$("move_pan"+id).style.marginLeft = -220 +'px';
				i_im_$("nav_group_info_"+id).className = 'on';
			}else if(i_im_$("nav_video_"+id).style.display=='block') {
				i_im_$("move_pan"+id).style.marginLeft = -440 +'px';
				i_im_$("nav_video_"+id).className = 'on';
			}else {
				i_im_$("talkwin_right_"+id).style.display = 'none';
				obj_talk_win.className = "imDialog w_385";
			}
		}else{
			//切换显示消息记录、隐藏成员列表或视频
			i_im_$("talkwin_right_"+id).style.display = 'block';
			i_im_$("nav_history_msg_"+id).style.display = 'block';
			i_im_$("move_pan"+id).style.marginLeft = 0+'px';
			nav_history_msg.className = 'on';
			var obj_talk_win = i_im_$("talk_win_"+id);
			obj_talk_win.className = "imDialog w_620";
		}
	}
	var history_pal = i_im_$("history_pal_"+id);
	var hispageshow = i_im_$("hispageshow_"+id);
	var html = '';

	// 判断是否是要关闭，关闭就不再请求聊天记录。
	if(hide) {
		history_pal.innerHTML = i_im_lang_talkwin.Loading;
		i_im_ajax(i_im_baseUrl+"ajax.php?act=gethistorymessage","POST","pals="+id+"&page="+page,function(data){
			if(data!='-1') {
				var temp = data.message;
				for(var j=0; j<temp.length; j++) {
					temp[j].txt = i_im_encode_html(temp[j].txt);
					if(temp[j].id=='0') {
						html += "<div class='msgItem'><div class='msgPostA'><div class='user'>"+i_im_lang_talkwin.SystemNotice+"("+temp[j].time+"):</div></div><div class='msgPostH msgLimitD'><span class='msgLimitS'>"+temp[j].txt+"</span></div></div>";
					}else if(temp[j].id==i_im_my_uid) {
						html += "<div class='msgItem'><div class='msgPostA' onmouseover=\"i_im_show('delrecord_"+temp[j].rid+"')\" onmouseout=\"i_im_show('delrecord_"+temp[j].rid+"')\"><span id='delrecord_"+temp[j].rid+"' class='delrecord' style='display:none' title='"+i_im_lang_talkwin.DeleteThisRecord+"' onclick=\"i_im_delSingleMsg("+data.tid+","+temp[j].rid+")\"></span><div class='user'>"+i_im_my_uname+" ("+temp[j].time+"):</div></div><div class='msgPostH msgLimitD'><span class='msgLimitS'>"+temp[j].txt+"</span></div></div>";
					} else {
						if(!frendlistarrayobj[temp[j].id]) {
							i_im_getFriendInfo(temp[j].id);
						}
						html += "<div class='msgItem'><div class='msgGetA'><div class='user'>"+frendlistarrayobj[temp[j].id].pals_name+" ("+temp[j].time+"):</div></div><div class='msgGetH msgLimitD'><span class='msgLimitS'>"+temp[j].txt+"</span></div></div>";
					}
				}
				if(html!=''){
					history_pal.innerHTML = html;
				}
				var prepage = (data.page>1) ? data.page-1 : 1;
				var nextpage = (data.page<data.countpage) ? data.page+1 : data.countpage;
				if(!isNaN(id)) {
					hispageshow.innerHTML = "<span class='delmsg' onclick=\"i_im_setShow('delmsg_"+id+"');i_im_setOnShowPara('delmsg_"+id+"')\" hidefocus='true'></span>" +
											"<span class='pointer' onclick=\"i_im_getHistoryMessage('"+id+"','"+prepage+"',true)\" title='"+i_im_lang_talkwin.PreviousPage+"'>"+i_im_lang_talkwin.PreviousPage+"</span> " +
											"<span class='pointer' onclick=\"i_im_getHistoryMessage('"+id+"','"+nextpage+"',true)\" title='"+i_im_lang_talkwin.NextPage+"'>"+i_im_lang_talkwin.NextPage+"</span> " +
											""+i_im_lang_talkwin.NowPage+"<span>"+data.page+"</span>/<span>"+data.countpage+"</span>"+i_im_lang_talkwin.Page+" " +
											"<div style=\"display:none;z-index:"+i_im_zindex+"\" id='delmsg_"+id+"' class='delmsgwhich'>" +
											"	<ul><li onmouseover=\"this.style.backgroundColor='#d6d6d6';this.style.color='#000';\" onmouseout=\"this.style.backgroundColor='#f1f1f2';this.style.color='#333';\" onclick=\"i_im_delMsg('"+data.tid+"','"+id+"')\">删除当前页</li>" +
											"		<li onmouseover=\"this.style.backgroundColor='#d6d6d6';this.style.color='#000';\" onmouseout=\"this.style.backgroundColor='#f1f1f2';this.style.color='#333';\" onclick=\"i_im_delMsg('imWin_"+id+"','"+id+"')\">删除全部记录</li></ul>" +
											"</div>" +
											"<input id='delmsg_"+id+"_c' type='text' value='1' style='top:-10px;position:absolute;width:1px;height:1px;border:0px none;' onblur=\"i_im_timerSetHidden('delmsg_"+id+"',200);\" />";
				} else {
					hispageshow.innerHTML = "<span class='pointer' onclick=\"i_im_getHistoryMessage('"+id+"','"+prepage+"',true)\">"+i_im_lang_talkwin.PreviousPage+"</span> " +
											"<span class='pointer' onclick=\"i_im_getHistoryMessage('"+id+"','"+nextpage+"',true)\">"+i_im_lang_talkwin.NextPage+"</span> " +
											""+i_im_lang_talkwin.NowPage+"<span>"+data.page+"</span>"+i_im_lang_talkwin.Page+" "+i_im_lang_talkwin.PageSum+"" +
											"<span>"+data.countpage+"</span>"+i_im_lang_talkwin.Page;
				}
				history_pal.scrollTop = history_pal.scrollTop+1000;
			} else {
				hispageshow.innerHTML = '';
				history_pal.innerHTML = i_im_lang_talkwin.NoChattingRecord;
			}
		},'JSON');
	}
}

// 新消息 状态处理
function i_im_setNewMsg(id) {
	if(!isNaN(id)) {
		var pals_id = i_im_$("friendlist_pals_"+id);
		var online_id = i_im_$("online_friend_"+id);
		if(online_id!=null) {
			i_im_addClass(online_id,'buddyItem-newmsg');
		}
		if(pals_id!=null) {
			i_im_addClass(pals_id,'buddyItem-newmsg');
		}
		i_im_addMinFriendList(id,'imWin');
	} else {
		i_im_addMinFriendList(id,'imWin_talk');
	}
	i_im_playMsg();
	i_im_changeTitle();
}
function i_im_clearNewMsg(id) {
	i_im_$('imminbox').innerHTML = '';
	var pals_id = i_im_$("friendlist_pals_"+id);
	var online_id = i_im_$("online_friend_"+id);
	if(online_id!=null) {
		i_im_removeClass(online_id,'buddyItem-newmsg');
	}
	if(pals_id!=null) {
		i_im_removeClass(pals_id,'buddyItem-newmsg');
	}
}

// 显示我的信息状态
function i_im_showMyInfoAndStatus() {
	var imMyAvatar = i_im_$("imMyAvatar");
	var imMyName = i_im_$("imMyName");
	var online_myicon = i_im_$("imonline_myicon");
	var imSetHeadIMG = i_im_$('settingheadimg');
	imMyAvatar.src = i_im_my_ico;
	imSetHeadIMG.src = i_im_my_ico;
	imMyName.innerHTML = i_im_my_uname;
	online_myicon.className = "imStatus im-"+i_im_lineStatusToStyle(i_im_my_status);
	online_myicon.innerHTML = i_im_lineStatusToChar(i_im_my_status);
}

// 改变我的状态
function i_im_changeStatus(v) {
	var online_myicon = i_im_$("imonline_myicon");
	i_im_ajax(i_im_baseUrl+"ajax.php?act=changestatus","POST","s="+v,function(data){
		if(data=='1') {
			online_myicon.className = "imStatus im-"+i_im_lineStatusToStyle(v);
			online_myicon.innerHTML = i_im_lineStatusToChar(v);
			i_im_my_status = v;
			i_im_show('immyOnlinePanel');
			var obj_onlinestatus = i_im_$("onlinestatus");
			switch(v) {
			case 1:
				obj_onlinestatus.innerHTML = i_im_lang_basic.Online;
				break;
			case 2:
				obj_onlinestatus.innerHTML = i_im_lang_basic.Hiding;
				break;
			case 3:
				obj_onlinestatus.innerHTML = i_im_lang_basic.Busy;
				break;
			case 4:
				obj_onlinestatus.innerHTML = i_im_lang_basic.Leave;
				break;
			}
		}
	});
}

// 状态
function i_im_lineStatusToStyle(v) {
	if(v=='1'){
		return 'available';
	} else if(v=='3'){
		return 'busy';
	} else if(v=='4'){
		return 'idle';
	} else {
		return 'offline';
	}
}
function i_im_lineStatusShowToChar(v) {
	if(v=='1') {
		return i_im_lang_basic.Online;
	} else if(v=='3') {
		return i_im_lang_basic.Busy;
	} else if(v=='4') {
		return i_im_lang_basic.Leave;
	} else {
		return i_im_lang_basic.Offline;
	}
}
function i_im_lineStatusToChar(v) {
	if(v=='1') {
		return i_im_lang_basic.Online;
	} else if(v=='2') {
		return i_im_lang_basic.Hiding;
	} else if(v=='3') {
		return i_im_lang_basic.Busy;
	} else if(v=='4') {
		return i_im_lang_basic.Leave;
	} else {
		return i_im_lang_basic.Offline;
	}
}

// 表情处理
function i_im_smileControl(id) {
	var div = i_im_$("face_list_menu"+id).childNodes;
	for(var i=0; i<div.length; i++) {
		if(div[i].className=='emItem') {
			div[i].onmouseover = function() {
				i_im_addClass(this,'emAct');
			}
			div[i].onmouseout = function() {
				i_im_removeClass(this,'emAct');
			}
			div[i].onclick = function() {
				i_im_$("msginput"+id).value = i_im_$("msginput"+id).value + "{:"+this.lang+":}";
				i_im_show("face_list_menu"+id);
			}
		}
	}
}

// 搜索处理
function i_im_doSearch() {
	var search_dorpList = i_im_$("imsearch_dorpList");
	var searchBox = i_im_$("imSearchBox");
	searchBox.onkeyup = function(){
		var re = new RegExp(this.value,"ig");
		var r = '-1';
		var html = '';
		for(var k in frendlistarrayobj) {
			if(frendlistarrayobj[k].pals_id) {
				r = frendlistarrayobj[k].pals_name.search(re);
				if(r!='-1') {
					html += "<li lang='"+frendlistarrayobj[k].pals_id+"'><span>"+frendlistarrayobj[k].pals_name+"</span></li>";
				}
			}
		}
		if(html) {
			search_dorpList.innerHTML = html;
		} else {
			search_dorpList.innerHTML = "<li class='default'><span>"+i_im_lang_basic.CannotFindFriend+"</span></li>";
		}

		var lis = search_dorpList.childNodes;
		for(var j=0; j<lis.length; j++) {
			lis[j].onclick = function(){
				i_im_talkWin(this.lang,'imWin')
			}
			lis[j].onmouseover = function(){
				i_im_addClass(this,"on");
			}
			lis[j].onmouseout = function(){
				i_im_removeClass(this,"on");
			}
		}
	}
}

// 搜索框 blur的处理
function i_im_searchBoxBlur() {
	setTimeout("i_im_searchTipsListHide()",200);
}
function i_im_searchTipsListHide() {
	i_im_$('imsearchTips_list').style.display = 'none';
	i_im_readyBlur('imbar');
}

//声音、语言设置
function i_im_mesageSoundWav() {
	var setVideo = i_im_$("setVideo");
	var setLanguage = i_im_$("setLanguagee");

	if(setVideo.checked==true && i_im_msg_wav=='0') {
		i_im_msg_wav = '1';
		i_im_changeMsgSound(1);
	} else if(setVideo.checked==false && i_im_msg_wav=='1') {
		i_im_msg_wav = '0';
		i_im_changeMsgSound(0);
	}

	if(setLanguage.checked==true) {
		var cookieArray = document.cookie.split("; ");
		for (var i=0; i < cookieArray.length; i++)
		{
			var cookielanguage = cookieArray[i].split("=");
			var exp = new Date();
			exp.setTime(exp.getTime() + 24*3600*1000);
			if ('i_im_language' == cookielanguage[0]){
				if(cookielanguage[1]=='zh'){
					document.cookie = "i_im_language="+escape('ft')+";expires="+exp.toGMTString()+";path=/";
				}else{
					document.cookie = "i_im_language="+escape('zh')+";expires="+exp.toGMTString()+";path=/";
				}
			}
		}
		location.reload();
	}
	i_im_closeSetting();
}

// 改变来信息提示
function i_im_changeMsgSound(v) {
	i_im_ajax(i_im_baseUrl+"ajax.php?act=changemsgwav","POST","v="+v,function(data){
		if(data!='-1') {
			return true;
		} else {
			return false;
		}
	});
}

// 播放新消息声音
function i_im_playMsg() {
	if(i_im_msg_wav=='1') {
		var i_im_msg_wav_div = i_im_$("i_im_msg_wav_div");
		var html = '';
		html += '<object classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" codebase="http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=7,0,19,0" width="1" height="1">';
		html += '<param name="movie" value="'+i_im_baseUrl+'skin/default/flash/msg.swf" />';
		html += '<param name="quality" value="high" />';
		html += '<param name="wmode" value="transparent" />';
		html += '<param name="menu" value="false" />';
		html += '<embed src="'+i_im_baseUrl+'skin/default/flash/msg.swf" menu="false" wmode="transparent" quality="high" pluginspage="http://www.macromedia.com/go/getflashplayer" type="application/x-shockwave-flash" width="1" height="1"></embed>';
		html += '</object>';
		i_im_msg_wav_div.innerHTML = html;
	}
}

// 更新好友关系
function i_im_getApiUserPals() {
	i_im_ajax(i_im_baseUrl+"ajax.php?act=updatapals","POST","",function(data){});
}

//Manage IM

// 添加一新讨论组到列表
function i_im_groupListAdd(data) {
	//添加到面板
	var i_im_grouplist_id = i_im_$("i_im_grouplist_id");
	var html = "<li id='talk_"+data.pals_id+"' class='buddyItem' onmouseover=\"i_im_addClass(this,'buddyItem-hover');\" onmouseout=\"i_im_removeClass(this,'buddyItem-hover');\" ondblclick=\"i_im_talkWin('"+data.pals_id+"','imWin_talk');\" >";
	html 	+= "<div class='buddyAvatar'><a href='javascript:void(0)' title='"+data.group_name+"' hidefocus='true'><img class='avatar-20' src='"+i_im_baseUrl+"skin/default/images/talk20.gif' alt='"+data.group_name+"'></a></div>";
	html 	+= "<div class='buddyInfo'><strong class='buddyName'><a href='javascript:void(0)' title='"+data.group_name+"'  hidefocus='true'>"+data.group_name+"</a></strong></div></li>";
	i_im_grouplist_id.innerHTML = i_im_grouplist_id.innerHTML + html;
	//添加到系统设置面板

	var i_im_allgroup = i_im_$("allgroup");
	var im_g_list_dl = document.createElement("div");
	im_g_list_dl.id = "i_im_g_list_dl_id_"+data.pals_id;
	html = 	"<dt><label for='g_01' class='gimg'><img src='"+data.pals_ico+"' alt=\'"+i_im_lang_basic.DiscussionGroup+"\' style=\"width:24px;height:24px;\" /></label>"+data.group_name+"</dt>" +
			"<dd><a href=\"javascript:void(0)\" onclick=\"i_im_outGroup('"+data.pals_id+"')\">"+i_im_lang_group.Dismiss+"</a></dd>" +
			"<dd><a onclick=\"i_im_memberMag(this,'"+data.pals_id+"')\">"+i_im_lang_group.Manage+"</a></dd>";
	im_g_list_dl.innerHTML = html;
	i_im_allgroup.appendChild(im_g_list_dl);
	grouplistarrayobj[data.pals_id] = data;
}

//创建讨论组
function i_im_creatGroup() {
	var groupname = i_im_$('newGroup').value;
	if(groupname && groupname!=i_im_lang_group.InsertGroupName) {
		// 创建新组
		i_im_ajax(i_im_baseUrl+"ajax.php?act=createnewgroup","POST","gname="+groupname,function(data){
			if(data!='-1') {
				i_im_$('newGroup').value = '';
				i_im_groupListAdd(data);
				alert(i_im_lang_group.CreateGroup+groupname+i_im_lang_basic.Successfully);
			}
		},'JSON');
	}
}
function i_im_creatGroupKeyDown(evt) {
	evt = (evt) ? evt : ((window.event) ? window.event : ""); //兼容IE和Firefox获得keyBoardEvent对象
	var key = evt.keyCode ? evt.keyCode : evt.which;
	if (key==13) {
		i_im_creatGroup();
	}
}

//查找讨论组
var searchgroups = [];
function i_im_serachGroup() {
	var obj_searth = i_im_$("searchGroup");
	var serchGroup = obj_searth.value.trim();
	if(serchGroup!="") {
		i_im_ajax(i_im_baseUrl+"ajax.php?act=searchGroup","POST","s="+serchGroup,function(data){
			if(data!="-1") {
				searchgroups = data;
				i_im_show_search_group(1);
			} else {
				i_im_$("pagebar").innerHTML = '';
				i_im_$("searchGroupList").innerHTML = "<li class='red'>"+i_im_lang_group.NotFoundGroup+"</li>";
			}
		},'JSON');
	} else {
		alert(i_im_lang_group.ReenterGroupName);
	}
}
function i_im_show_search_group(page) {
	var list = 10;
	var obj_searchGroupList = i_im_$("searchGroupList");
	if(searchgroups.length<1) {
		return ;
	}
	if(!page || (page-1)<0 || isNaN(parseInt(page-1))) {
		page=0;
	}else{
		page = parseInt(page-1);
	}
	var begin = list*page;
	var end = list*(page+1);
	if(end>searchgroups.length) {
		end = searchgroups.length;
	}
	var showGroups = '';
	for(var i=begin;i<end;i++) {
		if(searchgroups[i].isin==1) {
			showGroups += "<li><span style='float:right;'><a href='javascript:void(0)' style='color:#FF6361;'>"+i_im_lang_group.Already+i_im_lang_group.JoinIn+"</a></span>"+searchgroups[i].gname+"</li>";
		} else {
			showGroups += "<li><span style='float:right;'><a href='javascript:void(0)' onclick=\"i_im_joinGroup('"+searchgroups[i].gid+"','"+searchgroups[i].ownerid+"','"+searchgroups[i].gname+"')\">"+i_im_lang_group.Application+i_im_lang_group.JoinIn+"</a></span>"+searchgroups[i].gname+"</li>";
		}
	}
	obj_searchGroupList.innerHTML = showGroups;
	var pagenums = Math.ceil(searchgroups.length / list);
	var pagebar = '';
	var obj_pagebar = i_im_$("pagebar");
	if(page==0) {
		pagebar += '';
	} else {
		pagebar += "<a href='javascript:void(0)' onclick='i_im_show_search_group("+page+")'>"+i_im_lang_talkwin.PreviousPage+"</a> ";
	}
	var nextpage = page+2;
	if(nextpage>pagenums) {
		pagebar += '';
	} else {
		pagebar += "<a href='javascript:void(0)' onclick='i_im_show_search_group("+nextpage+")'>"+i_im_lang_talkwin.NextPage+"</a> ";
	}
	if(pagebar!='') {
		var nowpage = page+1;
		pagebar += "("+nowpage+"/"+pagenums+")";
		obj_pagebar.innerHTML = pagebar;
	} else {
		obj_pagebar.innerHTML = '';
	}
}
function i_im_serachGroupKeyDown(evt) {
	evt = (evt) ? evt : ((window.event) ? window.event : ""); //兼容IE和Firefox获得keyBoardEvent对象
	var key = evt.keyCode ? evt.keyCode : evt.which;
	if (key==13) {
		i_im_serachGroup();
	}
}

//申请加入讨论组
function i_im_joinGroup(gid, ownerid, gname) {
	i_im_ajax(i_im_baseUrl+"ajax.php?act=initwin","POST","id="+ownerid,function(data){
		var v = "“"+i_im_my_uname+"”"+i_im_lang_group.Application+i_im_lang_group.JoinIn+i_im_lang_basic.DiscussionGroup+"“"+gname+"”";
		v = encodeURIComponent(v);
		i_im_ajax(i_im_baseUrl+"ajax.php?act=postnewmessage","POST","pals="+ownerid+"&v="+v+"&vc="+data,function(data){
			if(data==1) {
				i_im_getMessage();
			}
		});
	});
}

//查找好友
var searchFriends = [];
function i_im_searchFriends() {
	var obj_searth = i_im_$("searchUname");
	var serchUname = obj_searth.value.trim();
	if(serchUname!="") {
		i_im_ajax(i_im_baseUrl+"ajax.php?act=serachUser","POST","s="+serchUname,function(data){
			if(data!="-1") {
				searchFriends = data;
				i_im_showSearchFriends(1);
			} else {
				i_im_$("pagebar").innerHTML = '';
				i_im_$("searchGroupList").innerHTML = "<li class='red'>"+i_im_lang_group.NotFoundGroup+"</li>";
			}
		},'JSON');
	} else {
		alert(i_im_lang_group.ReenterGroupName);
	}
}
function i_im_showSearchFriends(page) {
	var list = 10;
	var obj_searchFriends = i_im_$("searchFriends");
	if(searchFriends.length<1) {
		return ;
	}
	if(!page || (page-1)<0 || isNaN(parseInt(page-1))) {
		page=0;
	}else{
		page = parseInt(page-1);
	}
	var begin = list*page;
	var end = list*(page+1);
	if(end>searchFriends.length) {
		end = searchFriends.length;
	}
	var showFriends = '';
	for(var i=begin;i<end;i++) {
		searchFriends[i].pals_ico = searchFriends[i].pals_ico.substr(0,7).toLowerCase() == 'http://' ? searchFriends[i].pals_ico : i_im_baseUrl+searchFriends[i].pals_ico;
		showFriends += 	"<li id='friendlist_pals_"+searchFriends[i].pals_id+"' class='buddyItem-"+i_im_lineStatusToStyle(searchFriends[i].line_status)+"'>" +
						"<div class='buddyAvatar'><a href='javascript:void(0)' title='"+searchFriends[i].pals_name+"' hidefocus='true'><img class='avatar-20' src='"+searchFriends[i].pals_ico+"' alt='"+searchFriends[i].pals_name+"' ><em></em><b></b></a></div>" +
						"<div class='buddyInfo'><input type=\"button\" class=\"flright im_btn_01\" value='加为好友' onclick=\"i_im_addFriends('imWin_"+searchFriends[i].pals_id+"')\" /><strong class='buddyName'><a href='javascript:void(0)' title='"+searchFriends[i].pals_name+"'  hidefocus='true'>"+searchFriends[i].pals_name+"</a></strong></div></li>";
	}
	obj_searchFriends.innerHTML = showFriends;
	var pagenums = Math.ceil(searchFriends.length / list);
	var pagebar = '';
	var obj_pagebar = i_im_$("searchFriendsPagebar");
	if(page==0) {
		pagebar += '';
	} else {
		pagebar += "<a href='javascript:void(0)' onclick='i_im_showSearchFriends("+page+")'>"+i_im_lang_talkwin.PreviousPage+"</a> ";
	}
	var nextpage = page+2;
	if(nextpage>pagenums) {
		pagebar += '';
	} else {
		pagebar += "<a href='javascript:void(0)' onclick='i_im_showSearchFriends("+nextpage+")'>"+i_im_lang_talkwin.NextPage+"</a> ";
	}
	if(pagebar!='') {
		var nowpage = page+1;
		pagebar += "("+nowpage+"/"+pagenums+")";
		obj_pagebar.innerHTML = pagebar;
	} else {
		obj_pagebar.innerHTML = '';
	}
}

// 加载  系统设置 -> 讨论组管理
function i_im_groupManageList() {
	var allgroup = i_im_$("allgroup");
	var i_im_grouplist_id = i_im_$("i_im_grouplist_id");
	var cnodes = i_im_grouplist_id.children;

	var k,html_num;
	var html_group='';
	for(var i=0; i<cnodes.length; i++) {
		k = cnodes[i].id.replace(/talk_/g,'');
		if(grouplistarrayobj[k].num==30) {
			html_num = i_im_lang_group.GroupIsFull;
		} else {
			html_num = '';
		}
		html_group += 	"<div id=\"i_im_g_list_dl_id_"+grouplistarrayobj[k].pals_id+"\"><dt><label for='g_01' class='gimg'><img src='"+grouplistarrayobj[k].pals_ico+"' alt=\'"+i_im_lang_basic.DiscussionGroup+"\' style=\"width:24px;height:24px;\" /></label>"+grouplistarrayobj[k].group_name+"</dt><dd><a href=\"javascript:void(0)\" onclick=\"i_im_outGroup('"+grouplistarrayobj[k].pals_id+"')\">";
		if(grouplistarrayobj[k].group_mid==i_im_my_uid) {
			html_group += 	i_im_lang_group.Dismiss+"</a></dd><dd><a href=\"javascript:void(0)\" onclick=\"i_im_memberMag(this,'"+grouplistarrayobj[k].pals_id+"')\">"+i_im_lang_group.Manage+"</a></dd></div>";
		} else {
			html_group += 	i_im_lang_group.Out+"</a></dd></div>";
		}
	}
	if(html_group=='') {
		html_group = '<dl>'+i_im_lang_group.NoMyOtherGroup+'</dl>';
	}
	allgroup.innerHTML = html_group;
}

// 加载 系统设置 -> 好友管理
function i_im_friendManageList() {
	var obj_friends_list = i_im_$("manage_friend");
	//加载系统默认分组--我的好友
	var obj_customGroup = document.createElement("div");
	var customGroup = '';
	obj_friends_list.innerHTML = '';
	obj_customGroup.className = 'pan_scr';
	customGroup = {'customGroupName':i_im_lang_basic.MyFriend,'customGroupId':'m_0'};
	var jstempo = new jsTempo('room_custom_group');
	obj_customGroup.innerHTML = jstempo.set(customGroup);
	obj_friends_list.appendChild(obj_customGroup);
	//自定义好友分组
	i_im_ajax(i_im_baseUrl+"ajax.php?act=getCustomGroup","GET","",function(data){
		var obj_chanageCustomGroup = i_im_$("chanageCustomGroup");
		var chanageCustomGroupLi = '';
		if(data!='-1') {
			var obj_friends_list = i_im_$("manage_friend");
			var obj_customGroupManage = i_im_$("customGroupManage");
			var htmlGroupManage = '';
			for(var i=0;i<data.length;i++) {
				//自定义好友分组
				var obj_customGroup = document.createElement("div");
				obj_customGroup.className = 'pan_scr';
				customGroup = {'customGroupName':data[i].groupName,'customGroupId':'m_'+data[i].id};
				var jstempo = new jsTempo('room_custom_group');
				obj_customGroup.innerHTML = jstempo.set(customGroup);
				obj_friends_list.appendChild(obj_customGroup);

				//好友移动 好友分组
				chanageCustomGroupLi += "<li onclick=\"i_im_moveToCustomGroup('"+data[i].id+"');i_im_show('chanageCustomGroup');\" onmouseover=\"i_im_addClass(this,'on');\" onmouseout=\"i_im_removeClass(this,'on');\">"+data[i].groupName+"</li>";
				//分组管理
				htmlGroupManage += "<li><span class=\"btnManage\"><input type=\"button\" value=\""+i_im_lang_basic.Modify+"\" onclick=\"updateGroup('"+data[i].id+"')\" class=\"im_btn_03\" /><input type=\"button\" value=\""+i_im_lang_basic.Delete+"\" onclick=\"delGroup('"+data[i].id+"')\" class=\"im_btn_03\" /></span><input id=\"updateCustomGroup_"+data[i].id+"\" type=\"text\" class=\"w_80\" value=\""+data[i].groupName+"\" /></li>";
			}
			//分组管理
			obj_customGroupManage.innerHTML = htmlGroupManage;
		}
		var sysCustomGroup = "<li onclick=\"i_im_moveToCustomGroup('0');i_im_show('chanageCustomGroup');\" onmouseover=\"i_im_addClass(this,'on');\" onmouseout=\"i_im_removeClass(this,'on');\">"+i_im_lang_basic.MyFriend+"</li>";
		sysCustomGroup += chanageCustomGroupLi;
		obj_chanageCustomGroup.innerHTML = sysCustomGroup;
	},'JSON');
	//加载好友
	i_im_ajax(i_im_baseUrl+"ajax.php?act=getfriendlist","GET","",function(data){
		if(data=='-1') {
			//alert('好友列表加载失败！');
			//getFriendList(); // 再次加载
		} else {
			var htmlFriends = new Array;
			var onlineNums = new Array;
			var groupFriendsNum = new Array;
			for(var i=0; i<data.length; i++) {
				if(!htmlFriends[data[i].groupId]) htmlFriends[data[i].groupId] = '';
				if(!onlineNums[data[i].groupId]) onlineNums[data[i].groupId] = 0;
				if(!groupFriendsNum[data[i].groupId]) groupFriendsNum[data[i].groupId] = 0;
				data[i].pals_ico = data[i].pals_ico.substr(0,7).toLowerCase() == 'http://' ? data[i].pals_ico : i_im_baseUrl+data[i].pals_ico;
				htmlFriends[data[i].groupId] += "<li class='clearfix' id='setFriendList_"+data[i].pals_id+"'>" +
												"	<label for='f_01'>" +
												"		<input type='checkbox' id='setFriend' name='setFriend' value='"+data[i].pals_id+"' />" +
												"		<img src='"+data[i].pals_ico+"' alt='"+data[i].pals_name+"' width='20' height='20' /> <span>"+data[i].pals_name+"</span>" +
												"	</label>" +
												"</li>";
				frendlistarrayobj[data[i].pals_id] = data[i];
				// 加载在线好友列表
				if(data[i].line_status>0 && data[i].line_status!=2) {
					onlineNums[data[i].groupId]++;
				}
				groupFriendsNum[data[i].groupId]++;
			}

			for(var i in htmlFriends) {
				if(i_im_$("customGroup_m_"+i)) {
					i_im_$("customGroup_m_"+i).innerHTML = htmlFriends[i];
					i_im_$("customGroupUsersNum_m_"+i).innerHTML = '['+onlineNums[i]+'/'+groupFriendsNum[i]+']';
				}
			}
		}
	},'JSON');
	//修改好友分组
	updateGroup = function(gid) {
		var obj_customGroup = i_im_$("updateCustomGroup_"+gid);
		if(obj_customGroup.value.length>0) {
			i_im_ajax(i_im_baseUrl+"ajax.php?act=updateCustomGroup","POST","gid="+gid+"&gname="+obj_customGroup.value,function(data){
				if(data!='-1') {
					//重新加载好友分组
					i_im_friendManageList();
					i_im_getCustomGroup();
					i_im_getFriendList();
					alert(i_im_lang_basic.Modify+i_im_lang_basic.Successfully);
				} else {
					alert(i_im_lang_basic.Modify+i_im_lang_basic.Failed);
				}
			},'JSON');
		} else {
			alert(i_im_lang_friend.InputGroupName);
		}
	}
	//删除好友分组
	delGroup = function(gid) {
		var confirmdel = confirm(i_im_lang_friend.DelGroupWarning);
		if(confirmdel){
			i_im_ajax(i_im_baseUrl+"ajax.php?act=delCustomGroup","POST","gid="+gid,function(data){
				if(data!='-1') {
					//重新加载好友分组
					i_im_friendManageList();
					i_im_getCustomGroup();
					i_im_getFriendList();
					alert(i_im_lang_basic.Delete+i_im_lang_basic.Successfully);
				}else{
					alert(i_im_lang_basic.Delete+i_im_lang_basic.Failed);
				}
			},'JSON');
		}
	}
}
//删除好友
function i_im_delFriends() {
	if(confirm(i_im_lang_friend.DelFriendWarning)==false){
		return;
	}
	var obj_setFriend = document.getElementsByName("setFriend");
	var ids = '';
	var comma = '';
	for(var i=0;i<obj_setFriend.length;i++){
		if(obj_setFriend[i].checked==true){
			ids += comma+obj_setFriend[i].value;
			comma = ',';
		}
	}
	if(ids) {
		i_im_ajax(i_im_baseUrl+"ajax.php?act=delFriends","POST","ids="+ids,function(data){
			if(data!='-1') {
				for(var i=0;i<data.length;i++) {
					//删除系统设置面板中好友
					if(i_im_$("setFriendList_"+data[i])) {
						i_im_$("setFriendList_"+data[i]).parentNode.removeChild(i_im_$("setFriendList_"+data[i]));
					}
					//删除主面板中好友
					if(i_im_$("friendlist_pals_"+data[i])) {
						i_im_$("friendlist_pals_"+data[i]).parentNode.removeChild(i_im_$("friendlist_pals_"+data[i]));
					}
					//删除主面板中在线好友
					if(i_im_$("online_friend_"+data[i])) {
						i_im_$("online_friend_"+data[i]).parentNode.removeChild(i_im_$("online_friend_"+data[i]));
					}
				}
				i_im_getFriendList();
				alert(i_im_lang_basic.Successfully+i_im_lang_basic.Delete+data.length+i_im_lang_basic.A+i_im_lang_basic.Friend);
			}
		},'JSON');
	}else{
		alert(i_im_lang_basic.Please+i_im_lang_basic.Select+i_im_lang_basic.Friend);
	}
}
//移动好友
function i_im_moveToCustomGroup(gid) {
	var obj_setFriend = document.getElementsByName("setFriend");
	var ids = '';
	var comma = '';
	for(var i=0;i<obj_setFriend.length;i++){
		if(obj_setFriend[i].checked==true){
			ids += comma+obj_setFriend[i].value;
			comma = ',';
		}
	}
	if(ids) {
		i_im_ajax(i_im_baseUrl+"ajax.php?act=moveFriends","POST","ids="+ids+'&gid='+gid,function(data){
			if(data!='-1') {
				var obj_friends_list = i_im_$("manage_friend");
				var customGroupId = '';
				var re,id;
				for(var i=0;i<data.length;i++) {
					//删除主面板中好友
					if(i_im_$("friendlist_pals_"+data[i])) {
						customGroupId = i_im_$("friendlist_pals_"+data[i]).parentNode.id;
						i_im_$("friendlist_pals_"+data[i]).parentNode.removeChild(i_im_$("friendlist_pals_"+data[i]));
						re = /customGroup_(\d)/i;
						id = customGroupId.match(re);
						if(i_im_$("customGroupUsersNum_"+id[1])) {
							i_im_$("customGroupUsersNum_"+id[1]).innerHTML = '[0/0]';
						}
					}
				}
				i_im_getFriendList();
				i_im_getStranger();
				obj_friends_list.innerHTML = '';
				i_im_friendManageList();
			}
		},'JSON');
	}else{
		alert("尚未选择好友！");
	}
}

//创建新的好友分组
function i_im_newCustomGroup() {
	var obj_newCustomGroup = i_im_$("newCustomGroup");
	if(obj_newCustomGroup.value.length>0) {
		i_im_ajax(i_im_baseUrl+"ajax.php?act=newCustomGroup","POST","groupName="+obj_newCustomGroup.value,function(data){
			if(data!='-1') {
				var obj_customGroupManage = i_im_$("customGroupManage");
				var obj_manage_friend = i_im_$("manage_friend");
				var htmlGroupManage = document.createElement("li");
				i_im_$("newCustomGroup").value = '';
				htmlGroupManage.innerHTML = "<span class=\"btnManage\">" +
						"<input type=\"button\" value=\""+i_im_lang_basic.Modify+"\" onclick=\"\" class=\"im_btn_03\" />" +
						"<input type=\"button\" value=\""+i_im_lang_basic.Delete+"\" onclick=\"\" class=\"im_btn_03\" /></span>" +
						"<input type=\"text\" class=\"w_80\" value=\""+data.gname+"\" />";
				obj_customGroupManage.appendChild(htmlGroupManage);
				i_im_friendManageList();
				i_im_getCustomGroup();
				i_im_getFriendList();
			}else{
				alert(i_im_lang_friend.AddNewGroup+i_im_lang_basic.Failed)
			}
		},'JSON');
	}else{
		alert(i_im_lang_friend.InputGroupName);
	}
}

//加载安全隐私设置
function i_im_getCondtion() {
	i_im_$("c_every").onclick = function() {
		i_im_$("im_question").disabled = true;
		i_im_$("im_answer").disabled = true;
	}
	i_im_$("c_needAnswer").onclick = function() {
		i_im_$("im_question").disabled = false;
		i_im_$("im_answer").disabled = false;
	}
	i_im_$("c_noOne").onclick = function() {
		i_im_$("im_question").disabled = true;
		i_im_$("im_answer").disabled = true;
	}
	switch(i_im_addFriendsCondition) {
	case '1':
		i_im_$("c_every").checked = true;
		break;
	case '2':
		i_im_$("c_needAnswer").checked = true;
		i_im_$("im_question").disabled = false;
		i_im_$("im_answer").disabled = false;
		break;
	case '3':
		i_im_$("c_noOne").checked = true;
		break;
	}
}

// 讨论组样式控制
function i_im_changeStyle(id, num, name) {
	for(var i=1;i<num+1;i++){
		i_im_$(name+'_'+i).className = '';
		i_im_$(name+'_'+i+'_c').style.display = 'none';
	}
	i_im_$(name+'_'+id).className = 'now';
	i_im_$(name+'_'+id+'_c').style.display = '';
}

// 讨论组成员管理
function i_im_memberMag(obj, id) {
	if(i_im_$('memberManage_'+id)) { return ;}
	var immWin = document.createElement('div');
	immWin.style.zIndex = 10002;
	immWin.style.position = 'absolute';
	immWin.style.width = '180px';
	var t=obj.offsetTop;
    var l=obj.offsetLeft;
    var height=obj.offsetHeight;
    var width=obj.offsetWidth;
    while(obj=obj.offsetParent){
        t+=obj.offsetTop;
        l+=obj.offsetLeft;
    }
    if (document.documentElement && document.documentElement.scrollTop)
	    sTop = document.documentElement.scrollTop;
	else if (document.body)
		sTop = document.body.scrollTop
    t = t-sTop;
	immWin.style.top = (t) + 'px';
	immWin.style.left = (l) + 'px';
	immWin.id = 'memberManage_'+id;
	immWin.className = 'winbody';

	var talk_win_element = {'id':id};
	var jstempo = new jsTempo('room_manage_group_member');
	immWin.innerHTML = jstempo.set(talk_win_element);

	i_im_$("imcss").appendChild(immWin);



	var drag = new i_im_Drag(immWin.id);
	i_im_$('i_im_wintop_'+id).onmouseover = function() {drag.Lock = false;}
	i_im_$('i_im_wincontent_'+id).onmouseover = function() {drag.Lock = true;}

	i_im_groupUserList(id);

	i_im_$('im_mCloseBtn'+id).onclick = function(){
		i_im_$("imcss").removeChild(immWin);
	}
	i_im_$('im_mCloseBtn'+id).onmouseover = function(){
		setTimeout("i_im_$('im_mCloseBtn"+id+"').className = 'dlgCloseBtn2'",100);
	}
	i_im_$('im_mCloseBtn'+id).onmouseout = function(){
		setTimeout("i_im_$('im_mCloseBtn"+id+"').className = 'dlgCloseBtn'",100);
	}
	i_im_$('i_im_submit_'+id).onclick = function(){
		var inputs = document.getElementsByName("group_user_check[]");
		var pals_ids = ',';
		for(var i=0; i<inputs.length; i++) {
			if(inputs[i].checked) {
				pals_ids += inputs[i].value+',';
			}
		}
		i_im_addUserToGroup(pals_ids,id);
	}
}
//加载设置页面
function i_im_setting() {
	var obj_setting = i_im_$("setting");
	var parentnode = i_im_$('im_container');
	var divs = parentnode.childNodes;
	var temp_win = '';
	obj_setting.onmousedown = function() {
		for(i=0;i<divs.length;i++) {
			divs[i].className = 'inactive';
		}
		i_im_removeClass(obj_setting,'inactive');
		parentnode.style.zIndex = i_im_zindex;
		obj_setting.style.zIndex = i_im_zindex+1;
		i_im_zindex = i_im_zindex +2;
	}
	for(i=0;i<divs.length;i++) {
		divs[i].className = 'inactive';
	}
	i_im_removeClass(obj_setting,'inactive');
	obj_setting.style.zIndex = i_im_zindex;
	i_im_zindex = i_im_zindex +2;
	if(obj_setting.style.display == 'block') return;
	obj_setting.style.top = 50+Math.random()*50+'px';
	obj_setting.style.right = 250+Math.random()*250+'px';
	obj_setting.style.display = 'block';
	var drag = new i_im_Drag("setting");
	i_im_$('setting_head').onmouseover = function() {drag.Lock = false;}
	i_im_$('setting_head').onmouseout  = function() {drag.Lock = true;}
	i_im_$('setting_body').onmouseover = function() {drag.Lock = true;}

	var obj_setvideo = i_im_$("setVideo");
	if(i_im_msg_wav==1) {
		obj_setvideo.checked = true;
	}
	var obj_nav = i_im_$("setting_nav");
	//加载讨论组管理
	i_im_groupManageList();
	//加载好友管理
	i_im_friendManageList();
	//加载安全隐私设置
	i_im_getCondtion();
}
function i_im_showSetting(id, num) {
	var obj_nav = i_im_$("setting_nav");
	for(var i=0;i<obj_nav.childNodes.length;i++) {
		obj_nav.childNodes[i].className = '';
	}
	i_im_$("nav_"+id).className = 'on';
	for(var i=1;i<=num;i++) {
		i_im_$("setting_"+i).style.display = 'none';
	}
	i_im_$("setting_"+id).style.display = '';
}

// 显示当前管理组的成员列表
function i_im_groupUserList(id) {
	var i_im_memberlist = i_im_$('i_im_memberlist_'+id);
	var html = "<p><input type='checkbox' checked disabled />"+i_im_my_uname+"</p>";
	i_im_ajax(i_im_baseUrl+"ajax.php?act=getfriendlist","POST","sid="+id,function(data){
		if(data!='-1') {
			var temp = new Array;
			for(var i=0; i<data.length; i++) {
				temp[i] = data[i].pals_id;
			}
			for(var k in frendlistarrayobj) {
				if(!frendlistarrayobj[k].pals_id) {
					continue;
				}
				if(temp.in_array(k)) {
					html += "<p><input name='group_user_check[]' type='checkbox' value='"+frendlistarrayobj[k].pals_id+"' checked />"+frendlistarrayobj[k].pals_name+"</p>";
				} else {
					html += "<p><input name='group_user_check[]' type='checkbox' value='"+frendlistarrayobj[k].pals_id+"' />"+frendlistarrayobj[k].pals_name+"</p>";
				}
			}
			i_im_memberlist.innerHTML = html;
		}
	},'JSON');
}

// 更新im讨论组
function i_im_updateGroupList() {
	var imgroupnum = i_im_$("imGroupNum");
	var i_im_grouplist_id = i_im_$("i_im_grouplist_id");
	i_im_ajax(i_im_baseUrl+"ajax.php?act=getgrouplist","GET","",function(data){
		if(data=='-1') {
			//alert('好友列表加载失败！');
			//getFriendList(); // 再次加载
		} else {
			var htmlGroupList='';
			var allListNum = 0;
			for(var i=0; i<data.length; i++) {
				htmlGroupList += "<li id='talk_"+data[i].pals_id+"' class='buddyItem' onmouseover=\"i_im_addClass(this,'buddyItem-hover');\" onmouseout=\"i_im_removeClass(this,'buddyItem-hover');\" ondblclick=\"i_im_talkWin('"+data[i].pals_id+"','imWin_talk');\" ><div class='buddyAvatar'><a href='javascript:void(0)' title='"+data[i].group_name+"' hidefocus='true'><img class='avatar-20' src='"+i_im_baseUrl+"skin/default/images/talk.gif' alt='"+data[i].group_name+"'></a></div><div class='buddyInfo'><strong class='buddyName'><a href='javascript:void(0)' title='"+data[i].group_name+"'  hidefocus='true'>"+data[i].group_name+"</a></strong></div>";
				allListNum++;
				grouplistarrayobj[data[i].pals_id] = data[i];
			}
			i_im_grouplist_id.innerHTML = htmlGroupList;	// 更新好友列表
			imgroupnum.innerHTML = '['+allListNum+']';
		}
	},'JSON');
}

// 添加用户到该讨论组
function i_im_addUserToGroup(pals_id, g_id) {
	if(pals_id && g_id) {
		i_im_ajax(i_im_baseUrl+"ajax.php?act=addusertogroup","POST","pid="+pals_id+"&gid="+g_id,function(data){
			if(data=='2') {
				alert(i_im_lang_group.MemberRestraint);
			} else if(data!='-1') {
				alert(i_im_lang_group.MemberEditSuccessfully);
			}
		});
	}
}

// 退出讨论组
function i_im_outGroup(v) {
	i_im_ajax(i_im_baseUrl+"ajax.php?act=logoutgroup","POST","gid="+v,function(data){
		if(data!='-1') {
			var i_im_g_list_dl_id = i_im_$("i_im_g_list_dl_id_"+v);
			alert(i_im_lang_group.OutGroupSuccessfully);
			i_im_$("allgroup").removeChild(i_im_g_list_dl_id);
		}
	});
}

//encode html
function i_im_encode_html(msg) {
	var re,returnmsg;
	returnmsg = msg;
   	re = new RegExp("({IM:A})(.+?)({/IM:A})","g");
   	returnmsg = returnmsg.replace(re, "<a href='$2' target='_blank'>$2</a>");
	return returnmsg;
}

//客户端判断文件大小
function i_im_checkFileSize(file) {
	var fileIsSize;
	var dFile = document.getElementById(file);

	var Sys = {};
    var ua = navigator.userAgent.toLowerCase();
    var s;
    (s = ua.match(/msie ([\d.]+)/)) ? Sys.ie = s[1] :
    (s = ua.match(/firefox\/([\d.]+)/)) ? Sys.firefox = s[1] :
    (s = ua.match(/chrome\/([\d.]+)/)) ? Sys.chrome = s[1] :
    (s = ua.match(/opera.([\d.]+)/)) ? Sys.opera = s[1] :
    (s = ua.match(/version\/([\d.]+).*safari/)) ? Sys.safari = s[1] : 0;

    if (Sys.ie=='6.0'){
    	file = dFile.value;
		var image = new Image();
		image.dynsrc = file;
		fileIsSize = image.fileSize;
		if(fileIsSize<0){
			return true;
		}
    }else if(Sys.ie=='7.0' || Sys.ie=='8.0'){
        return true;
	}else if(Sys.firefox || Sys.chrome || Sys.safari){
		fileIsSize = dFile.files[0].fileSize;
	}else if(Sys.opera){
		return true;
	}else{
		return true;
	}
    if(fileIsSize>i_im_max_file_size){
    	return false;
    }else{
    	return true;
    }
}

//客户端判断文件类型
function i_im_checkFileType(file) {
	var fileName = document.getElementById(file).value.toLowerCase();
	var pos = fileName.lastIndexOf(".");
	var ext = fileName.substring(pos+1,fileName.length)
	i_im_allow_file_type = i_im_allow_file_type.toString();
	var i_im_allow_file_type_array = i_im_allow_file_type.split(",");
	for(var i=0;i<i_im_allow_file_type_array.length;i++){
		if(ext==i_im_allow_file_type_array[i]){
			return true;
		}
	}
	return false;
}

//客户端判断文件类型
function i_im_checkIsImg(file) {
	var fileName = document.getElementById(file).value.toLowerCase();
	var pos = fileName.lastIndexOf(".");
	var ext = fileName.substring(pos+1,fileName.length)
	var imgArray = new Array('jpg','gif','png');
	for(var i=0;i<imgArray.length;i++){
		if(ext==imgArray[i]){
			alert(ext);
			return true;
		}
	}
	return false;
}

//个性签名
function i_im_changeText(obj, name) {
	obj.style.display = 'none';
	i_im_$(name).style.display = 'block';
	i_im_$(name).focus();
	i_im_$(name).select();
}
function i_im_saveText(mood_input, mood_text) {
	var obj_input = i_im_$(mood_input);
	var obj_text = i_im_$(mood_text);
	obj_text.style.display = 'block';
	obj_input.style.display = 'none';
	if(obj_input.value==''){
		obj_text.innerHTML = i_im_lang_basic.updateMood+i_im_lang_basic.Ellipsis;
	}else{
		i_im_updateMood(obj_input.value);
	}
}
//保存签名
function i_im_updateMood(mood) {
	i_im_ajax(i_im_baseUrl+"ajax.php?act=updateintro","POST","intro="+mood,function(data){
		if(data!='-1') {
			var obj_text = i_im_$('mood_text');			
			if(obj_text){
				obj_text.innerHTML	= data.substr(0,12)+i_im_lang_basic.Ellipsis;
				obj_text.title = data;
			}
			var moodInput = i_im_$('moodInput');
			var obj_mood_input = i_im_$('mood_input');
			if(moodInput) {
				moodInput.value = data;
			}
			if(obj_mood_input) {
				obj_mood_input.value = data;
			}
		}
	});
}
function i_im_setMood(moodInput) {
	var obj_input = i_im_$(moodInput);
	i_im_updateMood(obj_input.value);
}
//关闭设置页面
function i_im_closeSetting() {
	i_im_removeEventHandler(i_im_$('setting_head'),"mouseover",i_im_closeSetting);
	i_im_removeEventHandler(i_im_$('setting_body'),"mouseover",i_im_closeSetting);
	i_im_show('setting');
	var max_zindex = 0;
	var parentnode = i_im_$('im_container');
	var divs = parentnode.childNodes;
	for(i=0;i<divs.length;i++){
		if(divs[i].nodeType == 1){
			if(divs[i].style.zIndex){
				max_zindex = divs[i].style.zIndex > max_zindex?divs[i].style.zIndex:max_zindex;
			}
		}
	}
	for(i=0;i<divs.length;i++){
		if(divs[i].nodeType == 1){
			if(divs[i].style.zIndex == max_zindex){
				temp_win = divs[i];//for FF
				divs[i].className = 'imwinInt';//for IE
			}
		}
	}
}

//切换好友列表、讨论组、最近联系人
function i_im_showFriends(obj,showdiv) {
	var obj_parent = obj.parentNode;
	for(var i=0;i<obj_parent.childNodes.length;i++) {
		obj_parent.childNodes[i].className='';
	}
	obj.className = 'on_f';
	if(showdiv=='friends'){
		i_im_$("friends_list").style.display = 'block';
		i_im_$('groups_list').style.display = 'none';
		i_im_$("contacted_list").style.display = 'none';
	}else if(showdiv=='groups'){
		i_im_$("friends_list").style.display = 'none';
		i_im_$("contacted_list").style.display = 'none';
		i_im_$('groups_list').style.display = 'block';
	}else{
		i_im_$("friends_list").style.display = 'none';
		i_im_$("contacted_list").style.display = 'block';
		i_im_$('groups_list').style.display = 'none';
	}
}
//回调函数
function i_im_backChangeIco(headimg) {
	var imMyAvatar = i_im_$('imMyAvatar');
	var imSetHeadIMG = i_im_$('settingheadimg');
	if(imMyAvatar && headimg) {
		imMyAvatar.src = headimg;
	}
	if(imSetHeadIMG && headimg) {
		imSetHeadIMG.src = headimg;
	}
}
//增加有短消息，标题提示
var step = 0;
var setTimeOutId = '';
function i_im_changeTitle() {
	if(i_im_$("imminbox").innerHTML){
		step++;
		if (step==3) {step=1};
		if(step==1) {
			document.title='［　　　　　］'
		}else if(step==2) {
			document.title='［'+i_im_lang_basic.YouHaveNewMsg+'］'
		}
		if(setTimeOutId){clearTimeout(setTimeOutId)};
		setTimeOutId = setTimeout("i_im_changeTitle()",500);
	}else{
		document.title = main_title;
	}
}

//统计在线时间
var online_time = '';
function i_im_getOnlineTime() {
	i_im_ajax(i_im_baseUrl+"ajax.php?act=onlineTime","POST","",function(data){
		if(data) {
			online_time = '';
			i_im_online_time = data;
			i_im_onlineTime(data);
		}
	});
}
//生成在线时间
function i_im_onlineTime(seconds) {
	if(seconds>31536000) {
		var im_years = Math.floor(seconds/31536000);
		online_time = im_years + i_im_lang_basic.Year;
		i_im_onlineTime(seconds-im_years*31536000);
	}else if(seconds>86400 && seconds<31536000) {
		var im_days = Math.floor(seconds/86400);
		online_time += im_days + i_im_lang_basic.Day;
		i_im_onlineTime(seconds-im_days*86400);
	}else if(seconds>3600 && seconds<86400) {
		var im_hours = Math.floor(seconds/3600);
		online_time += im_hours + i_im_lang_basic.Hour;
		i_im_onlineTime(seconds-im_hours*3600);
	}else if(seconds>60 && seconds<3600) {
		var im_minutes = Math.floor(seconds/60);
		online_time += im_minutes + i_im_lang_basic.Minute;
	}
	var imMyAvatar = i_im_$("imMyAvatar");
	if(imMyAvatar) {
		imMyAvatar.title = i_im_lang_basic.OnlineTime+online_time;
	}
}

//更新最近联系人
function i_im_updateCloseContacted(uid) {
	if(!uid) {
		uid = '';
	}
	i_im_ajax(i_im_baseUrl+"ajax.php?act=updateContacted","POST","uid="+uid,function(data){
		if(data!='-1') {
			var popFriendWrap = i_im_$("impopFriendWrap");
			var obj_contactedlist = i_im_$("i_im_contactedlist");
			var htmlFriends = '';
			var onlineNums = 0;
			var FriendsNum = 0;
			var htmlFriendPopWrap = '';
			for(var i=0;i<data.length;i++) {
				data[i].pals_ico = data[i].pals_ico.substr(0,7).toLowerCase() == 'http://' ? data[i].pals_ico : i_im_baseUrl+data[i].pals_ico;
				htmlFriends += "<li id='friendlist_pals_"+data[i].pals_id+"' class='buddyItem buddyItem-"+i_im_lineStatusToStyle(data[i].line_status)+"' onmouseover=\"i_im_friendlistmouseover(this,'"+data[i].pals_id+"');\" onmouseout=\"i_im_friendlistmouseout(this,'"+data[i].pals_id+"');\" ondblclick=\"i_im_talkWin('"+data[i].pals_id+"','imWin');\" >" +
								"<div class='buddyAvatar'><a href='javascript:void(0)' title='"+data[i].pals_name+"' hidefocus='true'><img class='avatar-20' src='"+data[i].pals_ico+"' alt='"+data[i].pals_name+"' ><em></em><b></b></a></div>" +
								"<div class='buddyInfo'><strong class='buddyName'><a href='javascript:void(0)' title='"+data[i].pals_name+"'  hidefocus='true'>"+data[i].pals_name+"</a></strong></div></li>";

				// 鼠标移动显示详细信息
				if(!i_im_$("imPopWrap_"+data[i].pals_id)) {
					htmlFriendPopWrap	+= 	"<div id='imPopWrap_"+data[i].pals_id+"' style='display:none;z-index:10000;' onmouseover=\"javascript:this.style.display = ''\" onmouseout=\"javascript:this.style.display = 'none'\"><div class='imCard imCard-"+i_im_lineStatusToStyle(data[i].line_status)+"'>" +
											"<div class=\"imCardAvatar\" id=\"imPopWrapIntro\"><img class=\"avatar-48\" src='"+data[i].pals_ico+"' alt='"+data[i].pals_name+"' ></div>" +
											"<div class=\"imCardInfo\"><strong class=\"imCardName\">"+data[i].pals_name+"</strong><span class=\"imCardImStatus\">"+i_im_lineStatusShowToChar(data[i].line_status)+"</span><span class=\"imCardUserStatus\"></span></div>" +
											"</div></div>";
				}
				// 加载在线好友列表
				if(data[i].line_status>0 && data[i].line_status!=2) {
					onlineNums++;
				}
				FriendsNum++;
			}
			i_im_$("imContactedNum").innerHTML = '['+onlineNums+'/'+FriendsNum+']';
			obj_contactedlist.innerHTML = htmlFriends;
			popFriendWrap.innerHTML = popFriendWrap.innerHTML+htmlFriendPopWrap;	// 用户详细pop框
		}
	},'JSON');
}

//更换发送快捷键
function i_im_changePostStyle(id, num) {
	var exp = new Date();
	exp.setTime(exp.getTime() + 24*3600*1000);
	for(var i=1;i<=num;i++) {
		i_im_removeClass(i_im_$("postStyle_"+i),'cuntermark');
	}
	i_im_addClass(i_im_$("postStyle_"+id),'cuntermark');

	if(id==1){
		document.cookie = "poststyle=Enter;expires="+exp.toGMTString()+";";
		poststyle = 'Enter';
	}else if(id==2){
		document.cookie = "poststyle=CtrlEnter;expires="+exp.toGMTString()+";";
		poststyle = 'CtrlEnter';
	}else{
		document.cookie = "poststyle=AltS;expires="+exp.toGMTString()+";";
		poststyle = 'AltS';
	}
}

//删除单条聊天记录
function i_im_delSingleMsg(tid, rid) {
	if(isNaN(tid) || isNaN(rid)) {
		return;
	}
	i_im_ajax(i_im_baseUrl+"ajax.php?act=delmsg","POST","tid="+tid+"&rid="+rid,function(data){
		if(data=='1') {
			var obj_delrecord = i_im_$("delrecord_"+rid);
			obj_delrecord.parentNode.parentNode.innerHTML = '';
		}
	});
}
//删除消息记录
function i_im_delMsg(pid,id) {
	if(confirm(i_im_lang_talkwin.ConfirmDel)){
		i_im_ajax(i_im_baseUrl+"ajax.php?act=delmsg","POST","pid="+pid,function(data){
			if(data!='-1') {
				i_im_getHistoryMessage(id,0,true);
			}
		});
	}
}
//删除消息记录
function i_im_delMsg(pid,id) {
	if(confirm(i_im_lang_talkwin.ConfirmDel)){
		i_im_ajax(i_im_baseUrl+"ajax.php?act=delmsg","POST","pid="+pid,function(data){
			if(data!='-1') {
				i_im_getHistoryMessage(id,0,true);
			}
		});
	}
}
//隐私设置
function i_im_setCondition(){
	var obj_condition = document.getElementsByName("addcon");
	var addcon = '';
	var question = '';
	var answer = '';
	for(var i=0; i<obj_condition.length; i++) {
		if(obj_condition[i].checked) {
			addcon = obj_condition[i].value;
			if(addcon==2) {
				question = i_im_$("im_question").value.trim();
				answer = i_im_$("im_answer").value.trim();
				if(answer=='') {
					alert(i_im_lang_talkwin.InputTheAnswer);
					return false;
				}
			}
		}
	}
	i_im_ajax(i_im_baseUrl+"ajax.php?act=setCondition","POST","addcon="+addcon+"&im_question="+question+"&im_answer="+answer,function(data){
		if(data!='-1') {
			i_im_addFriendsCondition = data.addcon;
			i_im_condition_question = data.question;
			i_im_condition_answer = data.answer;
			alert(i_im_lang_basic.Setting+i_im_lang_basic.Successfully);
		} else {
			alert(i_im_lang_basic.Setting+i_im_lang_basic.Failed);
		}
	});	
}
// onload
function i_im_initIM() {
	//在线时间
	i_im_onlineTime(i_im_online_time);
	// 更新好友列表信息
	i_im_getApiUserPals();
	// 搜索处理.
	i_im_doSearch();
	// 显示我的状态
	i_im_showMyInfoAndStatus();
	//刷新自定义好友分组
	i_im_getCustomGroup();
	// 刷新好友列表
	i_im_getFriendList();
	//获取陌生人
	i_im_getStranger();
	setInterval("i_im_getFriendList()",59300);
	//获取最近联系人
	i_im_updateCloseContacted();
	//讨论组
	setInterval("i_im_updateGroupList()",61300);
	// 获取聊天信息
	setInterval("i_im_getMessage()",4000);
	//统计在线时间
	setInterval("i_im_getOnlineTime()",63000);
}


window.onload = function() {
	i_im_initIM();
};

