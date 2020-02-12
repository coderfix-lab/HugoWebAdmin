<?php
/**
 * Created by PhpStorm.
 * User: calvin
 * Date: 2018/7/25
 * Time: 13:52
 */

namespace app\widgets;

use Yii;
use app\modules\sys\models\SystemMenu;
/**
 * 菜单的小部件
 * @package app\widgets
 */
class BaseMenu extends \yii\bootstrap\Widget
{
    public function init(){
        parent::init();
    }

    public function run(){
        parent::run();
        //获取当前的地址
        $turl = Yii::$app->request->getPathInfo();
        $base = SystemMenu::getDataBySuburl($turl);

        $pids = SystemMenu::getPids($base['url']);
        $menu = SystemMenu::getAllMenu();
//        var_dump($menu); exit();
        return $this->render('@app/views/widgets/base_menu',['menu_arr'=>$menu,'pids'=>$pids,'dislink'=>$base['url']]);
    }
}
