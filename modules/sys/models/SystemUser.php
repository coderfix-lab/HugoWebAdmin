<?php

namespace app\modules\sys\models;

use Yii;

/**
 * This is the model class for table "system_user".
 *
 * @property int $id
 * @property string $user_name
 * @property string $display_name
 * @property string $password
 * @property string $avatar
 * @property string $email_address
 * @property string $create_time
 * @property string $last_login_time
 * @property string $access_token
 */
class SystemUser extends \yii\db\ActiveRecord implements \yii\web\IdentityInterface
{
    public $rememberMe = true;
    public $authKey;
    public $accessToken;

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'system_user';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['user_name', 'password', 'create_time'], 'required'],
            [['create_time', 'last_login_time'], 'safe'],
            [['user_name', 'display_name', 'password', 'avatar', 'email_address', 'access_token'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'user_name' => 'User Name',
            'display_name' => 'Display Name',
            'password' => 'Password',
            'avatar' => 'Avatar',
            'email_address' => 'Email Address',
            'create_time' => 'Create Time',
            'last_login_time' => 'Last Login Time',
            'access_token' => 'Access Token',
        ];
    }

    /**
     * 通过账户密码登录
     * @param $username
     * @param $password
     * @return bool|mixed
     */
    public static function getInfo($username,$password){
        $model = new SystemUser();
        $info = $model->find()->where(['user_name'=>$username,
            'password'=>$password])->one();
        if($info){
            return $info;
        }else{
            return false;
        }
    }

    /**
     * 获取用户信息
     * @param $id
     * @return array|bool|null|\yii\db\ActiveRecord
     */
    public static function getInfoById($id){
        $model = new SystemUser();
        $info = $model->find()->where(['id'=>$id])->one();
        if($info){
            return $info;
        }else{
            return false;
        }
    }





    /**
     * {@inheritdoc}
     */
    public static function findIdentity($id)
    {
        $model = new SystemUser();
        $info = $model->find()->where(['id'=>$id])->one();

        return isset($info) ? new static($info->getAttributes()) : null;
    }

    /**
     * {@inheritdoc}
     */
    public static function findIdentityByAccessToken($token, $type = null)
    {

        $model = new SystemUser();
        $info = $model->find()->where(['access_token'=>$token])->one();

        return isset($info) ? new static($info->getAttributes()) : null;
    }


    /**
     * {@inheritdoc}
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * {@inheritdoc}
     */
    public function getAuthKey()
    {
        return $this->authKey;
    }

    /**
     * {@inheritdoc}
     */
    public function validateAuthKey($authKey)
    {
        return $this->authKey === $authKey;
    }
}
