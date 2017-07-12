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

class WayLogTest extends TestCase
{

    
    public function testIn_fail(){
        $this->tprint('车辆进入入口记录');
        $param = array();
        $param['in_pos_id'] = 3;
        $param['car_number'] = 'not number';
        $this->makeRequest('POST', 'way/way_log/in' , $param)->see('fail');

        
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