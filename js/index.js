/**
*	��ҳרҵjs�ļ�
*
*
*/

//��¼�û�����
function index_choose_login_type(type)
{
	if(type == 1)
	{
		$("#depart").show();
		$("#Picture_Carousel").css("margin-top","-260px");
	}else{
		$("#depart").hide();
		$("#Picture_Carousel").css("margin-top","-237px");
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