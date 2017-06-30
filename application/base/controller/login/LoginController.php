<?php

namespace app\base\controller\login;

use think\Controller;
use app\base\controller\tool\UrlTool;
use think\Session;
use think\Request;

class LoginController 
{
    
    public function index(){
        $login_url = url(UrlTool::getLoginSubmitUrl());
        $reg_url = url(UrlTool::getRegIndexUrl());
        
    
      
        
        $html = <<<EEE
<form method="post" action="{$login_url}">
    <input type="submit" value="模拟登录" />            
</form>

    <a href="{$reg_url}">注册</a>

EEE;
        
        return '登录表单页面' . $html;
        
    }
    
    public function submit(){
        
        Session::set('user_id',1);
        
        
  
        
        return '登录成功';
    }
    
    
    
    
    
}
