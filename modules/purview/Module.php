<?php

namespace app\modules\purview;

/**
 * purview module definition class
 */
class Module extends \yii\base\Module
{
    /**
     * @inheritdoc
     */
    public $controllerNamespace = 'app\modules\purview\controllers';

    public $layout = '@app/views/layouts/main_sys';

    /**
     * @inheritdoc
     */
    public function init()
    {
        parent::init();

        // custom initialization code goes here
    }
}
