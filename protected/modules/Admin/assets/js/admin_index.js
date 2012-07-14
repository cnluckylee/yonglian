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
		north: {
			size:                    82, //高度
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
			spacing_open:            6,
			spacing_closed: 6,
			slidable: false,
			size:                    180, //高度
			
			initHidden:       true
		},
		south: {
			size:                    20 //高度
		}
	};
  var $mainLayout = $('body').layout(layout);
 
  /**========================================================
  头部
  */
  $('.ui_heaber_nav_item').hover(
	  function () {
		if($(this).attr('state') != 'current') {
			$(this).addClass("ui_heaber_nav_item_current");
		}
	  },
	  function () {
		  if($(this).attr('state') != 'current') {
			$(this).removeClass("ui_heaber_nav_item_current");
		  }
	  }
	);
	
	$('.ui_heaber_nav_item').click(function(){
		if($(this).attr('state') == 'current') return;
		$('.ui_heaber_nav_item').removeClass("ui_heaber_nav_item_current");
		$('.ui_heaber_nav_item').attr('state','');
		$(this).addClass("ui_heaber_nav_item_current");
		
		$(this).attr('state','current');
		$('.left_menu_accordion').hide();
		$("#left_menu_"+$(this).find('a').attr('menuid')).show();
		//$("#left_menu_"+$(this).find('a').attr('menuid')).accordion.empty();
		$("#left_menu_"+$(this).find('a').attr('menuid')).accordion({ autoHeight: false });
		//alert($(this).find('a').attr('id'));
		if($(this).find('a').attr('id') == 'ui_heaber_nav_1') {
				$mainLayout.hide('west');
		} else {
			if($mainLayout.state['west'].isClosed || $mainLayout.state['west'].isHiding) {
				$mainLayout.show('west');
				$mainLayout.open('west');
				
				
			}
		}
	});
	
	/**
		左侧菜单
	**/
	
	$('.left_menu_accordion_menu_item').click(function() {
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
});