
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
<p id="ciFont"> &nbsp;&nbsp;&nbsp;&nbsp;永链数据成立于二零一一年七月十二日，其经营范围是数据处理，软件开发，企业管理策划，市场营销策划，会务服务。
英文全称是SHANGHAI  TF  DATA-HANDLING  UTILITY  CO.,LTD，中文网址：永链工社。</br>
&nbsp;&nbsp;&nbsp;
专注于制造企业运营过程中的数据研究与开发，提供企业情报交换、经营数据运用、管理工具和数据库平台开发的综合外
包服务，为企业用户（目前主要是中国大陆地区的用户）在生产经营中提供业务资讯、管理策划、数据运用工具的全链式服务。</p><!--栏目介绍结束-->　
</div>
<div id="dnMenu"><!--菜单开始-->
<table width="%" border="0">
<tr>
<td width="55" height="30">公司新闻</td>
<td width="55"><a href="DateActivity.html">公司活动</a></td>
<td width="55"><a href="DateProject.html">项目合作</a></td>
<a href="javascript://" onclick="moveMenu()" style="background-color:;text-decoration:none;cursor:default"><td width="20" align="right" valign="middle"><span class="STYLE2">●</span></td></a>
</tr>
<tr>
<td height="30"><a href="DateTeam.html">永链团队</a></td>
<td><a href="DateProduct.html">永链产品</a></td>
<td><a href="DateRecruitment.html">员工招聘</a></td>
<a href="javascript://" onclick="moveMenu()" style="background-color:yellow;text-decoration:none;cursor:default"><td width="20" align="right" valign="middle">●</td></a>
</tr>
</table>
</div><!--菜单结束-->　　
</div>
  
<div class="f_right">
<!--标题开始-->
<p id="ctFont">公</p>
<p id="ctFont">司</p>
<p id="ctFont">介</p>
<p id="ctFont">绍</p>
<div id="tSite"></div><!--标题结束-->
</div> 

<div class="s_left">
<!--新闻目录开始-->
<p id="cFont">公&nbsp;司&nbsp;新&nbsp;闻</p>
<div id="cJacket">
<table width="%" cellspacing="9" cellpadding="4">
 <?php foreach($newslist as $k =>$v):?>
<tr>
<td><img src="images/w15.gif" width="20" height="15" /></td><!--<img src="images/w16.gif" width="20" height="15" />-->
<td id="lb"><div id="type1" style="cursor:default"><div id="graphic2"><?php echo $k+1?>.<?php echo $v['title']?></div></div></td>
</tr>
<?php endforeach; ?>
</table>
</div><!--新闻目录结束-->
</div>

<div id="documentViewer" class="s_right"></div>
</div><!--内容结束-->
 <script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/js/flexpaper/flexpaper.js"></script>
 <script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>js/flexpaper/flexpaper_handlers.js"></script>
<script type="text/javascript">
    function getDocumentUrl(document){
        return "php/services/view.php?doc={doc}&format={format}&page={page}".replace("{doc}",document);
    }

    var startDocument = "Paper";

    $('#documentViewer').FlexPaperViewer(
            { config : {

                SWFFile : 'docs/Paper.pdf.swf',

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
                localeChain: 'en_US'
            }}
    );
</script>