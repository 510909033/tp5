<?php

namespace app\home\controller\test;

use app\home\model\User;
use think\db\Query;
use think\Build;
use app\way\model\CarType;
use app\way\controller\CarTypeController;

class AbController 
{
    
    public function validate(){
        $con = new CarTypeController();
//         $con = controller('\\app\\way\\CarType');
        $con->index();
    }
    
    public function get(){
        
        $user = new User();
        $uni = '54265.9_18700549';
        $uni = '54265.9_18700541';
        $uni = '54265.';
        $res = $user->where('uni_account' ,'like' , $uni.'%')->select();
        
        dump(count($res));
        
    }
    
    
    public function index(){
        
        Build::module('way');
        return 'index';
    }
    
    public function l(){
        return $this->index();
    }
    
    
    public function getOne(){
        
        $line = User::get(function (Query $query){
            $query->limit(1);
        });
        
        dump($line);
        
        
    }
    
}
