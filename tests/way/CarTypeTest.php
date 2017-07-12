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

class CarTypeTest extends TestCase
{

    private function demo()
    {
//         $this->assertEmpty('');
        $param = array();
//         $param['_method'] = 'PUT';
//         $this->makeRequest('POST', 'reg' , $param)->see(1);
//         $this->visit('reg');
//         $this->visit('/')->see('ThinkPHP');
    }
    
    public function testSave_ok(){
        $this->tprint("测试添加车辆类型");
        $param = array();
        $param['name'] = 'ok'.microtime(true);
        $param['uni_id'] = date('YmdHis');
        
        $this->makeRequest('POST', 'way/car_type/save' , $param);
        
        
        $this->tprint(__METHOD__.' - '.__LINE__);
        $this->assertViewHas('err',null);
        $this->tprint_eol();
    }
    
    public function testSave_has_exists(){
        $this->tprint("测试修改车辆类型");
        $param = array();
        $param['name'] = 'ok'.microtime(true);
        $param['uni_id'] = date('YmdHis');
        
        $carType = new CarType();
        $carType->save($param);
        
    
        
        $this->makeRequest('POST', 'way/car_type/save' , $param);
        
        $this->tprint(__METHOD__.' - '.__LINE__);
        $this->assertViewHas('err');
        $this->assertEquals($this->response->getVars()['test']['reason'] , 'validate');
        $this->tprint_eol();
    }
    
    
    
    
    
    
}