<?php

namespace app\base\controller\tool;


use think\Session;

/**
 * 已登录用户的信息获取工具类
 * @author Administrator
 *
 */
class LoginUserTool
{
    public static $is_init = false;
    
    
    public static function initUserInfo( array $userinfo ){
        if (false !== self::$is_init){
            exception('不能重复初始化登录用户信息');
        }
        Session::start();
        session('user_id' , 100);
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
    
    
    public static function getRole(){
        return 'admin_role';
    }
    
    public static function getGroup(){
        return 'admin_group';
    }

    

  
}
