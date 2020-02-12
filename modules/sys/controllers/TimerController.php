<?php

namespace app\modules\sys\controllers;

use app\components\iot\IotLibrary;
use app\components\RedisSync\DataSync;
use app\components\RedisSync\MachineDataSync;
use app\modules\sys\models\SystemVersion;

class TimerController  extends \yii\web\Controller
{

    /**
     * 定时推送
     * @return bool
     */
    public function actionIndex()
    {
        // */1 * * * * curl https://admin2f903655.henibox.com/sys/timer?key=233
        if($_GET['key'] != "233"){
            return false;
        }
        sleep(1);
        $start =  time();
        while ( time() - $start < 50  ){
            //执行50秒
            $data = DataSync::StaticDataPop();
            var_dump($data);
            if($data == false){
                break;
            }
            //发消息
            IotLibrary::pushMachineInfo($data['machineId'],$data['topic'],$data['body']);
        }
        echo (time() - $start);
    }

    /**
     * 将到期的版本更新推送给redis
     *
     */
    public function actionVersion(){
        //*/1 * * * * curl https://admin2f903655.henibox.com/sys/timer/version?key=233
        if($_GET['key'] != "233"){
            return false;
        }
        $info = SystemVersion::getNewTypeUpdate();
        if($info == false){
            return "暂无需要的推送";
        }
        //推入推送列表
        MachineDataSync::version($info);
        var_dump($info);
    }
}