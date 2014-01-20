<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/CPSingleEnterprise.css" />

<body>
<!--总框架开始-->
<div style="width:1130px; margin:0pt auto; position:relative; border:0px solid silver;background:#9D9D9D">

<div style="width:1130px; margin:0pt auto; position:relative; height:7px;float:right;background:;"></div><!--间隔层-->
<!--企业名称开始-->
<div style="width:1130px; margin:0pt auto; position:relative; height:20px;border:0px solid silver;float:left;background:#E0E0E0;">

</div><!--企业名称结束-->
<div style="width:1130px; margin:0pt auto; position:relative; height:7px;float:right;background:#fdfdfd;"></div><!--间隔层-->
<div style="width:298px; margin:0pt auto; position:relative; height:1651px;float:left;"><!--内容目录开始-->

<?php 
$section = 0;
foreach($info as $pro):
$section++;
?>
<div id="section<?php echo $section;?>" class="section_column"><!--企业秀台开始-->
<div align="center"><span class="STYLE1"><?php echo $pro['name'];?></span></div>
<?php 
foreach($pro['data'] as $i):?>
<dl class="on">
<dt><?php echo $i['name'];?></dt>
<dd>
<table cellspacing="2" cellpadding="4">
<?php 
$count = 1;
foreach($i['data'] as $item) :?>
<tr>
<td><img src="images/w15.gif" width="20" height="15" /></td>
<td id="lb"><li><div id="type2" onclick="setAab('type',2,5)"style="cursor:default"><div id="picture2" onclick="setAab('picture',2,100)"><?php echo $count.'.'.$item['name'];?></div></div></li>    </td>
</tr>

<?php 
$count++;
endforeach;?>
</table>
</dd>
</dl>
<?php endforeach;?>
</div>
<?php endforeach;?>
</div>
<script language="javascript">//版块控制
function slide_section_column(e){
for(var r=document.getElementById(e).getElementsByTagName('dl'),c=clearInterval,i=-1,p=r[0],j; j=r[++i];){
j.style.height=(i?24:220)+'px';
j.onmouseover=function(){clearTimeout(j);var i=this;j=setTimeout(function(){if(p!=i)_(p,220,24)(p=i,24,220)},200)};
   }
function _(el,f,t){
c(el.$1);el.className=f>t?'':'on';
return el.$1=setInterval(function(){el.style.height=(f+=Math[f>t?'floor':'ceil']((t-f)*.3))+'px';if (f==t)c(el.$1)},10),_
   }
};
<?php for($i=1;$i<=$section;$i++):?>
new slide_section_column( "section<?php echo $i;?>");//产品列表
<?php endfor;?>

</script>
<script for="lb" event="onclick">
<!--点击列表标题变色控制-->
this.style.color="#ffffff";
this.style.backgroundColor="#2828FF";
if(clickLBBT!=null)clickLBBT.style.color="";
if(clickLBBT!=null)clickLBBT.style.backgroundColor="";
clickLBBT=this;
</script>
</div><!--内容目录结束-->
<!--企业介绍开始-->
<div style="width:832px; margin:0pt auto; position:relative; height:257px;border-top:0px dashed #7B7B7B;border-left:0px dashed #7B7B7B;float:left;background:#d0d0d0;">
<!--企业简介开始-->
<div style="width:822px; margin:5px 5px; position:relative; height:212px;border:0px dotted #7B7B7B;float:left;background: #ffffff;">
<?php echo $company['desc'];?></div><!--企业简介结束-->
<!--联系方式开始-->
<div style="width:832px; margin-top:9px; position:relative; height:25px;border-top:0px solid silver;float:left;background:#000000;">
<div id="bt2"><a name=mao id=mao>联系方式</a></div></div><!--内容锚点&联系方式结束-->
</div><!--企业介绍结束-->
<div style="width:830px; margin:0pt auto; position:relative; height:5px;border:0px solid silver;float:left;"><!--间隔层开始-->
</div><!--间隔层结束-->
<!--内容显示开始-->
<div style="width:832px; margin:0pt auto; position:relative; height:600px;border:0px solid silver;float:left;background:#f0f0f0" id="documentViewer">


</div><!--内容显示结束-->
<div style="width:832px; margin:0pt auto; position:relative; height:7px;float:left;border:0px solid silver;"></div><!--间隔层-->
<!--服务及保障标题-->
<div style="width:411px; margin:0pt auto; position:relative; height:30px;float:left;background: #d0d0d0;border-right:5px solid #d0d0d0">
<div id="bt3">服务保障</div></div>
<!--外界评论标题-->
<div style="width:411px; margin-top:0px; position:relative; height:30px;float:right;background:#999999;border-left:5px solid #999999;">
<div id="bt4">外界评论</div></div>
<!--服务及保障内容开始-->
<div style="width:405px; margin:0px 0px 0px 0px; position:relative; height:671px;border:5px solid #d0d0d0;float:left;background:#fdfdfd">
<div id="con_service_1"><div id="se1">
<img src="images/p1.gif" width="405" height="250" />
</div></div>
<div id="con_service_2" style="display:none"><div id="se2">
<img src="images/p2.gif" width="405" height="250" />
</div></div>
<div id="con_service_3" style="display:none"><div id="se3">
<img src="images/p3.gif" width="405" height="250" />
</div></div>
<div id="con_service_4" style="display:none"><div id="se4">
<img src="images/p4.gif" width="405" height="250" />
</div></div>
<div id="con_service_5" style="display:none"><div id="se5">
<img src="images/p5.gif" width="405" height="250" />
</div></div>
服务及保障流程</div><!--服务及保障内容结束-->
<!--外界评论内容开始-->
<div style="width:405px; margin:0px 0px 0px 0px; position:relative; height:671px;border:6px solid #999999;float:right;background:#fdfdfd">
<div id="con_outside_1"><div id="ou1">
<img src="images/p1.gif" width="405" height="250" />
</div></div>
<div id="con_outside_2" style="display:none"><div id="ou2">
<img src="images/p2.gif" width="405" height="250" />
</div></div>
<div id="con_outside_3" style="display:none"><div id="ou3">
<img src="images/p3.gif" width="405" height="250" />
</div></div>
<div id="con_outside_4" style="display:none"><div id="ou4">
<img src="images/p4.gif" width="405" height="250" />
</div></div>
<div id="con_outside_5" style="display:none"><div id="ou5">
<img src="images/p5.gif" width="405" height="250" />
</div></div>
外界评论内容</div><!--外界评论内容结束-->
<!--服务及保障目录开始-->

 <script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/js/flexpaper/flexpaper.js"></script>
 <script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>js/flexpaper/flexpaper_handlers.js"></script>
 <script type="text/javascript">
    function getDocumentUrl(document){
        return "php/services/view.php?doc={doc}&format={format}&page={page}".replace("{doc}",document);
    }

    var startDocument = "Paper";

    $('#documentViewer').FlexPaperViewer(
            { config : {

                SWFFile : '<?php echo $company['pdf'] ?>',

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

