<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="language" content="en" />
<title><?php echo CHtml::encode($this->pageTitle); ?></title>
<!-- blueprint CSS framework -->
<!--<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/screen.css" media="screen, projection" />-->
<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/print.css" media="print" />
<!--[if lt IE 8]>
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/ie.css" media="screen, projection" />
	<![endif]-->
<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/main.css" />
<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/form.css" />
<?php
	$superfishpath = Yii::app()->assetManager->publish(Yii::app()->basePath.'/scripts/jqueryslidemenu/');
	//Register jQuery, JS and CSS files
	Yii::app()->clientScript->registerCoreScript('jquery');
	Yii::app()->clientScript->registerCssFile($superfishpath.'/jqueryslidemenu.css');
	Yii::app()->clientScript->registerScriptFile($superfishpath.'/jqueryslidemenu.js');

?>

<script language="javascript" type="text/javascript">
	var httpUrl = 'http://yonglian.com';
	var cssUrl = <?php echo Yii::app()->request->baseUrl.'/css/'; ?>;
	var jsUrl = <?php echo Yii::app()->request->baseUrl.'/js/'; ?>;
</script>
</head>
<body>
<div class="main">

<div class="header">
<div class="l">
<div class="website_title">---永链工社---</div>
<hr>
<p class="website_url">http://myjs.chinaz.com</p>
</div>



<div  class="r"><!--网页公链开始-->
<table border="3"  cellpadding="5" cellspacing="5" bgcolor="#CCCCCC">
<tr>
<td>桌面快捷</td>
<td>用户注册</td>
<td>企业公告</td>
</tr>
<tr>
<td>永链数据</td>
<td>联系我们</td>
<td>招贤纳士</td>
</tr>
</table>
</div><!--网页公链结束-->
</div>
<div class="top_hr"></div>

  <!-- mainmenu -->
  <?php if(isset($this->breadcrumbs)):?>
  <?php $this->widget('zii.widgets.CBreadcrumbs', array(
			'links'=>$this->breadcrumbs,
		)); ?>
  <!-- breadcrumbs -->
  <?php endif;?>
  <?php echo $content; ?>
  <div class="clear"></div>
   <div class="indexlink">
   	<div class="l">
   	 <h3 class="linktd" style="line-height: 31px;">友情链接</h3>
    </div>
    <div id="linksandy" class="indexlinktext">
      <div class="list">

          <ul>
         <?php

		  $linklist=Link::model()->findAll();
		  foreach($linklist as $key=>$item):?>
		  	<li><a target="_blank" href="<?php echo $item->weburl ?>"><img alt="MetInfo企业网站管理系统" src="<?php echo $item->weblogo ?>"></a></li>
          <?php endforeach; ?>
          </ul>
          <div class="clear"></div>
        </div>
        <div class="text">
          <ul>
          </ul>
          <div class="clear"></div>
        </div>

    </div>
    <div class="clear"></div>
  </div>
  <div id="footer">
  <?php
  	$settings = parse_ini_file("config_cn.inc.php");
  ?>
  	Copyright &copy;<?php echo $settings['met_webname'] ?><br />
    Email:<?php echo $settings['met_fd_usename'] ;?>
    All Rights Reserved.<br/>
  </div>
  <!-- footer -->
</div>
<!-- page -->
</body>
</html>

