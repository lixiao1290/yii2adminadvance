<?php
$params = array_merge(
    require(__DIR__ . '/../../common/config/params.php'),
    require(__DIR__ . '/../../common/config/params-local.php'),
    require(__DIR__ . '/params.php'),
    require(__DIR__ . '/params-local.php')
);

return [
    'id' => 'app-frontend',
    'basePath' => dirname(__DIR__),
    'bootstrap' => ['log'],
    'controllerNamespace' => 'frontend\controllers',
    'modules' => [
        'wechat'=>[
            'class' => 'callmez\wechat\Module',
            'adminId' => 1 // 这里填写管理员ID(拥有wechat最高管理权限), 默认为第一个用户
        ],
    ],
    'components' => [
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
        
        'wechat' =>[
            'class' => 'callmez\wechat\sdk\Wechat',
            'appId' => 'wx5c05af297bd48cf0',
            'appSecret' => 'e1f449a2c2f93de17186de344fb494c3',
            'token'=>'601E6934626498B4'
        ],
        'request' => [
            'parsers' =>[
                'application/json' => 'yii\web\JsonParser'
            ],
        ],
    ],
    'params' => $params,
];
