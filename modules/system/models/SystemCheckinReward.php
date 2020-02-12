<?php

namespace app\modules\system\models;

use Yii;

/**
 * This is the model class for table "system_checkin_reward".
 *
 * @property string $id 主键
 * @property int $base_id 签到id
 * @property string $type 类型
 * @property string $value 对应值
 * @property int $sort 排序从大到小
 * @property int $is_del 是否删除
 * @property string $gmt_create 创建时间
 * @property string $gmt_modified 修改时间
 */
class SystemCheckinReward extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'system_checkin_reward';
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
            [['base_id', 'sort', 'is_del'], 'integer'],
            [['gmt_create', 'gmt_modified'], 'safe'],
            [['type', 'value'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => '主键',
            'base_id' => '签到id',
            'type' => '类型',
            'value' => '对应值',
            'sort' => '排序从大到小',
            'is_del' => '是否删除',
            'gmt_create' => '创建时间',
            'gmt_modified' => '修改时间',
        ];
    }

    const TYPE_POINT = 'point';
    const TYPE_TICKET = 'ticket';


    public static function getList($baseId){
        $list = self::find()->select(['type','value'])->where(['base_id'=>$baseId,'is_del'=>0])->orderBy(['sort'=>SORT_DESC])->asArray()->all();
        return $list;
    }

    /**
     * 删除数据
     * @param $baseId
     */
    public static function delByBaseId($baseId){
        self::updateAll(['is_del'=>1],['base_id'=>$baseId]);
    }

    /**
     * 写入数据
     * @param $baseId
     * @param $type
     * @param $value
     * @param $sort
     */
    public static function add($baseId,$type,$value,$sort){
        $model = new SystemCheckinReward();
        $model->base_id = $baseId;
        $model->type = $type;
        $model->value = $value;
        $model->sort = $sort;
        $model->is_del = 0;
        $model->gmt_create = date("Y-m-d H:i:s");
        $model->insert();
    }




}
