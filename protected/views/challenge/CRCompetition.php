<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/matchview.css" />

<body onload="show()">
<!--总框架开始-->
<div style="width:1130px; margin:0pt auto; position:relative; height:1368px;border:0px solid silver;background:#9D9D9D">
<div style="width:1130px; margin:0pt auto; position:relative; height:95px;border:0px solid silver;float:left;"><!--头部开始-->

<div style="width:1130px; margin:0pt auto; position:relative; height:7px;border:0px solid silver;float:left;"></div><!--间隔层开始-->
<!--组织开始-->
<div style="width:1130px; margin:0pt auto; position:relative; height:390px;border:0px solid #96C2F1;float:left;background:#d0d0d0">
<!--组织1开始-->
<div style="width:270px;margin:3px 5px 3px 3px;position:relative;height:350px;border:1px solid #E0E0E0;float:left;background:#FAF4FF;">
<!--标题1-->
<div style="width:230px; margin:0px; position:relative; height:25px;border:0px solid silver;float:left;background:#96C2F1;">
<div id="bt1">优秀组织名单</div></div>
<!--目录1-->
<div style="width:260px; margin:5px; position:relative; height:250px;border:0px solid silver;float:left;background:;">
<table width="280px" border="0">
<?php if (isset($data['PrizeArr']) && $data['PrizeArr']):?>
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
<?php endif;?>
<?php if (isset($data['Prize2Arr']) && $data['Prize2Arr']):?>
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
<?php endif;?>
<?php if (isset($data['Prize3Arr']) && $data['Prize3Arr']):?>
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
<?php endif;?>
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

</div>
<div style="width:1124px; margin:2px; position:relative; height:25px;border:0px solid silver;float:left;background:#96C2F1;">
<div id="bt3"><a name=mao id=mao>年度获胜组织暨成员</a></div>
</div>
</div><!--组织结束-->
<!--间隔层开始-->
<div style="width:1130px;margin:0pt auto;position:relative;height:7px;border:0px solid silver;float:left;"></div>
<!--内容显示开始-->
<div style="width:830px; margin:0pt auto; position:relative; height:560px;border:0px solid silver;float:left;background:#f0f0f0" id="documentViewer">
</div><!--内容显示结束-->


<!--目录外层开始-->
<div style="width:296px; margin:0pt auto; position:relative; height:565px;border:0px solid silver;float:right;background:#FAF4FF;"><!--标题4-->
<div style="width:285px; margin:5px 5px 0px 5px; position:relative; height:25px;border:0px solid silver;float:left;background:#96C2F1;"><div id="bt4">赛况目录</div></div>
<!--赛况目录开始-->
<div style="width:285px; margin:5px; position:relative; height:485px;border:0px solid silver;float:left;background:#E6E6F2;">
<div id="con_st_1" style="display:block">
<p align="center" style="font-family:宋体;font-size:14px;color:#000000;font-weight:bold"><?php echo $data['title'];?></p>
<p align="right" style="font-family:宋体;font-size:12px;color:#000000;font-weight:normal">[<?php echo date('Y/m/d', strtotime($data['addtime']));?>]</p>
<hr width=99% size=5 color=#FF8F59 align=left noshade>
<?php if(isset($data['comment'][1])):?>
<p align="left" style="font-family:宋体;font-size:14px;color:#000000;font-weight:normal">赛前:</p>
<?php 
$i=1;
foreach($data['comment'][1] as $comment1):?>
<p><span id="lb"><?php echo $i.'.'.$comment1['name']?></span></p>
<?php 
$i++;
endforeach;
endif;
?>
<?php if(isset($data['comment'][2])):?>
<hr style="color: blue;border-style:1px dashed;width:290"> 

<p align="left" style="font-family:宋体;font-size:14px;color:#000000;font-weight:normal">赛中:</p>
<?php 
$i=1;
foreach($data['comment'][2] as $comment2):?>
<p><span id="lb"><?php echo $i.'.'.$comment2['name']?></span></p>
<?php 
$i++;
endforeach;
endif;
?>
<?php if(isset($data['comment'][3])):?>
<hr style="color: blue;border-style:1px dashed;width:290">

<p align="left" style="font-family:宋体;font-size:14px;color:#000000;font-weight:normal">赛后:</p>
<?php 
$i=1;
foreach($data['comment'][3] as $comment3):?>
<p><span id="lb"><?php echo $i.'.'.$comment3['name']?></span></p>
<?php 
$i++;
endforeach;
endif;
?>

<div id="cszp1"><div id="zpml1" onclick="setAab('zpml',1,10)"style="cursor:default"><div id="hbml1" onclick="setAab('hbml',1,10)"><div id="hsml1" onclick="setAab('hsml',1,10)"><p align="right">某某参赛作品目录1</p></div></div></div></div>
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

<ul class="toptitle">

<li>正方作品</li>
<li>反方作品</li>
<li>新义作品</li>
</ul>
<ul class="zhengfang">

<?php
$ii = 0; 
foreach($MatchEntries[1]['data'] as $item):?>
<li><?php echo $item['title'];?></li>
<?php endforeach;?>
</ul>
<ul class="fanfang">

<?php
$ii = 0; 
foreach($MatchEntries[2]['data'] as $item):?>
<li><?php echo $item['title'];?></li>
<?php endforeach;?>
</ul>
<ul class="xinyi">

<?php

$ii = 0; 
foreach($MatchEntries[2]['data'] as $item):?>
<li><?php echo $item['title'];?></li>
<?php endforeach;?>
</ul>

</div>
</div>
</div>

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
