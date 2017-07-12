<?php
namespace app\common\interf\auth;



use app\common\interf\AuthInterf;

interface AuthQqInterf extends AuthInterf{
    
    /**
     * 重定向到微信
     * @return void
     */
    public function redirect();
    

    
    /**
     * 绑定到weixin_user表
     * @return false|\app\common\model\QqUser
     */
    public function bindQqUser();
    
}