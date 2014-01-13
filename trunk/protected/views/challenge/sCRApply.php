<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/sCRApplyLayout.css" />

</style>
<script>//名称、广告、说明、视频翻页控制
function setAab(name,cursel,n){
for(i=1;i<=n;i++){
var menu=document.getElementById(name+i);
var con=document.getElementById("con_"+name+"_"+i);
menu.className=i==cursel?"hover":"";
con.style.display=i==cursel?"block":"none";
}
}
</script>
<script>
//显示内容号码变色控制
var clickNRXS=null;
</script>
<body>
<link href="css/sCRApplyLayout.css" rel="stylesheet" type="text/css" />
<div id="gjJacket"><!--框架开始-->

<div id="header"><!--头部开始-->
<p>永链擂台&nbsp;&nbsp;&nbsp;&nbsp;企业讲坛&nbsp;&nbsp;&nbsp;&nbsp;凡人闪耀&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;举赛遂意&nbsp;&nbsp;&nbsp;&nbsp;你方战罢&nbsp;&nbsp;&nbsp;&nbsp;我方上场&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;激酣赛事&nbsp;&nbsp;&nbsp;&nbsp;勇者角逐&nbsp;&nbsp;&nbsp;&nbsp;智者胜出</p>
</div><!--头部结束-->

<div id="centers"><!--内容开始-->

<div class="f_left"><!--海报简述开始-->
<div class="li">
<div id="st1" onclick="setAab('st',1,5)"">
<p>&nbsp;&nbsp;海报简介......</p>
<p>简述内容......</p>
<p>海报一......</p>
</div>
</br>
<div id="st2" onclick="setAab('st',2,5)"">
<p>&nbsp;&nbsp;海报简介......</p>
<p>简述内容......</p>
<p>海报二......</p>
</div>
</br>
<div id="st3" onclick="setAab('st',3,5)"">
<p>&nbsp;&nbsp;海报简介......</p>
<p>简述内容......</p>
<p>海报三......</p>
</div>
</br>
<div id="st4" onclick="setAab('st',4,5)"">
<p>&nbsp;&nbsp;海报简介......</p>
<p>简述内容......</p>
<p>海报四......</p>
</div>
</br>
<div id="st5" onclick="setAab('st',5,5)"">
<p>&nbsp;&nbsp;海报简介......</p>
<p>简述内容......</p>
<p>海报五......</p>
</div>
</div>
</div><!--海报简述结束-->

<div class="f_right"><!--海报图片开始-->
<div id="con_st_1" >
<img src="images/p1.gif"width="758" height="490" border="0" style="cursor:default;"/>
</div>
<div id="con_st_2"style="display:none">
<img src="images/p2.gif"width="758" height="490" border="0" style="cursor:default;"/>
</div>
<div id="con_st_3"style="display:none">
<img src="images/p3.gif"width="758" height="490" border="0" style="cursor:default;"/>
</div>
<div id="con_st_4"style="display:none">
<img src="images/p4.gif"width="758" height="490" border="0" style="cursor:default;"/>
</div>
<div id="con_st_5"style="display:none">
<img src="images/p5.gif"width="758" height="490" border="0" style="cursor:default;"/>
</div>
</div><!--海报图片结束-->


<div class="s_left">
<p>主办</p>
<p>协办</p>
<p>参赛</p>
</div>

<div class="s_right"><!--广告开始-->
<table width="%" cellspacing="3" cellpadding="0">
  <tr>
    <td><img src="images/p1.gif"width="196" height="107" border="0"/></td>
    <td><img src="images/p2.gif"width="196" height="107" border="0"/></td>
    <td><img src="images/p3.gif"width="196" height="107" border="0"/></td>
    <td><img src="images/p4.gif"width="196" height="107" border="0"/></td>
    <td><img src="images/p5.gif"width="194" height="107" border="0"/></td>
  </tr>
</table>
</div><!--广告结束-->

<div class="t_left">
<p>赛</p>
<p>事</p>
<p>标</p>
<p>题</p>
<p>一</p>
<div class="download">下载</div>
</div>

<div class="t_middle">
<div id="con_sssm_1"><!--赛事1开始-->
<div id="con_ssnra_1"><div id="zxjl">主旨内容1</div></div>
<div id="con_ssnra_2" style="display:none"><div id="zxjm">条件内容1</div></div>
<div id="con_ssnra_3" style="display:none"><div id="zxjn">其它内容1</div></div>
<div id="nb">
<table width="%" border="0" align="center" cellpadding="1" cellspacing="1" bgcolor="#BEBEBE"><tr>
<td width="100" id="hm"><div align="center" class="STYLE1"id="ssnra1" onclick="setAab('ssnra',1,10)"style="cursor:default">主　旨1</div></td>
<td width="100" id="hm"><div align="center" class="STYLE1"id="ssnra2" onclick="setAab('ssnra',2,10)"style="cursor:default">条　件</div></td>
<td width="100" id="hm"><div align="center" class="STYLE1"id="ssnra3" onclick="setAab('ssnra',3,10)"style="cursor:default">其　它</div></td>
</tr></table></div>
</div><!--赛事1结束-->

<script for="hm" event="onclick">
<!--点击显示内容号码变色控制-->
this.style.color="#ffffff";
this.style.backgroundColor="#f00";
if(clickNRXS!=null)clickNRXS.style.color="";
if(clickNRXS!=null)clickNRXS.style.backgroundColor="";
clickNRXS=this;
</script>
</div>

<div class="t_right">
赛事视频
</div>

<div class="t">
</div>

</div><!--内容结束-->


 
</div><!--框架结束--> 
</body>
</html>
