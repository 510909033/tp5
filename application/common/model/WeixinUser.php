<?php

namespace app\common\model;

use think\Model;
use app\base\model\Config;

class WeixinUser extends Model
{
    protected $updateTime = false;
    protected $appkey;
    public function __construct(){
        $appkey = Config::getValueBy(Config::TYPE_WEIXIN_CONFIG, 'appkey');
        $this->appkey = $appkey;
        $this->table = 'sys_weixin_user_'.$appkey;
        if (!$appkey){
            exception('appkey is empty');
        }
        
        parent::__construct();
        $this->initialize();
    }
    
    protected function initialize(){
        parent::initialize();
    }
    
    
}
