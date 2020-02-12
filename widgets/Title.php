<?php

namespace app\widgets;

use Yii;
/**
 * 菜单的小部件
 * @package app\widgets
 */
class Title extends \yii\bootstrap\Widget
{
    public function init(){
        parent::init();
    }

    public function run(){
        parent::run();
        $title = Yii::$app->params['title'];
        return $this->render('@app/views/widgets/title',['title'=>$title]);
    }
}
