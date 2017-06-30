<?php
namespace app\base\controller\interf;

/**
 * 
 * @author Administrator
 * @example 
 * if ( $this instanceof LoginInterfController ){
        if (!UserTool::isLogin()){
            $this->error( '尚未登录' , UrlTool::getLoginIndexUrl(),'',3,array() );
        }
    }
 */
interface LoginInterfController{
    
}