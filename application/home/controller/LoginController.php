<?php
namespace app\home\controller;


class LoginController extends \app\base\controller\login\LoginController
{
    
    
    
    public function unit_login(){
        request()->get('unit_user_id',100);
        session(null);
        session('user_id' , request()->get('unit_user_id'));
        
    }
    

    
}
