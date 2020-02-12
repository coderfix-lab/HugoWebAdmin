<?php

namespace app\modules\system\models;

use Yii;

/**
 * This is the model class for table "user_ticket_temp".
 *
 * @property string $id 主键
 * @property string $temp_number 模板编号
 * @property string $name 类型名称
 * @property int $temp_type 优惠券类型
 * @property string $limit_item 限制商品
 * @property string $order_price 订单满额
 * @property string $value 订单减额|优惠券金额
 * @property string $value_min 优惠券最低金额
 * @property string $value_max 优惠券最高金额
 * @property string $remark 描述
 * @property string $is_disable 有效状态 0有效 1失效
 * @property int $is_del 删除状态，默认0
 * @property int $expired_in 约定时间内失效单位秒
 * @property string $gmt_expired 过期时间
 * @property string $gmt_create 创建时间
 * @property string $gmt_modified 修改时间
 */
class UserTicketTemp extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'user_ticket_temp';
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
            [['temp_type', 'is_disable', 'is_del', 'expired_in'], 'integer'],
            [['order_price', 'value', 'value_min', 'value_max'], 'number'],
            [['gmt_expired', 'gmt_create', 'gmt_modified'], 'safe'],
            [['temp_number'], 'string', 'max' => 32],
            [['name'], 'string', 'max' => 128],
            [['limit_item'], 'string', 'max' => 900],
            [['remark'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => '主键',
            'temp_number' => '模板编号',
            'name' => '类型名称',
            'temp_type' => '优惠券类型',
            'limit_item' => '限制商品',
            'order_price' => '订单满额',
            'value' => '订单减额|优惠券金额',
            'value_min' => '优惠券最低金额',
            'value_max' => '优惠券最高金额',
            'remark' => '描述',
            'is_disable' => '有效状态 0有效 1失效',
            'is_del' => '删除状态，默认0',
            'expired_in' => '约定时间内失效单位秒',
            'gmt_expired' => '过期时间',
            'gmt_create' => '创建时间',
            'gmt_modified' => '修改时间',
        ];
    }


    public static function getName($id){
        $info = self::find()->where(['id'=>$id])->one();
        return $info['name'];

    }

    /**
     * 获取全部优惠券
     */
    public static function getList(){
        $list  = self::find()->where(['is_del'=>0])->orderBy(['gmt_create'=>SORT_DESC])->asArray()->all();
        if(!$list){
            return  [];
        }else{
            foreach ($list as $k => $v){
                $list[$k]['typename'] = self::getTypeName($v['temp_type']);

                if($v['expired_in'] != null && $v['expired_in'] != 0){
                    $list[$k]['exp'] = "相对时效：".self::_mtot($v['expired_in']) ;
                }else if($v['gmt_expired'] != null){
                    $list[$k]['exp'] = "绝对时效：".$v['gmt_expired'] ;
                }else{
                    $list[$k]['exp'] = "";
                }

                if($v['value'] == null ){
                    $list[$k]['value'] = $v['value_min'] ." ~ ".$v['value_max'] ;
                }

            }
            return $list;
        }
    }

    /**
     * 获取优惠券类型名称
     * @param $type
     */
    public static function getTypeName($type){
        if($type == self::TYPE_NO){
            return "通用券";
        }
        if($type == self::TYPE_ITEM){
            return "商品券";
        }
        if($type == self::TYPE_MJ){
            return "满立减";
        }
    }

    const TYPE_NO = 1;
    const TYPE_ITEM = 2;
    const TYPE_MJ = 3;

    const TYPE_NUMBER_ZHC = 'zhc'; //新人专享礼包（新用户）
    const TYPE_NUMBER_ZHCBACK = 'zhcback'; //奖励红包（邀请者）



    /**
     * 秒转换成天小时
     * @param $s
     */
    private static function _mtot($time,$arr=0){
        if(is_numeric($time)){
            $value = array(
                "days" => 0, "hours" => 0,
                "minutes" => 0, "seconds" => 0,
            );
            if($time >= 86400){
                $value["days"] = floor($time/86400);
                $time = ($time%86400);
            }
            if($time >= 3600){
                $value["hours"] = floor($time/3600);
                $time = ($time%3600);
            }
            if($time >= 60){
                $value["minutes"] = floor($time/60);
                $time = ($time%60);
            }
            $value["seconds"] = floor($time);
            //return (array) $value;
            $t= $value["days"] ."天"." ". $value["hours"] ."小时". $value["minutes"] ."分".$value["seconds"]."秒";
            if($arr == 1){
                return $value;
            }else{
                return $t;
            }
        }else{
            return (bool) FALSE;
        }

    }
}
