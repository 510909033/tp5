<?php

namespace app\base\controller;

use think\Controller;
use think\Request;
use app\base\controller\tool\LoginUserTool;
use app\base\model\Config;
use app\weixin\controller\AuthController;

class WeixinController extends Controller
{
    
    protected function _initialize(){
        
        if ( LoginUserTool::isLogin() ){
            
        }
        
    }
    
    public function index($id){
        $appid = '';
        $auth = new AuthController();
        
        
        
    
        return $id;
    }
    
    
}

/*
1 第一步：用户同意授权，获取code

2 第二步：通过code换取网页授权access_token

3 第三步：刷新access_token（如果需要）

4 第四步：拉取用户信息(需scope为 snsapi_userinfo)

5 附：检验授权凭证（access_token）是否有效
 */