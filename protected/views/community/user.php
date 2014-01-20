
<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/CMFirstPersonalLayout.css" />

<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/CMFirstPersonalCatalog.css" />
<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/CMFirstPersonalMultimedia.css" />





<div id="centers"><!--内容开始-->

<div class="f_left">
<p id="tfFont">『会员试航』</p>
</div>

<div class="f_right">
<p id="tsFont">人海茫茫中平凡的您，瞬间出挑的一抹亮色，而升起勇气船帆，开启人生新旅途</p>
</div>

<div class="s_left">
<link href="css/CMFirstPersonalCatalog.css" rel="stylesheet" type="text/css" /><!--会员开始-->
<div id="cJacket">
<table width="%" cellpadding="1" cellspacing="1" bordercolor="#DDDDFF"border="1">
<tr>
<td width="73"id="lb"><div id="type1" onclick="setAab('type',1,5)"style="cursor:default"><div id="graphic2" onclick="setAab('graphic',2,10)">会员试航</div></div></td>
<td width="72"id="lb"><div id="type2" onclick="setAab('type',2,5)"style="cursor:default"><div id="picture2" onclick="setAab('picture',2,10)">会员试航</div></div></td>
<td width="72"id="lb">会员试航</td>
<td width="72"id="lb">会员试航</td>
</tr>
<tr>
<?php foreach($users as $i=>$v):?>
<?php if($i>0 && $i%4==0):?>
		</tr><tr>
<?php endif;?>
<td id="lb"><span pdf="<?php echo $v->pdf;?>" onclick="setUser(this)" style="cursor:pointer;"><?php echo $v->username;?></span></td>
<?php endforeach;?>

</tr>
</table>

</div><!--会员结束-->
</div>

<div class="s_right" id="documentViewer">

</div>

<div class="t">
<!--关联版块开始-->
<table width="%" cellpadding="1" cellspacing="4" bordercolor="#DDDDFF"border="1">
<tr>
<td width="72">会员试航</td>
<td width="72">会员版贰</td>
<td width="72">关联版块</td>
<td width="72">关联版块</td>
<td width="72">关联版块</td>
<td width="72">关联版块</td>
<td width="72">关联版块</td>
<td width="72">关联版块</td>
<td width="72">关联版块</td>
<td width="72">关联版块</td>
<td width="72">关联版块</td>
<td width="72">关联版块</td>
<td width="72">关联版块</td>
<td width="72">关联版块</td>
<td width="72">关联版块</td>
<td width="72">关联版块</td>
</tr>
<tr>
<td width="72">关联版块</td>
<td width="72">关联版块</td>
<td width="72">关联版块</td>
<td width="72">关联版块</td>
<td width="72">关联版块</td>
<td width="72">关联版块</td>
<td width="72">关联版块</td>
<td width="72">关联版块</td>
<td width="72">关联版块</td>
<td width="72">关联版块</td>
<td width="72">关联版块</td>
<td width="72">关联版块</td>
<td width="72">关联版块</td>
<td width="72">关联版块</td>
<td width="72">关联版块</td>
<td width="72">关联版块</td>
</tr>
</table>
</div>

</div><!--内容结束-->

<script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/js/flexpaper/flexpaper.js"></script>
 <script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>js/flexpaper/flexpaper_handlers.js"></script>
 
 <script type="text/javascript">
   var startDocument = "Paper";
 	$(document).ready(function() {
 		 var pdffile = '<?php echo $users[0]->pdf ?>';
   	 setPdf(pdffile);
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
    
    
    function setUser(obj)
    {
    	var pdf = $(obj).attr("pdf");
    	setPdf(pdf);
    }
</script>

