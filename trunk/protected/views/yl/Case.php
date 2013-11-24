
<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/DateNewLayout.css" />
<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/DateHead.css" />
<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/DateNewCatalog.css" />

<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/DateNewColumnIntroduce.css" />
<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/DateNewVideo.css" />
<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/DateNewColumnTitle.css" />

<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/DateNewCatalog.css" />
<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/DateNewMultimedia.css" />




<div id="centers"><!--内容开始-->
 
<div class="f_left">

<div id="pSite"><!--视频开始-->
<div class="video" id="video"></div>
</div><!--视频结束-->
</div>

<div class="f_middle">

<div id="ciJacket"><!--栏目介绍开始-->
<p id="ciFont"> &nbsp;&nbsp;&nbsp;&nbsp;为了更快、更省、更好的服务于用户，我们秉持“众人拾柴火焰高”，即手牵大伙、心系用户，您们的智慧加我们的智慧、您们
的资源加我们的资源、您们的技术加我们的技术、您们的困难我们辅助、我们的难题您们解决，共同为用户提供优质的产品，满足用
户，发展大伙，结成有序、规范的服务产业群，成为经济区域内共同体。</br>
&nbsp;&nbsp;&nbsp;
我们欢迎立足于服务企业的信息业、咨询业、软件业的同行凭借你我坦诚、分工有序、共寻结合点、优势叠加、劣势互补、各展
才能在广阔的市场中，遇难同当，有利共享，携手共进。</p><!--栏目介绍结束-->　
</div>
<div id="dpMenu"><!--菜单开始-->
<table width="%" border="0">
<tr>
<td width="55" height="30"><a href="DateNews.html">公司新闻</a></td>
<td width="55"><a href="DateActivity.html">公司活动</a></td>
<td width="55">项目合作</td>
<a href="javascript://" onClick="moveMenu()" style="background-color:;text-decoration:none;cursor:default"><td width="20" align="right" valign="middle"><span class="STYLE2">●</span></td></a>
</tr>
<tr>
<td height="30"><a href="DateTeam.html">永链团队</a></td>
<td><a href="DateProduct.html">永链产品</a></td>
<td><a href="DateRecruitment.html">员工招聘</a></td>
<a href="javascript://" onClick="moveMenu()" style="background-color:yellow;text-decoration:none;cursor:default"><td width="20" align="right" valign="middle">●</td></a>
</tr>
</table>
</div><!--菜单结束-->　　
</div>
  
<div class="f_right">
<link href="css/DateProjectColumnTitle.css" rel="stylesheet" type="text/css" /><!--标题开始-->
<p id="ctFont">项</p>
<p id="ctFont">目</p>
<p id="ctFont">合</p>
<p id="ctFont">作</p>
<div id="tSite"></div><!--标题结束-->
</div> 

<div class="s_left">
<!--新闻目录开始-->
<p id="cFont">项&nbsp;目&nbsp;名&nbsp;称</p>
<div id="cJacket">
<table width="%" cellspacing="9" cellpadding="4">
 <?php foreach($datalist as $k =>$v):?>
<tr>
<td><img src="images/w15.gif" width="20" height="15" /></td><!--<img src="images/w16.gif" width="20" height="15" />-->
<td id="lb"><div id="type1" style="cursor:default"><div id="graphic2"><?php echo $k+1?>.<?php echo $v['title']?></div></div></td>
</tr>
<?php endforeach; ?>
</table>
<script for="lb" event="onclick">
<!--点击列表标题变色控制-->
this.style.color="#ffffff";
this.style.backgroundColor="#2828FF";
if(clickLBBT!=null)clickLBBT.style.color="";
if(clickLBBT!=null)clickLBBT.style.backgroundColor="";
clickLBBT=this;
</script>
</div><!--新闻目录结束-->
</div>

<div class="s_right">
<!--多媒体开始-->
我是pdf swf
</div> 
</div><!--内容结束-->
