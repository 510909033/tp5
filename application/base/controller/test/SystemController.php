<?php

namespace app\base\controller\test;

use think\Controller;
use think\Request;

class SystemController extends Controller
{
    
    public function exec(){
        $output = null;
        
        $command = "s:\n dir";
        $command = 'dir';
        $command = "php ../think make:controller base/test/Akksgs";
//         $command = "dir";
        file_put_contents(RUNTIME_PATH.'exec', $command);
        $command = file_get_contents(RUNTIME_PATH.'exec' );
        
        $res = exec($command,$output,$return_var);
        
//         $res = system($command,$return_var);
        
        var_dump(iconv('gbk', 'utf-8', $res));
        var_dump($res);
        dump($output);
        dump($return_var);
     
        //passthru($command);
        //escapeshellarg($arg);
        //system("/usr/local/bin/order_proc > /tmp/null &"); 
        
    }
    
    public function popen(){
        $arr = [];
        $command = "dir";
        $mode = 'r';
        $handle = popen($command, $mode);
        
        $handle = fopen('c:\\aaa', 'r');
        $i = 1;
        while ( ($row = fgets($handle)) !== false ){
            $arr[] = $row   ;
            sleep(1);
            if ($i++ > 10){
                break;
            }
        }
        
        $arr[] = fgets($handle);
//         $arr[] = fgets($handle);
        
        
        dump($arr);
    }
    
    public function redis_port(){
        
        for ($i=0;$i<50000;$i++){
            $redis = new \Redis();
            $redis->connect('127.0.0.1',6379);
            $res = $redis->incr('port_incr');
//             $client = $redis->info();
            
            $redis->close();
        }
        
        
//         $command="netstat -na > c:/aaaa";
//         system($command,$return_var);
        
        $info = [];
//         $arr = file('c:/aaaa');
//         $arr = array_slice($arr, 4);
//         foreach ($arr as $k=>$v){
//             if (strpos($v, '127.0.0.1:6379') !==false){
//                 $info[] = $v;
//             }
//         }
        
        
        dump($res);
        dump(count($info));
    }
    
    
    /**
     * 显示资源列表
     *
     * @return \think\Response
     */
    public function index()
    {
        //
    }

    /**
     * 显示创建资源表单页.
     *
     * @return \think\Response
     */
    public function create()
    {
        //
    }

    /**
     * 保存新建的资源
     *
     * @param  \think\Request  $request
     * @return \think\Response
     */
    public function save(Request $request)
    {
        //
    }

    /**
     * 显示指定的资源
     *
     * @param  int  $id
     * @return \think\Response
     */
    public function read($id)
    {
        //
    }

    /**
     * 显示编辑资源表单页.
     *
     * @param  int  $id
     * @return \think\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * 保存更新的资源
     *
     * @param  \think\Request  $request
     * @param  int  $id
     * @return \think\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * 删除指定资源
     *
     * @param  int  $id
     * @return \think\Response
     */
    public function delete($id)
    {
        //
    }
}
