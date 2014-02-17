
<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/DateNewLayout.css" />
<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/DateHead.css" />
<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/DateNewCatalog.css" />

<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/DateNewColumnIntroduce.css" />
<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/DateNewVideo.css" />
<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/DateNewColumnTitle.css" />

<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/DateNewCatalog.css" />
<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/DateNewMultimedia.css" />
<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/ylteam.css" />
<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/menu.css" />
<div id="centers"><!--内容开始-->
  <div style="width:1130px; margin:0pt auto; position:relative; height:25px;float:left;">
<div id="tm">服&#12288;务&#12288;团&#12288;队&#12288;成&#12288;员&#12288;表&#12288;&#12288;------≥</div><!--成员表标题-->
<div class="team" id="bmenu">
 <ul class="menu">
 <?php foreach($areas as $i):?>
      <li class="current"><a class="parent" href="javascript:void(0);"><span><?php echo $i['name'];?></span></a>
        <div style="visibility: hidden;">
          <ul>
           <?php 
		   if(isset($i['child']) && $i['child']):
		   foreach($i['child'] as $ii):?>
            <li><a class="parent" href="javascript:void(0);"><span style="color:#696969"><?php echo $ii['name'];?></span></a>
              <div style="visibility: hidden;">
                <ul>
                 <?php 
		   if(isset($ii['child']) && $ii['child']):
		   foreach($ii['child'] as $iii):?>
                   <li><a class="parent" href="javascript:void(0);"><span style="color:#696969"><?php echo $iii['name'];?></span></a>
                      <div style="visibility: hidden;">
                        <ul>
                         <?php 
							   if(isset($iii['child']) && $iii['child']):
							   foreach($iii['child'] as $iiii):?>
                       			   <li><a href="?r=yl/Team&id=<?php echo $iiii['id'];?>"><span><?php echo $iiii['name'];?></span></a></li>
                           <?php endforeach;endif;?>
                        
                        </ul>
                      </div>
                    </li>	
                    <?php endforeach;endif;?>

                </ul>
              </div>
            </li>
              <?php endforeach;endif;?>
          </ul>
        </div>
      </li>
  <?php endforeach;?>
    </ul>

</div><!--成员表结束-->
</div> 
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
　
</div>

<div class="f_right">
<!--标题开始-->
<p id="ctFont">团</p>
<p id="ctFont">队</p>
<p id="ctFont">介</p>
<p id="ctFont">绍</p>
<div id="tSite"></div><!--标题结束-->
</div> 

<div class="s_left">
<!--新闻目录开始-->
<p id="cFont">队&nbsp;员&nbsp;才&nbsp;华</p>
<div id="cJacket">
<div id="con_Allies_1" ><!--产品1目录开始-->
<P><span class="STYLE1">&nbsp;&nbsp;员工编号&nbsp;员工姓名&nbsp;服务地区&nbsp;担任岗位1</span></p>
<hr style="border:1px solid #F75000;width:70%" align=left ><!--style="cursor:default"-->
<table width="%" cellspacing="2" cellpadding="4">
 <?php foreach($datalist as $k =>$v):?>
<tr>
<td><img src="images/w15.gif" width="20" height="15" /></td><!--<img src="images/w16.gif" width="20" height="15" />-->
<td id="lb"><div id="type1" style="cursor:default" onclick="setPdfView(this)" pdf="<?php echo $v['pdf']?>"><?php echo $k+1?>.<?php echo $v['title']?></div></td>
</tr>
<?php endforeach; ?>
</table>
</div><!--产品1目录结束-->

</div><!--新闻目录结束-->
</div>

<div class="s_right" id="documentViewer">

</div> 
</div><!--内容结束-->
 
<script type="text/javascript" src="js/jquery-1.js"></script>
<script type="text/javascript" src="js/jquery.color.js"></script>
<script type="text/javascript" src="js/jquery.easing.js"></script>
<script type="text/javascript" src="js/jquery.lavaLamp.js"></script>
<script type="text/javascript" src="js/menu.js"></script>


<script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/js/flexpaper/flexpaper.js"></script>
 <script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>js/flexpaper/flexpaper_handlers.js"></script>
 
 <script type="text/javascript">
   var startDocument = "Paper";
 	$(document).ready(function() {
 		 var pdffile = '<?php if(isset($datalist[0])) echo $datalist[0]['pdf']; ?>';
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
