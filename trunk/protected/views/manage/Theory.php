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
      <li><a href="#">企业动态</a></li>
      <li><a href="<?php echo Yii::app()->getBaseUrl(true)?>/?r=enterprise/CPJoint">携手发展</a></li>
      <li><a href="#">舵主风采</a></li>
      <li><a href="<?php echo Yii::app()->getBaseUrl(true)?>/?r=enterprise/CPTeam">团队闪耀</a></li>
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
      <td class="title">主旨管理</td>
       <td >经营战略<?php echo $form->dropDownList($model,'CompanyID',CHtml::listData(Company::getTreeDATA(),'id','name')); ?></td>
       <td >开发战略<?php echo $form->dropDownList($model,'kid',CHtml::listData(BaseData::NewTheory_KFZL(),'id','name')); ?></td>
       <td></td>
       </tr>
     <tr>
      <td class="title">横向管理</td>
      <td>采购供应<?php echo $form->dropDownList($model,'cwid',CHtml::listData(BaseData::NewTheory_CWSS(),'id','name')); ?></td>
      <td>内部运营<?php echo $form->dropDownList($model,'nid',CHtml::listData(BaseData::NewTheory_NBYY(),'id','name')); ?></td>
      <td>分销配送<?php echo $form->dropDownList($model,'fxid',CHtml::listData(BaseData::NewTheory_FXPS(),'id','name')); ?></td>
    </tr>
    <tr>
      <td class="title">纵向管理</td>
      <td>企业组织<?php echo $form->dropDownList($model,'qid',CHtml::listData(BaseData::NewTheory_QYZZ(),'id','name')); ?></td>
      <td>人力资源<?php echo $form->dropDownList($model,'rid',CHtml::listData(BaseData::NewTheory_RLZY(),'id','name')); ?></td>
      <td>财务税收<?php echo $form->dropDownList($model,'cwid',CHtml::listData(BaseData::NewTheory_CWSS(),'id','name')); ?></td>
    </tr>
     <tr>
     <td class="title">作者</td>
      <td><?php echo $form->textField($model,'mid'); ?></td>
      <td>标题<?php echo $form->textField($model,'title'); ?></td>
      <td>适用行业<?php echo $form->dropDownList($model,'sid',CHtml::listData(BaseData::NewTheory_SYHY(),'id','name')); ?></td>
      
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
      <?php foreach($posts as $row):?>
      <ul class="searchData_ul">
        <li><?php echo $row['name'];?></li>
        <li>
          <ul class="droplist">
            <?php 
		 if(isset($row['data'])):
		 foreach($row['data'] as $cont16):?>
            <li><?php echo $cont16['title'];?></li>
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
</script>
