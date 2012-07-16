<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="language" content="en" />
	<title><?php echo CHtml::encode($this->pageTitle); ?></title>
	<!-- blueprint CSS framework -->
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/screen.css" media="screen, projection" />
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

</head>

<body>

<div class="container" id="page">

	<div id="header">
		<div id="logo"><?php echo CHtml::encode(Yii::app()->name); ?></div>
	</div><!-- header -->

	<div id="myslidemenu" class="jqueryslidemenu">
		<?php $this->widget('zii.widgets.CMenu',array(
			'items'=>array
			(
				array('label'=>'永链全貌', 'url'=>array('/site/index'),'items'=>array(
					array('label'=>'企业秀台', 'url'=>array('/site/index')),
					array('label'=>'企业动态', 'url'=>array('/site/index')),
					array('label'=>'携手发展', 'url'=>array('/site/index')),
					array('label'=>'舵主风采', 'url'=>array('/site/index')),
					array('label'=>'团队闪耀', 'url'=>array('/site/index')),
				)),
				array('label'=>'管理经典', 'url'=>array('/site/page', 'view'=>'about'),'items'=>array(
					array('label'=>'专家新论', 'url'=>array('/site/index')),
					array('label'=>'管理技术', 'url'=>array('/site/index')),
					array('label'=>'管理案例', 'url'=>array('/site/index')),
					array('label'=>'永链观点', 'url'=>array('/site/index')),

				)),
				array('label'=>'用户之窗', 'url'=>array('/site/contact'),'items'=>array(
					array('label'=>'政策精选', 'url'=>array('/site/index')),
					array('label'=>'电子刊期', 'url'=>array('/site/index')),
					array('label'=>'常用工具', 'url'=>array('/download')),
					array('label'=>'用户体验', 'url'=>array('/site/index')),
				)),
				array('label'=>'永链擂台', 'url'=>array('/site/contact'), 'items'=>array
				(
					array('label'=>'项目报名', 'url'=>array('/site/index')),
					array('label'=>'赛况介绍', 'url'=>array('/site/page', 'view'=>'about')),
				)),
				array('label'=>'永链概况', 'url'=>array('yonglian'),'items'=>array(
					array('label'=>'公司介绍', 'url'=>'yonglian/about/','linkOptions'=>array('target'=>'_blank')),
					array('label'=>'公司新闻', 'url'=>'yonglian/news/','linkOptions'=>array('target'=>'_blank')),
					array('label'=>'活动分享', 'url'=>array('/site/index')),
					array('label'=>'项目合作', 'url'=>array('/site/index')),
					array('label'=>'永链团队', 'url'=>array('/site/index')),
					array('label'=>'永链产品', 'url'=>'yonglian/product/','linkOptions'=>array('target'=>'_blank')),
					array('label'=>'员工招聘', 'url'=>'yonglian/job/','linkOptions'=>array('target'=>'_blank')),
					array('label'=>'联系我们', 'url'=>'yonglian/about/show.php?lang=cn&id=15','linkOptions'=>array('target'=>'_blank')),

				)),
				array('label'=>'登录', 'url'=>array('/site/login'), 'visible'=>Yii::app()->user->isGuest),
				array('label'=>'Logout ('.Yii::app()->user->name.')', 'url'=>array('/site/logout'), 'visible'=>!Yii::app()->user->isGuest)
			),
		)); ?>
	<br style="clear: left" />
	</div><!-- mainmenu -->
	<?php if(isset($this->breadcrumbs)):?>
		<?php $this->widget('zii.widgets.CBreadcrumbs', array(
			'links'=>$this->breadcrumbs,
		)); ?><!-- breadcrumbs -->
	<?php endif;?>

	<?php echo $content; ?>

	<div class="clear"></div>

	<div id="footer">
		Copyright &copy; <?php echo date('Y'); ?> by living.<br/>
		Email:living10@163.com
		All Rights Reserved.<br/>
	</div><!-- footer -->

</div><!-- page -->

</body>
</html>
