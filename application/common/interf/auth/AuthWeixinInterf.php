<?php
namespace app\common\interf\auth;



use app\common\interf\AuthInterf;

interface AuthWeixinInterf extends AuthInterf{
    
    /**
     * 重定向到微信
     * @return void
     */
    public function redirect();
    
    /**
     * 根据code获取用户的openid
     * @return string|false 用户openid
     */
    public function getOpenid();
    
    /**
     * 绑定到weixin_user表
     * @return false|\app\common\model\WeixinUser
     */
    public function bindWeixinUser();
    
}