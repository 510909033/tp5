<?php
namespace app\common\interf;



interface AuthInterf{
    
    /**
     * 绑定用户到本地的用户表
     * @return false|\app\home\model\User   
     */
    public function bindUser();
    
    

    
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