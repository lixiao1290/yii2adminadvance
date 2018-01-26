<?php
$params = array_merge(
    require(__DIR__ . '/../../common/config/params.php'),
    require(__DIR__ . '/../../common/config/params-local.php'),
    require(__DIR__ . '/params.php'),
    require(__DIR__ . '/params-local.php')
);

return [
    'id' => 'app-backend',
    'basePath' => dirname(__DIR__),
    'controllerNamespace' => 'backend\controllers',
    'bootstrap' => ['log'],
    'name'=>'微信后台',
	"modules" => [
			"admin" => [
					"class" => "mdm\admin\Module",
			],
	    'gridview' =>  [
	        'class' => '\kartik\grid\Module'
	    ]
	],
	"aliases" => [
			"@mdm/admin" => "@vendor/mdmsoft/yii2-admin",
	],
    'components' => [
        'mailer' => [
            'class' => 'yii\swiftmailer\Mailer',
            'viewPath' => '@common/mail',
            // send all mails to a file by default. You have to set
            // 'useFileTransport' to false and configure a transport
            // for the mailer to send real emails.
            'useFileTransport' => false,
            'transport' => [
                'class' => 'Swift_SmtpTransport',
                'host' => 'smtp.163.com',
                'username' => 'lixiao.god',
                'password' => '',
                'port' => '25',
                'encryption' => 'ssl',
            ],
            'messageConfig'=>[
                'charset'=>'UTF-8',
                'from'=>['***@163.com'=>'白狼栈']
            ],
        ],
        'user' => [
            'identityClass' => 'common\models\User',
            'enableAutoLogin' => true,
        ],
        'log' => [
            'traceLevel' => YII_DEBUG ? 3 : 0,
            'targets' => [
                [
                    'class' => 'yii\log\FileTarget',
                    'levels' => ['error', 'warning'],
                ],
            ],
        ],
        'errorHandler' => [
            'errorAction' => 'site/error',
        ],
       
        'urlManager' => [
            'enablePrettyUrl' => false,
            'showScriptName' => false,
            'rules' => [
            ],
        ],
         
       /*  "view" => [
            "theme" => [
                "pathMap" => [
                    "@app/views" => "@vendor/dmstr/yii2-adminlte-asset/example-views/yiisoft/yii2-app"
                ],
            ],
        ], */
    		//components数组中加入authManager组件,有PhpManager和DbManager两种方式,
    		//PhpManager将权限关系保存在文件里,这里使用的是DbManager方式,将权限关系保存在数据库.
    		"authManager" => [
    				"class" => 'yii\rbac\DbManager', //这里记得用单引号而不是双引号
    				"defaultRoles" => ["guest"],
    		],
    		
    		
    		
    ],
    'language' => 'zh-CN',
	//严重警告！！！as access位置不要添加错了，已经不少同学都掉坑里了！！！
	'as access' => [
			//ACF肯定是要加的，因为粗心导致该配置漏掉了，很是抱歉
			'class' => 'mdm\admin\components\AccessControl',
			'allowActions' => [
					//这里是允许访问的action
					//controller/action
				'admin/user/signup'	,
			    'site/logout'
			]
	],
    
    
    'params' => $params,
    
];
