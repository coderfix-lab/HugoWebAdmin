<?php
namespace app\assets;

use yii\web\AssetBundle;

/**
 * 后台管理的基本资源文件
 * @package app\assets
 */
class AdminAsset extends AssetBundle
{
    public $sourcePath = '@webroot/resource/assets';

    public $css = [
        'vendors/base/vendors.bundle.css',
        'demo/default/base/style.bundle.css'
    ];
    public $js = [
        'app/js/jquery.min.js',
        'vendors/base/vendors.bundle.js',
        'demo/default/base/scripts.bundle.js',
    ];
    public $depends = [

    ];
}
