<?php
namespace app\common\struct;
class AuthAccount extends \stdClass{
    /**
     * 授权方式
     * @var string weixin、qq。。。
     */
    private $auth_type;
    /**
     * 唯一账号
     * @var string
     */
    private $account;
    /**
     * @return the $auth_type
     */
    public function getAuth_type()
    {
        return $this->auth_type;
    }

    /**
     * @param string $auth_type
     */
    public function setAuth_type($auth_type)
    {
        $this->auth_type = $auth_type;
    }

    /**
     * @return the $account
     */
    public function getAccount()
    {
        return $this->account;
    }

    /**
     * @param field_type $account
     */
    public function setAccount($account)
    {
        $this->account = $account;
    }

    
    
}