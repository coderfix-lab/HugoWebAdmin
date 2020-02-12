<?php

namespace app\components\helper;

/**
 * 异步处理
 * Class Async
 */
class  Async {


    /**
     * 异步发送
     * @param $machineId
     */
    public static function itemList($machineId){
        $data = base64_encode(time().",".$machineId);
        $url = self::_is_https().$_SERVER['SERVER_NAME']."/tool/iot/send-item-list?data=".$data;
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL,$url);
//        curl_setopt($ch, CURLOPT_POST, 1);
//        curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($param)); //将数组转换为URL请求字符串
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_HEADER, false);
        curl_setopt($ch, CURLOPT_TIMEOUT, 1);
        curl_exec($ch);
        curl_close($ch);
    }

    /**
     * 给相关有相关商品的在线设备发送消息
     * @param $item
     */
    public static function itemListAllDevice($item){
        $data = base64_encode(time().",".$item);
        $url = self::_is_https().$_SERVER['SERVER_NAME']."/tool/iot/send-item-list-all-device?data=".$data;
        var_dump($url);
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL,$url);
//        curl_setopt($ch, CURLOPT_POST, 1);
//        curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($param)); //将数组转换为URL请求字符串
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_HEADER, false);
        curl_setopt($ch, CURLOPT_TIMEOUT, 1);
        curl_exec($ch);
        curl_close($ch);
    }


    private static function _is_https() {
        if ( !empty($_SERVER['HTTPS']) && strtolower($_SERVER['HTTPS']) !== 'off') {
            return "https://";
        } elseif ( isset($_SERVER['HTTP_X_FORWARDED_PROTO']) && $_SERVER['HTTP_X_FORWARDED_PROTO'] === 'https' ) {
            return "https://";
        } elseif ( !empty($_SERVER['HTTP_FRONT_END_HTTPS']) && strtolower($_SERVER['HTTP_FRONT_END_HTTPS']) !== 'off') {
            return "http://";
        }
        return "http://";
    }


    //========================      新版异步处理  ==================================

    /**
     * 新版异步处理商品类型
     * @param $machineId
     */
    public static function itemListSync($machineId){
        AsyncTask::run(function () use ($machineId){
            $data = base64_encode(time().",".$machineId);
            $url = self::_is_https().$_SERVER['SERVER_NAME']."/tool/iot/send-item-list?data=".$data;
            $ch = curl_init();
            curl_setopt($ch, CURLOPT_URL,$url);
//        curl_setopt($ch, CURLOPT_POST, 1);
//        curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($param)); //将数组转换为URL请求字符串
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
            curl_setopt($ch, CURLOPT_HEADER, false);
//            curl_setopt($ch, CURLOPT_TIMEOUT, 1);
            curl_exec($ch);
            curl_close($ch);
        });
    }



}