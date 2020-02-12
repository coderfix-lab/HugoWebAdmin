<?php

namespace app\modules\system\controllers;

use app\common\controllers\RbacBaseController;
use app\modules\system\models\SystemCheckinBase;
use app\modules\system\models\SystemCheckinReward;
use app\modules\system\models\UserTicketTemp;
use yii\web\Controller;

/**
 * Default controller for the `system` module
 */
class CheckinController extends RbacBaseController
{

    /**
     * 展示最新的签到数据
     * @return string
     */
    public function actionIndex()
    {
        $date  = time();
        $w = date("w",$date);
        if($w != 0){
            $reduce = $w - 1;
        }else{
            $reduce = 7;
        }
        $w1 = date("Y-m-d 0:00:00",$date - (3600 * 24 * $reduce));

        $w2 = date("Y-m-d 0:00:00",strtotime($w1) + (3600 * 24 * 7));

        //本周
        $data = [];
        for ($i=1;$i<=7;$i++){
            $data[$i] = SystemCheckinBase::getReward($w1,$i);
        }

        $dataNext = [];
        for ($j=1;$j<=7;$j++){
            $dataNext[$j] = SystemCheckinBase::getReward($w2,$j);
        }
//        var_dump($dataNext); exit();
        return $this->render('index',[
            'data'=>$data,
            'dataNextWeek'=>$dataNext
        ]);
    }

    /**
     * 编辑下周签到
     */
    public function actionEdit(){
        $date  = time();
        $w = date("w",$date);
        $reduce = abs( $w - 8);
        $w2 = date("Y-m-d 0:00:00",$date + (3600 * 24 * $reduce));

        $dataNext = [];
        for ($j=1;$j<=7;$j++){
            $dataNext[$j] = SystemCheckinBase::getReward($w2,$j);
        }

        //优惠券列表
        $ticket = UserTicketTemp::getList();

        return $this->render('edit',[
            'dataNextWeek'=>$dataNext,
            'ticket'=>$ticket
        ]);
    }


    /**
     * 更新签到配置
     */
    public function actionAjaxUpdate(){
        $date  = time();
        $w = date("w",$date);
        $reduce = abs( $w - 8);
        $w2 = date("Y-m-d 0:00:00",$date + (3600 * 24 * $reduce));
//        var_dump($_POST);

        //修改下周一的时间，开始时间是下周一

        $data = [];
        for ($i=1;$i<= 7;$i++){

            $data[$i] = [
                'week'=>$i,
                'startTime'=>date("Y-m-d H:i:s",strtotime($w2 )+ (($i - 1) * 3600 * 24 )),
                'type'=>$_POST['type'.$i],
                "ticket"=>$_POST['ticket'.$i],
                'point'=>$_POST['point'.$i],
                'datas'=>$_POST['datas'.$i],
            ];

            if($data[$i]['type'] == ""){
                //没有奖励 之前的需要被删除掉
                SystemCheckinBase::delBaseReward($data[$i]['startTime'],$i);
            }

            $arr = [];
            //整理数据，准备更新写入数值
            if($data[$i]['type'] == "ticket"){
                //优惠券
                $arr[] = [
                    'type'=>SystemCheckinReward::TYPE_TICKET,
                    'value'=>$data[$i]['ticket'],
                ];
            }
            if($data[$i]['type'] == "point"){
                //积分
                $arr[] = [
                    'type'=>SystemCheckinReward::TYPE_POINT,
                    'value'=>$data[$i]['point'],
                ];
            }
            if($data[$i]['type'] == "muti"){
                //礼包
                $valueArr = explode(",",$data[$i]['datas']);
                if(count($valueArr)){
                    foreach ($valueArr as  $vv){
                        $vvArr = explode("=",$vv);
                        if($vvArr[0] == "undefined" || $vvArr[0] == ""){
                            continue;
                        }
                        if($vvArr[0] == "积分"){
                            if(intval($vvArr[1]) < 0 ){
                                continue;
                            }
                            $arr[] = [
                                'type'=>SystemCheckinReward::TYPE_POINT,
                                'value'=>$vvArr[1],
                            ];
                        }
                        if($vvArr[0] == "优惠券"){
                            if($vvArr[1] == "请选择优惠券"){
                                continue;
                            }
                            $ticketId = explode("_",$vvArr[1]);
                            if(count($ticketId) == 0){
                                continue;
                            }

                            $arr[] = [
                                'type'=>SystemCheckinReward::TYPE_TICKET,
                                'value'=>$ticketId[1],
                            ];
                        }
                    }
                }
            }

            $data[$i]['arr'] = $arr;
            SystemCheckinBase::updateReward($w2,$data[$i]['week'],$data[$i]['type'],$data[$i]['arr']);
        }

        //更新数据
        echo 1;

    }
}
