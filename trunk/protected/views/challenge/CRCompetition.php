<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/matchview.css" />

<body onload="show()">
<!--总框架开始-->
<div style="width:1130px; margin:0pt auto; position:relative; height:1568px;border:0px solid silver;background:#9D9D9D">
<div style="width:1130px; margin:0pt auto; position:relative; height:95px;border:0px solid silver;float:left;"><!--头部开始-->

<div style="width:1130px; margin:0pt auto; position:relative; height:7px;border:0px solid silver;float:left;"></div><!--间隔层开始-->
<!--组织开始-->
<div style="width:1130px; margin:0pt auto; position:relative; height:390px;border:0px solid #96C2F1;float:left;background:#d0d0d0">
<!--组织1开始-->
<div style="width:290px;margin:3px 5px 3px 3px;position:relative;height:350px;border:1px solid #E0E0E0;float:left;background:#FAF4FF;">
<!--标题1-->
<div style="width:230px; margin:0px; position:relative; height:25px;border:0px solid silver;float:left;background:#96C2F1;">
<div id="bt1">优秀组织名单</div></div>
<!--目录1-->
<div style="width:260px; margin:5px; position:relative; height:250px;border:0px solid silver;float:left;background:;">
<table width="280px" border="0">
<tr><td height="30"><strong>一等奖</strong></td>
</tr>
<tr>
<?php 

$i=0;
foreach($data['PrizeArr'] as $v):

?>
<?php if($i%4==0):?>
</tr><tr>
<?php endif;?>
<td style="text-align: center;"><?php echo $v ;$i++;?></td>
<?php endforeach;?>

</tr>
<tr><td height="30"><strong>二等奖</strong></td></tr>
<tr>
<?php 

$i=0;
foreach($data['Prize2Arr'] as $v):

?>
<?php if($i%4==0):?>
</tr><tr>
<?php endif;?>
<td style="text-align: center;"><?php echo $v ;$i++;?></td>
<?php endforeach;?>
</tr>

<tr><td height="30"><strong>三等奖</strong></td>
</tr>
<tr>
<?php 

$i=0;
foreach($data['Prize3Arr'] as $v):

?>
<?php if($i%4==0):?>
</tr><tr>
<?php endif;?>
<td style="text-align: center;"><?php echo $v;$i++;?></td>
<?php endforeach;?>
</tr>
</table>
</div>
</div><!--组织1结束-->
<div style="width:270px; margin:3px; position:relative; height:350px;border:0px solid #F0F0F0;float:left;"><!--组织2开始-->
<div id="con_zzo_1" ><img style="border:2px solid #ffffff" src="images/p1.gif" width="266" height="346" /></div>
<div id="con_zzo_2" style="display:none"><img style="border:2px solid #ffffff" src="images/p2.gif" width="266" height="346" /></div>
</div><!--组织2结束-->
<!--组织3开始-->
<div style="width:270px; margin:3px; position:relative; height:350px;border:1px solid #E0E0E0;float:left;background:#FAF4FF">
<!--标题2-->
<div style="width:25px; margin:0px; position:relative; height:320px;border:0px solid silver;float:left;background:#96C2F1;">
<div id="bt2">获
胜
组
织
成
员</div>
</div>
<!--目录2-->
<div id="con_ml_1"><!--组织成员1开始-->
<table width="200" border="0">
<tr><td height="30"><strong><?php echo $data['PostName'];?></strong></td></tr>
<tr>
<?php 

$i=0;
foreach($data['PostArr'] as $v):

?>
<?php if($i%4==0):?>
</tr><tr>
<?php endif;?>
<td style="text-align: center;"><?php echo $v ;$i++;?></td>
<?php endforeach;?>
</tr>
<tr><td height="30"><strong><?php echo $data['Post2Name'];?></strong></td></tr>
<tr>
<?php 

$i=0;
foreach($data['Post2Arr'] as $v):

?>
<?php if($i%4==0):?>
</tr><tr>
<?php endif;?>
<td style="text-align: center;"><?php echo $v ;$i++;?></td>
<?php endforeach;?>
</tr>
<tr><td height="30"><strong><?php echo $data['Post3Name'];?></strong></td></tr>
<tr>
<?php 

$i=0;
foreach($data['Post3Arr'] as $v):

?>
<?php if($i%4==0):?>
</tr><tr>
<?php endif;?>
<td style="text-align: center;"><?php echo $v ;$i++;?></td>
<?php endforeach;?>
</tr>
</table>
</div><!--组织成员1结束-->

</div><!--组织2结束-->
<div style="width:270px;margin:3px 3px 3px 3px;position:relative; height:350px;border:0px solid #F0F0F0;float:left;">
<div id="con_zzt_1" ><img style="border:2px solid #ffffff" src="images/p5.gif" width="266" height="346" /></div>
<div id="con_zzt_2"style="display:none" ><img style="border:2px solid #ffffff" src="images/p4.gif" width="266" height="346" /></div>
<div id="con_zzt_3"style="display:none" ><img style="border:2px solid #ffffff" src="images/p3.gif" width="266" height="346" /></div>
</div>
<div style="width:1124px; margin:2px; position:relative; height:25px;border:0px solid silver;float:left;background:#96C2F1;">
<div id="bt3"><a name=mao id=mao>年度获胜组织暨成员</a></div>
</div>
</div><!--组织结束-->
<!--间隔层开始-->
<div style="width:1130px;margin:0pt auto;position:relative;height:7px;border:0px solid silver;float:left;"></div>
<!--内容显示开始-->
<div style="width:830px; margin:0pt auto; position:relative; height:560px;border:0px solid silver;float:left;background:#f0f0f0" id="documentViewer">


<script for="hm" event="onclick">
<!--点击显示内容号码变色控制-->
this.style.color="#ffffff";
this.style.backgroundColor="#f00";
if(clickNRXS!=null)clickNRXS.style.color="";
if(clickNRXS!=null)clickNRXS.style.backgroundColor="";
clickNRXS=this;
</script>
</div><!--内容显示结束-->
<!--目录外层开始-->
<div style="width:296px; margin:0pt auto; position:relative; height:565px;border:0px solid silver;float:right;background:#FAF4FF;"><!--标题4-->
<div style="width:285px; margin:5px 5px 0px 5px; position:relative; height:25px;border:0px solid silver;float:left;background:#96C2F1;"><div id="bt4">赛况目录</div></div>
<!--赛况目录开始-->
<div style="width:285px; margin:5px; position:relative; height:485px;border:0px solid silver;float:left;background:#E6E6F2;">
<div id="con_st_1" style="display:block">
<p align="center" style="font-family:宋体;font-size:14px;color:#000000;font-weight:bold">参赛标题A</p>
<p align="right" style="font-family:宋体;font-size:12px;color:#000000;font-weight:normal">[2013/02/20]</p>
<hr width=99% size=5 color=#FF8F59 align=left noshade>
<p align="left" style="font-family:宋体;font-size:14px;color:#000000;font-weight:normal">赛前:</p>
<p><div id="type1" onclick="setAab('type',1,10)"style="cursor:default"><div id="graphic2" onclick="setAab('graphic',2,10)"><span id="lb">1.用工荒倒逼中国制造升级</span></div></div></p>
<p><div id="type2" onclick="setAab('type',2,10)"style="cursor:default"><div id="picture2" onclick="setAab('picture',2,10)"><span id="lb">2.逃避高成本工厂面临搬离的困惑</span></div></div></p>
<hr style="color: blue;border-style:1px dashed;width:290"> 
<p align="left" style="font-family:宋体;font-size:14px;color:#000000;font-weight:normal">赛中:</p>
<p><div id="type3" onclick="setAab('type',3,10)"style="cursor:default"><div id="slide2" onclick="setAab('slide',2,10)"><span id="lb">1.用工荒倒逼中国制造升级</span></div></div></p>
<p><div id="type4" onclick="setAab('type',4,10)"style="cursor:default"><div id="video2" onclick="setAab('video',2,10)"><span id="lb">2.逃避高成本工厂面临搬离的困惑</span></div></div></p>
<hr style="color: blue;border-style:1px dashed;width:290">
<p align="left" style="font-family:宋体;font-size:14px;color:#000000;font-weight:normal">赛后:</p>
<p><div id="type5" onclick="setAab('type',5,10)"style="cursor:default"><div id="animation1" onclick="setAab('animation',1,10)"><span id="lb">1.用工荒倒逼中国制造升级</span></div></div></p>
<p><span id="lb">2.逃避高成本工厂面临搬离的困惑</span></p>
<p><span id="lb">3.双向调整解决用工荒问题</span></p>

<div id="cszp1"><div id="zpml1" onclick="setAab('zpml',1,10)"style="cursor:default"><div id="hbml1" onclick="setAab('hbml',1,10)"><div id="hsml1" onclick="setAab('hsml',1,10)"><p align="right">某某参赛作品目录1</p></div></div></div></div>
</div>
<div id="con_st_2" style="display:none">
<p align="center" style="font-family:宋体;font-size:14px;color:#000000;font-weight:bold">参赛标题B</p>
<p align="right" style="font-family:宋体;font-size:12px;color:#000000;font-weight:normal">[2013/02/20]</p>
<hr width=99% size=5 color=#FF8F59 align=left noshade>
<p align="left" style="font-family:宋体;font-size:14px;color:#000000;font-weight:normal">赛前:</p>
<p><div id="type1" onclick="setAab('type',1,10)"style="cursor:default"><div id="graphic2" onclick="setAab('graphic',2,10)"><span id="lb">1.用工荒倒逼中国制造升级</span></div></div></p>
<p><div id="type2" onclick="setAab('type',2,10)"style="cursor:default"><div id="picture2" onclick="setAab('picture',2,10)"><span id="lb">2.逃避高成本工厂面临搬离的困惑</span></div></div></p>
<hr style="color: blue;border-style:1px dashed;width:290"> 
<p align="left" style="font-family:宋体;font-size:14px;color:#000000;font-weight:normal">赛中:</p>
<p><div id="type3" onclick="setAab('type',3,10)"style="cursor:default"><div id="slide2" onclick="setAab('slide',2,10)"><span id="lb">1.用工荒倒逼中国制造升级</span></div></div></p>
<p><div id="type4" onclick="setAab('type',4,10)"style="cursor:default"><div id="video2" onclick="setAab('video',2,10)"><span id="lb">2.逃避高成本工厂面临搬离的困惑</span></div></div></p>
<hr style="color: blue;border-style:1px dashed;width:290">
<p align="left" style="font-family:宋体;font-size:14px;color:#000000;font-weight:normal">赛后:</p>
<p><div id="type5" onclick="setAab('type',5,10)"style="cursor:default"><div id="animation1" onclick="setAab('animation',1,10)"><span id="lb">1.用工荒倒逼中国制造升级</span></div></div></p>
<p><span id="lb">2.逃避高成本工厂面临搬离的困惑</span></p>
<p><span id="lb">3.双向调整解决用工荒问题</span></p>
<div id="cszp2"><div id="zpml2" onclick="setAab('zpml',2,10)"style="cursor:default"><div id="hbml2" onclick="setAab('hbml',2,10)"><div id="hsml2" onclick="setAab('hsml',2,10)"><p align="right">某某参赛作品目录2</p></div></div></div></div>
</div>
<div id="con_st_3" style="display:none">
<p align="center" style="font-family:宋体;font-size:14px;color:#000000;font-weight:bold">参赛标题C</p>
<p align="right" style="font-family:宋体;font-size:12px;color:#000000;font-weight:normal">[2013/02/20]</p>
<hr width=99% size=5 color=#FF8F59 align=left noshade>
<p align="left" style="font-family:宋体;font-size:14px;color:#000000;font-weight:normal">赛前:</p>
<p><div id="type1" onclick="setAab('type',1,10)"style="cursor:default"><div id="graphic2" onclick="setAab('graphic',2,10)"><span id="lb">1.用工荒倒逼中国制造升级</span></div></div></p>
<p><div id="type2" onclick="setAab('type',2,10)"style="cursor:default"><div id="picture2" onclick="setAab('picture',2,10)"><span id="lb">2.逃避高成本工厂面临搬离的困惑</span></div></div></p>
<hr style="color: blue;border-style:1px dashed;width:290"> 
<p align="left" style="font-family:宋体;font-size:14px;color:#000000;font-weight:normal">赛中:</p>
<p><div id="type3" onclick="setAab('type',3,10)"style="cursor:default"><div id="slide2" onclick="setAab('slide',2,10)"><span id="lb">1.用工荒倒逼中国制造升级</span></div></div></p>
<p><div id="type4" onclick="setAab('type',4,10)"style="cursor:default"><div id="video2" onclick="setAab('video',2,10)"><span id="lb">2.逃避高成本工厂面临搬离的困惑</span></div></div></p>
<hr style="color: blue;border-style:1px dashed;width:290">
<p align="left" style="font-family:宋体;font-size:14px;color:#000000;font-weight:normal">赛后:</p>
<p><div id="type5" onclick="setAab('type',5,10)"style="cursor:default"><div id="animation1" onclick="setAab('animation',1,10)"><span id="lb">1.用工荒倒逼中国制造升级</span></div></div></p>
<p><span id="lb">2.逃避高成本工厂面临搬离的困惑</span></p>
<p><span id="lb">3.双向调整解决用工荒问题</span></p>
<div id="cszp3"><div id="zpml3" onclick="setAab('zpml',3,10)"style="cursor:default"><div id="hbml3" onclick="setAab('hbml',3,10)"><div id="hsml3" onclick="setAab('hsml',3,10)"><p align="right">某某参赛作品目录3</p></div></div></div></div>
</div>
<div id="con_st_4" style="display:none">
<p align="center" style="font-family:宋体;font-size:14px;color:#000000;font-weight:bold">参赛标题D</p>
<p align="right" style="font-family:宋体;font-size:12px;color:#000000;font-weight:normal">[2013/02/20]</p>
<hr width=99% size=5 color=#FF8F59 align=left noshade>
<p align="left" style="font-family:宋体;font-size:14px;color:#000000;font-weight:normal">赛前:</p>
<p><div id="type1" onclick="setAab('type',1,10)"style="cursor:default"><div id="graphic2" onclick="setAab('graphic',2,10)"><span id="lb">1.用工荒倒逼中国制造升级</span></div></div></p>
<p><div id="type2" onclick="setAab('type',2,10)"style="cursor:default"><div id="picture2" onclick="setAab('picture',2,10)"><span id="lb">2.逃避高成本工厂面临搬离的困惑</span></div></div></p>
<hr style="color: blue;border-style:1px dashed;width:290"> 
<p align="left" style="font-family:宋体;font-size:14px;color:#000000;font-weight:normal">赛中:</p>
<p><div id="type3" onclick="setAab('type',3,10)"style="cursor:default"><div id="slide2" onclick="setAab('slide',2,10)"><span id="lb">1.用工荒倒逼中国制造升级</span></div></div></p>
<p><div id="type4" onclick="setAab('type',4,10)"style="cursor:default"><div id="video2" onclick="setAab('video',2,10)"><span id="lb">2.逃避高成本工厂面临搬离的困惑</span></div></div></p>
<hr style="color: blue;border-style:1px dashed;width:290">
<p align="left" style="font-family:宋体;font-size:14px;color:#000000;font-weight:normal">赛后:</p>
<p><div id="type5" onclick="setAab('type',5,10)"style="cursor:default"><div id="animation1" onclick="setAab('animation',1,10)"><span id="lb">1.用工荒倒逼中国制造升级</span></div></div></p>
<p><span id="lb">2.逃避高成本工厂面临搬离的困惑</span></p>
<p><span id="lb">3.双向调整解决用工荒问题</span></p>
<div id="cszp4"><div id="zpml4" onclick="setAab('zpml',4,10)"style="cursor:default"><div id="hbml4" onclick="setAab('hbml',4,10)"><div id="hsml4" onclick="setAab('hsml',4,10)"><p align="right">某某参赛作品目录4</p></div></div></div></div>
</div>
<div id="con_st_5" style="display:none">
<p align="center" style="font-family:宋体;font-size:14px;color:#000000;font-weight:bold">参赛标题E</p>
<p align="right" style="font-family:宋体;font-size:12px;color:#000000;font-weight:normal">[2013/02/20]</p>
<hr width=99% size=5 color=#FF8F59 align=left noshade>
<p align="left" style="font-family:宋体;font-size:14px;color:#000000;font-weight:normal">赛前:</p>
<p><div id="type1" onclick="setAab('type',1,10)"style="cursor:default"><div id="graphic2" onclick="setAab('graphic',2,10)"><span id="lb">1.用工荒倒逼中国制造升级</span></div></div></p>
<p><div id="type2" onclick="setAab('type',2,10)"style="cursor:default"><div id="picture2" onclick="setAab('picture',2,10)"><span id="lb">2.逃避高成本工厂面临搬离的困惑</span></div></div></p>
<hr style="color: blue;border-style:1px dashed;width:290"> 
<p align="left" style="font-family:宋体;font-size:14px;color:#000000;font-weight:normal">赛中:</p>
<p><div id="type3" onclick="setAab('type',3,10)"style="cursor:default"><div id="slide2" onclick="setAab('slide',2,10)"><span id="lb">1.用工荒倒逼中国制造升级</span></div></div></p>
<p><div id="type4" onclick="setAab('type',4,10)"style="cursor:default"><div id="video2" onclick="setAab('video',2,10)"><span id="lb">2.逃避高成本工厂面临搬离的困惑</span></div></div></p>
<hr style="color: blue;border-style:1px dashed;width:290">
<p align="left" style="font-family:宋体;font-size:14px;color:#000000;font-weight:normal">赛后:</p>
<p><div id="type5" onclick="setAab('type',5,10)"style="cursor:default"><div id="animation1" onclick="setAab('animation',1,10)"><span id="lb">1.用工荒倒逼中国制造升级</span></div></div></p>
<p><span id="lb">2.逃避高成本工厂面临搬离的困惑</span></p>
<p><span id="lb">3.双向调整解决用工荒问题</span></p>
<div id="cszp5"><div id="zpml5" onclick="setAab('zpml',5,10)"style="cursor:default"><div id="hbml5" onclick="setAab('hbml',5,10)"><div id="hsml5" onclick="setAab('hsml',5,10)"><p align="right">某某参赛作品目录5</p></div></div></div></div>
</div>
</div><!--赛况目录结束-->
<div style="width:65px; margin:5px 5px 0px 5px; position:relative;height:25px;border:0px solid silver;float:left;background:#E0E0E0;"><div id="zxjl"><a href="OnlineCommunication.html"target="_blank">在线交流</a></div></div> 
</div><!--目录外层结束-->
<div style="width:1130px; margin:0pt auto; position:relative; height:7px;border:0px solid silver;float:left;"><!--间隔层开始-->
</div><!--间隔层结束-->
<!--参赛者目录开始-->
<div style="width:1090px; margin:0pt auto; position:relative; height:350px;border:0px solid silver;float:left;padding:20px;background: #FAF4FF;">
<!--作品目录开始-->
<div style="width:730px; margin:0pt auto; position:relative; height:340px;border:1px solid #96C2F1;float:left;background:#fdfdfd;">
<!--赛事1开始-->
<div id="con_zpml_1"><table width="%" >
<tr>
<td colspan="2" bgcolor="#96C2F1" style="border-bottom:1px solid silver;border-right:1px solid silver;"><div align="center"><strong>正方作品</strong></div></td>
<td colspan="2" bgcolor="#96C2F1"style="border-bottom:1px solid silver;border-right:1px solid silver;"><div align="center"><strong>反方作品</strong></div></td>
<td colspan="2" bgcolor="#96C2F1"style="border-bottom:1px solid silver;"><div align="center"><strong>新义作品</strong></div></td>
</tr>
<tr>
<td width="200"style="border-bottom:1px solid silver;border-right:1px solid silver;">参赛标题</td>
<td width="55"style="border-bottom:1px solid silver;border-right:1px solid silver;">参赛作者</td>
<td width="200"style="border-bottom:1px solid silver;border-right:1px solid silver;">参赛标题</td>
<td width="55"style="border-bottom:1px solid silver;border-right:1px solid silver;">参赛作者</td>
<td width="200"style="border-bottom:1px solid silver;border-right:1px solid silver;">参赛标题</td>
<td width="55"style="border-bottom:1px solid silver;">参赛作者</td>
</tr>
<tr><!--cursor:pointer-->
<td style="border-bottom:1px solid silver;border-right:1px solid silver;">&nbsp;</td>
<td style="border-bottom:1px solid silver;border-right:1px solid silver;">&nbsp;</td>
<td style="border-bottom:1px solid silver;border-right:1px solid silver;">&nbsp;</td>
<td style="border-bottom:1px solid silver;border-right:1px solid silver;">&nbsp;</td>
<td style="border-bottom:1px solid silver;border-right:1px solid silver;">&nbsp;</td>
<td style="border-bottom:1px solid silver;">&nbsp;</td>
</tr>
<tr>
<td style="border-bottom:1px solid silver;border-right:1px solid silver;">&nbsp;</td>
<td style="border-bottom:1px solid silver;border-right:1px solid silver;">&nbsp;</td>
<td style="border-bottom:1px solid silver;border-right:1px solid silver;">&nbsp;</td>
<td style="border-bottom:1px solid silver;border-right:1px solid silver;">&nbsp;</td>
<td style="border-bottom:1px solid silver;border-right:1px solid silver;">&nbsp;</td>
<td style="border-bottom:1px solid silver;">&nbsp;</td>
</tr>
<tr>
<td style="border-bottom:1px solid silver;border-right:1px solid silver;">&nbsp;</td>
<td style="border-bottom:1px solid silver;border-right:1px solid silver;">&nbsp;</td>
<td style="border-bottom:1px solid silver;border-right:1px solid silver;">&nbsp;</td>
<td style="border-bottom:1px solid silver;border-right:1px solid silver;">&nbsp;</td>
<td style="border-bottom:1px solid silver;border-right:1px solid silver;">&nbsp;</td>
<td style="border-bottom:1px solid silver;">&nbsp;</td>
</tr>
<tr>
<td style="border-bottom:1px solid silver;border-right:1px solid silver;">&nbsp;</td>
<td style="border-bottom:1px solid silver;border-right:1px solid silver;">&nbsp;</td>
<td style="border-bottom:1px solid silver;border-right:1px solid silver;">&nbsp;</td>
<td style="border-bottom:1px solid silver;border-right:1px solid silver;">&nbsp;</td>
<td style="border-bottom:1px solid silver;border-right:1px solid silver;">&nbsp;</td>
<td style="border-bottom:1px solid silver;">&nbsp;</td>
</tr> 
<tr>
<td style="border-bottom:1px solid silver;border-right:1px solid silver;">&nbsp;</td>
<td style="border-bottom:1px solid silver;border-right:1px solid silver;">&nbsp;</td>
<td style="border-bottom:1px solid silver;border-right:1px solid silver;">&nbsp;</td>
<td style="border-bottom:1px solid silver;border-right:1px solid silver;">&nbsp;</td>
<td style="border-bottom:1px solid silver;border-right:1px solid silver;">&nbsp;</td>
<td style="border-bottom:1px solid silver;">&nbsp;</td>
</tr>
<tr>
<td style="border-bottom:1px solid silver;border-right:1px solid silver;">&nbsp;</td>
<td style="border-bottom:1px solid silver;border-right:1px solid silver;">&nbsp;</td>
<td style="border-bottom:1px solid silver;border-right:1px solid silver;">&nbsp;</td>
<td style="border-bottom:1px solid silver;border-right:1px solid silver;">&nbsp;</td>
<td style="border-bottom:1px solid silver;border-right:1px solid silver;">&nbsp;</td>
<td style="border-bottom:1px solid silver;">&nbsp;</td>
</tr>
<tr>
<td style="border-bottom:1px solid silver;border-right:1px solid silver;">&nbsp;</td>
<td style="border-bottom:1px solid silver;border-right:1px solid silver;">&nbsp;</td>
<td style="border-bottom:1px solid silver;border-right:1px solid silver;">&nbsp;</td>
<td style="border-bottom:1px solid silver;border-right:1px solid silver;">&nbsp;</td>
<td style="border-bottom:1px solid silver;border-right:1px solid silver;">&nbsp;</td>
<td style="border-bottom:1px solid silver;">&nbsp;</td>
</tr>
<tr>
<td style="border-bottom:1px solid silver;border-right:1px solid silver;">&nbsp;</td>
<td style="border-bottom:1px solid silver;border-right:1px solid silver;">&nbsp;</td>
<td style="border-bottom:1px solid silver;border-right:1px solid silver;">&nbsp;</td>
<td style="border-bottom:1px solid silver;border-right:1px solid silver;">&nbsp;</td>
<td style="border-bottom:1px solid silver;border-right:1px solid silver;">&nbsp;</td>
<td style="border-bottom:1px solid silver;">&nbsp;</td>
</tr>
<tr>
<td style="border-bottom:1px solid silver;border-right:1px solid silver;">&nbsp;</td>
<td style="border-bottom:1px solid silver;border-right:1px solid silver;">&nbsp;</td>
<td style="border-bottom:1px solid silver;border-right:1px solid silver;">&nbsp;</td>
<td style="border-bottom:1px solid silver;border-right:1px solid silver;">&nbsp;</td>
<td style="border-bottom:1px solid silver;border-right:1px solid silver;">&nbsp;</td>
<td style="border-bottom:1px solid silver;">&nbsp;</td>
</tr>
<tr>
<td style="border-bottom:1px solid silver;border-right:1px solid silver;">&nbsp;</td>
<td style="border-bottom:1px solid silver;border-right:1px solid silver;">&nbsp;</td>
<td style="border-bottom:1px solid silver;border-right:1px solid silver;">&nbsp;</td>
<td style="border-bottom:1px solid silver;border-right:1px solid silver;">&nbsp;</td>
<td style="border-bottom:1px solid silver;border-right:1px solid silver;">&nbsp;</td>
<td style="border-bottom:1px solid silver;">&nbsp;</td>
</tr>
<tr>
<td style="border-bottom:1px solid silver;border-right:1px solid silver;">&nbsp;</td>
<td style="border-bottom:1px solid silver;border-right:1px solid silver;">&nbsp;</td>
<td style="border-bottom:1px solid silver;border-right:1px solid silver;">&nbsp;</td>
<td style="border-bottom:1px solid silver;border-right:1px solid silver;">&nbsp;</td>
<td style="border-bottom:1px solid silver;border-right:1px solid silver;">&nbsp;</td>
<td style="border-bottom:1px solid silver;">&nbsp;</td>
</tr>
<tr>
<td style="border-bottom:1px solid silver;border-right:1px solid silver;">&nbsp;</td>
<td style="border-bottom:1px solid silver;border-right:1px solid silver;">&nbsp;</td>
<td style="border-bottom:1px solid silver;border-right:1px solid silver;">&nbsp;</td>
<td style="border-bottom:1px solid silver;border-right:1px solid silver;">&nbsp;</td>
<td style="border-bottom:1px solid silver;border-right:1px solid silver;">&nbsp;</td>
<td style="border-bottom:1px solid silver;">&nbsp;</td>
</tr>
<tr>
<td style="border-bottom:1px solid silver;border-right:1px solid silver;">&nbsp;</td>
<td style="border-bottom:1px solid silver;border-right:1px solid silver;">&nbsp;</td>
<td style="border-bottom:1px solid silver;border-right:1px solid silver;">&nbsp;</td>
<td style="border-bottom:1px solid silver;border-right:1px solid silver;">&nbsp;</td>
<td style="border-bottom:1px solid silver;border-right:1px solid silver;">&nbsp;</td>
<td style="border-bottom:1px solid silver;">&nbsp;</td>
</tr>
<tr>
<td style="border-bottom:1px solid silver;border-right:1px solid silver;">&nbsp;</td>
<td style="border-bottom:1px solid silver;border-right:1px solid silver;">&nbsp;</td>
<td style="border-bottom:1px solid silver;border-right:1px solid silver;">&nbsp;</td>
<td style="border-bottom:1px solid silver;border-right:1px solid silver;">&nbsp;</td>
<td style="border-bottom:1px solid silver;border-right:1px solid silver;">&nbsp;</td>
<td style="border-bottom:1px solid silver;">&nbsp;</td>
</tr>  
</table></div>
<!--赛事1结束-->
<!--赛事2开始-->
<div id="con_zpml_2" style="display:none"><table width="%" >
<tr>
<td colspan="2" bgcolor="#96C2F1" style="border-bottom:1px solid silver;border-right:1px solid silver;"><div align="center"><strong>正方作品2</strong></div></td>
<td colspan="2" bgcolor="#96C2F1"style="border-bottom:1px solid silver;border-right:1px solid silver;"><div align="center"><strong>反方作品</strong></div></td>
<td colspan="2" bgcolor="#96C2F1"style="border-bottom:1px solid silver;"><div align="center"><strong>新义作品</strong></div></td>
</tr>
<tr>
<td width="200"style="border-bottom:1px solid silver;border-right:1px solid silver;">参赛标题</td>
<td width="55"style="border-bottom:1px solid silver;border-right:1px solid silver;">参赛作者</td>
<td width="200"style="border-bottom:1px solid silver;border-right:1px solid silver;">参赛标题</td>
<td width="55"style="border-bottom:1px solid silver;border-right:1px solid silver;">参赛作者</td>
<td width="200"style="border-bottom:1px solid silver;border-right:1px solid silver;">参赛标题</td>
<td width="55"style="border-bottom:1px solid silver;">参赛作者</td>
</tr>
<tr>
<td style="border-bottom:1px solid silver;border-right:1px solid silver;">&nbsp;</td>
<td style="border-bottom:1px solid silver;border-right:1px solid silver;">&nbsp;</td>
<td style="border-bottom:1px solid silver;border-right:1px solid silver;">&nbsp;</td>
<td style="border-bottom:1px solid silver;border-right:1px solid silver;">&nbsp;</td>
<td style="border-bottom:1px solid silver;border-right:1px solid silver;">&nbsp;</td>
<td style="border-bottom:1px solid silver;">&nbsp;</td>
</tr>
<tr>
<td style="border-bottom:1px solid silver;border-right:1px solid silver;">&nbsp;</td>
<td style="border-bottom:1px solid silver;border-right:1px solid silver;">&nbsp;</td>
<td style="border-bottom:1px solid silver;border-right:1px solid silver;">&nbsp;</td>
<td style="border-bottom:1px solid silver;border-right:1px solid silver;">&nbsp;</td>
<td style="border-bottom:1px solid silver;border-right:1px solid silver;">&nbsp;</td>
<td style="border-bottom:1px solid silver;">&nbsp;</td>
</tr>
<tr>
<td style="border-bottom:1px solid silver;border-right:1px solid silver;">&nbsp;</td>
<td style="border-bottom:1px solid silver;border-right:1px solid silver;">&nbsp;</td>
<td style="border-bottom:1px solid silver;border-right:1px solid silver;">&nbsp;</td>
<td style="border-bottom:1px solid silver;border-right:1px solid silver;">&nbsp;</td>
<td style="border-bottom:1px solid silver;border-right:1px solid silver;">&nbsp;</td>
<td style="border-bottom:1px solid silver;">&nbsp;</td>
</tr>
<tr>
<td style="border-bottom:1px solid silver;border-right:1px solid silver;">&nbsp;</td>
<td style="border-bottom:1px solid silver;border-right:1px solid silver;">&nbsp;</td>
<td style="border-bottom:1px solid silver;border-right:1px solid silver;">&nbsp;</td>
<td style="border-bottom:1px solid silver;border-right:1px solid silver;">&nbsp;</td>
<td style="border-bottom:1px solid silver;border-right:1px solid silver;">&nbsp;</td>
<td style="border-bottom:1px solid silver;">&nbsp;</td>
</tr> 
<tr>
<td style="border-bottom:1px solid silver;border-right:1px solid silver;">&nbsp;</td>
<td style="border-bottom:1px solid silver;border-right:1px solid silver;">&nbsp;</td>
<td style="border-bottom:1px solid silver;border-right:1px solid silver;">&nbsp;</td>
<td style="border-bottom:1px solid silver;border-right:1px solid silver;">&nbsp;</td>
<td style="border-bottom:1px solid silver;border-right:1px solid silver;">&nbsp;</td>
<td style="border-bottom:1px solid silver;">&nbsp;</td>
</tr>
<tr>
<td style="border-bottom:1px solid silver;border-right:1px solid silver;">&nbsp;</td>
<td style="border-bottom:1px solid silver;border-right:1px solid silver;">&nbsp;</td>
<td style="border-bottom:1px solid silver;border-right:1px solid silver;">&nbsp;</td>
<td style="border-bottom:1px solid silver;border-right:1px solid silver;">&nbsp;</td>
<td style="border-bottom:1px solid silver;border-right:1px solid silver;">&nbsp;</td>
<td style="border-bottom:1px solid silver;">&nbsp;</td>
</tr>
<tr>
<td style="border-bottom:1px solid silver;border-right:1px solid silver;">&nbsp;</td>
<td style="border-bottom:1px solid silver;border-right:1px solid silver;">&nbsp;</td>
<td style="border-bottom:1px solid silver;border-right:1px solid silver;">&nbsp;</td>
<td style="border-bottom:1px solid silver;border-right:1px solid silver;">&nbsp;</td>
<td style="border-bottom:1px solid silver;border-right:1px solid silver;">&nbsp;</td>
<td style="border-bottom:1px solid silver;">&nbsp;</td>
</tr>
<tr>
<td style="border-bottom:1px solid silver;border-right:1px solid silver;">&nbsp;</td>
<td style="border-bottom:1px solid silver;border-right:1px solid silver;">&nbsp;</td>
<td style="border-bottom:1px solid silver;border-right:1px solid silver;">&nbsp;</td>
<td style="border-bottom:1px solid silver;border-right:1px solid silver;">&nbsp;</td>
<td style="border-bottom:1px solid silver;border-right:1px solid silver;">&nbsp;</td>
<td style="border-bottom:1px solid silver;">&nbsp;</td>
</tr>
<tr>
<td style="border-bottom:1px solid silver;border-right:1px solid silver;">&nbsp;</td>
<td style="border-bottom:1px solid silver;border-right:1px solid silver;">&nbsp;</td>
<td style="border-bottom:1px solid silver;border-right:1px solid silver;">&nbsp;</td>
<td style="border-bottom:1px solid silver;border-right:1px solid silver;">&nbsp;</td>
<td style="border-bottom:1px solid silver;border-right:1px solid silver;">&nbsp;</td>
<td style="border-bottom:1px solid silver;">&nbsp;</td>
</tr>
<tr>
<td style="border-bottom:1px solid silver;border-right:1px solid silver;">&nbsp;</td>
<td style="border-bottom:1px solid silver;border-right:1px solid silver;">&nbsp;</td>
<td style="border-bottom:1px solid silver;border-right:1px solid silver;">&nbsp;</td>
<td style="border-bottom:1px solid silver;border-right:1px solid silver;">&nbsp;</td>
<td style="border-bottom:1px solid silver;border-right:1px solid silver;">&nbsp;</td>
<td style="border-bottom:1px solid silver;">&nbsp;</td>
</tr>
<tr>
<td style="border-bottom:1px solid silver;border-right:1px solid silver;">&nbsp;</td>
<td style="border-bottom:1px solid silver;border-right:1px solid silver;">&nbsp;</td>
<td style="border-bottom:1px solid silver;border-right:1px solid silver;">&nbsp;</td>
<td style="border-bottom:1px solid silver;border-right:1px solid silver;">&nbsp;</td>
<td style="border-bottom:1px solid silver;border-right:1px solid silver;">&nbsp;</td>
<td style="border-bottom:1px solid silver;">&nbsp;</td>
</tr>
<tr>
<td style="border-bottom:1px solid silver;border-right:1px solid silver;">&nbsp;</td>
<td style="border-bottom:1px solid silver;border-right:1px solid silver;">&nbsp;</td>
<td style="border-bottom:1px solid silver;border-right:1px solid silver;">&nbsp;</td>
<td style="border-bottom:1px solid silver;border-right:1px solid silver;">&nbsp;</td>
<td style="border-bottom:1px solid silver;border-right:1px solid silver;">&nbsp;</td>
<td style="border-bottom:1px solid silver;">&nbsp;</td>
</tr>
<tr>
<td style="border-bottom:1px solid silver;border-right:1px solid silver;">&nbsp;</td>
<td style="border-bottom:1px solid silver;border-right:1px solid silver;">&nbsp;</td>
<td style="border-bottom:1px solid silver;border-right:1px solid silver;">&nbsp;</td>
<td style="border-bottom:1px solid silver;border-right:1px solid silver;">&nbsp;</td>
<td style="border-bottom:1px solid silver;border-right:1px solid silver;">&nbsp;</td>
<td style="border-bottom:1px solid silver;">&nbsp;</td>
</tr>
<tr>
<td style="border-bottom:1px solid silver;border-right:1px solid silver;">&nbsp;</td>
<td style="border-bottom:1px solid silver;border-right:1px solid silver;">&nbsp;</td>
<td style="border-bottom:1px solid silver;border-right:1px solid silver;">&nbsp;</td>
<td style="border-bottom:1px solid silver;border-right:1px solid silver;">&nbsp;</td>
<td style="border-bottom:1px solid silver;border-right:1px solid silver;">&nbsp;</td>
<td style="border-bottom:1px solid silver;">&nbsp;</td>
</tr>  
</table></div>
<!--赛事2结束-->
<!--赛事3开始-->
<div id="con_zpml_3" style="display:none"><table width="%" >
<tr>
<td colspan="2" bgcolor="#96C2F1" style="border-bottom:1px solid silver;border-right:1px solid silver;"><div align="center"><strong>正方作品3</strong></div></td>
<td colspan="2" bgcolor="#96C2F1"style="border-bottom:1px solid silver;border-right:1px solid silver;"><div align="center"><strong>反方作品</strong></div></td>
<td colspan="2" bgcolor="#96C2F1"style="border-bottom:1px solid silver;"><div align="center"><strong>新义作品</strong></div></td>
</tr>
<tr>
<td width="200"style="border-bottom:1px solid silver;border-right:1px solid silver;">参赛标题</td>
<td width="55"style="border-bottom:1px solid silver;border-right:1px solid silver;">参赛作者</td>
<td width="200"style="border-bottom:1px solid silver;border-right:1px solid silver;">参赛标题</td>
<td width="55"style="border-bottom:1px solid silver;border-right:1px solid silver;">参赛作者</td>
<td width="200"style="border-bottom:1px solid silver;border-right:1px solid silver;">参赛标题</td>
<td width="55"style="border-bottom:1px solid silver;">参赛作者</td>
</tr>
<tr>
<td style="border-bottom:1px solid silver;border-right:1px solid silver;">&nbsp;</td>
<td style="border-bottom:1px solid silver;border-right:1px solid silver;">&nbsp;</td>
<td style="border-bottom:1px solid silver;border-right:1px solid silver;">&nbsp;</td>
<td style="border-bottom:1px solid silver;border-right:1px solid silver;">&nbsp;</td>
<td style="border-bottom:1px solid silver;border-right:1px solid silver;">&nbsp;</td>
<td style="border-bottom:1px solid silver;">&nbsp;</td>
</tr>
<tr>
<td style="border-bottom:1px solid silver;border-right:1px solid silver;">&nbsp;</td>
<td style="border-bottom:1px solid silver;border-right:1px solid silver;">&nbsp;</td>
<td style="border-bottom:1px solid silver;border-right:1px solid silver;">&nbsp;</td>
<td style="border-bottom:1px solid silver;border-right:1px solid silver;">&nbsp;</td>
<td style="border-bottom:1px solid silver;border-right:1px solid silver;">&nbsp;</td>
<td style="border-bottom:1px solid silver;">&nbsp;</td>
</tr>
<tr>
<td style="border-bottom:1px solid silver;border-right:1px solid silver;">&nbsp;</td>
<td style="border-bottom:1px solid silver;border-right:1px solid silver;">&nbsp;</td>
<td style="border-bottom:1px solid silver;border-right:1px solid silver;">&nbsp;</td>
<td style="border-bottom:1px solid silver;border-right:1px solid silver;">&nbsp;</td>
<td style="border-bottom:1px solid silver;border-right:1px solid silver;">&nbsp;</td>
<td style="border-bottom:1px solid silver;">&nbsp;</td>
</tr>
<tr>
<td style="border-bottom:1px solid silver;border-right:1px solid silver;">&nbsp;</td>
<td style="border-bottom:1px solid silver;border-right:1px solid silver;">&nbsp;</td>
<td style="border-bottom:1px solid silver;border-right:1px solid silver;">&nbsp;</td>
<td style="border-bottom:1px solid silver;border-right:1px solid silver;">&nbsp;</td>
<td style="border-bottom:1px solid silver;border-right:1px solid silver;">&nbsp;</td>
<td style="border-bottom:1px solid silver;">&nbsp;</td>
</tr> 
<tr>
<td style="border-bottom:1px solid silver;border-right:1px solid silver;">&nbsp;</td>
<td style="border-bottom:1px solid silver;border-right:1px solid silver;">&nbsp;</td>
<td style="border-bottom:1px solid silver;border-right:1px solid silver;">&nbsp;</td>
<td style="border-bottom:1px solid silver;border-right:1px solid silver;">&nbsp;</td>
<td style="border-bottom:1px solid silver;border-right:1px solid silver;">&nbsp;</td>
<td style="border-bottom:1px solid silver;">&nbsp;</td>
</tr>
<tr>
<td style="border-bottom:1px solid silver;border-right:1px solid silver;">&nbsp;</td>
<td style="border-bottom:1px solid silver;border-right:1px solid silver;">&nbsp;</td>
<td style="border-bottom:1px solid silver;border-right:1px solid silver;">&nbsp;</td>
<td style="border-bottom:1px solid silver;border-right:1px solid silver;">&nbsp;</td>
<td style="border-bottom:1px solid silver;border-right:1px solid silver;">&nbsp;</td>
<td style="border-bottom:1px solid silver;">&nbsp;</td>
</tr>
<tr>
<td style="border-bottom:1px solid silver;border-right:1px solid silver;">&nbsp;</td>
<td style="border-bottom:1px solid silver;border-right:1px solid silver;">&nbsp;</td>
<td style="border-bottom:1px solid silver;border-right:1px solid silver;">&nbsp;</td>
<td style="border-bottom:1px solid silver;border-right:1px solid silver;">&nbsp;</td>
<td style="border-bottom:1px solid silver;border-right:1px solid silver;">&nbsp;</td>
<td style="border-bottom:1px solid silver;">&nbsp;</td>
</tr>
<tr>
<td style="border-bottom:1px solid silver;border-right:1px solid silver;">&nbsp;</td>
<td style="border-bottom:1px solid silver;border-right:1px solid silver;">&nbsp;</td>
<td style="border-bottom:1px solid silver;border-right:1px solid silver;">&nbsp;</td>
<td style="border-bottom:1px solid silver;border-right:1px solid silver;">&nbsp;</td>
<td style="border-bottom:1px solid silver;border-right:1px solid silver;">&nbsp;</td>
<td style="border-bottom:1px solid silver;">&nbsp;</td>
</tr>
<tr>
<td style="border-bottom:1px solid silver;border-right:1px solid silver;">&nbsp;</td>
<td style="border-bottom:1px solid silver;border-right:1px solid silver;">&nbsp;</td>
<td style="border-bottom:1px solid silver;border-right:1px solid silver;">&nbsp;</td>
<td style="border-bottom:1px solid silver;border-right:1px solid silver;">&nbsp;</td>
<td style="border-bottom:1px solid silver;border-right:1px solid silver;">&nbsp;</td>
<td style="border-bottom:1px solid silver;">&nbsp;</td>
</tr>
<tr>
<td style="border-bottom:1px solid silver;border-right:1px solid silver;">&nbsp;</td>
<td style="border-bottom:1px solid silver;border-right:1px solid silver;">&nbsp;</td>
<td style="border-bottom:1px solid silver;border-right:1px solid silver;">&nbsp;</td>
<td style="border-bottom:1px solid silver;border-right:1px solid silver;">&nbsp;</td>
<td style="border-bottom:1px solid silver;border-right:1px solid silver;">&nbsp;</td>
<td style="border-bottom:1px solid silver;">&nbsp;</td>
</tr>
<tr>
<td style="border-bottom:1px solid silver;border-right:1px solid silver;">&nbsp;</td>
<td style="border-bottom:1px solid silver;border-right:1px solid silver;">&nbsp;</td>
<td style="border-bottom:1px solid silver;border-right:1px solid silver;">&nbsp;</td>
<td style="border-bottom:1px solid silver;border-right:1px solid silver;">&nbsp;</td>
<td style="border-bottom:1px solid silver;border-right:1px solid silver;">&nbsp;</td>
<td style="border-bottom:1px solid silver;">&nbsp;</td>
</tr>
<tr>
<td style="border-bottom:1px solid silver;border-right:1px solid silver;">&nbsp;</td>
<td style="border-bottom:1px solid silver;border-right:1px solid silver;">&nbsp;</td>
<td style="border-bottom:1px solid silver;border-right:1px solid silver;">&nbsp;</td>
<td style="border-bottom:1px solid silver;border-right:1px solid silver;">&nbsp;</td>
<td style="border-bottom:1px solid silver;border-right:1px solid silver;">&nbsp;</td>
<td style="border-bottom:1px solid silver;">&nbsp;</td>
</tr>
<tr>
<td style="border-bottom:1px solid silver;border-right:1px solid silver;">&nbsp;</td>
<td style="border-bottom:1px solid silver;border-right:1px solid silver;">&nbsp;</td>
<td style="border-bottom:1px solid silver;border-right:1px solid silver;">&nbsp;</td>
<td style="border-bottom:1px solid silver;border-right:1px solid silver;">&nbsp;</td>
<td style="border-bottom:1px solid silver;border-right:1px solid silver;">&nbsp;</td>
<td style="border-bottom:1px solid silver;">&nbsp;</td>
</tr>
<tr>
<td style="border-bottom:1px solid silver;border-right:1px solid silver;">&nbsp;</td>
<td style="border-bottom:1px solid silver;border-right:1px solid silver;">&nbsp;</td>
<td style="border-bottom:1px solid silver;border-right:1px solid silver;">&nbsp;</td>
<td style="border-bottom:1px solid silver;border-right:1px solid silver;">&nbsp;</td>
<td style="border-bottom:1px solid silver;border-right:1px solid silver;">&nbsp;</td>
<td style="border-bottom:1px solid silver;">&nbsp;</td>
</tr>  
</table></div>
<!--赛事3结束-->
<!--赛事4开始-->
<div id="con_zpml_4" style="display:none"><table width="%" >
<tr>
<td colspan="2" bgcolor="#96C2F1"style="border-bottom:1px solid silver;border-right:1px solid silver;"><div align="center"><strong>正方作品4</strong></div></td>
<td colspan="2" bgcolor="#96C2F1"style="border-bottom:1px solid silver;border-right:1px solid silver;"><div align="center"><strong>反方作品</strong></div></td>
<td colspan="2" bgcolor="#96C2F1"style="border-bottom:1px solid silver;"><div align="center"><strong>新义作品</strong></div></td>
</tr>
<tr>
<td width="200"style="border-bottom:1px solid silver;border-right:1px solid silver;">参赛标题</td>
<td width="55"style="border-bottom:1px solid silver;border-right:1px solid silver;">参赛作者</td>
<td width="200"style="border-bottom:1px solid silver;border-right:1px solid silver;">参赛标题</td>
<td width="55"style="border-bottom:1px solid silver;border-right:1px solid silver;">参赛作者</td>
<td width="200"style="border-bottom:1px solid silver;border-right:1px solid silver;">参赛标题</td>
<td width="55"style="border-bottom:1px solid silver;">参赛作者</td>
</tr>
<tr>
<td style="border-bottom:1px solid silver;border-right:1px solid silver;">&nbsp;</td>
<td style="border-bottom:1px solid silver;border-right:1px solid silver;">&nbsp;</td>
<td style="border-bottom:1px solid silver;border-right:1px solid silver;">&nbsp;</td>
<td style="border-bottom:1px solid silver;border-right:1px solid silver;">&nbsp;</td>
<td style="border-bottom:1px solid silver;border-right:1px solid silver;">&nbsp;</td>
<td style="border-bottom:1px solid silver;">&nbsp;</td>
</tr>
<tr>
<td style="border-bottom:1px solid silver;border-right:1px solid silver;">&nbsp;</td>
<td style="border-bottom:1px solid silver;border-right:1px solid silver;">&nbsp;</td>
<td style="border-bottom:1px solid silver;border-right:1px solid silver;">&nbsp;</td>
<td style="border-bottom:1px solid silver;border-right:1px solid silver;">&nbsp;</td>
<td style="border-bottom:1px solid silver;border-right:1px solid silver;">&nbsp;</td>
<td style="border-bottom:1px solid silver;">&nbsp;</td>
</tr>
<tr>
<td style="border-bottom:1px solid silver;border-right:1px solid silver;">&nbsp;</td>
<td style="border-bottom:1px solid silver;border-right:1px solid silver;">&nbsp;</td>
<td style="border-bottom:1px solid silver;border-right:1px solid silver;">&nbsp;</td>
<td style="border-bottom:1px solid silver;border-right:1px solid silver;">&nbsp;</td>
<td style="border-bottom:1px solid silver;border-right:1px solid silver;">&nbsp;</td>
<td style="border-bottom:1px solid silver;">&nbsp;</td>
</tr>
<tr>
<td style="border-bottom:1px solid silver;border-right:1px solid silver;">&nbsp;</td>
<td style="border-bottom:1px solid silver;border-right:1px solid silver;">&nbsp;</td>
<td style="border-bottom:1px solid silver;border-right:1px solid silver;">&nbsp;</td>
<td style="border-bottom:1px solid silver;border-right:1px solid silver;">&nbsp;</td>
<td style="border-bottom:1px solid silver;border-right:1px solid silver;">&nbsp;</td>
<td style="border-bottom:1px solid silver;">&nbsp;</td>
</tr> 
<tr>
<td style="border-bottom:1px solid silver;border-right:1px solid silver;">&nbsp;</td>
<td style="border-bottom:1px solid silver;border-right:1px solid silver;">&nbsp;</td>
<td style="border-bottom:1px solid silver;border-right:1px solid silver;">&nbsp;</td>
<td style="border-bottom:1px solid silver;border-right:1px solid silver;">&nbsp;</td>
<td style="border-bottom:1px solid silver;border-right:1px solid silver;">&nbsp;</td>
<td style="border-bottom:1px solid silver;">&nbsp;</td>
</tr>
<tr>
<td style="border-bottom:1px solid silver;border-right:1px solid silver;">&nbsp;</td>
<td style="border-bottom:1px solid silver;border-right:1px solid silver;">&nbsp;</td>
<td style="border-bottom:1px solid silver;border-right:1px solid silver;">&nbsp;</td>
<td style="border-bottom:1px solid silver;border-right:1px solid silver;">&nbsp;</td>
<td style="border-bottom:1px solid silver;border-right:1px solid silver;">&nbsp;</td>
<td style="border-bottom:1px solid silver;">&nbsp;</td>
</tr>
<tr>
<td style="border-bottom:1px solid silver;border-right:1px solid silver;">&nbsp;</td>
<td style="border-bottom:1px solid silver;border-right:1px solid silver;">&nbsp;</td>
<td style="border-bottom:1px solid silver;border-right:1px solid silver;">&nbsp;</td>
<td style="border-bottom:1px solid silver;border-right:1px solid silver;">&nbsp;</td>
<td style="border-bottom:1px solid silver;border-right:1px solid silver;">&nbsp;</td>
<td style="border-bottom:1px solid silver;">&nbsp;</td>
</tr>
<tr>
<td style="border-bottom:1px solid silver;border-right:1px solid silver;">&nbsp;</td>
<td style="border-bottom:1px solid silver;border-right:1px solid silver;">&nbsp;</td>
<td style="border-bottom:1px solid silver;border-right:1px solid silver;">&nbsp;</td>
<td style="border-bottom:1px solid silver;border-right:1px solid silver;">&nbsp;</td>
<td style="border-bottom:1px solid silver;border-right:1px solid silver;">&nbsp;</td>
<td style="border-bottom:1px solid silver;">&nbsp;</td>
</tr>
<tr>
<td style="border-bottom:1px solid silver;border-right:1px solid silver;">&nbsp;</td>
<td style="border-bottom:1px solid silver;border-right:1px solid silver;">&nbsp;</td>
<td style="border-bottom:1px solid silver;border-right:1px solid silver;">&nbsp;</td>
<td style="border-bottom:1px solid silver;border-right:1px solid silver;">&nbsp;</td>
<td style="border-bottom:1px solid silver;border-right:1px solid silver;">&nbsp;</td>
<td style="border-bottom:1px solid silver;">&nbsp;</td>
</tr>
<tr>
<td style="border-bottom:1px solid silver;border-right:1px solid silver;">&nbsp;</td>
<td style="border-bottom:1px solid silver;border-right:1px solid silver;">&nbsp;</td>
<td style="border-bottom:1px solid silver;border-right:1px solid silver;">&nbsp;</td>
<td style="border-bottom:1px solid silver;border-right:1px solid silver;">&nbsp;</td>
<td style="border-bottom:1px solid silver;border-right:1px solid silver;">&nbsp;</td>
<td style="border-bottom:1px solid silver;">&nbsp;</td>
</tr>
<tr>
<td style="border-bottom:1px solid silver;border-right:1px solid silver;">&nbsp;</td>
<td style="border-bottom:1px solid silver;border-right:1px solid silver;">&nbsp;</td>
<td style="border-bottom:1px solid silver;border-right:1px solid silver;">&nbsp;</td>
<td style="border-bottom:1px solid silver;border-right:1px solid silver;">&nbsp;</td>
<td style="border-bottom:1px solid silver;border-right:1px solid silver;">&nbsp;</td>
<td style="border-bottom:1px solid silver;">&nbsp;</td>
</tr>
<tr>
<td style="border-bottom:1px solid silver;border-right:1px solid silver;">&nbsp;</td>
<td style="border-bottom:1px solid silver;border-right:1px solid silver;">&nbsp;</td>
<td style="border-bottom:1px solid silver;border-right:1px solid silver;">&nbsp;</td>
<td style="border-bottom:1px solid silver;border-right:1px solid silver;">&nbsp;</td>
<td style="border-bottom:1px solid silver;border-right:1px solid silver;">&nbsp;</td>
<td style="border-bottom:1px solid silver;">&nbsp;</td>
</tr>
<tr>
<td style="border-bottom:1px solid silver;border-right:1px solid silver;">&nbsp;</td>
<td style="border-bottom:1px solid silver;border-right:1px solid silver;">&nbsp;</td>
<td style="border-bottom:1px solid silver;border-right:1px solid silver;">&nbsp;</td>
<td style="border-bottom:1px solid silver;border-right:1px solid silver;">&nbsp;</td>
<td style="border-bottom:1px solid silver;border-right:1px solid silver;">&nbsp;</td>
<td style="border-bottom:1px solid silver;">&nbsp;</td>
</tr>
<tr>
<td style="border-bottom:1px solid silver;border-right:1px solid silver;">&nbsp;</td>
<td style="border-bottom:1px solid silver;border-right:1px solid silver;">&nbsp;</td>
<td style="border-bottom:1px solid silver;border-right:1px solid silver;">&nbsp;</td>
<td style="border-bottom:1px solid silver;border-right:1px solid silver;">&nbsp;</td>
<td style="border-bottom:1px solid silver;border-right:1px solid silver;">&nbsp;</td>
<td style="border-bottom:1px solid silver;">&nbsp;</td>
</tr>  
</table></div>
<!--赛事4结束-->
<!--赛事5开始-->
<div id="con_zpml_5" style="display:none"><table width="%" >
<tr>
<td colspan="2" bgcolor="#96C2F1" style="border-bottom:1px solid silver;border-right:1px solid silver;"><div align="center"><strong>正方作品5</strong></div></td>
<td colspan="2" bgcolor="#96C2F1"style="border-bottom:1px solid silver;border-right:1px solid silver;"><div align="center"><strong>反方作品</strong></div></td>
<td colspan="2" bgcolor="#96C2F1"style="border-bottom:1px solid silver;"><div align="center"><strong>新义作品</strong></div></td>
</tr>
<tr>
<td width="200"style="border-bottom:1px solid silver;border-right:1px solid silver;">参赛标题</td>
<td width="55"style="border-bottom:1px solid silver;border-right:1px solid silver;">参赛作者</td>
<td width="200"style="border-bottom:1px solid silver;border-right:1px solid silver;">参赛标题</td>
<td width="55"style="border-bottom:1px solid silver;border-right:1px solid silver;">参赛作者</td>
<td width="200"style="border-bottom:1px solid silver;border-right:1px solid silver;">参赛标题</td>
<td width="55"style="border-bottom:1px solid silver;">参赛作者</td>
</tr>
<tr>
<td style="border-bottom:1px solid silver;border-right:1px solid silver;">&nbsp;</td>
<td style="border-bottom:1px solid silver;border-right:1px solid silver;">&nbsp;</td>
<td style="border-bottom:1px solid silver;border-right:1px solid silver;">&nbsp;</td>
<td style="border-bottom:1px solid silver;border-right:1px solid silver;">&nbsp;</td>
<td style="border-bottom:1px solid silver;border-right:1px solid silver;">&nbsp;</td>
<td style="border-bottom:1px solid silver;">&nbsp;</td>
</tr>
<tr>
<td style="border-bottom:1px solid silver;border-right:1px solid silver;">&nbsp;</td>
<td style="border-bottom:1px solid silver;border-right:1px solid silver;">&nbsp;</td>
<td style="border-bottom:1px solid silver;border-right:1px solid silver;">&nbsp;</td>
<td style="border-bottom:1px solid silver;border-right:1px solid silver;">&nbsp;</td>
<td style="border-bottom:1px solid silver;border-right:1px solid silver;">&nbsp;</td>
<td style="border-bottom:1px solid silver;">&nbsp;</td>
</tr>
<tr>
<td style="border-bottom:1px solid silver;border-right:1px solid silver;">&nbsp;</td>
<td style="border-bottom:1px solid silver;border-right:1px solid silver;">&nbsp;</td>
<td style="border-bottom:1px solid silver;border-right:1px solid silver;">&nbsp;</td>
<td style="border-bottom:1px solid silver;border-right:1px solid silver;">&nbsp;</td>
<td style="border-bottom:1px solid silver;border-right:1px solid silver;">&nbsp;</td>
<td style="border-bottom:1px solid silver;">&nbsp;</td>
</tr>
<tr>
<td style="border-bottom:1px solid silver;border-right:1px solid silver;">&nbsp;</td>
<td style="border-bottom:1px solid silver;border-right:1px solid silver;">&nbsp;</td>
<td style="border-bottom:1px solid silver;border-right:1px solid silver;">&nbsp;</td>
<td style="border-bottom:1px solid silver;border-right:1px solid silver;">&nbsp;</td>
<td style="border-bottom:1px solid silver;border-right:1px solid silver;">&nbsp;</td>
<td style="border-bottom:1px solid silver;">&nbsp;</td>
</tr> 
<tr>
<td style="border-bottom:1px solid silver;border-right:1px solid silver;">&nbsp;</td>
<td style="border-bottom:1px solid silver;border-right:1px solid silver;">&nbsp;</td>
<td style="border-bottom:1px solid silver;border-right:1px solid silver;">&nbsp;</td>
<td style="border-bottom:1px solid silver;border-right:1px solid silver;">&nbsp;</td>
<td style="border-bottom:1px solid silver;border-right:1px solid silver;">&nbsp;</td>
<td style="border-bottom:1px solid silver;">&nbsp;</td>
</tr>
<tr>
<td style="border-bottom:1px solid silver;border-right:1px solid silver;">&nbsp;</td>
<td style="border-bottom:1px solid silver;border-right:1px solid silver;">&nbsp;</td>
<td style="border-bottom:1px solid silver;border-right:1px solid silver;">&nbsp;</td>
<td style="border-bottom:1px solid silver;border-right:1px solid silver;">&nbsp;</td>
<td style="border-bottom:1px solid silver;border-right:1px solid silver;">&nbsp;</td>
<td style="border-bottom:1px solid silver;">&nbsp;</td>
</tr>
<tr>
<td style="border-bottom:1px solid silver;border-right:1px solid silver;">&nbsp;</td>
<td style="border-bottom:1px solid silver;border-right:1px solid silver;">&nbsp;</td>
<td style="border-bottom:1px solid silver;border-right:1px solid silver;">&nbsp;</td>
<td style="border-bottom:1px solid silver;border-right:1px solid silver;">&nbsp;</td>
<td style="border-bottom:1px solid silver;border-right:1px solid silver;">&nbsp;</td>
<td style="border-bottom:1px solid silver;">&nbsp;</td>
</tr>
<tr>
<td style="border-bottom:1px solid silver;border-right:1px solid silver;">&nbsp;</td>
<td style="border-bottom:1px solid silver;border-right:1px solid silver;">&nbsp;</td>
<td style="border-bottom:1px solid silver;border-right:1px solid silver;">&nbsp;</td>
<td style="border-bottom:1px solid silver;border-right:1px solid silver;">&nbsp;</td>
<td style="border-bottom:1px solid silver;border-right:1px solid silver;">&nbsp;</td>
<td style="border-bottom:1px solid silver;">&nbsp;</td>
</tr>
<tr>
<td style="border-bottom:1px solid silver;border-right:1px solid silver;">&nbsp;</td>
<td style="border-bottom:1px solid silver;border-right:1px solid silver;">&nbsp;</td>
<td style="border-bottom:1px solid silver;border-right:1px solid silver;">&nbsp;</td>
<td style="border-bottom:1px solid silver;border-right:1px solid silver;">&nbsp;</td>
<td style="border-bottom:1px solid silver;border-right:1px solid silver;">&nbsp;</td>
<td style="border-bottom:1px solid silver;">&nbsp;</td>
</tr>
<tr>
<td style="border-bottom:1px solid silver;border-right:1px solid silver;">&nbsp;</td>
<td style="border-bottom:1px solid silver;border-right:1px solid silver;">&nbsp;</td>
<td style="border-bottom:1px solid silver;border-right:1px solid silver;">&nbsp;</td>
<td style="border-bottom:1px solid silver;border-right:1px solid silver;">&nbsp;</td>
<td style="border-bottom:1px solid silver;border-right:1px solid silver;">&nbsp;</td>
<td style="border-bottom:1px solid silver;">&nbsp;</td>
</tr>
<tr>
<td style="border-bottom:1px solid silver;border-right:1px solid silver;">&nbsp;</td>
<td style="border-bottom:1px solid silver;border-right:1px solid silver;">&nbsp;</td>
<td style="border-bottom:1px solid silver;border-right:1px solid silver;">&nbsp;</td>
<td style="border-bottom:1px solid silver;border-right:1px solid silver;">&nbsp;</td>
<td style="border-bottom:1px solid silver;border-right:1px solid silver;">&nbsp;</td>
<td style="border-bottom:1px solid silver;">&nbsp;</td>
</tr>
<tr>
<td style="border-bottom:1px solid silver;border-right:1px solid silver;">&nbsp;</td>
<td style="border-bottom:1px solid silver;border-right:1px solid silver;">&nbsp;</td>
<td style="border-bottom:1px solid silver;border-right:1px solid silver;">&nbsp;</td>
<td style="border-bottom:1px solid silver;border-right:1px solid silver;">&nbsp;</td>
<td style="border-bottom:1px solid silver;border-right:1px solid silver;">&nbsp;</td>
<td style="border-bottom:1px solid silver;">&nbsp;</td>
</tr>
<tr>
<td style="border-bottom:1px solid silver;border-right:1px solid silver;">&nbsp;</td>
<td style="border-bottom:1px solid silver;border-right:1px solid silver;">&nbsp;</td>
<td style="border-bottom:1px solid silver;border-right:1px solid silver;">&nbsp;</td>
<td style="border-bottom:1px solid silver;border-right:1px solid silver;">&nbsp;</td>
<td style="border-bottom:1px solid silver;border-right:1px solid silver;">&nbsp;</td>
<td style="border-bottom:1px solid silver;">&nbsp;</td>
</tr>
<tr>
<td style="border-bottom:1px solid silver;border-right:1px solid silver;">&nbsp;</td>
<td style="border-bottom:1px solid silver;border-right:1px solid silver;">&nbsp;</td>
<td style="border-bottom:1px solid silver;border-right:1px solid silver;">&nbsp;</td>
<td style="border-bottom:1px solid silver;border-right:1px solid silver;">&nbsp;</td>
<td style="border-bottom:1px solid silver;border-right:1px solid silver;">&nbsp;</td>
<td style="border-bottom:1px solid silver;">&nbsp;</td>
</tr>  
</table></div>
<!--赛事5结束-->
<div style="width:720px; margin:5px 5px 0px 5px; position:relative; height:25px;border:0px solid silver;float:left;background:#96C2F1;"><div id="bt5"><div align="center">参赛作品</div></div></div>
</div><!--作品目录结束-->
<!--比赛海报开始-->
<div style="width:66px; margin-top:5px; position:relative;height:337px;border:0px solid silver;float:left;background:#ffffff;">
<!--赛事1-->
<div id="con_hbml_1"><img style="border:2px solid #ffffff" src="images/p1.gif" width="62" height="328" /></div>
<!--赛事2-->
<div id="con_hbml_2"style="display:none"><img style="border:2px solid #ffffff" src="images/p2.gif" width="62" height="328" /></div>
<!--赛事3-->
<div id="con_hbml_3"style="display:none"><img style="border:2px solid #ffffff" src="images/p3.gif" width="62" height="328" /></div>
<!--赛事4-->
<div id="con_hbml_4"style="display:none"><img style="border:2px solid #ffffff" src="images/p4.gif" width="62" height="328" /></div>
<!--赛事5-->
<div id="con_hbml_5"style="display:none"><img style="border:2px solid #ffffff" src="images/p5.gif" width="62" height="328" /></div>
</div><!--比赛海报结束-->
<!--获胜目录开始-->
<div style="width:290px; margin:0pt auto; position:relative; height:340px;border:1px solid #96C2F1;float:left;background: #fdfdfd;">
<div style="width:270px;margin:5px 5px 0px 5px;position:relative;height:25px;border:0px solid silver;float:left;background:#96C2F1;"><div id="bt6"><div align="center">获胜目录</div></div></div>
<!--赛事1开始-->
<div id="con_hsml_1"><table width="%" border="0">
<tr>
<td width="200"style="border-bottom:1px solid silver;">获奖作品</td>
<td width="55"style="border-bottom:1px solid silver;">获奖姓名</td>
<td width="55"style="border-bottom:1px solid silver;">参赛次数</td>
</tr>
<tr>
<td style="border-bottom:1px solid silver;">&nbsp;</td>
<td style="border-bottom:1px solid silver;">&nbsp;</td>
<td style="border-bottom:1px solid silver;">&nbsp;</td>
</tr>
<tr>
<td style="border-bottom:1px solid silver;">&nbsp;</td>
<td style="border-bottom:1px solid silver;">&nbsp;</td>
<td style="border-bottom:1px solid silver;">&nbsp;</td>
</tr>
<tr>
<td style="border-bottom:1px solid silver;">&nbsp;</td>
<td style="border-bottom:1px solid silver;">&nbsp;</td>
<td style="border-bottom:1px solid silver;">&nbsp;</td>
</tr>
<tr>
<td style="border-bottom:1px solid silver;">&nbsp;</td>
<td style="border-bottom:1px solid silver;">&nbsp;</td>
<td style="border-bottom:1px solid silver;">&nbsp;</td>
</tr>
</table></div>
<!--赛事1结束-->
<!--赛事2开始-->
<div id="con_hsml_2"style="display:none"><table width="%" border="0">
<tr>
<td width="200"style="border-bottom:1px solid silver;">获奖作品2</td>
<td width="55"style="border-bottom:1px solid silver;">获奖姓名</td>
<td width="55"style="border-bottom:1px solid silver;">参赛次数</td>
</tr>
<tr>
<td style="border-bottom:1px solid silver;">&nbsp;</td>
<td style="border-bottom:1px solid silver;">&nbsp;</td>
<td style="border-bottom:1px solid silver;">&nbsp;</td>
</tr>
<tr>
<td style="border-bottom:1px solid silver;">&nbsp;</td>
<td style="border-bottom:1px solid silver;">&nbsp;</td>
<td style="border-bottom:1px solid silver;">&nbsp;</td>
</tr>
<tr>
<td style="border-bottom:1px solid silver;">&nbsp;</td>
<td style="border-bottom:1px solid silver;">&nbsp;</td>
<td style="border-bottom:1px solid silver;">&nbsp;</td>
</tr>
<tr>
<td style="border-bottom:1px solid silver;">&nbsp;</td>
<td style="border-bottom:1px solid silver;">&nbsp;</td>
<td style="border-bottom:1px solid silver;">&nbsp;</td>
</tr>
</table></div>
<!--赛事2结束-->
<!--赛事3开始-->
<div id="con_hsml_3"style="display:none"><table width="%" border="0">
<tr>
<td width="200"style="border-bottom:1px solid silver;">获奖作品3</td>
<td width="55"style="border-bottom:1px solid silver;">获奖姓名</td>
<td width="55"style="border-bottom:1px solid silver;">参赛次数</td>
</tr>
<tr>
<td style="border-bottom:1px solid silver;">&nbsp;</td>
<td style="border-bottom:1px solid silver;">&nbsp;</td>
<td style="border-bottom:1px solid silver;">&nbsp;</td>
</tr>
<tr>
<td style="border-bottom:1px solid silver;">&nbsp;</td>
<td style="border-bottom:1px solid silver;">&nbsp;</td>
<td style="border-bottom:1px solid silver;">&nbsp;</td>
</tr>
<tr>
<td style="border-bottom:1px solid silver;">&nbsp;</td>
<td style="border-bottom:1px solid silver;">&nbsp;</td>
<td style="border-bottom:1px solid silver;">&nbsp;</td>
</tr>
<tr>
<td style="border-bottom:1px solid silver;">&nbsp;</td>
<td style="border-bottom:1px solid silver;">&nbsp;</td>
<td style="border-bottom:1px solid silver;">&nbsp;</td>
</tr>
</table></div>
<!--赛事3结束-->
<!--赛事4开始-->
<div id="con_hsml_4"style="display:none"><table width="%" border="0">
<tr>
<td width="200"style="border-bottom:1px solid silver;">获奖作品4</td>
<td width="55"style="border-bottom:1px solid silver;">获奖姓名</td>
<td width="55"style="border-bottom:1px solid silver;">参赛次数</td>
</tr>
<tr>
<td style="border-bottom:1px solid silver;">&nbsp;</td>
<td style="border-bottom:1px solid silver;">&nbsp;</td>
<td style="border-bottom:1px solid silver;">&nbsp;</td>
</tr>
<tr>
<td style="border-bottom:1px solid silver;">&nbsp;</td>
<td style="border-bottom:1px solid silver;">&nbsp;</td>
<td style="border-bottom:1px solid silver;">&nbsp;</td>
</tr>
<tr>
<td style="border-bottom:1px solid silver;">&nbsp;</td>
<td style="border-bottom:1px solid silver;">&nbsp;</td>
<td style="border-bottom:1px solid silver;">&nbsp;</td>
</tr>
<tr>
<td style="border-bottom:1px solid silver;">&nbsp;</td>
<td style="border-bottom:1px solid silver;">&nbsp;</td>
<td style="border-bottom:1px solid silver;">&nbsp;</td>
</tr>
</table></div>
<!--赛事4结束-->
<!--赛事5开始-->
<div id="con_hsml_5"style="display:none"><table width="%" border="0">
<tr>
<td width="200"style="border-bottom:1px solid silver;">获奖作品5</td>
<td width="55"style="border-bottom:1px solid silver;">获奖姓名</td>
<td width="55"style="border-bottom:1px solid silver;">参赛次数</td>
</tr>
<tr>
<td style="border-bottom:1px solid silver;">&nbsp;</td>
<td style="border-bottom:1px solid silver;">&nbsp;</td>
<td style="border-bottom:1px solid silver;">&nbsp;</td>
</tr>
<tr>
<td style="border-bottom:1px solid silver;">&nbsp;</td>
<td style="border-bottom:1px solid silver;">&nbsp;</td>
<td style="border-bottom:1px solid silver;">&nbsp;</td>
</tr>
<tr>
<td style="border-bottom:1px solid silver;">&nbsp;</td>
<td style="border-bottom:1px solid silver;">&nbsp;</td>
<td style="border-bottom:1px solid silver;">&nbsp;</td>
</tr>
<tr>
<td style="border-bottom:1px solid silver;">&nbsp;</td>
<td style="border-bottom:1px solid silver;">&nbsp;</td>
<td style="border-bottom:1px solid silver;">&nbsp;</td>
</tr>
</table></div>
<!--赛事5结束-->
</div><!--获胜目录结束-->
</div><!--参赛者目录结束-->
<!--间隔层-->
<div style="width:1130px; margin:0pt auto; position:relative; height:7px;float:left;border:0px solid silver;"></div>
<!--间隔层-->
<div style="width:1130px; margin:0pt auto; position:relative; height:50px;float:left;border:0px solid silver;background:#fdfdfd"></div>

<script>//各类型文件翻页控制
function setAab(name,cursel,n){
for(i=1;i<=n;i++){
var menu=document.getElementById(name+i);
var con=document.getElementById("con_"+name+"_"+i);
menu.className=i==cursel?"hover":"";
con.style.display=i==cursel?"block":"none";
}
}
</script>
<script language="javascript">
function show()//外链显示控制
{var a=document.location.href;
//图文(1);
if(a.indexOf("id=ba")==-1){}
else{location.hash="mao";//内容定位锚点
      document.getElementById("con_type_1").style.display="block";
      document.getElementById("con_graphic_1").style.display="block";
	  document.getElementById("con_st_1").style.display="block";}
//图文(2);
if(a.indexOf("id=bb")==-1){}
else{location.hash="mao";//内容定位锚点
      document.getElementById("con_type_1").style.display="block";document.getElementById("con_graphic_1").style.display="none";
      document.getElementById("con_graphic_2").style.display="block";
	  document.getElementById("con_st_2").style.display="block";document.getElementById("con_st_1").style.display="none";}
//图文(3);
if(a.indexOf("id=bc")==-1){}
else{location.hash="mao";//内容定位锚点
      document.getElementById("con_type_1").style.display="block";document.getElementById("con_graphic_1").style.display="none";
      document.getElementById("con_graphic_3").style.display="block";
	  document.getElementById("con_st_3").style.display="block";document.getElementById("con_st_1").style.display="none";}
//图片(1);
if(a.indexOf("id=ca")==-1){}
else{location.hash="mao";//内容定位锚点
      document.getElementById("con_type_1").style.display="none";document.getElementById("con_graphic_1").style.display="none";
      document.getElementById("con_type_2").style.display="block";
	  document.getElementById("con_st_4").style.display="block";document.getElementById("con_st_1").style.display="none";}
//图片(2);
if(a.indexOf("id=cb")==-1){}
else{location.hash="mao";//内容定位锚点
      document.getElementById("con_type_1").style.display="none";document.getElementById("con_graphic_1").style.display="none";
      document.getElementById("con_type_2").style.display="block";document.getElementById("con_picture_1").style.display="none";
	  document.getElementById("con_picture_2").style.display="block";
	  document.getElementById("con_st_5").style.display="block";document.getElementById("con_st_1").style.display="none";}  
//幻片(1);
if(a.indexOf("id=da")==-1){}
else{location.hash="mao";//内容定位锚点
      document.getElementById("con_type_1").style.display="none";document.getElementById("con_graphic_1").style.display="none";
      document.getElementById("con_type_3").style.display="block";}
//幻片(2);
if(a.indexOf("id=db")==-1){}
else{location.hash="mao";//内容定位锚点
      document.getElementById("con_type_1").style.display="none";document.getElementById("con_graphic_1").style.display="none";
      document.getElementById("con_type_3").style.display="block";document.getElementById("con_slide_1").style.display="none";
	  document.getElementById("con_slide_2").style.display="block";}
//视频(1);
if(a.indexOf("id=ea")==-1){}
else{location.hash="mao";//内容定位锚点
      document.getElementById("con_type_1").style.display="none";document.getElementById("con_graphic_1").style.display="none";
      document.getElementById("con_type_4").style.display="block";}
//视频(2);	  
if(a.indexOf("id=eb")==-1){}
else{location.hash="mao";//内容定位锚点
      document.getElementById("con_type_1").style.display="none";document.getElementById("con_graphic_1").style.display="none";
      document.getElementById("con_type_4").style.display="block";document.getElementById("con_video_1").style.display="none";
	  document.getElementById("con_video_2").style.display="block";}
//动画(1);
if(a.indexOf("id=fa")==-1){}
else{location.hash="mao";//内容定位锚点
      document.getElementById("con_type_1").style.display="none";document.getElementById("con_graphic_1").style.display="none";
      document.getElementById("con_type_5").style.display="block";}
//动画(2);	
if(a.indexOf("id=fb")==-1){}
else{location.hash="mao";//内容定位锚点
      document.getElementById("con_type_1").style.display="none";document.getElementById("con_graphic_1").style.display="none";
      document.getElementById("con_type_5").style.display="block";document.getElementById("con_animation_1").style.display="none";
	  document.getElementById("con_animation_2").style.display="block";}  	  	 
}
</script>
<script>
//显示内容号码变色控制
var clickNRXS=null;
</script>
<script>
//列表标题1变色控制
var clickLBBT=null;
</script>
<script>
//列表标题2变色控制
var clickLBBTT=null;
</script>
<SCRIPT language=JavaScript1.2> 
<!-- 比赛标题控制
function Show(divid) { 
divid.filters.revealTrans.apply(); 
divid.style.visibility = "visible"; 
divid.filters.revealTrans.play(); 
} 
function Hide(divid) { 
divid.filters.revealTrans.apply(); 
divid.style.visibility = "hidden"; 
divid.filters.revealTrans.play(); 
} 
//--> 
</script> 
<script for="lb" event="onclick">
<!--点击列表标题1变色控制-->
this.style.color="#ffffff";
this.style.backgroundColor="#2828FF";
if(clickLBBT!=null)clickLBBT.style.color="";
if(clickLBBT!=null)clickLBBT.style.backgroundColor="";
clickLBBT=this;
</script>
<script for="lb2" event="onclick">
<!--点击列表标题2变色控制-->
this.style.color="#ffffff";
this.style.backgroundColor="#2828FF";
if(clickLBBTT!=null)clickLBBTT.style.color="";
if(clickLBBTT!=null)clickLBBTT.style.backgroundColor="";
clickLBBTT=this;
</script>
</div><!--总框架结束-->
<script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/js/flexpaper/flexpaper.js"></script>
 <script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>js/flexpaper/flexpaper_handlers.js"></script>
 
 <script type="text/javascript">
    function getDocumentUrl(document){
        return "php/services/view.php?doc={doc}&format={format}&page={page}".replace("{doc}",document);
    }

    var startDocument = "Paper";

    $('#documentViewer').FlexPaperViewer(
            { config : {

                SWFFile : '<?php echo $data['pdf'] ?>',
                Scale : 0.6,
                ZoomTransition : 'easeOut',
                ZoomTime : 0.5,
                ZoomInterval : 0.2,
                FitPageOnLoad : true,
                FitWidthOnLoad : false,
                FullScreenAsMaxWindow : false,
                ProgressiveLoading : false,
                MinZoomSize : 0.2,
                MaxZoomSize : 5,
                SearchMatchAll : false,
                InitViewMode : 'Portrait',
                RenderingOrder : 'flash',
                StartAtPage : '',

                ViewModeToolsVisible : true,
                ZoomToolsVisible : true,
                NavToolsVisible : true,
                CursorToolsVisible : true,
                SearchToolsVisible : true,
                WMode : 'window',
                localeChain: 'zh_CN'
            }}
    );
</script>
