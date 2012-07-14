var editorDescription = null;
var upload_html = null;
var treeSetting = {
			check: {
				enable: true,
				chkboxType: { "Y" : "ps", "N" : "ps" }
			},
			data: {
				simpleData: {
					enable: true
				}
			}
		};
$(document).ready(function(){
	/*===============================================================================
	布局
	*/
	var layout = {
		//pane打开时，当鼠标移动到边框上按钮上，显示的提示语  
		defaults: {
			spacing_open:            2,
			togglerTip_open: "关闭",
			togglerTip_closed: "打开"
			
		},
		south: {
			size:                    47, //高度
			spacing_open:            0,
			//pane关闭时，当鼠标移动到边框上按钮上，显示的提示语
			sliderTip: "显示/隐藏侧边栏",
			//在某个Pane隐藏后，当鼠标移到边框上显示的提示语。 
			spacing_open: 0,
			//边框的间隙  
			spacing_closed: 60
		//关闭时边框的间隙 
		},
		west: {
			spacing_open:            0,
			spacing_closed: 0,
			slidable: false,
			size:                    80//高度
			//initHidden:       true
		}
		
	};
	var $mainLayout = $('body').layout(layout);
	
	/**
	 * 工具栏
	 */
	$('#closLeftBut').click(function(){
		if($mainLayout.state['west'].isClosed || $mainLayout.state['west'].isHiding) {
			$mainLayout.show('west');
			$mainLayout.open('west');
			$(this).find('span').html('打开右侧');
		} else {
			$mainLayout.hide('west');
			$(this).find('span').html('关闭右侧');
		}
		
	});
	/**
	 * 上架
	 */
	$('#sale_status').click(function(){
		if(!$(this).attr('checked')) return true;
		if($('#productsList tbody').find('.saleStatusTd').find(":input:checked").size()<=0) {
			alert('请设置上架货品！');
			return false;
		}
	});
	/**
		左侧菜单
	**/
	$('.tabs').hide();
	$('#'+$('.left_menu_accordion_menu_item_current').attr('tabs')).show();
	
	$('.left_menu_accordion_menu_item').click(function() {
		$('.tabs').hide();
		$('#'+$(this).attr('tabs')).show();
		
		if($(this).attr('tabs') == 'tabs_3') {
			/**
			*编辑器
			*/
		
			if(editorDescription == null) {
				editorDescription = new baidu.editor.ui.Editor();
				editorDescription.render('description');				
			}
			editorDescription.setHeight($('.ui-layout-center').height()-$('#description').find('.edui-editor-toolbarbox').height()-$('#description').find('.edui-editor-bottomContainer').height()-2);
			
		} else if($(this).attr('tabs') == 'tabs_5') {
			if(upload_html == null && $('#upform').html() != '') {
				upload_html = $('#upform').html();
				$('#upform').empty();
			} 
		}

		if($(this).attr('state') == 'current') return;
		$('.left_menu_accordion_menu_item').removeClass("left_menu_accordion_menu_item_current");
		$('.left_menu_accordion_menu_item').attr('state','');
		$(this).addClass("left_menu_accordion_menu_item_current");
		$(this).attr('state','current');
		
		
	});
	 $('.left_menu_accordion_menu_item').hover(
	  function () {
		if($(this).attr('state') != 'current') {
			$(this).addClass("left_menu_accordion_menu_item_current");
		}
	  },
	  function () {
		  if($(this).attr('state') != 'current') {
			$(this).removeClass("left_menu_accordion_menu_item_current");
		  }
	  }
	);
	
	
	
	
	//分类
	categoryTreeSetting = treeSetting;
	categoryTreeSetting.callback = {
		onClick: function(event, treeId, treeNode){
			
			if(!treeNode.checked) {
				CategoryTreeObj.checkNode(treeNode, true, true);
			}
			$('#category_id').val(treeNode.id);
			
		}
	}
	
	var CategoryTreeObj = $.fn.zTree.init($("#categorytree"), categoryTreeSetting, categoryNodes);
	if($('#category_id').val() != '') {
		node = CategoryTreeObj.getNodeByParam("id", $('#category_id').val(), null);
		if(node != null) {
			if(!node.checked) {
				CategoryTreeObj.checkNode(node, true, true);
			}
			CategoryTreeObj.selectNode(node);
		} else {
			$('#category_id').val('');
		}
		
	}
	//规格
	var SpecTreeObj = null;
	var SpecTreeSetting = treeSetting;
	var addSpec = function(specNodes) {
		$.each( specNodes, function(i, spec){
			
			if($('.spec_'+spec.id).length == 0 && spec.nodetype == 'spec') {
				$('#productsList thead').find('.tabletop').find('.priceTd').before('<th class="spec_'+spec.id+'">'+spec.name+'</th>');
				
				html = '<td class="spec_'+spec.id+'"><input type="text" class="spec_val_input" name="product[_index_][spec]['
				+ spec.id
				+']"  value="" disabled="disabled" /><div class="select_spec_val" spicid="'+spec.id+'"><span>请选择</span></div></td>';
				$('#productsList thead').find('.productTemplate').find('.priceTd').before(html);
				
				
				var trs = $('#productsList tbody').find('tr');
				
				$.each(trs, function(i,n){
					html = '';
					pid = $(n).attr('product_id');
					if(pid) {
						 html = '<td class="spec_'+spec.id+'"><input type="text" class="spec_val_input" name="product['+pid+'][spec]['
						+ spec.id
						+']"  value="" /><div class="select_spec_val" spicid="'+spec.id+'"><span>请选择</span></div></td>';
					} else {
						 html = '<td class="spec_'+spec.id+'"><input type="text" class="spec_val_input" name="product['+i+'][spec]['
						+ spec.id
						+']"  value="" /><div class="select_spec_val" spicid="'+spec.id+'"><span>请选择</span></div></td>';
					}
						$(n).find('.priceTd').before(html);
				});
			} else if(spec.nodetype == 'val') {
				specs[spec.pId].vals[spec.id].enabled = true;
			}
		});
		
	};
	var delSpec = function(specNodes) {
		$.each( specNodes, function(i, spec){
			if(spec.nodetype == 'spec')
				$('#productsList').find(".spec_"+spec.id).remove();
			else if(spec.nodetype == 'val')
				specs[spec.pId].vals[spec.id].enabled = false;
		});
	};
	
	SpecTreeSetting.callback = {
		beforeCheck: function(treeId, treeNode) {
			var isdel = false;
			if(treeNode.nodetype == 'spec') {
				$.each(specs[treeNode.id].vals, function(i, n) {
					if(n.enabled) isdel = true;
				});
				if(isdel) alert('规格正在使用不可取消！');
			} else if(treeNode.nodetype == 'val') {
				inputs = $('#productsList').find('.spec_'+treeNode.pId).find(':input');
				var inputsNodeVal = treeNode.id;
				$.each(inputs, function(i, n) {
					if($(n).val() == inputsNodeVal) isdel = true;
				});
				if(isdel) alert('在使用不可取消！');
			}
			if(isdel) return false;
		},
		onCheck: function(event, treeId, treeNode) {
			addSpec(SpecTreeObj.getCheckedNodes(true));
			delSpec(SpecTreeObj.getCheckedNodes(false));
		}
	};
	
	
	$("#spectree").height($(".ui-layout-pane-center").height()-90);
	$.each( specs, function(i, spec){
		spec.nodetype = 'spec';
		specNodes[specNodes.length] = spec;
		if(spec.vals != null) {
			$.each( spec.vals, function(i, val){
				val.nodetype = 'val';
				if(val.image != null)
					val.icon = BASE_URL+'/Uploads/Spec/'+val.image;
				specNodes[specNodes.length] = val;
			});
		}
	});
	
	SpecTreeObj = $.fn.zTree.init($("#spectree"), SpecTreeSetting, specNodes);
	
		/** 选择规格 **/
		
		//获取货品规格值字符串
		var getTrSpecVal = function(tr) {
			divs = $(tr).find('div');
			var vals = [];
			$.each(divs, function(i, n) {
				
				if($(n).parent().find(':input').val() != '') {
					tmpArr = [];
					tmpArr[0] = $(n).attr('spicid');
					tmpArr[1] = $(n).parent().find(':input').val();
					vals[i] = tmpArr.join("|");
				}
			});
			return vals.join(",");
		};
		//验证值是否可以使用
		var verifySpecVal = function(str, specid, vid) {
			
			var count = 0;
			specDivs = $('#productsList thead').find('.productTemplate').find('div');
			$.each(specDivs, function(i, n){
				
				var spec_id = $(n).attr('spicid');
				var spec_vals = specs[spec_id].vals;
				if(!$.isEmptyObject(specs[spec_id]) && spec_id != specid) {
					var spec_vals = specs[spec_id].vals;
					var specValCount = 0;
					$.each(spec_vals, function(i, n){
						if(n.enabled) {
							specValCount++;
						}
					});
					if(count == 0) 
						count = specValCount;
					else
						count = count*specValCount;
				}
			}); 
			//$('.title').find('th').html(count);
			//alert($('#productsList tbody').find(':input[value="'+specid+'"]').length);
			if(count != 0 && $('#productsList tbody').find(':input[value="'+vid+'"]').length >= count) return false;
			
			valStrs = [];
			trs = $('#productsList tbody tr');
			$.each(trs, function(i, n){
				valStrs[i] = $(n).attr('valstr');
			});
			//alert(str);
			//alert($.inArray(str,valStrs));
			return $.inArray(str,valStrs) == -1?true:false;
		};
		$('.select_spec_val span').live({
			'click': function() {
					var spec_id = $(this).parent().attr('spicid');
					$(this).parent().find('ul').remove();
					var html = '<ul style=" position: absolute">';
					if($.isEmptyObject(specs[spec_id])) return false;
					var spec_vals = specs[spec_id].vals;
					var divs = $(this).parent().parent().parent().find('div');
					
					var divIndex = 0;
					var vals = [];
					$.each(divs, function(i,n){	
						if($(n).parent().attr('class') == 'spec_'+spec_id) {
							divIndex = i;
						} else {
							if($(n).parent().find(':input').val()) {
								tmpArr = [];
								tmpArr[0] = $(n).attr('spicid');
								tmpArr[1] = $(n).parent().find(':input').val();
								vals[i] = tmpArr.join("|");
							}
						}
					});
					//alert(vals);
					$.each(spec_vals, function(i, n){
						if(n.enabled) {
							vals[divIndex] = spec_id+'|'+n.id;
							
							if(verifySpecVal(vals.join(','), spec_id, n.id)) {
								if(n.image == null)
									html += '<li valid="'+n.id+'">'+n.name+'</li>';
								else
									html += '<li valid="'+n.id+'" class="val_img_li"><img title="'+n.name+'" src="'+BASE_URL+'/Uploads/Spec/'+n.image+'"  width="30" height="30" />';
							}
						}
					});
					if($(html).find('li').length>0)
						html += '<li valid="">取消选择</li>';
					else 
						html += '<li valid="">无规格项</li>';
					html += '</ul>';
					
						$(this).parent().append(html);
				}
		});
		
		$('.select_spec_val').live({
			'mouseleave' : function() {
				$(this).find('ul').remove();
			}
		});
		$('.select_spec_val li').live({
			'click' : function(){
				
				$(this).parent().parent().parent().find(":input").val($(this).attr('valid'));
				if($(this).attr('valid') == "") {
					$(this).parent().parent().find('span').html('请选择');
					$(this).parent().parent().removeClass('select_spec_val_img');
				} else {
					$(this).parent().parent().find('span').html($(this).html());
					if($(this).find('img').length) $(this).parent().parent().addClass('select_spec_val_img');
				}
				$(this).parent().parent().parent().parent().attr('valStr',getTrSpecVal($(this).parent().parent().parent().parent(), null));
				$(this).parent().parent().find('ul').remove();
				
			}
		});
		/** 添加货品 **/
		$('#addProduct').click(function(){
			var specDivs = $('#productsList thead').find('.productTemplate').find('div');
			var maxProductCount = 0;
			$.each(specDivs, function(i, n){
				var spec_id = $(n).attr('spicid');
				
				var spec_vals = specs[spec_id].vals;
				if($.isEmptyObject(specs[spec_id])) return false;
				var spec_vals = specs[spec_id].vals;
				var specValCount = 0;
				$.each(spec_vals, function(i, n){
					if(n.enabled) {
						specValCount++;
					}
				});
				if(maxProductCount == 0) 
					maxProductCount = specValCount;
				else
					maxProductCount = maxProductCount*specValCount;
			}); 
			if($('#productsList tbody').find('tr').length >=  maxProductCount) { alert('已到达货品上限！'); return false;};
			html = $('#productsList thead').find('.productTemplate').html();
			html = html.replace(/_index_/g, $('#productsList tbody').find('tr').length);
			$('#productsList tbody').append('<tr>'+ html +'</tr>');
			$('#productsList tbody').find('tr').last().find(':input').attr('disabled', false);
			
		});
		/* 删除货品 */
		$("#productsList").find('.del').live('click',function(){
			var $this = $(this);
			if($("#productsList tbody tr::visible").size() <= 1) {
				alert('该商品不能删除！');
				return false;
			}
			affirm = confirm($(this).attr('msg'));
			if(affirm) {
				if($this.parent().parent().attr('product_id')) {
					
					$this.parent().append('<input type="checkbox" value="true" checked="checked" name="product['+$this.parent().parent().attr('product_id')+'][del]">');
					$this.parent().parent().hide();
				} else {
					$this.parent().parent().remove();
				}
				
			}
			setSaleStatus();
			return false;
		});
		var setProductHtml = null;
		/* 批量设置商品 */
		$('#setProduct').click(function(){
			if(setProductHtml == null) {
				setProductHtml = $('#setProductDiv').html();
			}
		
			var dialog = art.dialog({
				title: '批量设置',
				content: setProductHtml,
				padding: 0,
				ok: function () {
					var setall = false;
					
					if($("#setProductTable").find("[name='setProductAll']:checked").size() > 0)
						setall = true;
					
					inputs = $('#setProductTable').find(":input");
					$.each(inputs, function(i, n){
						val = $(n).val();
						if(val != '') {
							name = $(n).attr('name');
							if( name == 'price') {
								if(setall)
									$('.priceTd').find(":input").val(val);
								else
									$('.priceTd').find(":input[value='']").val(val);
							} else if(name == 'inventory') {
								//$('.inventoryTd').find(":input").val(val);
								if(setall)
									$('.inventoryTd').find(":input").val(val);
								else
									$('.inventoryTd').find(":input[value='']").val(val);
							}
						}
					});
					
					
					
					return false;
				},
				okValue: '设置',
				lock: true,
				cancelValue: '关闭',
				cancel: true
			});
		});
		/* 上下架货品 */
		var setSaleStatus = function() {
			if($('#productsList tbody').find('.saleStatusTd').find(":input:checked").size()<=0) {
				$('#sale_status').attr('checked', false);
			}
		};
		$('#productsList tbody').find('.saleStatusTd').find(":input").live('click',setSaleStatus);
		/** 验证货品 **/
		$('#productsList tbody tr').live('mouseleave', function(){
				inputs = $(this).find(':text');
				var error = false;
				var $this = this;
				$.each(inputs, function(k, v){
					if($(v).val() == '') {
						error = true;
					}
				});	
				if(error)
					$($this).addClass('error');
				else
					$($this).removeClass('error');
		});
		var verifyProducts = function() {
			var error = false;
			var trs = $('#productsList tbody tr');
			$.each(trs, function(i, n){
				inputs = $(n).find(':text');
				$.each(inputs, function(k, v){
					if($(v).val() == '') {
						error = true;
						$(n).addClass('error');
					}
				});
			});
			return error;
		}
	/**
	* 相册
	*/
	$('#addPicBut').click(function(){
		var dialog = art.dialog({
			title: '上传图片',
			content: upload_html,
			initialize: upload_dialog_initialize,
			padding: 0,
			cancelValue: '关闭',
			cancel: true
		});
	});
	$('#piclist li').live({
		mouseenter:function () {
				$(this).addClass('hover');
				var NewLine = "\n";
				var html = "";
				html+="<div imgid=\""+ $(this).attr('imgid') +"\">"+NewLine;
				html+="<a href=\"javascript:void(0);\" imgid=\""+ $(this).attr('imgid') +"\"  atction=\"set\">默认</a>"+NewLine;
				html+="<a href=\"javascript:void(0);\" imgid=\""+ $(this).attr('imgid') +"\" imgname=\""+ $(this).attr('imgname') +"\" atction=\"del\">删除</a>"+NewLine;
				html+="</div>";
				$(this).append(html);
			},
		mouseleave: function () {
				$(this).removeClass("hover");
				$(this).find('div').remove();
				//$(this).removeAttr('title');
			}
	});
	$('#piclist li a').live('click', function() {
		atction = $(this).attr('atction');
		imgid = $(this).attr('imgid');
		
		switch (atction) {
			case "del":
				var li = $(this).parent().parent();
				if(confirm('确定删除！')) {
					
					if($('#imgdefault').val() == imgid) {
						$('#imgdefault').val('');
						
						li.removeClass('select');
					}
					
					$.post(_URL_+'/imageDel',{'id': $(this).attr('imgid'),'imgname':$(this).attr('imgname')}, function(data){
						if(data == 'success') {
							
							li.remove();
						} else {
							alert('删除错误！');
						}
					});
					
				}
				break;
			case "set":
				$('#imgdefault').val(imgid);
				$(this).parent().parent().parent().find('li').removeClass('select');
				$(this).parent().parent().addClass('select');
				break;
		};
	});
	//alert($.parseJSON('{"url":"d/1/4f869b6d290ca.jpg","title":"","state":"SUCCESS"}'));
	/**
	** 表单验证
	**/
  	$.formValidator.initConfig({theme:'ArrowSolidBox',formID:"goods_form",onError:function(){alert("校验没有通过，具体错误请看错误提示")},onSuccess:function(){		
				/* 验证规格 */
				if(verifyProducts()) {
					alert('货品信息不完整！');
					return false;
				}
				/** 验证图片 **/
				if($('#piclist li').size() <= 0) {
					alert('情上传相册！');
					return false;
				}
				if(editorDescription != null) {
						editorDescription.sync();			
					}
					var formData = $('#goods_form').formSerialize();
					nodes = CategoryTreeObj.getCheckedNodes(true);
					$.each( nodes, function(i, n){
						formData += '&categorys['+i+']='+n.id;
					});
					
					
					
					$.post($('#goods_form').attr('action'), formData,
					   function(data){
							if(!data.status) 
								alert(data.info);
							else if(data.status) {
								window.opener.location.reload();
								window.close();
							}
					   },"json");
				/*$('#goods_form').ajaxSubmit({ 
					dataType:'json',
					data: {'categorys': CategoryTreeObj.getCheckedNodes(true)},
					success:   function processJson(data) { 
						if(!data.status) 
							alert(data.info);
						else if(data.status) {
							window.opener.location.reload();
							window.close();
						}
					}
				});*/
				return false;
			
		}});
	
	$('#name').formValidator({onShow:"请输入商品名称！",onFocus:"商品名至少4个字符2个汉字,最多80个字符40个汉字",onCorrect:"输入正确！"}).inputValidator({min:4,max:80,onError:"你输入的商品名不合法,请确认"});
	
	$("#category_id").formValidator({onShow:"请选择主分类！",onCorrect:"已选择主分类！",onFocus:"请选择主分类！"}).regexValidator({regExp:"notempty",dataType:"enum",onError:"请选择主分类！"});
	
	
	/**
	 * 商品类型
	 */
	 var obType_id = '';
	 var attrLoadSuccess = function() {
		script = $('#goodsAttrScript').html();
		$('#goodsAttrScript').remove();
	 	eval(script);
	 };
	 var unTypeInput = function() {
	 	inputs = $('#goodsAttr').find(':input');
			var ids = [];
			var formId = '';
			$.each(inputs, function(i,n){
				formId = $(n).parents('form').attr('id');
				ids.push($(n).attr('id'));
			});
			
			$.each(validatorGroup_setting,function(i,n){
				if(formId == n.formID) {
					
					var tmpValidObjects = [];
					$.each(n.validObjects, function(k,v){
						if($.inArray(v.id, ids) == -1) {
							tmpValidObjects.push(v)
						}
					});
					validatorGroup_setting[i].validObjects = tmpValidObjects;
				}
			});
	 };
	 var loadType = function() {
		 var typeVal = $('#type_id').val();
		 if(typeVal == '') return false;
		 obType_id = typeVal;
		 url = '/attr/typeid/'+typeVal;
		
		 if($('#id').val() != '') url += '/goodsid/'+$('#id').val();
		 
		 $('#goodsAttr').load(_URL_+ url, attrLoadSuccess);
	 };
	 if($('#type_id').val() != '') loadType();
	 	
	 $('#type_id').change(function(){
		 var typeVal = $(this).val();
		 if(typeVal == '') {
		 	if(confirm('确定清空属性！')) {
				unTypeInput();
				$('#goodsAttr').empty();
			} else {
				$(this).val(obType_id);
				$(this).trigger("liszt:updated");
			}
			return false
		 };
		 if(typeVal != obType_id && obType_id != '')
		 	if(!confirm('确定更换类型！')) {
				$(this).val(obType_id);
				$(this).trigger("liszt:updated");
				return false;
			}
			unTypeInput();
			
			loadType();
	});
	
	//美化SELECT
	 $(".chzn-select").chosen({no_results_text: "没有匹配结果"});
});