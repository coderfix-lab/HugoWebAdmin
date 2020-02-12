<?php

namespace app\modules\purview\controllers;

use app\components\iot\Card;
use app\modules\purview\models\CoreMachineHardware;
use app\modules\trade\models\CoreMachine;
use yii\web\Controller;
use app\common\controllers\RbacBaseController;
/**
 * Default controller for the `purview` module
 */
class DefaultController extends RbacBaseController
{
    /**
     * Renders the index view for the module
     * @return string
     */
    public function actionIndex()
    {

        return $this->render('index',[

        ]);
    }
}
