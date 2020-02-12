<?php

namespace app\modules\sys\controllers;

use app\common\controllers\RbacBaseController;
use Yii;
/**
 * Default controller for the `sys` module
 */
class DefaultController extends RbacBaseController
{
    /**
     * Renders the index view for the module
     * @return string
     */
    public function actionIndex()
    {


        return $this->render('index');
    }
}
