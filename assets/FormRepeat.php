<?php
namespace app\assets;

use yii\web\AssetBundle;

/**
 * 后台管理的基本资源文件
 * @package app\assets
 */
class FormRepeat extends AssetBundle
{
    public $sourcePath = '@webroot/resource/';

    public $css = [
        
    ];
    public $js = [
        'app/js/jquery.min.js',
        'vendors/base/vendors.bundle.js',
        'demo/default/base/scripts.bundle.js',
        'app/js/form-repeater.js',
    ];
    public $depends = [
        
    ];
}
