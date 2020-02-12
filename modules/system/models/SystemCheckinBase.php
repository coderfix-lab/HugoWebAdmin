<?php

namespace app\modules\system\models;

use Yii;

/**
 * This is the model class for table "system_checkin_base".
 *
 * @property string $id 主键
 * @property int $times 第几次签到
 * @property string $start_time
 * @property string $end_time
 * @property string $type 类型
 * @property int $is_del 删除
 * @property string $gmt_create 创建时间
 * @property string $gmt_modified 修改时间
 */
class SystemCheckinBase extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'system_checkin_base';
    }

    /**
     * @return \yii\db\Connection the database connection used by this AR class.
     */
    public static function getDb()
    {
        return Yii::$app->get('db2');
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['times', 'is_del'], 'integer'],
            [['start_time', 'end_time', 'gmt_create', 'gmt_modified'], 'safe'],
            [['type'], 'string', 'max' => 64],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => '主键',
            'times' => '第几次签到',
            'start_time' => 'Start Time',
            'end_time' => 'End Time',
            'type' => '类型',
            'is_del' => '删除',
            'gmt_create' => '创建时间',
            'gmt_modified' => '修改时间',
        ];
    }

    /**
     * 获取这周的奖励明细
     * @param $times
     */
    public static function getReward($startTime,$times){
        $info = self::find()->where(['times'=>$times])
            ->andWhere("start_time <= '$startTime' and is_del = 0 ")
            ->orderBy(['start_time'=>SORT_DESC])
            ->asArray()
            ->one();
        if($info == false){
            return false;
        }
        $info['typeName'] = self::getName($info['type']);
        //找到对应的数据
        $list = SystemCheckinReward::getList($info['id']);
        $data = [
            'info'=>$info,
            'list'=>$list,
        ];
        return $data;
    }


    public static function getName($type){
        if($type == "point"){
            return "积分";
        }
        if($type == "ticket"){
            return "优惠券";
        }
        if($type == "muti"){
            return "礼包";
        }
    }


    /**
     * 删除对应时间的签到奖励
     * @param $startTime
     * @param $times
     */
    public static function delBaseReward($startTime,$times){
        $info = self::find()->where(['start_time'=>$startTime,'times'=>$times])->one();
        if($info){
            self::updateAll(['is_del'=>1],['id'=>$info->id]);
            SystemCheckinReward::delByBaseId($info->id);
        }
    }

    /**
     * 更新或者新建
     * @param $startTime
     * @param $times
     * @param $arr
     */
    public static function updateReward($startTime,$times,$type,$arr){
        $info = self::find()->where(['start_time'=>$startTime,'times'=>$times])->one();
        if($info == false){
            $info = new SystemCheckinBase();
            $info->start_time = $startTime;
            $info->times = $times;
            $info->type = $type;
            $info->is_del = 0;
            $info->gmt_create = date("Y-m-d H:i:s");
            $info->insert();
        }
        //删除之前的
        self::updateAll(['type'=>$type],['id'=>$info->id]);
        SystemCheckinReward::delByBaseId($info->id);
        //写入新的
        if(count($arr)){
            $i = 10;
            foreach ($arr as $v){ //type value
                //
                SystemCheckinReward::add($info->id,$v['type'],$v['value'],$i);
                $i ++;
            }
        }
    }
}
