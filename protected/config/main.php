<?php

// uncomment the following to define a path alias
// Yii::setPathOfAlias('local','path/to/local-folder');

// This is the main Web application configuration. Any writable
// CWebApplication properties can be configured here.
//Yii::setPathOfAlias('bootstrap', dirname(__FILE__).'/../extensions/bootstrap');
return array(
	'basePath'=>dirname(__FILE__).DIRECTORY_SEPARATOR.'..',
	'name'=>'miALERT',
    'sourceLanguage' => 'en',
    'language' => 'en',
    'defaultController'=>'site/login',

	// preloading 'log' component
	'preload'=>array('log'),
	'timeZone' => 'America/Toronto',

	// autoloading model and component classes
	'import'=>array(
		'application.models.*',
		'application.components.*',
	        'ext.YiiMailer.YiiMailer',
	        'application.vendor.phpexcel.PHPExcel',
		'ext.yiireport.*',
	        'ext.YiiMailer.YiiMailer',
	),
	// 'theme'=>'bootstrap',
	'modules'=>array(
		'gii'=>array(
            'generatorPaths'=>array(
                'bootstrap.gii',
			),
			'class'=>'system.gii.GiiModule',
			'password'=>'damian4ik21',
			// If removed, Gii defaults to localhost only. Edit carefully to taste.
			'ipFilters'=>array('127.0.0.1','::1','192.168.2.112','79.140.161.227','89.28.118.138'),
		),
		'admin',
        'api',
        'livepanel'
		// uncomment the following to enable the Gii tool
		/*
		'gii'=>array(
			'class'=>'system.gii.GiiModule',
			'password'=>'Enter Your Password Here',
			// If removed, Gii defaults to localhost only. Edit carefully to taste.
			'ipFilters'=>array('127.0.0.1','::1'),
		),
		*/
	),
	// application components
	'components'=>array(
		'user'=>array(
			// enable cookie-based authentication
			'allowAutoLogin'=>true,
            'class' => 'WebUser',
            'loginUrl'=>'site/login'
		),
        'authManager' => array(
            // We will use your login manager
            'class' => 'PhpAuthManager',
            // Default role. All who are not administrators, moderators and nick - guests.
            'defaultRoles' => array('guest'),
            'connectionID'=>'db',
        ),
		// uncomment the following to enable URLs in path-format
		'urlManager'=>array(
			'urlFormat'=>'path',
			'rules'=>array(
				'<controller:\w+>/<id:\d+>'=>'<controller>/view',
				'<controller:\w+>/<action:\w+>/<id:\d+>'=>'<controller>/<action>',
				'<controller:\w+>/<action:\w+>'=>'<controller>/<action>',
			),
		),
		'bootstrap'=>array(
            'class'=>'bootstrap.components.Bootstrap',
        ),
        'curl' => array(
            'class' => 'ext.curl.Curl',
            'options' => array(),
        ),
		'db'=>array(
			'connectionString' => 'mysql:host=localhost;dbname=mialert',
			'emulatePrepare' => true,
        		//'emulateParamLogging' => true,
			'username' => 'mialert',
			'password' => 'MzfMYRxFiy',
			'charset' => 'utf8',
			'tablePrefix'=>'mia_',
		),
		'dbcdr'=>array(
		    'connectionString' => 'mysql:host=localhost;dbname=asteriskcdrdb',
		    'emulatePrepare' => true,
		    //'emulateParamLogging' => true,
		    'username' => 'freepbxuser',
		    'password' => 'b91d982f0814',
		    'charset' => 'utf8',
		    'class' => 'CDbConnection'
		),
		'errorHandler'=>array(
			// use 'site/error' action to display errors
			'errorAction'=>'site/error',
		),
		'log'=>array(
			'class'=>'CLogRouter',
			'routes'=>array(
				array(
					'class'=>'CFileLogRoute',
					'levels'=>'error, warning',
				),
				array(
					'class'=>'CEmailLogRoute',
					'levels'=>'error, warning',
					'emails'=>'iurie.albu@gmail.com',
				),
			),
		),
		'ePdf' => array(
		    'class'         => 'ext.yii-pdf.EYiiPdf',
		    'params'        => array(
		        'mpdf'     => array(
		    	    'librarySourcePath' => 'application.vendor.mpdf.*',
		    	    'constants'         => array(
				'_MPDF_TEMP_PATH' => Yii::getPathOfAlias('application.runtime'),
		    	    ),
		        'class'=>'mpdf', // the literal class filename to be loaded from the vendors folder
		        'defaultParams'     => array(
		    	    'format' => 'Letter',
		        )
		    )
	        ),
		'HTML2PDF' => array(
		    'librarySourcePath' => 'application.vendor.html2pdf.*',
		    'classFile'         => 'html2pdf.class.php', // For adding to Yii::$classMap
		    'defaultParams'     => array(
		    	    'format' => 'Letter'
		    )
		)
		)

	),
	'params'=>array(
		// this is used in contact page
		'adminEmail'=>'iurie.albu@gmail.com',
        'languages'=>array(
            'en'=>'English',
            'fr'=>'French',
            'ro'=>'Romana'
        ),
        'tts_voice'=>array(
            'w'=>'Women',
            'm'=>'Men',
        ),
        'pick_event_type' => array(
            'SMS' => 'SMS',
            'EMAIL' => 'E-mail',
            'VOIP' => 'Voice',
            'TRANSFER' => 'Transfer Call',
            'CAMERA' => 'Camera',
            'IOPOS' => 'I/O Positioning'
        ),
        'event_type' => array(
            'template' => 'From Template (Global)',
            'custom' => Yii::t('admin/rooms','Custom (Specific)'),
        ),
        'mail_security'=>array(
            ''=>'None',
            'ssl'=>'SSL',
            'tls'=>'TLS',
        ),
        'pattern' => array(
            '%%BUILDING%%' => 'Building',
            '%%FLOOR%%' => 'Floor',
            '%%ROOM%%' => 'Room',
            '%%PATIENT%%' => 'Patient',
            '%%RESPONSIBLE%%' => 'Responsible Person'
        ),
        'device_type' => array(
            'button' => 'Button',
            'phone' => 'Phone',
            'camera' => 'Camera'
        ),
        'devicePosition' => array(
            'left' => "On Left",
            'top' => "On Top",
            'right' => "On Right",
            'bottom' => "On Bottom",
            'topleft' => "Top Left",
            'topright' => "Top Right",
            'bottomleft' => "Bottom Left",
            'bottomright' => "Bottom Right",
        ),
        'asterConf' => array(
            'host' => 'localhost', // AGI HOST 
        	'user' => 'livepanel',  // AGI User
        	'pass' => '1234567' // AGI Password
        ),
        'amp_conf' => array(
            'AMPDBUSER'	=> 'freepbxuser',
            'AMPDBPASS'	=> 'b91d982f0814',
            'AMPDBHOST'	=> 'localhost',
            'AMPDBNAME'	=> 'asterisk',
            'AMPDBENGINE' => 'mysql',
            'datasource'	=> '' //for sqlite3
        ),
        'authorizedIP' => array(
    	    '192.168.1.71',
            '192.168.1.66',
            '172.17.0.11'
	),
	'link_target' => array(
	    'blank' => 'New Window',
            'self' => 'Inside Iframe',
            'parent' => 'Popup Iframe'
        ),
	'location_links' => array(
	    'local' => 'Local Link',
	    'external' => 'External Link'
	)
    )
);