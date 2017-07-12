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

use app\way\model\CarType;
use think\View;

class ConfigTest extends TestCase
{

    
    public function testAdd_success(){
        $this->tprint('添加系统配置 '.__METHOD__.'-'.__LINE__);
        $param = array();
        $param['type'] = 'unit_test_'.date('ymdHis');
        $param['key'] = 'appkey';
        $param['value'] = 'asdfsadlfksafsdfsjfs';
        $param['sort'] = rand(-1000,1000);
        
        $this->makeRequest('POST', 'base/config.config/add' , $param)->assertViewHas('err',0);
    }
    
    
    
    
}