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

class RegTest extends TestCase
{

    public function testBasicExample()
    {
        return ;
//         $this->assertEmpty('');
        $param = array();
//         $param['_method'] = 'PUT';
        $param['uni_account'] = 'username1';
        $param['solt'] = 12345;
        $param['password'] = sha1($param['solt'].$param['uni_account']);
        $param['regtime'] = time();
        $param['type'] = '手动注册test';
        $this->makeRequest('POST', 'reg' , $param)->see(1);
//         $this->visit('reg');
//         $this->visit('/')->see('ThinkPHP');
    }
    
    /**
     */
    public function testUpdate()
    {
        return ;
        //         $this->assertEmpty('');
        $param = array();
//                 $param['_method'] = 'PUT';
        $param['id'] = 10;

        $this->makeRequest('PUT', 'reg/10' , $param)->see( $param['id'] );
        //         $this->visit('reg');
        //         $this->visit('/')->see('ThinkPHP');
    }
    
    public function testDelete()
    {
        return ;
        //         $this->assertEmpty('');
        $param = array();
        //                 $param['_method'] = 'PUT';
        $param['id'] = 10;
    
        $this->makeRequest('DELETE', 'reg/10' , $param)->see( 'delete_success' );
        //         $this->visit('reg');
        //         $this->visit('/')->see('ThinkPHP');
    }
    
    
    public function test1(){
        
        
        $this->visit('/home/Reg/create')->assertViewHas('test_result' ,1 );
        
        
    }
    
    
    
}