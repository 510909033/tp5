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

class TestCase extends \think\testing\TestCase
{
    protected $baseUrl = 'http://localhost';///tp5/public/index.php
    protected function tprint($str){
        return ;
        printf($str);
        printf(PHP_EOL);
    }
    
    protected function tprint_eol(){
        return ;
        printf(PHP_EOL);
    }
    
}