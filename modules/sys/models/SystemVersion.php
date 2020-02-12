<?php

namespace app\modules\sys\models;

use app\components\helper\ImgTool;
use Yii;

/**
 * This is the model class for table "system_version".
 *
 * @property int $id 主键
 * @property int $code 版本号
 * @property string $ver 版本名
 * @property string $url 地址
 * @property int $type 1 全部更新 2 部分更新
 * @property int $update_type 1 立即更新 2定时更新
 * @property string $update_time 定时更新时间
 * @property int $admin_id 后台管理员id
 * @property int $is_del 是否删除 默认 0 1为删除信
 * @property string $push_time 推送时间
 * @property string $gmt_create 创建时间
 * @property string $gmt_update 更新时间
 */
class SystemVersion extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'system_version';
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
            [['code', 'type', 'update_type', 'admin_id', 'is_del'], 'integer'],
            [['update_time', 'push_time', 'gmt_create', 'gmt_update'], 'safe'],
            [['ver'], 'string', 'max' => 11],
            [['url'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => '主键',
            'code' => '版本号',
            'ver' => '版本名',
            'url' => '地址',
            'type' => '1 全部更新 2 部分更新',
            'update_type' => '1 立即更新 2定时更新',
            'update_time' => '定时更新时间',
            'admin_id' => '后台管理员id',
            'is_del' => '是否删除 默认 0 1为删除信',
            'push_time' => '推送时间',
            'gmt_create' => '创建时间',
            'gmt_update' => '更新时间',
        ];
    }


    /**
     * 获取一条推送要推送的数据
     */
    public static function getNewTypeUpdate(){
        $now = date("Y-m-d H:i:s");
        $info = self::find()->select(['id'])->where(['push_time'=>null,'update_type'=>2])->andWhere(" update_time <  '$now' ")->orderBy(['update_time'=>SORT_DESC])->asArray()->one();
        if($info == false){
            return false;
        }
        return  $info['id'];
    }




}