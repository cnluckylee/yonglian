<?php
/* This section can be removed if you would like to reuse the PHP example outside of this PHP sample application */
require_once("lib/config.php");
require_once("lib/common.php");

$configManager = new Config();
if($configManager->getConfig('admin.password')==null){
	$url = 'setup.php';
	header("Location: $url");
	exit;
}
?>
<html xmlns="http://www.w3.org/1999/xhtml" lang="en" xml:lang="en">
    <head>
        <title>FlexPaper AdaptiveUI PHP Example</title>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <style type="text/css" media="screen">
			html, body	{ height:100%; }
			body { margin:0; padding:0; overflow:auto; }
			#flashContent { display:none; }
        </style>

		<link rel="stylesheet" type="text/css" href="../css/flexpaper.css" />
		<script type="text/javascript" src="../js/jquery.min.js"></script>
		<script type="text/javascript" src="../js/flexpaper.js"></script>
		<script type="text/javascript" src="../js/flexpaper_handlers.js"></script>
    </head>
    <body>
    <div style="position:absolute;left:10px;top:10px;">
			<div id="documentViewer" class="flexpaper_viewer" style="width:770px;height:500px"></div>
	        <?php
	        if(isset($_GET["doc"])){
	            $doc = substr($_GET["doc"],0,strlen($_GET["doc"])-4);
	        }else{
	            $doc = "Report";
	        }

			$pdfFilePath = $configManager->getConfig('path.pdf');
			?>
	        <script type="text/javascript">
		        function getDocumentUrl(document){
		        	var numPages 			= <?php echo getTotalPages($pdfFilePath . $doc . ".pdf") ?>;
					var url = "{services/view.php?doc={doc}&format={format}&page=[*,0],{numPages}}";
						url = url.replace("{doc}",document);
						url = url.replace("{numPages}",numPages);
						return url;
		        }

				var searchServiceUrl	= escape('php/services/containstext.php?doc=<?php echo $doc ?>&page=[page]&searchterm=[searchterm]');
				$('#documentViewer').FlexPaperViewer(
				  { config : {

						 DOC : escape(getDocumentUrl("<?php echo $doc ?>")),
						 Scale : 0.6,
						 ZoomTransition : 'easeOut',
						 ZoomTime : 0.5,
						 ZoomInterval : 0.2,
						 FitPageOnLoad : false,
						 FitWidthOnLoad : true,
						 FullScreenAsMaxWindow : false,
						 ProgressiveLoading : false,
						 MinZoomSize : 0.2,
						 MaxZoomSize : 5,
						 SearchMatchAll : false,
  						 SearchServiceUrl : searchServiceUrl,
						 InitViewMode : 'Portrait',
						 RenderingOrder : '<?php echo ($configManager->getConfig('renderingorder.primary') . ',' . $configManager->getConfig('renderingorder.secondary')) ?>',

						 ViewModeToolsVisible : true,
						 ZoomToolsVisible : true,
						 NavToolsVisible : true,
						 CursorToolsVisible : true,
						 SearchToolsVisible : true,
  						 key : '123',

  						 DocSizeQueryService : 'services/swfsize.php?doc=<?php echo $doc ?>',
						 jsDirectory : '../js/',
						 localeDirectory : '../locale/',
						 JSONDataType : 'jsonp',

  						 localeChain: 'en_US'
						 }}
				);
	        </script>
        </div>
   </body>
</html>