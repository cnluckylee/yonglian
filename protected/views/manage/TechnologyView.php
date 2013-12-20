
<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/ToolContentLayout.css" />

<div id="gjJacket"><!--框架开始-->



<div id="centers"><!--内容开始-->

<!--广告开始-->
<div class="f_yi"><img src="images/p1.gif" width="282" height="312" /></div>
<div class="f_er"><img src="images/p2.gif" width="283" height="312" /></div>
<div class="f_san"><img src="images/p3.gif" width="282" height="312" /></div>
<div class="f_si"><img src="images/p4.gif" width="283" height="312" /></div>
<!--广告结束-->

<div class="s_left" id="documentViewer">

</div>

<div class="s_right">
<link href="css/ToolContentCatalog.css" rel="stylesheet" type="text/css" /><!--说明开始-->
<p id="cFont"><?php echo $title?></p>
<div id="cJacket">&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $remark?>

</div><!--说明结束-->
</div>


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

                SWFFile : '<?php echo $pdf ?>',

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