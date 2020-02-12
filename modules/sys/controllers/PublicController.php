<?php

namespace app\modules\sys\controllers;

use app\modules\sys\models\SystemUser;
use Yii;
use app\modules\sys\models\LoginForm;


class PublicController extends \yii\web\Controller
{
    /**
     * {@inheritdoc}
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
        ];
    }

    public function actionIndex()
    {
        return $this->render('index');
    }

    /**
     * 登录
     * @return string|\yii\web\Response
     */
    public function actionLogin(){
       if (!Yii::$app->user->isGuest) {
           return $this->goHome();
       }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
           return $this->goHome();
        }

        $model->password = '';
        return $this->renderPartial('login', [
            'model' => $model,
        ]);
    }

    /**
     * 登出
     */
    public function actionLogout(){
        Yii::$app->user->logout();
        $this->redirect(Yii::$app->urlManager->createUrl(Yii::$app->user->loginUrl));
    }

    /**
     * 错误页面
     */
    public function actionError(){
        if($error=Yii::$app->errorHandler->error){
            if(Yii::$app->request->isAjaxRequest)
                echo $error['message'];
            else
                $this->renderFile('error', $error);
        }
    }

}
