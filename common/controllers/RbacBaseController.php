<?php

namespace app\common\controllers;

use Yii;
use yii\web\Controller;
use yii\web\HttpException;
use mdm\admin\components\Helper;

class RbacBaseController extends Controller
{

    public function beforeAction($action)
    {
        if (Yii::$app->user->isGuest) {
           return  $this->redirect(Yii::$app->urlManager->createUrl(Yii::$app->user->loginUrl));
        }

        $url = "/".\Yii::$app->controller->module->id."/". \Yii::$app->controller->id."/".\Yii::$app->controller->action->id;

        $check = Helper::checkRoute($url);

//        var_dump($check); exit();

        if(!Helper::checkRoute($url)){
            throw new HttpException(404,"没有这个页面",404);
        }
        return parent::beforeAction($action);
    }



}
