<?php

namespace app\widgets;

use app\modules\sys\models\SystemMenu;
use Yii;

/**
 * 面包屑导航
 * @package app\widgets
 */
class Breadcrumbs extends \yii\bootstrap\Widget
{
    public function init(){
        parent::init();
    }

    public function run(){
        parent::run();
        $url = \Yii::$app->controller->module->id."/". \Yii::$app->controller->id."/".\Yii::$app->controller->action->id;
        $name = SystemMenu::getNameByUrl($url);
        $pids = SystemMenu::getPids($url);
        $arr = [];
        if($pids != null){
            foreach ($pids as $pid){
                $arr[] = SystemMenu::getDataById($pid);
            }
        }else{
            $base = SystemMenu::getDataBySuburl($url);
            $pids = SystemMenu::getPids($base['url']);
            if($pids != null){
                foreach ($pids as $pid){
                    $arr[] = SystemMenu::getDataById($pid);
                }
            }
        }
        $arr = array_reverse($arr);
        return $this->render('@app/views/widgets/breadcrumbs',['name'=>$name,'list'=>$arr]);
    }
}
