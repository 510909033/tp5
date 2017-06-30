<?php
namespace app\home\controller;


use think\Controller;
use app\base\controller\interf\LoginInterfController;
use app\base\controller\tool\UrlTool;
use app\base\controller\tool\UserTool;

class BaseController extends Controller
{
    
    public function __construct(){
        parent::__construct();
        
        if ( $this instanceof LoginInterfController ){
            if (!UserTool::isLogin()){
                $this->error( '尚未登录' , UrlTool::getLoginIndexUrl(),'',3,array() );
            }
        }
        
    }
}
