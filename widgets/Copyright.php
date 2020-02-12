<?php
/**
 * Created by PhpStorm.
 * User: calvin
 * Date: 2018/7/25
 * Time: 14:27
 */

namespace app\widgets;

use Yii;

/**
 * 版权说明
 * @package app\widgets
 */
class Copyright extends \yii\bootstrap\Widget
{
    public function init(){
        parent::init();
    }

    public function run(){
        parent::run();
        return $this->render('@app/views/widgets/copyright');
    }

}