/*
 * jnPopup(target,option) 弹出框带拖动 api
 * - target:弹出框对象
 * - option:{
		withBg:是否带背景(背景暗下来)
		bgColor:背景颜色
		bgOpacity:背景透明度
		bg_id:背景id
		zIndex:区域深度
		moveArea:触发移动功能对象
		transition:动画缓动
		isFixed:是否随页面滚动
		closeBtn:关闭按钮对象
		interval:每帧动画时间间隔
		dastance:弹出层缓动距离
		configuration:自定义模板 在这个参数里面 {%title%}代表变量 标题内容,{%content%}代表变量内容部分
		title:自定义模板 {%title%} 部分默认内容
		content:自定义模板 {%content%} 部分默认内容
	}
 * jnPopup().setOption(option) 属性设置
 
 * jnPopup().popupShow(callback) 图层显示
   -callback 回调函数，图层显示结束之后调用的函数
   
 * jnPopup().popupHide(callback) 图层隐藏
   -callback 回调函数，图层隐藏结束之后调用的函数
 * ---------------------------------------------------------------
	example
	完整版:
	var data = "";
	data+= '<div class="popup_box" id="popup_box">';
	data+= '<div class="popup_box_head">';
	data+= '<h3 class="h_tl">{%title%}</h3>';
	data+= '<a href="javascript:;" class="close" id="popup_close">CLOSE</a>';
	data+= '</div>';
	data+= '<div class="popup_box_content">{%content%}</div>';
	data+= '</div>';
	
	var myPopup = new jnPopup({
		withBg:true,
		bgColor:"#000",
		bgOpacity:0.5,
		zIndex:10000,
		transition:200,
		isFixed:true,
		interval:20,
		dastance:20,
		closeBtn:"#popup_close",
		moveArea:"#popup_box",
		configuration:data,
		title:"温馨提示",
		content:"",
		variable:null
	});
	myPopup.init();
	
	调用方法:
	myPopup.popupShow({
		title:"温馨提示",
		content:"hello jackNEss",
		callback:function(){alert("data loaded")}
	});
	
	
	myPopup.popupHide(callback);
	
 * ---------------------------------------------------------------
 * power by jackNEss
 * date: 2011-12-14
 * ver 1.0
 */

var jnPopup = function(){
	//参数设置 start
	var option = {
		
		//是否带背景(背景暗下来)
		withBg:false,
		
		//背景颜色
		bgColor:"#000",
		
		//背景透明度
		bgOpacity:0.5,
		
		//背景id
		bg_id:"jackness_bg" + Math.random(0,999),
		
		//区域深度
		zIndex:10000,
		
		//触发移动功能对象
		moveArea:null,
		
		//动画缓动
		transition:200,
		
		//是否随页面滚动
		isFixed:true,
		
		//关闭按钮对象
		closeBtn:null,
		
		//自定义模板
		configuration:"",
		
		//自定义模板 {%title%} 部分默认内容
		title:"",
		
		//自定义模板 {%content%} 部分默认内容
		content:"",
		
		//其他自定义模板
		variable:null,
		
		//每帧动画时间间隔
		interval:40,
		
		screenLeft:0,
		
		screenTop:0,
		
		//弹出层缓动距离
		dastance:20
	}
	//参数设置  end
	
	
	var _outset;
	var _bg;
	var _op;
	var _screenLeft, _screenTop;
	var _resizeKey,scrollkey;
	var dc = document;
	
	arguments[0]?_op = arguments[0]:"";
	
	function getCssValue(elm,attribute){
		try{
			return	elm.currentStyle?elm.currentStyle[attribute]:document.defaultView.getComputedStyle(elm,false)[attribute];
		}
		catch(e){
			return false;
		}	
	}
	
	function addEvent(elm,type,func){
		if(elm.attachEvent){
			elm.attachEvent("on" + type,_addEvent);
		}
		else if(elm.addEventListener){
			elm.addEventListener(type,_addEvent,false);
		}
		
		function _addEvent(e){
			func.call(elm,e);
		}
		
		return _addEvent;
	}
	
	function removeEvent(elm,type,func){
		if(elm.detachEvent){
			elm.detachEvent("on" + type,func);
		}
		else if(elm.removeEventListener){
			elm.removeEventListener(type,func,false);
		}
	}
	
	
	function isIE6(){
		if(window.XMLHttpRequest){
			return false;
		}
		else{
			return true;
		}
	}
	
	function easy_switch(elm){
		if(typeof elm == "string"){
			var strs = elm.split(" ");
			var targetElements = [document.body];
			for(var i = 0; i < strs.length; i++){
				if(!targetElements){return false;}
				var flagGroups = new Array();
				
				for(var j = 0; j < targetElements.length; j++ ){
					
					var datasource = typeSwitcher(targetElements[j],strs[i]);
					if(!datasource){return false;}
					if(!datasource.length){
						if(datasource){
							flagGroups.push(datasource);
						}
					}
					else{
						
						for(var k = 0; k < datasource.length; k++){
							if(datasource[k]){
								flagGroups.push(datasource[k])
							}
						}	
					}
					
				}
				targetElements = flagGroups;
			}
			if(targetElements.length ==1){return targetElements[0]}
			else {return targetElements;}
		}
		else{
			return elm;	
		}
		function typeSwitcher(elm,str){
			
			if(str.substring(0,1) == "#"){
				return document.getElementById( str.substring(1,str.length) )	
			}
			else if(str.substring(0,1) == "."){
				var flag = elm.getElementsByTagName("*");
				var results = [];
				var classStr = str.substring(1,str.length);
				var classNames;
				for(var i = 0; i < flag.length; i++ ){
					classNames = flag[i].className.split(" ");
					
					for( var j = 0; j < classNames.length; j++ ){
						if( classStr == classNames[j] ){
							results.push(flag[i]);	
						}
					}
				}
				return results;
			}
			else{
				var result = elm.getElementsByTagName(str)	
				if(result.length >0){
					return result;	
				}
				else{
					return false;	
				}
			}
		}
	}

	//获取对象位置,返回x,y值 第2个参数传递要捕获的document 有可能是 iframe 的父级页面
	function getElmPosition(elm){
		var contentDocument = document;
		arguments[1]? contentDocument = arguments[1]:"";
		var _x = elm.offsetLeft;
		var _y = elm.offsetTop;
		
		if(getCssValue(elm,"position") == "fixed"){
			
			_x += contentDocument.documentElement.scrollLeft||contentDocument.body.scrollLeft;
			_y += contentDocument.documentElement.scrollTop||contentDocument.body.scrollTop;
			 	
		}
		
		while(elm = elm.offsetParent){
			_x += elm.offsetLeft||0;
			_y += elm.offsetTop||0;
		}
		return{
			x:_x,
			y:_y	
		}	
	}

	//惯性运动
	function inertia_Motion(So,St,T){
		var S = Math.abs(St - So);
		var a = S/Math.pow(T/2,2);
		var Vt = a*T/4;
		
		
		return{
			Sn:function(Tn){
				var _Sn;
				Tn < T/2?(
					_Sn = So + a*Math.pow(Tn,2)/2 * ( parseInt( (St - So)/Math.abs(St - So) )||0 )
				):(
					Tn < T?(
						_Sn = So +  ( a*Math.pow(T/2,2)  - a*Math.pow(T - Tn,2)/2 )*( parseInt( (St - So)/Math.abs(St - So) )||0 )
					):(
						_Sn =  St
					)
				);
				
				return _Sn;
			},
			Vn:function(Tn){
				var _Vn;
				Tn < T/2?(
					_Vn = a*Tn/2
				):(
					Tn < T?(
						_Vn = Vt - a*(Tn - T/2)/2
					):(
						_Vn = 0
					)
				);
				return _Vn;
			}	
		}
	}

	function areaReset(){
		
		// _outset reset
		_outset = dc.createElement("outset");
		_outset.style.cssText = "position:" + (option.isFixed && !isIE6()?"fixed":"absolute") + "; left:0; top:0; z-index:" + ( option.zIndex + 1 ) + "; display:none;";
		
		dc.body.appendChild(_outset);
		
	}
	
	//淡入
	function slideFadeIn(elm,op,callback){
		
		!op.interval?op.interval = 20:"";
		!op.transition?op.transition = 300:"";
		!op.distance?op.distance = 20:"";
		!op.screenTop?op.screenTop = 0:"";
		!op.screenLeft?op.screenLeft = 0:"";
		
		
		elm.style.display = "block";
		
		var elm_offsetWidth = elm.offsetWidth;
		var elm_offsetHeight = elm.offsetHeight;
		
		op.screenLeft = (dc.documentElement.clientWidth - elm_offsetWidth)/2;
		op.screenTop = (dc.documentElement.clientHeight - elm_offsetHeight)/2;
		
		if(!op.isFixed){
			op.screenLeft += (dc.documentElement.scrollLeft||dc.body.scrollLeft);
			op.screenTop += (dc.documentElement.scrollTop||dc.body.scrollTop);
		}
		
		
		var elm_style = elm.style;
		elm_style.filter = "alpha(opacity=0)";
		elm_style.opacity = 0;
		
		var T = op.transition/op.interval;
		var Tn = 0;
		var opacity_So = 0; 
		var opacity_St = 100;
		var opacity_Sn = 0;
		var screenTop_So = op.screenTop + op.distance;
		var screenTop_St = op.screenTop;
		var screenTop_Sn = op.screenTop + op.distance;
		
		(function slideFadeInEvent(){
			Tn < T?(
				opacity_Sn = parseInt(inertia_Motion(opacity_So,opacity_St,T).Sn(Tn)),
				screenTop_Sn = inertia_Motion(screenTop_So,screenTop_St,T).Sn(Tn),
				op.screenTop = screenTop_Sn,
				
				elm_style.filter = "alpha(opacity=" + opacity_Sn + ")",
				elm_style.opacity = opacity_Sn/100,
				positionFix(elm,screenTop_Sn,op.screenLeft,op.isFixed),
				
				Tn++,
				setTimeout(slideFadeInEvent,op.interval)
			):(
				elm_style.filter ="",
				elm_style.opacity = opacity_St/100,
				op.screenTop = screenTop_St,
				positionFix(elm,screenTop_St,op.screenLeft,op.isFixed),
				
				typeof callback == "Function"? callback():""
			);
		})();
		
	}
	
	//淡出
	function slideFadeOut(elm,op,callback){
		
		!op.interval?op.interval = 20:"";
		!op.transition?op.transition = 300:"";
		!op.distance?op.distance = 20:"";
		!op.screenTop?op.screenTop = 0:"";
		!op.screenLeft?op.screenLeft = 0:"";
		
		elm.style.display = "block";
		
		var elm_offsetWidth = elm.offsetWidth;
		var elm_offsetHeight = elm.offsetHeight;
		
		var elm_style = elm.style;
		elm_style.filter = "alpha(opacity=100)";
		elm_style.opacity = 1;
		
		var T = op.transition/op.interval;
		var Tn = 0;
		var opacity_So = 100; 
		var opacity_St = 0;
		var opacity_Sn = 100;
		var screenTop_So = op.screenTop;
		var screenTop_St = op.screenTop + op.distance;
		var screenTop_Sn = op.screenTop;
		
		(function slideFadeOutEvent(){
			Tn < T?(
				opacity_Sn = parseInt(inertia_Motion(opacity_So,opacity_St,T).Sn(Tn)),
				screenTop_Sn = inertia_Motion(screenTop_So,screenTop_St,T).Sn(Tn),
				op.screenTop = screenTop_Sn,
				
				elm_style.filter = "alpha(opacity=" + opacity_Sn + ")",
				elm_style.opacity = opacity_Sn/100,
				positionFix(elm,screenTop_Sn,op.screenLeft,op.isFixed),
				
				Tn++,
				setTimeout(slideFadeOutEvent,op.interval)
			):(
				elm_style.display = "none",
				elm_style.filter ="",
				elm_style.opacity = opacity_St/100,
				op.screenTop = screenTop_St,
				positionFix(elm,screenTop_St,op.screenLeft,op.isFixed),
				typeof callback == "Function"? callback():""
			);
		})();
		
	}
	
	//位置调整
	function positionFix(elm,screenTop,screenLeft,isFixed){
		
		var elm_offsetWidth = elm.offsetWidth;
		var elm_offsetHeight = elm.offsetHeight;
		
		var elm_allowWidth,elm_allowHeight;
		
		if(isFixed){
			
			elm_allowWidth = dc.documentElement.clientWidth;
			elm_allowHeight = dc.documentElement.clientHeight;
		
		}
		else{
		
			elm_allowWidth = dc.documentElement.scrollWidth;
			elm_allowHeight = dc.documentElement.scrollHeight;
			
		}
		
		screenTop > elm_allowHeight - elm_offsetHeight?(
			screenTop = elm_allowHeight - elm_offsetHeight
		):"";
		screenTop < 0? screenTop = 0:"";
		
		
		screenLeft > elm_allowWidth - elm_offsetWidth?(
			screenLeft = elm_allowWidth - elm_offsetWidth
		):"";
		screenLeft < 0? screenLeft = 0:"";
		
		/*-- ~>_<~ 污染我吧 --*/
		option.screenLeft = screenLeft;
		option.screenTop = screenTop;
		/*--//~>_<~ 污染我吧--*/
		
		var elm_style = elm.style;
		
		(isIE6() && isFixed)?(
			elm_style.top = (dc.body.scrollTop||dc.documentElement.scrollTop) + screenTop + "px",
			elm_style.left = (dc.body.scrollLeft||dc.documentElement.scrollLeft) + screenLeft + "px"
		):(
			elm_style.top = screenTop + "px",
			elm_style.left = screenLeft + "px"
		);
	}
	
	//背景显示
	function bgShow(){
		if(!_bg){
			_bg = dc.createElement("div");
			_bg.id = option.bg_id;
			_bg.style.cssText = "position:absolute; left:0; top:0; z-index:" + option.zIndex + "; width:100%; height:" + dc.body.scrollHeight + "px; background:" + option.bgColor + "; opacity:" + option.bgOpacity + ";filter:alpha(opacity=" + ( option.bgOpacity*100 ) +");";
			
		}
		dc.body.appendChild(_bg);
	}
	
	//背景隐藏
	function bgRemove(){
		if(!_bg){ return;}
		dc.body.removeChild(_bg);
	}
	
	//拖拉事件
	function elmDragEvent(moveArea,target){
		
		
		//mouseDownEvent
		elmDragEvent.mousedownKey = addEvent(moveArea,"mousedown",function(e){
			e = e || window.event;
						
			var posX = e.clientX - option.screenLeft;
			var posY = e.clientY - option.screenTop;
			
			if(elmDragEvent.mousemoveKey){
				removeEvent(dc,"mousemove",elmDragEvent.mousemoveKey);
			}
			//mouseMoveEvent
			elmDragEvent.mousemoveKey = addEvent(dc,"mousemove",function(e){
				
				option.screenLeft = e.clientX - posX;
				option.screenTop = e.clientY - posY;
				
				positionFix(target,option.screenTop,option.screenLeft,option.isFixed);
				
				//禁止选择
				window.getSelection?(
					window.getSelection().removeAllRanges()
				):(
					document.selection.empty()
				);
			})
			
			//mouseUpEvent
			elmDragEvent.mouseupKey = addEvent(dc,"mouseup",function(){
				removeEvent(dc,"mousemove",elmDragEvent.mousemoveKey);
				removeEvent(dc,"mouseup",elmDragEvent.mouseupKey);
			})
			
		})
		
		
	}
	
	//添加改变浏览器大小时触发的事件
	function addResizeEvent(){
		var elm = _outset;
		var win = window;
		
		var elm_offsetWidth,elm_offsetHeight,elm_position;
		
		_resizeKey = addEvent(win,"resize",function(){
			if(!option.moveArea && option.isFixed){
				elm_offsetWidth = elm.offsetWidth;
				elm_offsetHeight = elm.offsetHeight;
				
				option.screenLeft = (dc.documentElement.clientWidth - elm_offsetWidth)/2;
				option.screenTop = (dc.documentElement.clientHeight - elm_offsetHeight)/2;
			}
			positionFix(elm,option.screenTop,option.screenLeft,option.isFixed);
			
			
		})
		
		if(!isIE6()){return;}
		_scrollKey = addEvent(win,"scroll",function(){
			positionFix(elm,option.screenTop,option.screenLeft,option.isFixed);
			
		})
	}
	
	//移除改变浏览器大小时触发的事件
	function removeResizeEvent(){
		var elm = _outset;
		var win = window;
		removeEvent(win,"resize",_resizeKey);
		if(!isIE6()){return;}
		removeEvent(win,"scroll",_scrollKey);
	}
	
	return{
		
		setOption:function(op){
			typeof op.withBg == "boolean"?option.withBg = op.withBg:"";
			typeof op.isIframe == "boolean"?option.isIframe = op.isIframe:"";
			typeof op.isFixed == "boolean"?option.isFixed = op.isFixed:"";
			
			op.bgColor?option.bgColor = op.bgColor:"";
			op.bgOpacity?option.bgOpacity = op.bgOpacity:"";
			op.zIndex?option.zIndex = op.zIndex:"";
			op.bg_id?option.bg_id = op.bg_id:"";
			op.configuration?option.configuration = op.configuration:"";
			op.variable?option.variable = op.variable:"";
			
			op.moveArea?option.moveArea = op.moveArea:"";
			op.closeBtn?option.closeBtn = op.closeBtn:"";
			
			op.transition?option.transition = parseInt(op.transition):"";
			op.interval?option.interval = parseInt(op.interval):"";
			op.distance?option.distance = parseInt(op.distance):"";
			
			return this;
		},
		
		popupShow:function(op){
			if(op instanceof Object){
				op.title = op.title || option.title;
				op.content = op.content || option.content;
				op.callback = op.callback || "";
			}
			else{
				op = {
					title:option.title,
					content:option.content,
					callback:""
				}
			}
			
			if(option.withBg){
				bgShow();
			}
			
			var innerHTMLStr = option.configuration.split(/{%[ ]*title[ ]*%}/).join(op.title||"").split(/{%[ ]*content[ ]*%}/).join(op.content||"");
			
			//自定义变量替换
			if( op.variable instanceof Object){
				var reg = new RegExp();
				for(var key in op.variable){
					if(op.variable.hasOwnProperty(key)){
						reg.compile("{%[ ]*" + key + "[ ]*%}");
						innerHTMLStr = innerHTMLStr.split(reg).join(op.variable[key]||"");
					}
				}
			}
			innerHTMLStr = innerHTMLStr.replace(/{%[^({%)]*%}/ig,"");
			_outset.innerHTML = innerHTMLStr;
			
			slideFadeIn(_outset,option,op.callback);
			
			//绑定 关闭按钮事件
			var closeBtn = easy_switch(option.closeBtn);
			if(closeBtn){
				addEvent(closeBtn,"click",this.popupHide)
			}
			
			//绑定 移动区块事件
			var moveArea = easy_switch(option.moveArea);
			if(moveArea){
				elmDragEvent(moveArea,_outset);
			}
			
			addResizeEvent();
			return this;
		},
		
		popupHide:function(callback){
			if(option.withBg){
				bgRemove();
			}
			slideFadeOut(_outset,option,callback);
			removeResizeEvent();
			return this;
		},
		
		init:function(){
			if(_op){ this.setOption(_op);}
			areaReset();
			return this;
			
		}
	}
}