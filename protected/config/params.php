<?php
//CMS应用参数配置
return array(
	'siteurl'=>'/',
	//内置模块ID
	'actionInfo'=>array(
		'saveSuccess'=>'信息添加成功！请继续添加。',
		'saveFail'=>'信息添加失败！请重新添加。',
		'updateSuccess'=>'信息更新成功！',
		'updateFail'=>'信息更新失败！请重新保存。',
		'deleteSuccess'=>'信息删除成功！',
		'deleteFail'=>'信息删除失败！',
	),
	'module'=>array(
		'article'=>1,
		'product'=>2,
		'link'=>3,
		'picture'=>4,
		'job'=>5,
		'brand'=>6,
	),
	'pager'=>array(
		'prevPageLabel'=>'上一页',
    	'nextPageLabel'=>'下一页',
    	'header'=>'',
	),
	'pagesize'=>array(
		'article'=>10,
		'product'=>10,
	),
	'status'=>array(
		'isstop'=>0,
		'ischecked'=>1,
	),


	'copyrightInfo'=>'Copyright &copy; 20011 by Magnet.',
);