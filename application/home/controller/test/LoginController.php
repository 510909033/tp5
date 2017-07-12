<?php

namespace app\home\controller\test;

use think\Controller;
use app\home\model\User;
use app\home\model\UserInfo;

class LoginController extends Controller
{
    
    public function login(){
        
        $data=[
            'uni_count' =>'username'.rand(1,100000000),
            'password'=>'',
        ];
        
        $closure = function ($query){
            $query->where('id','gt',rand(1,100000000))->limit(1);
        };
        
        $user = User::get($closure);
        
   
        
        if ($user &&  $user->id){
            $userInfo = UserInfo::where('user_id',$user->id)->get();
            return 'success';
        }else{
            return 'fail';
        }
        
    }
    
    
}
