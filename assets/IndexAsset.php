<?php


namespace app\assets;

use yii\web\AssetBundle;

/**
 * 后台 首页
 * @package app\assets
 */
class IndexAsset extends AssetBundle
{
    public $sourcePath = '@app/resource/';

    public $css = [
//        '/custom/fullcalendar/fullcalendar.bundle.css'
    ];
    public $js = [
//        'app/js/dashboard.js',
//        'vendors/custom/fullcalendar/fullcalendar.bundle.js'

    ];
    public $depends = [
        'app\assets\AdminAsset'
    ];
}