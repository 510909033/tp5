<?php
namespace app\home\controller;


use think\Controller;
use app\base\controller\interf\LoginInterfController;
use app\base\controller\tool\UrlTool;
use app\base\controller\tool\UserTool;
use app\base\controller\tool\LoginUserTool;

class BaseController extends Controller
{

    protected $debug_template_prefix = 'debug_';
    
    public function __construct(){
        parent::__construct();
        
        if ( $this instanceof LoginInterfController ){
            if (!LoginUserTool::isLogin()){
                $this->error( '尚未登录' , UrlTool::getLoginIndexUrl(),'',3,array() );
            }
        }
        
    }
}
