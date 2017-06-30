<?php

namespace app\base\controller\form;

use app\member\model\user;
use think\Model;
use think\Validate;
use app\member\validate\Reg;
use think\Controller;
use think\Request;

class DebugFormController extends Controller
{

    
    public function __construct( ){
        parent::__construct( );
        

    }


    public function insert(){
        $model = new \app\base\model\User();
        $validate = new \app\base\validate\Reg();
        
        $form = new FormController($model, $validate);
        
     
        $data = [];
        $data['uni_account'] = 'username'.date('his');
        $data['password'] = sha1('123123');
        $data['solt'] = '12345';
        $data['regtime'] = time();
        
        $data['type'] = uniqid();
        
        
        
        $res = $form->save($data);
        
        dump($res);
        
    }
    
    
}