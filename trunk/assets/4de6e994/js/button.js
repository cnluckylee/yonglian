$.fn.button = function() {
	$(this).live('click', function() {
		var butType = $(this).attr('buttype');
		switch (butType) {
			case "submit":
				$(this).parents('form').submit();
				break;
			case "link":
				window.location.href = $(this).attr('url');
				break;
			case "back":
				history.go(-1);
				break; 
			case "close":
				window.close();
				break;
			
		}
		return false;
	});
}; 

$.fn.table = function() {
	var $this = $(this)
	//$(this).find('tbody tr').click();
	$(this).find('tbody tr').live({
		click:function(){
			if($(this).parent().parent().attr('clickSelect')!='false') {
				$(this).parent().parent().find('tbody tr').removeClass('select');
				$(this).parent().parent().find('tbody tr').removeAttr('select');
				$(this).toggleClass('select');
				$(this).attr('select', true);
			}
		},
		mouseenter:function () {
				if(!$(this).attr('select'))
					$(this).addClass("hover");
			},
		mouseleave: function () {
				$(this).removeClass("hover");
			}
	});
//	$(this).find('tfoot th').attr('colspan',$(this).find('tbody tr').last().find('td').length)
}

$.fn.dialogTable = function() {
	
	$(this).find('tbody tr').live({
		dblclick:function(){
			$('#'+$(this).parent().parent().attr('setid')).val($(this).attr('valid'));
			
			art.dialog.get('brand').close();
		},
		mouseenter:function () {
				$(this).attr('title', '双击选择');
			},
		mouseleave: function () {
				$(this).removeClass("title");
			}
	});
}