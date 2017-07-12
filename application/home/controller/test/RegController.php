<?php

namespace app\home\controller\test;

use think\Controller;
use think\Request;
use app\home\model\User;

class RegController extends Controller
{
    protected $redis;
    protected function _initialize(){
        $this->redis = new \Redis();
        $this->redis->connect('127.0.0.1');
    }
    
    public function __destruct(){
        $this->redis->close();
    }
    
    public function sleep(){
//         sleep(1);
        usleep(20);
        return '';
    }
    
    
    public function repeat($count){
        set_time_limit(120);
        if ($count && $count > 0){
            for ($i=0;$i<$count;$i++){
                $this->reg();        
            }
        }
    }
    
    public function reg(){

        
        
//         \think\Db::listen(function($sql,$time,$explain){
//             // 记录SQL
//              dump($sql. ' ['.$time.'s]');
             
//             // 查看性能分析结果
// //             dump($explain);
//         });
        
        $key = 'user_key';
  
        
        $id = $this->redis->incr($key);
        
        
        $param = array();
        $param['uni_account'] = substr(md5(microtime(true)), rand(4,7),rand(6,10)).'_'.$id;
        $param['solt'] = rand(10000,99999);
        $param['password'] = sha1($param['solt'].$param['uni_account']);
        if (rand(1,2) > 1){
            $param['regtime'] = time() + ( rand(1 , 86400 * 3000)  )  ;
        }else{
            $param['regtime'] = time() - ( rand(1 , 86400 * 3000)  )  ;
        }
        
        $param['type'] = 'type-'.rand(0,9).'-'.rand(0,9).'-'.rand(0,9);
        
        //if (User::where('uni_account',$param['uni_account'])->find()){
//             return 'exists';
        //}
        
        $user = new User();
        
        

        $user->save($param);
        
        if ($user->id){
            
            $data = [
              'user_id'=>$user->id,
              'username'=>'true_'.$user->id,
              'phone'=>'13'.rand(10000,99999).rand(10000,9999),
              'email'=>'13'.rand(10000,99999).rand(10000,9999).$user->id.'@qq.com'
            ];
            \think\Db::table('sys_user_info')->insert($data);
        }
        
        
       
        return '';
    }
    
    
}
