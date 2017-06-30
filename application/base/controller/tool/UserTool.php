<?php

namespace app\base\controller\tool;


use think\Session;

/**
 * 已登录用户的信息获取工具类
 * @author Administrator
 *
 */
class UserTool
{
    public function login_success(){
    }
    
    public static function getId(){
        return Session::get('user_id');
    }
    
    /**
     * @return boolean
     */
    public static function isLogin(){
        return boolval(self::getId()); 
    }
    

    

  
}
