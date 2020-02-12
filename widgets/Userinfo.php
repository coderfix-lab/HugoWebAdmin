<?php
/**
 * Created by PhpStorm.
 * User: calvin
 * Date: 2018/7/25
 * Time: 14:45
 */

namespace app\widgets;

use app\modules\sys\models\SystemUser;
use Yii;

/**
 * 用户信息
 * @package app\widgets
 */
class Userinfo extends \yii\bootstrap\Widget
{

    public function init(){
        parent::init();
    }

    public function run(){
        parent::run();
        //获取用户信息
        $info = SystemUser::getInfoById(Yii::$app->user->getId());

        return $this->render('@app/views/widgets/userinfo',['info'=>$info]);
    }

}