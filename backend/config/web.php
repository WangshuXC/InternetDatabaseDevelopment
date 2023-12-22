<?php
/**
 * Team: LFZW,NKU
 * Coding by LiangXiaochu 2110951
 * 修改了路由路径，提供了api接口给前端,允许跨域传输
 */

$params = require __DIR__ . '/params.php';
$db = require __DIR__ . '/db.php';

$config = [
    'id' => 'basic',
    'basePath' => dirname(__DIR__),
    'bootstrap' => ['log'],
    'aliases' => [
        '@bower' => '@vendor/bower-asset',
        '@npm'   => '@vendor/npm-asset',
    ],
    'components' => [
        'request' => [
            // !!! insert a secret key in the following (if it is empty) - this is required by cookie validation
            'cookieValidationKey' => 'JNYqG-lRFV3nWlJn-h56ovmOGnitNP5C',
            'enableCsrfValidation' => false //今晚的问题主要是这个配置， 解除 cors 令牌，yii有个机制每个请求需要传入cors令牌  ，那这边就先撤了？ok感谢！
        ],
        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],
        'user' => [
            'identityClass' => 'app\models\User',
            'enableAutoLogin' => true,
        ],
        'errorHandler' => [
            'errorAction' => 'site/error',
        ],
        'mailer' => [
            'class' => \yii\symfonymailer\Mailer::class,
            'viewPath' => '@app/mail',
            // send all mails to a file by default.
            'useFileTransport' => true,
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
        'db' => $db,
        'urlManager' => [
            'enablePrettyUrl' => true,
            'showScriptName' => false,
            'rules' => [
                'api/login' => 'api/login',
                'api/signup' => 'api/signup',
                'api/adminlogin' => 'api/adminlogin',
                'api/getarticle' => 'api/getarticle',
                'api/getvideo' => 'api/getvideo',
                'api/getvideocomment' => 'api/getvideocomment',
                'api/getarticlecomment' => 'api/getarticlecomment',
                'api/getclick' => 'api/getclick',
                'api/addcomment' => 'api/addcomment',
                'api/addclick' => 'api/addclick',
                'api/getpersonalinfo' => 'api/getpersonalinfo',
                'api/addwebviews' => 'api/addwebviews'
            ],
        ],
        'response' => [
            // 'format' => yii\web\Response::FORMAT_JSON,
            'charset' => 'UTF-8',
            'on beforeSend' => function ($event) {
                $response = $event->sender;
                $response->headers->set('Access-Control-Allow-Origin', '*');//这个是设置跨域
                $response->headers->set('Access-Control-Allow-Methods', 'GET, POST, PUT, DELETE, OPTIONS');
                $response->headers->set('Access-Control-Allow-Headers', 'Origin, X-Requested-With, Content-Type, Accept');
                //$event->sender->headers->remove('Access-Control-Allow-Origin');//这个是删除跨域规则
            },
        ],
    ],
    'params' => $params,
];

if (YII_ENV_DEV) {
    // configuration adjustments for 'dev' environment
    // $config['bootstrap'][] = 'debug';
    $config['modules']['debug'] = [
        'class' => 'yii\debug\Module',
        // uncomment the following to add your IP if you are not connecting from localhost.
        //'allowedIPs' => ['127.0.0.1', '::1'],
    ];

    $config['bootstrap'][] = 'gii';
    $config['modules']['gii'] = [
        'class' => 'yii\gii\Module',
        // uncomment the following to add your IP if you are not connecting from localhost.
        //'allowedIPs' => ['127.0.0.1', '::1'],
    ];
}

return $config;
