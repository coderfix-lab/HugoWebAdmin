<?php

namespace app\widgets;

use Yii;
/**
 *
 * @package app\widgets
 */
class HeadTitle extends \yii\bootstrap\Widget
{
    public function init(){
        parent::init();
    }

    public function run(){
        parent::run();
        $title = Yii::$app->params['title'];
        return $this->render('@app/views/widgets/head_title',['title'=>$title]);
    }
}