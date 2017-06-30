<?php
namespace app\base\controller\index;


use think\Controller;
use app\base\controller\interf\LoginInterfController;
use app\base\controller\tool\UserTool;
use think\Request;
use app\base\controller\tool\UrlTool;
/**
 * @deprecated
 * @author Administrator
 *
 */
class LoginController extends Controller implements LoginInterfController
{

    public function __construct(Request $request){
        
        if ( $this instanceof LoginInterfController ){
            if (!UserTool::isLogin()){
                $this->error( '尚未登录' , UrlTool::getLoginIndexUrl(),'',3,array() );
            }
        }
    }
    
    /**
     * 系统网站的首页
     * 1：是否需要登录
     *      需要
     *          是否登录
     *              否
     *                  跳转到登录也
     */
    public function index()
    {
        
        return '网站首页';
    }
    
    
    public function cookie(){
//         session_set_cookie_params(100,'/tp5/public');

    }
    
    
}
