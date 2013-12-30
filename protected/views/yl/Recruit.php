
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

<div id="vSite"><!--视频开始-->
<div class="video" id="video"></div>
</div><!--视频结束-->
</div>

<div class="f_middle">
<div id="ciJacket"><!--栏目介绍开始-->
<p id="ciFont"> &nbsp;&nbsp;&nbsp;&nbsp;核心团队针对企业运营中各类管理问题，经过全面、系统的归纳和深入、细致分析，构筑了运营问题图，并标注各类问题的解决途径，依托公司逐步推向市场的产品为用户交付至善至美的服务方案，以保证用户核心业务的持续和高效运营。我们是：</br>
&nbsp;&nbsp;&nbsp;
网站服务：由丰富实战经验的推广、采购、多媒介设计等人员组成；</br>
&nbsp;&nbsp;&nbsp;
运营策划：由鏖战各行业企业多年的中、高级管理人员组成；</br>
&nbsp;&nbsp;&nbsp;
系统开发：来自经济界、软件业的数据师、测评师、开发师等组成。</br>
&nbsp;&nbsp;&nbsp;
为方便用户挑选合意服务对象，我们将发表我们在工作中的所思、所想；分享我们的工作经验；面对行业趋势、技术、热议等话
题的独立观点；针对具体事例的利弊分析及解决提议。。。。。。 我们是你们值得信赖的“风雨同舟、共创未来”的工作伙伴。</p><!--栏目介绍结束-->
</div>
<div id="dtMenu"><!--菜单开始-->
<table width="%" border="0">
<tr>
<td width="55" height="30"><a href="DateNews.html">公司新闻</a></td>
<td width="55"><a href="DateActivity.html">公司活动</a></td>
<td width="55"><a href="DateProject.html">项目合作</a></td>
<a href="javascript://" onClick="moveMenu()" style="background-color:;text-decoration:none;cursor:default"><td width="20" align="right" valign="middle"><span class="STYLE2">●</span></td></a>
</tr>
<tr>
<td height="30">永链团队</td>
<td><a href="DateProduct.html">永链产品</a></td>
<td><a href="DateRecruitment.html">员工招聘</a></td>
<a href="javascript://" onClick="moveMenu()" style="background-color:yellow;text-decoration:none;cursor:default"><td width="20" align="right" valign="middle">●</td></a>
</tr>
</table>
</div><!--菜单结束-->　　
</div>
  
<div class="f_right">
<!--标题开始-->
<p id="ctFont">招</p>
<p id="ctFont">聘</p>
<p id="ctFont">流</p>
<p id="ctFont">程</p>
<div id="tSite"></div><!--标题结束-->
</div> 

<div class="s_left">
<!--新闻目录开始-->
<p id="cFont">招&nbsp;聘&nbsp;公&nbsp;告</p>
<div id="cJacket">
<div id="con_Allies_1" ><!--产品1目录开始-->
<P><span class="STYLE1">&nbsp;&nbsp;员工编号&nbsp;员工姓名&nbsp;服务地区&nbsp;担任岗位1</span></p>
<hr style="border:1px solid #F75000;width:70%" align=left ><!--style="cursor:default"-->
<table width="%" cellspacing="2" cellpadding="4">
 <?php foreach($datalist as $k =>$v):?>
<tr>
<td><img src="images/w15.gif" width="20" height="15" /></td><!--<img src="images/w16.gif" width="20" height="15" />-->
<td id="lb"><div id="type1" style="cursor:default"><div id="graphic2"><?php echo $k+1?>.<?php echo $v['title']?></div></div></td>
</tr>
<?php endforeach; ?>
</table>
</div><!--产品1目录结束-->

</div><!--新闻目录结束-->
</div>

<div class="s_right">
<!--多媒体开始-->
我是pdf swf
</div> 
</div><!--内容结束-->
 
