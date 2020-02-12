<?php

use yii\widgets\ActiveForm;
use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
use yii\helpers\ArrayHelper;
use yii\widgets\LinkPager;
use app\modules\core\models\AgentMachine;
use app\modules\core\models\AgentInfo;

// use app\assets\TimerAsset;

/* @var $this yii\web\View */
/* @var $searchModel app\modules\core\models\ItemSreach */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = '销售运营/签到奖励';
$this->params['breadcrumbs'][] = $this->title;

use app\assets\MachineAsset;

MachineAsset::register($this);

?>
<div class="m-portlet m-portlet--mobile">
    <div class="m-portlet__head">
        <div class="m-portlet__head-caption">
            <div class="m-portlet__head-title">
                <h3 class="m-portlet__head-text">
                    销售运营/签到奖励

                </h3>
            </div>
        </div>
        <div class="m-portlet__head-tools">
            <ul class="m-portlet__nav">
                <li class="m-portlet__nav-item">
                    <a href="<?= Yii::$app->urlManager->createUrl("/system/checkin/edit") ?>"
                       class="btn btn-info m-btn m-btn--custom "> <span>编辑签到</span>
                    </a>
                </li>
            </ul>
        </div>

    </div>
    <div class="m-portlet__body">
        <h4>本周奖励(不可修改)</h4>
        <table class="table table-striped- table-bordered table-hover table-checkable" id="m_table_1">
            <thead>
            <tr>
                <th>连续签到</th>
                <th>当前奖励类型</th>
                <th>奖励详情</th>
            </tr>
            </thead>
            <tbody>
            <?php
            if (count($data)) {
                foreach ($data as $k=>$v) {
                    ?>
                    <tr>
                        <td><?= $k ?>天</td>
                        <td><?= $v['info']['typeName'] ?></td>
                        <td>
                            <?php
                            $str = [];
                            if(isset($v['list']) && count($v['list'])){
                                foreach ($v['list'] as $m){
                                    $typeName =   \app\modules\system\models\SystemCheckinBase::getName($m['type']);
                                    if($m['type'] == \app\modules\system\models\SystemCheckinReward::TYPE_TICKET){
                                        $value = \app\modules\system\models\UserTicketTemp::getName($m['value']);
                                        $str[] = $value;
                                    }else{
                                        $value = $m['value'];
                                        $str[] = $value."积分";
                                    }
                                }
                            }
                            echo implode(" + ",$str);
                            ?>
                        </td>
                    </tr>
                <?php }
            } ?>

            </tbody>
        </table>

        <br><br><br>

        <h4>下周奖励(下周到来之前一直可修改)</h4>
        <table class="table table-striped- table-bordered table-hover table-checkable" id="m_table_1">
            <thead>
            <tr>
                <th>连续签到</th>
                <th>当前奖励类型</th>
                <th>奖励详情</th>
            </tr>
            </thead>
            <tbody>
            <?php
            if (count($dataNextWeek)) {
                foreach ($dataNextWeek as $k=>$v) {
                    ?>
                    <tr>
                        <td><?= $k ?>天</td>
                        <td><?= $v['info']['typeName'] ?></td>
                        <td>
                            <?php
                            $str = [];
                            if(isset($v['list']) && count($v['list'])){
                                foreach ($v['list'] as $m){
                                   $typeName =   \app\modules\system\models\SystemCheckinBase::getName($m['type']);
                                   if($m['type'] == \app\modules\system\models\SystemCheckinReward::TYPE_TICKET){
                                       $value = \app\modules\system\models\UserTicketTemp::getName($m['value']);
                                       $str[] = $value;
                                   }else{
                                       $value = $m['value'];
                                       $str[] = $value."积分";
                                   }
                                }
                            }
                            echo implode(" + ",$str);
                            ?>
                        </td>
                    </tr>
                <?php }
            } ?>

            </tbody>
        </table>






    </div>
</div>
