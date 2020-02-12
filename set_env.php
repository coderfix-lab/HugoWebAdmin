<?php
/**
 * 部署环境配置脚本
 *
 *

 * #环境 dev prod preProd
#debug true false
 */

/*
 * 获取第一个参数
 * 1 dev
 * 2 preProd
 * 3 prod
 */

/*
 * 获取第一个参数
 *
 * 1  true
 * 0 false
 */

$type = $argv['1'];

$appEnv = 'dev';
if($type == 1){
    $appEnv = 'dev';
}
if($type == 2){
    $appEnv = 'pre_prod';
}
if($type == 3){
    $appEnv = 'prod';
}

$appDebug = 'true';
if($argv['2'] == 0){
    $appDebug = 'false';
}

$str = "APP_ENV=$appEnv\nAPP_DEBUG=$appDebug";
file_put_contents(".env",$str);
