<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/cpteam.css" />
<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/searchDataForm.css" />
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
      <?php foreach($menus as $v):
	  			if($v['id'] !=3):
	  ?>
      <li><a href="<?php echo $v['url'];?>"><?php echo $v['name'];?></a></li>
   <?php 
   	endif;
   endforeach;?>
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
  <div class="leftadv">
    <ul>
      <li><a href="" target="_blank"><img src="images/ls.gif" width="122" height="60" /></a></li>
      <li><a href="" target="_blank"><img src="images/ls.gif" width="122" height="60" /></a></li>
    </ul>
  </div>
  <?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'cpjoint-form',
	'enableAjaxValidation'=>false,
	'action'=>array('enterprise/CompanyNews'),
	'method'=>'get',
)); ?>
  <!--商标或标志结束（身体1）-->
  <table  class="searchForm">
    <tr>
      <td class="title">地区</td>
      <td><input type="text" width="150px"  id="Company_city" name="Company_city" value="<?php echo $get['Company_city'];?>"/>
      <input type="hidden" width="150px"  id="Company_city_id" name="Company_city_id" value="<?php echo $get['Company_city_id'];?>"/>
        <input type="button" value="选择"  id="area"/></td>
      <td class="title">行业</td>
      <td><input type="text" width="150px" id="Company_Industry" name="Company_Industry"  value="<?php echo $get['Company_Industry'];?>" />
      <input type="hidden" width="150px" id="Company_Industry_id" name="Company_Industry_id"  value="<?php echo $get['Company_Industry_id'];?>"/>
        <input type="button" value="选择"  id="industry"/></td>
       </tr>
       <tr>
       
      <td class="title">企业名称</td>
      <td><input type="text" width="150px"  name="keyword" value="<?php echo $get['keyword'];?>"/></td>
      <td class="title"></td>
      <td>
      <input type="submit"  value="搜索" />
		<input type="button" onclick="returnback();"  value="返回" />        
      </td>
    </tr>
  </table>
<?php $this->endWidget(); ?>
  <div class=" searchDataForm" style="width:810px;">
    <div class="top">
      <ul>
        <li>企业名称</li>
        <li>项目标题</li>
        <li>文章格式</li>
        <li>更新时间</li>
        
      </ul>
    </div>
    <div class="searchData" id="info">
    <?php if($posts):?>
      <?php foreach($posts as $row):?>
      <ul class="searchData_ul">
      <li><a href="?r=Enterprise/CPSingleEnterprise&mid=<?php echo $row['id'];?>" target="_blank" ><?php echo $row['name'];?></a></li>
         <li>
          <ul class="droplist">
            <?php 
		 if(isset($row['data'])):
		 foreach($row['data'] as $cont16):?>
            <li><?php echo mb_substr($cont16['title'],0,12,'utf-8');?></li>
            <?php
		   endforeach; 
		   endif;
		   ?>
          </ul>
        </li>
        <li>
          <ul class="droplist">
            <?php 
		 if(isset($row['data'])):
		 foreach($row['data'] as $cont15):?>
            <li><?php echo $cont15['cname'];?></li>
            <?php
		   endforeach; 
		   endif;
		   ?>
          </ul>
        </li>
        <li>
          <ul class="droplist">
            <?php 
		 if(isset($row['data'])):
		 foreach($row['data'] as $cont15):?>
            <li><?php echo $cont15['upddate'];?></li>
            <?php
		   endforeach; 
		   endif;
		   ?>
          </ul>
        </li>
      </ul>
      <?php endforeach; ?>
      <?php 
	 //分页widget代码: 
	$this->widget('NewPager',array('pages'=>$pages));
	 ?>
	 <?php else:?>
	 <a href="javascript:void(0);" onclick="javascript:history.go(-1);" >返回上一页</a>
	 <?php endif;?>
    </div>
  </div>
</div>
<script type="text/javascript" charset="utf-8" src="<?php echo Yii::app()->request->baseUrl; ?>/js/jquery.swfobject.1-1-1.min.js"></script>
<script language="javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/js/common.js"></script>
<script language="javascript">
$(function () {
	loadCssAndJs(jsUrl+'/fancybox/jquery.fancybox-1.3.4.pack.js','js');
	loadCssAndJs(jsUrl+'/fancybox/jquery.fancybox-1.3.4.css','css');
	setTimeout(function (){
		bindiframe("area");
		bindiframe("industry");
	},1000);	
		$('#video').flash({
			swf: 'http://www.tudou.com/v/m24_Zb-m9Uo/&resourceId=0_04_05_99/v.swf',
			height: 205,
			width: 330
		});
});
function returnback()
{
	javascript:history.go(-1);
}
</script>
