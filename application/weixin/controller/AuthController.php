<?php

namespace app\weixin\controller;


class AuthController 
{
    
    /**
     * @return string $url ：跳转到项目自定义网址，然后此网址调用getResultByCode()方法获取openid相关的信息数组
     * @todo
     */
    public function getRedirectUrl($return_url){
        
        
        
        return $url;
    }
    
    /**
     * @return array 获取的用户信息数组
     * @todo
     */
    public function getResultByCode($code){
     
        
        return $arr;
    }
    
    
    
}
