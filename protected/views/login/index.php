
<style type="text/css">
<!--
/*网页属性*/
body,td,th {font-family:宋体;font-size:12px;color:#000000;background:#81C0C0}
/*头部定位*/
#EPH {position:absolute;left:0px;top:0px;width:%;height:%;z-index:1;}
/*反馈标题属性*/
#block2{height:23px;width:1130px;border:#ccc 0px solid;font-size:12px;text-align:right;background-color:#d0d0d0;margin-top:5px;}
#block2 ul{list-style:outside none none;height:17px;padding:3px 0;overflow:hidden;margin:0;width:1130px;}
/*标题分组*/
#block2 ul li{float:left;display:block;margin:2px 0;height:14px;width:24.9%;list-style:none}
#block2 ul li a{text-decoration:none;color:#000000;background-color:;}
#block2 ul li a:hover{color:blue;}
/*注册登录*/
ul, li {list-style:none;width:600px;color:#000000;}
.register {width:600px; margin:0 auto; line-height:25px; font-size:12px;}
h1 {text-align:center; margin-top:0px;background-color: #f0f0f0;}
#hot {position:relative; width:600px; margin: 0 auto; height:399px; margin-top:0px;background:#9999CC;border-bottom:2px solid #2828FF;border-top:1px dashed #000000;}
#hot h2 {display:block; float:left; width:70px; margin-right:5px; font-size:12px; font-weight:normal; text-align:center; cursor:default;color: blue;}
#hot .title_normal {background:#E0E0E0;}
#hot .title_current {background:#2a00aa; color:#FFF;}
#hot ul {position:absolute; left:0px; top:25px; width:590px; padding:8px 0 0 5px; border-top:3px solid #FF8000; font-size:14px
}
.STYLE1 {color:white;font-family: "宋体";font-weight: bold;font-size: 14px;}
/*流程属性*/
#flow {position:absolute;left:200px;top:5px;width:%;height:%;z-index:1;font-family: "华文中宋";font-size: 14px;color: #0000C6;
font-weight: bold;font-style: italic;}
-->
</style>

<script>//流程翻页控制
function setAab(name,cursel,n){
for(i=1;i<=n;i++){
var menu=document.getElementById(name+i);
var con=document.getElementById("con_"+name+"_"+i);
menu.className=i==cursel?"hover":"";
con.style.display=i==cursel?"block":"none";
}
}
</script>
<body>
<!--总框架开始-->
<div style="width:1130px; margin:0pt auto; position:relative; height:550px;border:0px solid #2828FF;">

<div style="width:1130px; margin:0pt auto; position:relative; height:5px;float:left;background:#2828FF;"></div><!--头部线-->
<!--反馈标题开始-->
<div style="width:1130px; margin:0pt auto; position:relative; height:35px;float:left;background:#ffffff;border:0px solid silver;">
<div id="block2">
<ul id="rolltxt">
<li><a href="">测试文字测试文字测试文字测试文字测试</a></li><!--字符最多18-->
<li><a href="">测试文字测试文字测试文字测试文字测试</a></li>
<li><a href="">测试文字测试文字测试文字测试文字测试</a></li>
<li><a href="">测试文字测试文字测试文字测试文字测试</a></li>
<li><a href="">测试文字测试文字</a></li>
<li><a href="">测试文字</a></li>
<li><a href="">测试文字</a></li>
<li><a href="">测试文字</a></li>
<li><a href="">测试文字测试文字</a></li>
<li><a href="">测试文字</a></li>
<li><a href="">测试文字</a></li>
<li><a href="">测试文字</a></li>
<li><a href="">测试文字测试文字</a></li>
<li><a href="">测试文字</a></li>
<li><a href="">测试文字</a></li>
<li><a href="">测试文字</a></li>
</ul>
</div>
<script type="text/javascript">
//反馈标题控制 
function extractNodes(pNode){
if(pNode.nodeType == 3)return null;
var node,nodes = new Array();
for(var i=0;node= pNode.childNodes[i];i++){
if(node.nodeType == 1)nodes.push(node);
	}
return nodes;
}
var obj=document.getElementById("rolltxt");
for(i=0;i<4;i++){
obj.appendChild(extractNodes(obj)[i].cloneNode(true));
}
settime=0;
var t=setInterval(rolltxt,50);
function rolltxt(){
if(obj.scrollTop % (obj.clientHeight-5) ==0){
settime+=1;
if(settime==50){
obj.scrollTop+=1;
settime=0;
		}
	}else{
obj.scrollTop+=1;
if(obj.scrollTop==(obj.scrollHeight-obj.clientHeight)){
obj.scrollTop=0;
		}
	}
}
obj.onmouseover=function(){clearInterval(t)}
obj.onmouseout=function(){t=setInterval(rolltxt,50)}
</script>
</div><!--反馈标题结束-->
<!--注册框开始-->
<div style="width:600px; margin:0pt auto; position:relative; height:415px;float:left;background:#ECF5FF;border:0px solid blue;">
<div class="register">
<div id="hot" >
<div id="pr1" onMouseOver="setAab('pr',1,10)"><h2>用户登录</h2></div>
<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'login-form',
	'enableClientValidation'=>true,

	'clientOptions'=>array(
		'validateOnSubmit'=>true,
		'focus'=>array($model,'username'),
		
	),
)); ?>
<ul><br />
<div align="center"> 
<li>

<?php echo $form->radioButtonList($model,'type', Users::$isType,array('separator'=>'')); ?>
</li><br />


<li><?php echo $form->labelEx($model,'用户名称'); ?>：<?php echo $form->textField($model,'username'); ?><?php echo $form->error($model,'username'); ?></li><br /> 
<li><?php echo $form->labelEx($model,'用户密码'); ?>：<?php echo $form->passwordField($model,'password'); ?><?php echo $form->error($model,'password'); ?></li><br /> 
<li>
		<?php echo $form->labelEx($model,'验证码'); ?>：
       
		<?php echo $form->textField($model,'verifyCode'); ?>
         <br /> 
		<?php $this->widget('CCaptcha', array('clickableImage'=>true,'showRefreshButton'=>true,'buttonLabel'=>'刷新验证码')); ?>
		<?php echo $form->error($model,'verifyCode'); ?>
		<?php echo $form->error($model,'state'); ?>
</li>

<li>
		<?php echo $form->checkBox($model,'rememberMe'); ?>
		<?php echo $form->label($model,'记住我'); ?>
		<?php echo $form->error($model,'rememberMe'); ?>
</li>		
        
<li><?php echo CHtml::submitButton('登录'); ?></li>
<?php $this->endWidget(); ?>
</div>
</ul>	
<div id="pr2" onMouseOver="setAab('pr',2,10)"><h2>企业注册</h2></div>
<ul><br />
<?php $userform=$this->beginWidget('CActiveForm', array(
	'id'=>'rSave-form',
	'enableClientValidation'=>true,
	

	'clientOptions'=>array(
		'validateOnSubmit'=>true,
		'focus'=>array($users,'companyname'),
		
	),
)); ?>
<div align="center">
<li><?php echo $userform->labelEx($users,'companyname'); ?>：<?php echo $userform->textField($users,'companyname'); ?><?php echo $userform->error($users,'companyname'); ?></li><br />
<li><?php echo $userform->labelEx($users,'linkuser'); ?>：<?php echo $userform->textField($users,'linkuser'); ?><?php echo $userform->error($users,'linkuser'); ?></li><br />
<li><?php echo $userform->labelEx($users,'tel'); ?>：<?php echo $userform->passwordField($users,'tel'); ?><?php echo $userform->error($users,'tel'); ?></li><br />
<li><?php echo $userform->labelEx($users,'mail'); ?>：<?php echo $userform->passwordField($users,'mail'); ?><?php echo $userform->error($users,'mail'); ?></li><br />
<li><?php echo $userform->labelEx($users,'website'); ?>：<?php echo $userform->passwordField($users,'website'); ?><?php echo $userform->error($users,'website'); ?></li><br />
<li style="cursor:default"><?php echo CHtml::resetButton('重置'); ?>　　　　　<?php echo CHtml::submitButton('提交'); ?></li>
<?php echo $userform->hiddenField($users,'type',array('type'=>"hidden",'size'=>2,'maxlength'=>2,'value'=>0)); ?>
<input type="hidden" name="ajax" value="rSave">

<?php $this->endWidget(); ?>
</div>
<br />    				
<li></li>   				
</ul>
<div id="pr3" onMouseOver="setAab('pr',3,10)"><h2>个人注册</h2></div>
<ul><br /><br />
<?php $userform=$this->beginWidget('CActiveForm', array(
	'id'=>'rSave-form',
	'enableClientValidation'=>true,
	

	'clientOptions'=>array(
		'validateOnSubmit'=>true,
		'focus'=>array($users,'companyname'),
		
	),
)); ?>
<div align="center">

<li>
<?php echo $userform->labelEx($users2,'隶属企业'); ?>：
<?php echo $userform->textField($users2,'companyname'); ?>
<?php echo $userform->error($users2,'companyname'); ?>
</li><br />

<li><?php echo $userform->labelEx($users2,'会员名称'); ?>：<?php echo $userform->textField($users2,'linkuser'); ?><?php echo $userform->error($users2,'linkuser'); ?></li><br />

<li><?php echo $userform->labelEx($users2,'tel'); ?>：<?php echo $userform->passwordField($users2,'tel'); ?><?php echo $userform->error($users2,'tel'); ?></li><br />
<li><?php echo $userform->labelEx($users2,'mail'); ?>：<?php echo $userform->passwordField($users2,'mail'); ?><?php echo $userform->error($users2,'mail'); ?></li><br />

<br />
<li style="cursor:default"><?php echo CHtml::resetButton('重置'); ?>　　　　　<?php echo CHtml::submitButton('提交'); ?></li>
<?php echo $userform->hiddenField($users2,'type',array('type'=>"hidden",'size'=>2,'maxlength'=>2,'value'=>1)); ?>
<input type="hidden" name="ajax" value="rSave">

<?php $this->endWidget(); ?>
</div>
<br />
<li></li>
</ul>
<div id="pr4" onMouseOver="setAab('pr',4,10)"><h2>注册合约</h2></div>
<ul>
<li><div align="center">企业注册范本</div></li>
<li><div align="center">摘要</div></li>
<li></li><br />
<li></li><br />
<li></li><br />　
<li></li><br />
<li></li><br />
<li></li><br />
<li></li><br />　
<li></li><br />
<li></li><br />
<li><div align="center"><a href="" style="cursor:default">下载</a></div></li>
</ul>
<div id="pr5" onMouseOver="setAab('pr',5,10)"><h2>服务目录</h2></div>
<ul>
<li><div align="center">服务目录</div></li>
<li><div align="center">摘要</div></li>
<li></li><br />
<li></li><br />
<li></li><br />　
<li></li><br />
<li></li><br />
<li></li><br />
<li></li><br />　
<li></li><br />
<li></li><br />
<li><div align="center"><a href="" style="cursor:default">下载</a></div></li>
</ul>
<div id="pr6" onMouseOver="setAab('pr',6,10)"><h2>会员证明</h2></div>
<ul>
<li><div align="center">会员证明</div></li>
<li><div align="center">摘要</div></li>
<li></li><br />
<li></li><br />
<li></li><br />　
<li></li><br />
<li></li><br />
<li></li><br />
<li></li><br />　
<li></li><br />
<li></li><br />
<li><div align="center"><a href="" style="cursor:default">下载</a></div></li>
</ul>
<div id="pr7" onMouseOver="setAab('pr',7,10)"><h2>　</h2></div>
<ul>
<li><div align="center">会员证明</div></li>
<li><div align="center">摘要</div></li>
<li></li><br />
<li></li><br />
<li></li><br />　
<li></li><br />
<li></li><br />
<li></li><br />
<li></li><br />　
<li></li><br />
<li></li><br />
<li><div align="center"><a href="" style="cursor:default">下载</a></div></li>
</ul>
<div id="pr8" onMouseOver="setAab('pr',8,10)"><h2>　</h2></div>
<ul>
<li><div align="center">会员证明</div></li>
<li><div align="center">摘要</div></li>
<li></li><br />
<li></li><br />
<li></li><br />　
<li></li><br />
<li></li><br />
<li></li><br />
<li></li><br />　
<li></li><br />
<li></li><br />
<li><div align="center"><a href="" style="cursor:default">下载</a></div></li>
</ul>
</div> 
</div>
<script>
//titled
function $(id){return document.getElementById(id);}
function $tag(id,tagName){return $(id).getElementsByTagName(tagName)}
var onum=0;//用于控制默认打开的标签
var Ds=$tag("hot","ul");
var Ts=$tag("hot","h2");
for(var i=0; i<Ds.length;i++){
 if(i==onum){
  Ds[i].style.display="block";
     Ts[i].className = "title_current";
  }
 else{
  Ds[i].style.display="none";
     Ts[i].className = "title_normal";
 }
 Ts[i].value=i;
    Ts[i].onmouseover=function(){
    if(onum==this.value){return false;};
       Ts[onum].className="title_normal";
       Ts[this.value].className="title_current";
    Ds[onum].style.display="none";
    Ds[this.value].style.display="block";
onum=this.value;
}
}
</script>
<div align="left"></div>	
</div><!--注册框结束-->
<!--流程开始-->
<div style="width:528px; margin:0pt auto; position:relative; height:415px;float:left;background:;border:0px solid blue;">
<!--流程a开始-->
<div style="width:530px; margin:0pt auto; position:relative; height:399px;float:left;background:#ECF5FF;border-top:1px dashed #000000;">
<div id="flow"><p >操　　作　　流　　程</p></div>
<!--切换框开始-->
<div style="width:500px; margin:50px 10px; position:relative; height:330px;float:left;background:#0000CD;border:3px solid #ffffff;">
<div id="con_pr_1" style="display:block">
e
</div>
<div id="con_pr_2" style="display:none">
<p>意向提交→系统查验→用户付费→注册完成</p>
</div>
<div id="con_pr_3" style="display:none">
<p>意向提交→系统查验→隶属同意→注册完成</p>
</div>
<div id="con_pr_4" style="display:none">
h
</div>
<div id="con_pr_5" style="display:none">
i
</div>
<div id="con_pr_6" style="display:none">
j
</div>
</div><!--切换框结束-->
</div><!--流程a结束-->
<!--流程b开始-->
<div style="width:530px; margin:0pt auto; position:relative; height:13px;float:left;background:#9999CC;border-top:2px solid #2828FF;">
</div><!--流程b结束-->
</div><!--流程结束-->
</div><!--总框架开始-->
</body>
</html>
