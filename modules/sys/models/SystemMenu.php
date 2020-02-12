<?php

namespace app\modules\sys\models;

use Yii;
use mdm\admin\components\Helper;
use app\common\classes\Tree;

/**
 * This is the model class for table "system_menu".
 *
 * @property string $id 主键
 * @property string $name 菜单展示名称
 * @property string $pid 上一级菜单id
 * @property string $sub_url 是不是最外层分类
 * @property string $url 对应的地址
 * @property string $rbac_name 对应权限名称
 * @property string $icon_style 对应的图标样式
 * @property int $sort 排序字段
 */
class SystemMenu extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'system_menu';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name'], 'required'],
            [['pid', 'sort'], 'integer'],
            [['name'], 'string', 'max' => 40],
            [['sub_url', 'url', 'rbac_name', 'icon_style'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => '主键 ',
            'name' => '菜单展示名称',
            'pid' => '上一级菜单id',
            'sub_url' => '是不是最外层分类',
            'url' => '对应的地址',
            'rbac_name' => '对应权限名称',
            'icon_style' => '对应的图标样式',
            'sort' => '排序字段',
        ];
    }

    //获取全部菜单
    public static function getAllMenu()
    {
        $model = new SystemMenu();

        $all = $model->find()->orderBy("pid DESC,sort DESC")->all();

        if(count($all)){
            foreach ( $all as $k => $v ){
//                var_dump(Helper::checkRoute($v['rbac_name']));
                if($v['rbac_name'] == "" || (Helper::checkRoute($v['rbac_name']) == false)){
                    unset($all[$k]);
                }
            }
        }

//        var_dump(Helper::checkRoute("right_user"));

        return self::_generateTree($all);
    }


    public static function getNameById($id){
        $model = new SystemMenu();
        $att = $model->find()->where(['id' => $id])->select(['name'])->one();
        return $att['name'];
    }

    public static function getNameByUrl($url){
        $model = new SystemMenu();
        $att = $model->find()->where(['url' => $url])->select(['name'])->one();
        return $att['name'];
    }

    public static function getDataById($id){
        $model = new SystemMenu();
        $att = $model->find()->where(['id' => $id])->one();
        return $att->attributes;
    }

    public static function getDataBySuburl($suburl){
        $model = new SystemMenu();
        $att = $model->find()->where(['like','sub_url',$suburl])->orWhere(['url'=>$suburl])->one();
        if($att){
            return $att->attributes;
        }
        return null;

    }


    public static function getPids($url)
    {
        $model = new SystemMenu();
        $att = $model->find()->where(['url' => $url])->select(['id'])->one();
        return self::_getPids($att['id']);
    }

    private static function _getPids($id, $pid_arr = [])
    {
        if (count($pid_arr) == 0) {
            $pid_arr = [];
        }
        $model = new SystemMenu();
        $att = $model->find()->where(['id' => $id])->select(['pid'])->one();
        $pid = $att['pid'];
        if ($pid != 0) {
            $pid_arr[] = $pid;
            return  self::_getPids($pid, $pid_arr);
        }else{
            return $pid_arr;
        }

    }


    //生成树
    private static function _generateTree($data, $pid = 0)
    {
        $tree = [];
        if ($data && is_array($data)) {
            foreach ($data as $v) {
                if ($v['pid'] == $pid) {
                    $tree[] = [
                        'id' => $v['id'],
                        'name' => $v['name'],
                        'url' => $v['url'],
                        'rbac_name' => $v['rbac_name'],
                        'icon_style' => $v['icon_style'],
                        'pid' => $v['pid'],
                        'sort' => $v['sort'],
                        'children' => self::_generateTree($data, $v['id']),
                    ];
                }
            }
        }
        return $tree;
    }


    /**
     * 返回一维数组树形结构
     */
    public static function getDropList(){

        $model = new SystemMenu();

        $all = $model->find()->orderBy("pid DESC,sort DESC")->all();

        $arr=[];
        if(count($all)){
            foreach ( $all as $k => $v ){
                if($v['rbac_name'] != "" && !Helper::checkRoute($v['rbac_name'])){
//                    unset($all[$k]);
                }else{
                    $arr[]=$v->attributes;
                }
            }
        }
        return Tree::getDropData($arr);

    }


}
