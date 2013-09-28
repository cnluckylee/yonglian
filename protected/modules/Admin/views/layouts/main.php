<?php
$cs=Yii::app()->clientScript;
$cs->registerCoreScript('jquery');
$cs->registerCoreScript('jquery.ui');
$baseUrl=$this->module->assetsUrl;
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><?php echo CHtml::encode($this->pageTitle); ?></title>
<link href="<?php echo $this->module->assetsUrl; ?>/style/main.css" rel="stylesheet" type="text/css"/>
<script language="javascript" src="<?php echo $this->module->assetsUrl; ?>/js/jquery/layout/jquery.layout.js"></script>
<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/form.css" />
<?php if($this->getId()=='default' && $this->getAction()->getId()=='index'):?>
<?php else:?>
<script language="javascript" src="<?php echo $this->module->assetsUrl; ?>/js/main.js"></script>
<script language="javascript" src="<?php echo $this->module->assetsUrl; ?>/js/button.js"></script>
<script language="javascript" src="<?php echo $this->module->assetsUrl; ?>/js/jquery/form/jquery.form.js"></script>
<script language="javascript" src="<?php echo $this->module->assetsUrl;?>/js/jquery/artdialog/artDialog.min.js"></script>
<script language="javascript" src="<?php echo $this->module->assetsUrl;?>/js/jquery/artdialog/artDialog.plugins.min.js"></script>
<script language="javascript" charset="utf-8" src="<?php echo $this->module->assetsUrl;?>/js/plugins/kindeditor/kindeditor.js"></script>
<script language="javascript" charset="utf-8" src="<?php echo $this->module->assetsUrl;?>/js/plugins/kindeditor/lang/zh_CN.js"></script>
<script language="javascript" type="text/javascript">
	var httpUrl = 'http://yonglian.com';
	var cssUrl = <?php echo Yii::app()->request->baseUrl.'/css/'; ?>;
	var jsUrl = <?php echo Yii::app()->request->baseUrl.'/js/'; ?>;
</script>
<?php

endif;?>
</head>

<body class="<?php if($this->getId()=='default' && $this->getAction()->getId()=='index') echo 'index'; else echo 'bodyClass';?>">
<?php echo $content; ?>
</body>
</html>
