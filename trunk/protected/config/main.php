<?php

// uncomment the following to define a path alias
// Yii::setPathOfAlias('local','path/to/local-folder');

// This is the main Web application configuration. Any writable
// CWebApplication properties can be configured here.
return array(
	'basePath'=>dirname(__FILE__).DIRECTORY_SEPARATOR.'..',

	'name'=>'我的永链',
	//'siteUrl'=>'http://teshu.com/yii/yonglian/',

	// preloading 'log' component
	'preload'=>array('log'),

	// autoloading model and component classes
	'import'=>array(
		'application.models.*',
		'application.components.*',
	),

	'modules'=>array(
		// uncomment the following to enable the Gii tool
		'admin'=>array(
				'class'=>'application.modules.Admin.AdminModule',
		),
		'gii'=>array(
			'class'=>'system.gii.GiiModule',
			'password'=>'a',
		 	// If removed, Gii defaults to localhost only. Edit carefully to taste.
			'ipFilters'=>array('127.0.0.1','::1'),
		),

	),

	// application components
	/*
	 * in here,can create more db,such as
	 *  'components'=>array(
        'db'=>....// mainlink
         'db1'=>...// formlink1
        'db2'=>...// formlink2
   		 )
   		 eg:Yii::app()->db1和Yii::app()->db2

	 */
	'components'=>array(
		'user'=>array(
			// enable cookie-based authentication
			'allowAutoLogin'=>true,
		),
		'smarty'=>array(
		    'class'=>'application.extensions.CSmarty',
		),
		'Upload'=>array(
			'class'=>'application.extensions.Upload',
		),
		// uncomment the following to enable URLs in path-format
		/*
		'urlManager'=>array(
			'urlFormat'=>'path',
			'rules'=>array(
				'<controller:\w+>/<id:\d+>'=>'<controller>/view',
				'<controller:\w+>/<action:\w+>/<id:\d+>'=>'<controller>/<action>',
				'<controller:\w+>/<action:\w+>'=>'<controller>/<action>',
			),
		),
		*/
		'cache'=>array(
		    'class'=>'system.caching.CFileCache',
		),
		// uncomment the following to use a MySQL database

		'db'=>array(
			'connectionString' => 'mysql:host=localhost;dbname=yonglian',
			'emulatePrepare' => true,
			'username' => 'root',
			'password' => '',
			'charset' => 'utf8',
			'tablePrefix'=>'yl_',
		),

		'errorHandler'=>array(
			// use 'site/error' action to display errors
            'errorAction'=>'site/error',
        ),
		'log'=>array(
			'class'=>'CLogRouter',
			'routes'=>array(
//				array(
//					'class'=>'CWebLogRoute',
//					  'levels'=>'trace',
//					  'categories'=>'system.db.*',
//				),
				// uncomment the following to show log messages on web pages
				/*
				array(
					'class'=>'CWebLogRoute',
				),
				*/
			),
		),
	),

	// application-level parameters that can be accessed
	// using Yii::app()->params['paramName']
	'params'=>array(
		'NewsType' => array( 1=>array('id'=>'1','name'=>'新闻'),
				2=>array('id'=>'2','name'=>'广告'),
				3=>array('id'=>'3','name'=>'财经'),
				4=>array('id'=>'4','name'=>'政策'),
		),
		'PicType' => array( 1=>'首页图片',2=>'内页图片'),
	),
);
