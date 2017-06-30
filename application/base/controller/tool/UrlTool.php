<?php

namespace app\base\controller\tool;


/**
 * @author Administrator
 *
 */
class UrlTool
{
    
    public static function getLoginIndexUrl(){
    
        return config('login_index');
    }
    
    public static function getLoginSubmitUrl(){
        return config('login_submit');
    }
    
    public static function getRegIndexUrl(){
        return config('reg_index');
    }
    
    public static function getRegSubmitUrl(){
        return config('reg_submit');
    }
    
    

    

  
}
