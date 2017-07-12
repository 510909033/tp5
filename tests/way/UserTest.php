<?php
// +----------------------------------------------------------------------
// | ThinkPHP [ WE CAN DO IT JUST THINK IT ]
// +----------------------------------------------------------------------
// | Copyright (c) 2006-2015 http://thinkphp.cn All rights reserved.
// +----------------------------------------------------------------------
// | Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )
// +----------------------------------------------------------------------
// | Author: yunwuxin <448901948@qq.com>
// +----------------------------------------------------------------------
namespace tests;


use think\Session;

class UserTest extends TestCase
{

    

    
    
    public function testBind_add_ok(){
        $this->tprint("测试新车辆绑定");
        
        $this->makeRequest('get', 'home/login/unit_login?unit_user_id=22');
        
        $param = array();
        $param['car_number'] = '吉A'.rand(10000,99999);
        $param['car_color'] = date('YmdHi');
        
        $this->makeRequest('POST', 'way/user/bind_add' , $param);
        
        
        $this->tprint(__METHOD__.' - '.__LINE__);
        $this->assertViewHas('err',0);
        $this->tprint_eol();
    }
    
    
    
    
    
    
}