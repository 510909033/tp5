<?php
namespace app\home\controller;


use app\base\controller\interf\LoginInterfController;

class IndexController extends BaseController implements LoginInterfController
{
    
    public function index()
    {
       
        
        
        return '网站首页';
    }
    
}
