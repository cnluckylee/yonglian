/**
*	��ҳרҵjs�ļ�
*
*
*/
//
function $$(id)
{
	return document.getElementById(id);
}
//��¼�û�����
function index_choose_login_type(type)
{
	if(type == 1)
	{
		$("#depart").show();
	}else{
		$("#depart").hide();
	}
	
}

//��ת��ע��ҳ��
function index_jump_register()
{
	window.location.href="register.html";
}

//��ҳ��¼�ύ��
function index_login_form_submit()
{
	$("#form1").submit();
	window.location.href="main.html";
}