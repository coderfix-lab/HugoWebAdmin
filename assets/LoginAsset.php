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
class LoginAsset extends AssetBundle
{
    public $sourcePath = '@webroot/resource/assets';

    public $css = [
    ];
    public $js = [
        'snippets/custom/pages/user/login.js'
    ];
    public $depends = [
        'app\assets\AdminAsset'
    ];
}