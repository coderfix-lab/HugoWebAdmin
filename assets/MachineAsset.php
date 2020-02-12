<?php
/**
 * Created by PhpStorm.
 * User: zdwljs
 * Date: 2018/7/26
 * Time: 16:23
**/
namespace app\assets;

use yii\web\AssetBundle;

/**
 * 后台管理的基本资源文件
 * @package app\assets
 */
class MachineAsset extends AssetBundle
{
    public $sourcePath = '@webroot/resource';

    public $css = [
//        'select2/dist/css/select2.css',
//        'vendors/base/vendors.bundle.css',
//        'demo/default/base/style.bundle.css'
    ];
    public $js = [
//        'select2/dist/js/select2.full.js',
//        'assets/js/machine.js'
//        'assets/demo/custom/crud/forms/widgets/bootstrap-select.js'
//        'pageJs/machine.js'
//        'vendors/base/vendors.bundle.js',
//        'demo/default/base/scripts.bundle.js',
//        'assets/demo/custom/crud/forms/widgets/select2.js',
    ];

    public $depends = [
//        'app\assets\AdminAsset',
//        'https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js'
    ];
    public $jsOptions = [
//        'position' => \yii\web\View::POS_READY
    ];
}