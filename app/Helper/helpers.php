<?php
/**
 * Created by PhpStorm.
 * User: 董航宇
 * Date: 2017/7/13
 * Time: 14:34
 */

if (!function_exists('api_result')) {
    /**
     * @param $code
     * @param $message
     * @param $data
     * @internal param $data
     * @return mixed
     */
    function api_result($code,$message='',$data=null){

        return response(compact('code','message','data'),200);

    }
}