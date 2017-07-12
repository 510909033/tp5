<?php
namespace app\common\interf;


interface IAuth{
    
    /**
     * 绑定用户到本地的用户表
     * @return false|\app\home\model\User   
     */
    public function bindUser();
    
    /**
     * 是否已授权
     * @return boolean 
     */
    public function isAuth($uni_account);
    
    /**
     * 取消授权
     * @return boolean
     */
    public function cancleAuth(\app\home\model\User  $user);
    
    
    /**
     * 最后的错误信息，在方法返回false时执行
     * @return mixed
     */
    public function getError();
    
    /**
     * 获取用户的唯一授权信息，微信：openid，QQ：QQ号码。。。
     * @return \app\common\struct\AuthAccount 
     */
    public function getAccount();
    
    
}