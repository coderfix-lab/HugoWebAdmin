<?php

$config =  __DIR__ . '/../.env';

if(!isset($config)){
    return 'no config';
}
$configCount = parse_ini_file($config);

if(!isset($configCount['APP_ENV']) || !isset($configCount['APP_DEBUG'])){
    return 'no config';
}

// comment out the following two lines when deployed to production
defined('YII_DEBUG') or define('YII_DEBUG', $configCount['APP_DEBUG']);
defined('YII_ENV') or define('YII_ENV', $configCount['APP_ENV']);
if(YII_ENV =='dev'){
    error_reporting(-1);
}
set_time_limit(0);
require __DIR__ . '/../vendor/autoload.php';
require __DIR__ . '/../vendor/yiisoft/yii2/Yii.php';

$config = require __DIR__ . '/../config/web.php';

(new yii\web\Application($config))->run();
