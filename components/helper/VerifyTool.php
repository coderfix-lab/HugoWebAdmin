<?php

namespace app\components\helper;

/**
 * 工具验证类
 * Class VerifyTool
 * @package app\components\helper
 */
class VerifyTool
{

    /**
     * 必填参数
     * @param $arr
     * @return bool
     */
    public static function mustHave($arr)
    {
        if (count($arr)) {
            foreach ($arr as $v) {
                if (!isset($v) || $v == "") {
                    return false;
                }
            }
        }
        return true;
    }


    /**
     * 检查数据一定在范围内
     * @param $key
     * @param $list
     * @return bool
     */
    public static function maustIn($key, $list)
    {
        if (count($list)) {
            foreach ($list as $v) {
                if ($v == $key) {
                    return true;
                }
            }
        }
        return false;
    }


    /**
     * 格式化输出金钱
     * @param $str
     * @return string
     */
    public static function price($str){
        return  sprintf("%1\$.2f",$str);
    }


    /**
     * 数组的key下划线转驼峰
     * @param $row
     */
    public static function convertUnderlineArrkey(&$row){
        foreach ($row as $k=>$v){
            if(VerifyTool::convertUnderline($k) != $k){
                $row[VerifyTool::convertUnderline($k)]=$v;
                unset($row[$k]);
            }
        }
    }

    /*
    * 下划线转驼峰
    */
    public static function convertUnderline($str)
    {
        $str = preg_replace_callback('/([-_]+([a-z]{1}))/i', function ($matches) {
            return strtoupper($matches[2]);
        }, $str);
        return $str;
    }

    /*
     * 驼峰转下划线
     */
    public static function humpToLine($str)
    {
        $str = preg_replace_callback('/([A-Z]{1})/', function ($matches) {
            return '_' . strtolower($matches[0]);
        }, $str);
        return $str;
    }

    private function convertHump(array $data)
    {
        $result = [];
        foreach ($data as $key => $item) {
            if (is_array($item) || is_object($item)) {
                $result[$this->humpToLine($key)] = $this->convertHump((array)$item);
            } else {
                $result[$this->humpToLine($key)] = $item;
            }
        }
        return $result;
    }

}