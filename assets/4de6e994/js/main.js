var isIframe = false;
var $artDialog = window.top.art;

$(document).ready(function(){
	var documentHeight = $(document).height();
	//判断是否被包含
	if(location.href != top.location.href) {
		isIframe = true;
	}
	if($('body').height() < documentHeight)	$('body').height($(document).height()-20);
	$(".button").button();
	$(".table_list").table();
	$('.d-dialog').find('.table_list').dialogTable();
});

function openwinx(url,name,w,h) {
	if(!w) w=screen.width-4;
	if(!h) h=screen.height-95;
	
    window.open(url,name,"top=100,left=400,width=" + w + ",height=" + h + ",toolbar=no,menubar=no,scrollbars=yes,resizable=yes,location=no,status=no");
}