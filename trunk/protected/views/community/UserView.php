
<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/CMSPersonalLayout.css" />

<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/CMFirstPersonalHead.css" />
<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/CMFirstPersonalMultimedia.css" />

<div id="spJacket"><!--框架开始-->


<div id="centers"><!--内容开始-->

<div class="f_left">
<p id="tfFont">『<?php echo $model->linkuser ?>』</p>
</div>

<div class="f_right">
<!-- <p id="tsFont">XXXXXXXXX，XXXXXXXXX，XXXXXXX，XXXXXXX</p>-->
</div>

<div class="s_left">
<link href="css/CMSPersonalCatalog.css" rel="stylesheet" type="text/css" /><!--版贰目录开始-->
<p id="cFont"><?php echo $model->linkuser ?></p>
<div id="cJacket">
<table width="%" cellspacing="9" cellpadding="4">
<tr>
<td></td>
<td id="lb"></td>
</tr>
<?php foreach($data as $k=>$v):?>
<tr>
<td><img src="images/w15.gif" width="20" height="15" /></td>
<td id="lb"><div id="type1" style="cursor:default">
	<a id="graphic2" href="javascript:void(0);" onclick="setPdfView(this)" pdf="<?php echo $v['pdf'];?>"><?php echo ($k+1).'.'.$v['title'];?></a></div></td>
</tr>
<?php endforeach;?>

</table>
<script for="lb" event="onclick">
<!--点击列表标题变色控制-->
this.style.color="#ffffff";
this.style.backgroundColor="#2828FF";
if(clickLBBT!=null)clickLBBT.style.color="";
if(clickLBBT!=null)clickLBBT.style.backgroundColor="";
clickLBBT=this;
</script>
</div><!--版贰目录结束-->
</div>

<div class="s_right" id="documentViewer">

</div>


</div><!--内容结束-->


<script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/js/flexpaper/flexpaper.js"></script>
 <script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>js/flexpaper/flexpaper_handlers.js"></script>
 
 <script type="text/javascript">
   var startDocument = "Paper";
 	$(document).ready(function() {
 		 var pdffile = '<?php echo $model->pdf ?>';
   	 setPdfView(pdffile);
 	});
    function getDocumentUrl(document){
        return "php/services/view.php?doc={doc}&format={format}&page={page}".replace("{doc}",document);
    }

  
   
	 function setPdf(pdffile)
	 {
		 $('#documentViewer').FlexPaperViewer(
   		  { config : {

                SWFFile : pdffile,
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
	 
	 }
    
    
    function setPdfView(obj)
    {
    	var pdf = $(obj).attr("pdf");
    	setPdf(pdf);
    }
</script>
