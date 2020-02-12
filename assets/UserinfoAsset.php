<?php
/**
 * Created by PhpStorm.
 * User: calvin
 * Date: 2018/7/25
 * Time: 15:21
 */
namespace app\assets;

use yii\web\AssetBundle;
/**
 * 用户信息部件要引入资源目录
 * @package app\assets
 */
class UserinfoAsset extends AssetBundle
{
    public $sourcePath = '@webroot/resource/';

    public $css = [
    ];
    public $js = [
    ];
    public $depends = [

    ];
}
