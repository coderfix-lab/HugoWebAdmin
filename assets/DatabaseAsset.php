<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/8/4
 * Time: 19:17
 */

namespace app\assets;

use yii\web\AssetBundle;

/**
 * Main application asset bundle.
 *
 * @author Qiang Xue <qiang.xue@gmail.com>
 * @since 2.0
 */
class DatabaseAsset extends AssetBundle
{
    public $sourcePath = '@webroot/resource/';
    public $css = [
//        'vendors/custom/datatables/datatables.bundle.css',
    ];
    public $js = [
//        'vendors/custom/datatables/datatables.bundle.js',
//        'demo/default/custom/crud/datatables/data-sources/html.js'
    ];
    public $depends = [
//        'app\assets\AdminAsset'
    ];
}