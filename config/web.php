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
        'core' => [
            'class' => 'app\modules\core\Module',
        ],
        'agent' => [
            'class' => 'app\modules\agent\Module',
        ],
        'goods' => [
            'class' => 'app\modules\goods\Module',
        ],
        'trade' => [
            'class' => 'app\modules\trade\Module',
        ],
        'content' => [
            'class' => 'app\modules\content\Module',
        ],
        'online' => [ //线上商城
            'class' => 'app\modules\online\Module',
        ],
        //仓库管理
        'store' => [
            'class' => 'app\modules\store\Module',
        ],

//        //运维平台接口
//        'APIsys' => [
//            'class' => 'app\modulesAPI\sys\Module',
//        ],

        //内部工具
        'tool' => [
            'class' => 'app\modules\tool\Module',
        ],

        //发布订阅
        'topic' => [
            'class' => 'app\modules\topic\Module',
        ],

        //营销模块
        'marketing' => [
            'class' => 'app\modules\marketing\Module',
        ],

        //数据相关
        'purviewz' => [
            'class' => 'app\modules\purviewz\Module',
        ],
        'tradez' => [
            'class' => 'app\modules\tradez\Module',
        ],
        'agentz' => [
            'class' => 'app\modules\agentz\Module',
        ],
        'corez' => [
            'class' => 'app\modules\corez\Module',
        ],
        //系统配置 业务方向
        'system' => [
            'class' => 'app\modules\system\Module',
        ],
        //二手模块
        'past' => [
            'class' => 'app\modules\past\Module',
        ],
        //寄售入库
        'consign' => [
            'class' => 'app\modules\consign\Module',
        ],
        //寄售商品库
        'dict' => [
            'class' => 'app\modules\dict\Module',
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
