<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/cpteam.css" />
<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/searchDataForm.css" />
<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/slides.css" />
<!--视频开始-->
<div class="main">
<div class="video" id="video"> </div>
<!--视频结束-->
<!-- 栏目介绍 -->
<div class="lanmu_content">
  <p> &nbsp;&nbsp;集中展示待选企业顺势而为的单体经营风貌，各栏目的侧重点有助于了解他们各项运行轨迹，本季推出的市场新品和重点营销活动，
    
    形式各异的多媒介宣传资料，打破了单一视觉格局，便利寻找同类企业、同类产品的差异化，透过他们需求了解其品质，分项组合而成的
    
    直观整体形象可锁定合作目标，从而缩短前期比较时间。
    
    身处上、下游的用户可迅速获知于己有关产品的当前市场变化与新技术，由此对所处行业带来的预期影响，在满足自身需求的同时调
    
    整自身的产品策略，能先期修正运营战术，提供符合市场的新产品。
    
    在形式各异的展现中可学习各种实战推广技巧，从而正确把握营销发展趋势，结合自身的经营战略、所处行业、已有资源等为己找出
    
    投入低、收效高的营销案，使用户踏准市场脉络完成临门一脚。</p>
</div>
<!-- 栏目介绍 end-->
<div class="top_hr"></div>
<div class="top_nav">
  <!--菜单&播报开始-->
  <div class="l">
    <div id ="left2"></div>
  </div>
  <div class="m">
    <ul>
      <?php
	   foreach($menu as $key => $menuitem):?>
      <li><a href="<?php echo $menuitem['url'];?>"><?php echo $menuitem['name'];?></a></li>
      <? endforeach;?>
    
    </ul>
  </div>
  <!--餐单定位结束-->
  <div class="report"><a href="CPSingleEnterprise.html?#maoid=ba">站长特效网一号滚动新闻</a></div>
  <div class="r">
    <div id ="right2"></div>
  </div>
</div>
<div class="main_middle">
  <!--间隔层-->
  <!--商标或标志开始（身体1）-->
  
<div id="featProducts" class="gray-box pro-li">
<div  class="featTitle"><p>推荐栏目</p></div>
<div id="s1" class="scrolllist"> <a title="左移" href="#" class="abtn aleft" hidefocus></a>
  <div class="imglist_w">
    <ul class="imglist">
    <?php foreach($recColumn as $key=>$item):?>
      <li> <a href='<?php echo $item['url'];?>'><img src=<?php echo $item['imgurl'];?> width="310" height="310" alt=<?php echo $item['title'];?> /></a>
        <p><a href='<?php echo $item['url'];?>'><?php echo $item['title'];?></a></p>
        <p class="store"><?php echo $item['title'];?></p>
       
      </li>
      <?php endforeach?>
    
    </ul>
    <!--imglist end-->
  </div>
  <a title="右移" href="#" class="abtn aright" hidefocus></a> </div>

<div  class="featTitle"><p>产品展示</p></div>
<div id="s2" class="scrolllistV"> <a title="左移" href="#" class="abtn aleft" hidefocus></a>
  <div class="imglist_w">
    <ul class="imglist">
    <?php foreach($recColumn as $key=>$item):?>
      <li> 
      	<a href='<?php echo $item['url'];?>'><img src=<?php echo $item['imgurl'];?> width="310" height="310" alt=<?php echo $item['title'];?> /></a>
      </li>
      <?php endforeach?>
    
    </ul>
    <!--imglist end-->
  </div>
  <a title="右移" href="#" class="abtn aright" hidefocus></a> </div>
</div>


  <?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'experience-form',
	'enableAjaxValidation'=>false,
	'action'=>array('window/CWExperience'),
	'method'=>'get',
)); ?>
  <!--商标或标志结束（身体1）-->
  <table  class="searchForm">
    <tr>
     
      <td>政策名称</td>
      <td><?php echo $form->textField($model,'title',array('size'=>20,'maxlength'=>100)); ?></td>
      <td>地区选择</td>
      <td ><?php echo $form->dropDownList($model,'cid',CHtml::listData(City::getCityList(),'id','name')); ?></td>
    </tr>
    <tr>
    	<td >语音评级</td>
       <td ><?php echo $form->dropDownList($model,'score',CHtml::listData(BaseData::Pingyujibie(),'id','name')); ?></td>
       <td >行业选择</td>
       <td ><?php echo $form->dropDownList($model,'IndustryID',CHtml::listData(BaseData::NewTheory_SYHY(),'id','name')); ?></td>
         
       </tr>
    
  
   
    <tr>
     <td colspan="2" class="tdcenter"><input type="submit" value="搜索" /></td>
      <td colspan="2"><input type="reset" value="重置" /></td>
     
    </tr>
  </table>
<?php $this->endWidget(); ?>
  <div class=" searchDataForm" style="width:810px;">
    <div class="top">
      <ul>
        <li>体验标题</li>
        <li>内容类型</li>
        <li>用户名称</li>

        <li>更新时间</li>
        
      </ul>
    </div>
    <div class="searchData" id="info">
      <?php foreach($data['posts'] as $row):?>
      <ul class="searchData_ul">
        <li><a href="?r=window/CwpolicyView&id=<?php echo $row['id'];?>" target="_blank"><?php echo $row['title'];?></a></li>
        <li><?php echo $row['title'];?></li>
        <li><?php echo $row['uname'];?></li>
        <li><?php echo $row['updtime'];?></li>
      </ul>
      <?php endforeach; ?>
      <?php 
	 //分页widget代码: 
	$this->widget('NewPager',array('pages'=>$data['pages']));
	 ?>
    </div>
  </div>
</div>
<script type="text/javascript" charset="utf-8" src="<?php echo Yii::app()->request->baseUrl; ?>/js/jquery.swfobject.1-1-1.min.js"></script>
<script language="javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/js/common.js"></script>
<script language="javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/js/slider.js"></script>
<script language="javascript">
$(function () {
	loadCssAndJs(jsUrl+'/fancybox/jquery.fancybox-1.3.4.pack.js','js');
	loadCssAndJs(jsUrl+'/fancybox/jquery.fancybox-1.3.4.css','css');
	setTimeout(function (){
		bindiframe("area");
		bindiframe("industry");
	},1000);	
		//默认状态下左右滚动
		$("#s1").xslider({
			unitdisplayed:1,
			movelength:1,
			unitlen:310,
			autoscroll:3000
		});
		//默认状态下左右滚动
		$("#s2").xslider({
			unitdisplayed:1,
			movelength:1,
			unitlen:310,
			autoscroll:3000,
			dir:"V",
		});
/*		$('#video').flash({
			swf: 'http://www.tudou.com/v/m24_Zb-m9Uo/&resourceId=0_04_05_99/v.swf',
			height: 205,
			width: 330
		});*/
});
</script>

