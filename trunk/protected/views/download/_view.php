<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('title')); ?>:</b>
	<?php echo CHtml::encode($data->title); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('keywords')); ?>:</b>
	<?php echo CHtml::encode($data->keywords); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('description')); ?>:</b>
	<?php echo CHtml::encode($data->description); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('content')); ?>:</b>
	<?php echo CHtml::encode($data->content); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('class1')); ?>:</b>
	<?php echo CHtml::encode($data->class1); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('class2')); ?>:</b>
	<?php echo CHtml::encode($data->class2); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('class3')); ?>:</b>
	<?php echo CHtml::encode($data->class3); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('no_order')); ?>:</b>
	<?php echo CHtml::encode($data->no_order); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('new_ok')); ?>:</b>
	<?php echo CHtml::encode($data->new_ok); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('wap_ok')); ?>:</b>
	<?php echo CHtml::encode($data->wap_ok); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('downloadurl')); ?>:</b>
	<?php echo CHtml::encode($data->downloadurl); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('filesize')); ?>:</b>
	<?php echo CHtml::encode($data->filesize); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('com_ok')); ?>:</b>
	<?php echo CHtml::encode($data->com_ok); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('hits')); ?>:</b>
	<?php echo CHtml::encode($data->hits); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('updatetime')); ?>:</b>
	<?php echo CHtml::encode($data->updatetime); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('addtime')); ?>:</b>
	<?php echo CHtml::encode($data->addtime); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('issue')); ?>:</b>
	<?php echo CHtml::encode($data->issue); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('access')); ?>:</b>
	<?php echo CHtml::encode($data->access); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('top_ok')); ?>:</b>
	<?php echo CHtml::encode($data->top_ok); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('downloadaccess')); ?>:</b>
	<?php echo CHtml::encode($data->downloadaccess); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('filename')); ?>:</b>
	<?php echo CHtml::encode($data->filename); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('lang')); ?>:</b>
	<?php echo CHtml::encode($data->lang); ?>
	<br />

	*/ ?>

</div>
<?php 
echo Yii::app()->baseUrl; ?>
<dl class="time_list">
	  <dt><span class="gtime">人气：<font class="font01">49287054</font>&nbsp; &nbsp;&nbsp; 26.02MB</span>
	  <img width="32" height="32" align="absmiddle" src="http://img1.2345.com/duoteimg/softImg/soft/8/1285751673_93.jpg"><a title="目前国内最受欢迎的万能播放器" href="/soft/21360.html" class="g_tit">快播播放器(Qvod播放器) V5.3.103 </a>[<a target="_self" href="/sort/4_199_date_0_1_.html">视频播放</a>]  					  </dt>
		 <dd style="padding-left:35px;">授权：免费软件(无功能限制)  | <a href="/sImgInfo/21360_setupinfo.html">安装预览</a> | 插件：<span class="font02"><font color="#00c00e"><strong>无插件</strong></font></span> | <font color="#0000ff">Windows7兼容</font> </dd>
		 <dd class="jbjs">【概括介绍】
基于准视频点播内核播放器。

【基本介绍】
Qvod Player (Q播) 是一款基于准视频点播 (QVOD) 内核的、多功能、个性化的媒体播放器。Qvod Player 集成了全新播放引擎，不但支持自主研发的准视频点 .........</dd>
		 <dd class="list_bottom">
		 <div class="pl_2 sl"><a href="/comment/22/21360_0_1.html">共有8443条评论</a></div>
		 <div class="pl_2">87.8%</div>
		 <div class="hp pl_2"><div style="width:72px;" class="in_hp"></div></div>
		 <div class="pl_2">2012-06-18&nbsp; &nbsp;&nbsp; 支持度：</div>
		 <div style="clear:both"></div>
	  </dd>
</dl>
<?php

Yii::app()->clientScript->registerCssFile(Yii::app()->createUrl('/themes/css/download.css', array('format' => 'css')));
?>