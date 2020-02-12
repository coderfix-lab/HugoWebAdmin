<?php
use yii\helpers\Html;

$params = require __DIR__ . '/'. YII_ENV.'_params.php';
$db = require __DIR__ . '/'. YII_ENV.'_db.php';
$db2 = require __DIR__ . '/'. YII_ENV.'_db2.php';

$config = [
    'id' => 'henibox-manager',
    'basePath' => dirname(__DIR__),
    'bootstrap' => ['log'],
    'timeZone' => 'Asia/Shanghai',
    'aliases' => [
        '@bower' => '@vendor/bower-asset',
        '@npm' => '@vendor/npm-asset',
        '@mdm/admin' => '@app/components/yii2-admin',
    ],
    'homeUrl' => '/purview/default/index',
    'components' => [
        'request' => [
            // !!! insert a secret key in the following (if it is empty) - this is required by cookie validation
            'cookieValidationKey' => '1',
        ],
        'assetManager' => [
            'bundles' => [
                'yii\web\JqueryAsset' => [
                    'sourcePath' => null, // 屏蔽jqueryAsset
                    'js' => [
                    ],
                ],
                'yii\bootstrap\BootstrapAsset' => [
                    'css' => [],
                ],
            ],
        ],
        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],
        'user' => [
            'identityClass' => 'app\modules\sys\models\SystemUser',
            'loginUrl' => array('sys/public/login'),
            'enableAutoLogin' => false,
        ],
        'errorHandler' => [
            'errorAction' => 'sys/public/error',
            'maxSourceLines'=>5
        ],
        'mailer' => [
            'class' => 'yii\swiftmailer\Mailer',
            // send all mails to a file by default. You have to set
            // 'useFileTransport' to false and configure a transport
            // for the mailer to send real emails.
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
        'db2' => $db2,
        'urlManager' => [
            'enablePrettyUrl' => true,
            'showScriptName' => false,
            'rules' => [

            ],
        ],
        'authManager' => [ //rbac权限管理
            'class' => 'yii\rbac\DbManager',
            "defaultRoles" => ["guest"],
        ],
        'as access' => [
            'class' => 'mdm\admin\components\AccessControl',
            'allowActions' => [
                "*"
            ]
        ],
        'redis' => [
            'class' => 'yii\redis\Connection',
            'hostname' => 'localhost',
            'port' => 6379,
            'database' => 0,
        ],
    ],
    'modules' => [
        'sys' => [
            'class' => 'app\modules\sys\Module',
        ],
        'purview' => [
            'class' => 'app\modules\purview\Module',
        ],
        'admin' => [
            'class' => 'mdm\admin\Module',
            'layout' => 'left-menu',
            'mainLayout' => '@app/views/layouts/main_sys.php',
            'controllerMap' => [
                'assignment' => [
                    'class' => 'mdm\admin\controllers\AssignmentController',
                    'userClassName' => 'app\modules\sys\models\SystemUser',
                    'idField' => 'id',
                    'usernameField' => 'user_name',
                    'fullnameField' => 'display_name',
                    'extraColumns' => [
                        [
                            'attribute' => 'display_name',
                            'label' => 'display_name',
                            'value' => function($model, $key, $index, $column) {
                                return $model->display_name;
                            },
                        ],
                    ],
                ],
            ],
        ],


    ],
    'params' => $params,
];

if (YII_ENV_DEV) {
    // configuration adjustments for 'dev' environment
//    $config['bootstrap'][] = 'debug';
//    $config['modules']['debug'] = [
//        'class' => 'yii\debug\Module',
//         //uncomment the following to add your IP if you are not connecting from localhost.
//        'allowedIPs' => ['127.0.0.1', '::1'],
//    ];

    $config['bootstrap'][] = 'gii';
    $config['modules']['gii'] = [
        'class' => 'yii\gii\Module',
        // uncomment the following to add your IP if you are not connecting from localhost.
        //'allowedIPs' => ['127.0.0.1', '::1'],
    ];
}

return $config;
