<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/DateNewLayout.css" />
<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/DateHead.css" />
<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/DateBottom.css" />
<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/DateActivityMultimedia.css" />
<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/DateActivityCatalog.css" />
<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/DateActivityColumnTitle.css" />
<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/DateActivityVideo.css" />
<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/DateActivityColumnIntroduce.css" />
<div id="centers">
  <!--内容开始-->
  <div class="f_left">
    <div id="vSite">
      <!--视频开始-->
      <div class="video" id="video"></div>
    </div>
    <!--视频结束-->
  </div>
  <div class="f_middle">
    <div id="ciJacket">
      <!--栏目介绍开始-->
      <p id="ciFont"> &nbsp;&nbsp;&nbsp;&nbsp;永链依托公司资源通过举办、合办、协办等各种模式积极投入到社会各类型有关企业管理的活动中，在活动中体现自身在策
        划、主旨议题、形式、组织等方面的各项能力，不仅服务好永链用户，更想让管理中的经典文化、精义思想、独特思维等传播至
        社会各层面，活动过程中的思想交互，使所有参与者在充分理解中国文化基础上产生智慧火花，让它们伴随在我们的学习、工作
        、娱乐中，以中国人文构建的思考方式将有助于我们不断整理知识碎片，续上思维断径，梳理思绪路径，在各方面有长足进步。</p>
      <!--栏目介绍结束-->
　       </div>
    <div id="daMenu">
      <!--菜单开始-->
      <table width="%" border="0">
        <tr>
          <td width="55" height="30"><a href="DateNews.html">公司新闻</a></td>
          <td width="55">公司活动</td>
          <td width="55"><a href="DateProject.html">项目合作</a></td>
          <a href="javascript://" onclick="moveMenu()" style="background-color:;text-decoration:none;cursor:default">
          <td width="20" align="right" valign="middle"><span class="STYLE2">●</span></td>
          </a> </tr>
        <tr>
          <td height="30"><a href="DateTeam.html">永链团队</a></td>
          <td><a href="DateProduct.html">永链产品</a></td>
          <td><a href="DateRecruitment.html">员工招聘</a></td>
          <a href="javascript://" onclick="moveMenu()" style="background-color:yellow;text-decoration:none;cursor:default">
          <td width="20" align="right" valign="middle">●</td>
          </a> </tr>
      </table>
    </div>
    <!--菜单结束-->
　　     </div>
  <div class="f_right">
    <!--标题开始-->
    <p id="ctFont">公</p>
    <p id="ctFont">司</p>
    <p id="ctFont">迈</p>
    <p id="ctFont">进</p>
    <div id="tSite">
      <div id="triangle-bottomright"></div>
    </div>
    <!--标题结束-->
  </div>
  <div class="s_left">
    <!--新闻目录开始-->
    <p id="cFont">公&nbsp;司&nbsp;活&nbsp;动</p>
    <div id="cJacket">
      <table width="%" cellspacing="9" cellpadding="4">
 <?php foreach($datalist as $k =>$v):?>
<tr>
<td><img src="images/w15.gif" width="20" height="15" /></td><!--<img src="images/w16.gif" width="20" height="15" />-->
<td id="lb"><div id="type1" style="cursor:default"><div id="graphic2"><?php echo $k+1?>.<?php echo $v['title']?></div></div></td>
</tr>
<?php endforeach; ?>
      </table>
    </div>
    <!--新闻目录结束-->
  </div>
<div id="documentViewer" class="s_right"></div>

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