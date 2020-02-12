<?php

namespace app\modules\sys;

/**
 * sys module definition class
 */
class Module extends \yii\base\Module
{
    /**
     * @inheritdoc
     */
    public $controllerNamespace = 'app\modules\sys\controllers';

    public $layout = '@app/views/layouts/main_sys';

    /**
     * @inheritdoc
     */
    public function init()
    {
        parent::init();

    }
}
