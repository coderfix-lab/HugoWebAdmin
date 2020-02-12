<?php

namespace app\components\helper;
use Yii;
use yii\web\HttpException;


class  Curl {

	/**
	 * [httpRequest curl请求封装]
	 * @param  [type]  $url      curl请求路径
	 * @param  [type]  $post_xml [curl请求的数据]
	 * @param  integer $type     [1为需要传证书  0不传]
	 * @return [type]            [description]
	 */
	public static function httpRequest($url,$post = '',$type = 0,$str='')
	{
		$ch=curl_init();
        curl_setopt($ch,CURLOPT_URL,$url);
        curl_setopt($ch, CURLOPT_TIMEOUT, 10);
        curl_setopt($ch,CURLOPT_RETURNTRANSFER,1);
        if($type == 1){
        	curl_setopt($ch,CURLOPT_SSL_VERIFYPEER,1);//证书检查
        	curl_setopt($ch,CURLOPT_SSLCERTTYPE,'pem');
	        curl_setopt($ch,CURLOPT_SSLCERT,$_SERVER['DOCUMENT_ROOT'].'/cert/apiclient_cert.pem');
	        curl_setopt($ch,CURLOPT_SSLCERTTYPE,'pem');
	        curl_setopt($ch,CURLOPT_SSLKEY,$_SERVER['DOCUMENT_ROOT'].'/cert/apiclient_key.pem');
        }
        // if($cookie) {
        //     curl_setopt($ch, CURLOPT_COOKIE, $cookie);
        // }
        // curl_setopt($ch, CURLOPT_HEADER, $returnCookie);
        if($str != ''){
            curl_setopt($ch, CURLOPT_HEADER, $str);
        }
//        curl_setopt($ch,CURLOPT_POST,1);
//        curl_setopt($ch,CURLOPT_POSTFIELDS,$post);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
//        curl_setopt($ch,CURLOPT_USERAGENT,'okhttp/3.12.0');
        $data=curl_exec($ch);
        if (curl_errno($ch)) {
            return curl_error($ch);
        }
		curl_close($ch);
        return $data;
	}

    public static function httpRequestForLogin($url,$post = '',$type = 0,$str='')
    {
        $ch=curl_init();
        curl_setopt($ch,CURLOPT_URL,$url);
        curl_setopt($ch, CURLOPT_TIMEOUT, 10);
        curl_setopt($ch,CURLOPT_RETURNTRANSFER,1);
        if($type == 1){
            curl_setopt($ch,CURLOPT_SSL_VERIFYPEER,1);//证书检查
            curl_setopt($ch,CURLOPT_SSLCERTTYPE,'pem');
            curl_setopt($ch,CURLOPT_SSLCERT,$_SERVER['DOCUMENT_ROOT'].'/cert/apiclient_cert.pem');
            curl_setopt($ch,CURLOPT_SSLCERTTYPE,'pem');
            curl_setopt($ch,CURLOPT_SSLKEY,$_SERVER['DOCUMENT_ROOT'].'/cert/apiclient_key.pem');
        }
        // if($cookie) {
        //     curl_setopt($ch, CURLOPT_COOKIE, $cookie);
        // }
        // curl_setopt($ch, CURLOPT_HEADER, $returnCookie);
        if($str != ''){
            curl_setopt($ch, CURLOPT_HEADER, $str);
            curl_setopt($ch, CURLOPT_HTTPHEADER, $str);
        }
        if($post != ""){
            curl_setopt($ch,CURLOPT_POST,1);
            curl_setopt($ch,CURLOPT_POSTFIELDS,$post);
        }

        $data=curl_exec($ch);
        if (curl_errno($ch)) {
            return curl_error($ch);
        }
        curl_close($ch);
        return $data;
    }

    public static function post($url, $post, $headers = [])
    {
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_TIMEOUT, 10);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_NOBODY, false);
//        $posts = json_encode($post);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $post);
        $header = array_merge($headers, array('Content-Type: application/json; charset=utf-8', 'Content-Length:' . strlen($post)));
        curl_setopt($ch, CURLOPT_HTTPHEADER, $header);

        $data = curl_exec($ch);
        if (curl_errno($ch)) {
            return curl_error($ch);
        }
        curl_close($ch);
        return $data;
    }

	//获取浏览器ip地址
    public static function realip()
    {
        static $realip;

        if ($realip !== NULL) {
            return $realip;
        }

        if (isset($_SERVER)) {
            if (isset($_SERVER['HTTP_X_FORWARDED_FOR'])) {
                $arr = explode(',', $_SERVER['HTTP_X_FORWARDED_FOR']);

                foreach ($arr as $ip) {
                    $ip = trim($ip);

                    if ($ip != 'unknown') {
                        $realip = $ip;
                        break;
                    }
                }
            }
            else if (isset($_SERVER['HTTP_CLIENT_IP'])) {
                $realip = $_SERVER['HTTP_CLIENT_IP'];
            }
            else if (isset($_SERVER['REMOTE_ADDR'])) {
                $realip = $_SERVER['REMOTE_ADDR'];
            }
            else {
                $realip = '0.0.0.0';
            }
        }
        else if (getenv('HTTP_X_FORWARDED_FOR')) {
            $realip = getenv('HTTP_X_FORWARDED_FOR');
        }
        else if (getenv('HTTP_CLIENT_IP')) {
            $realip = getenv('HTTP_CLIENT_IP');
        }
        else {
            $realip = getenv('REMOTE_ADDR');
        }

        preg_match('/[\\d\\.]{7,15}/', $realip, $onlineip);
        $realip = (!empty($onlineip[0]) ? $onlineip[0] : '0.0.0.0');
        return $realip;
    }


}

?>