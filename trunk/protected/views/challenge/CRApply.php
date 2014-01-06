<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/crapply.css" />
<!--视频开始-->
<div class="main">
<ul class="topMenu">
  <li>永链擂台</li>
  <li>企业讲坛</li>
  <li>凡人闪耀</li>
  <li>举赛隧意</li>
  <li>你方战罢</li>
  <li>我方上场</li>
  <li>激酣赛事</li>
  <li>勇者角逐</li>
  <li>智者胜出</li>
</ul>
<!--赛事海报开始-->
<!--海报外框开始-->
<div class="poster">
  <!--海报区域开始-->
  <a href="CRApply.html#md" title="ddd"> <img src="images/p1.gif" width="994" height="460" border="0" style="cursor:default;"/></a> </div>
<div class="sports">
  <div class="title"><span>赛事标题一</span></div>
  <div class="picscroll"><div class="scrolllist" id="s1"> <a hidefocus="" class="abtn aleft" href="#" title="左移"></a>
  <div class="imglist_w">
    <ul class="imglist" style="left: -300px;">
     <?php foreach($match as $row):?>
       <li> <a target="_blank" href="?r=Challenge/View&id=<?php echo $row['id']; ?>" title="<?php echo $row['title']; ?>"><img width="120" height="120"  alt="<?php echo $row['title']; ?>" src="<?php echo $row['imgurl']; ?>"></a>
      </li>
      <?php endforeach; ?>
      
        
          
    </ul>
    <!--imglist end-->
  </div>
  <a hidefocus="" class="abtn aright" href="#" title="右移"></a> </div></div>
  <div class="content">左侧内容</div>
  <div class="video">右侧flash</div>
</div>
<script src="<?php echo Yii::app()->request->baseUrl; ?>/js/slider.js"  charset="UTF-8" type="text/javascript"></script>
<script type="text/javascript">
	
		//默认状态下左右滚动
		$("#s1").xslider({
			unitdisplayed:6,
			movelength:6,
			unitlen:150,
			autoscroll:300
		});
</script>		