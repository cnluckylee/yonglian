/**
*	首页专业js文件
*
*
*/
//
function $$(id)
{
	return document.getElementById(id);
}
//登录用户类型
function index_choose_login_type(type)
{
	if(type == 1)
	{
		$("#depart").show();
	}else{
		$("#depart").hide();
	}
	
}

//跳转到注册页面
function index_jump_register()
{
	window.location.href="register.html";
}

//首页登录提交表单
function index_login_form_submit()
{
	$("#form1").submit();
	window.location.href="main.html";
}