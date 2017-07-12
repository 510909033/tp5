<?php
namespace app\home\controller;

use app\base\controller\form\FormController;
use app\home\model\User;
use app\home\validate\RegValidate;
use think\db\Query;
use function think\view;
use think\Validate;
use think\Loader;
use app\base\controller\base\BaseModelController;
use app\home\model\UserInfo;
use think\Route;

class RegController extends BaseController 
{
    
    public function index(){
        $vars = [];
        
        $res = Route::rules();
//         dump($res);
        
        dump($this->request->routeInfo());
    
        dump(url('home/reg/index'));
        
        
        
//         User::destroy(function(Query $query){
//             $query->where('id' , 'gt',0);
//         });
//         $user->restore();
        
        $user = User::all();
        
        
        trace(print_r($this->request->server(),true));
        return \view( $this->debug_template_prefix.'index' , $vars );
    }
    
    

    public function reg(){
        $model = new User();
        $data = $this->request->post();
        $vars = $model->regApi($data);
        trace($vars);
        return \view(APP_PATH.'home/view/reg/create.html',$vars);
//         return $this->fetch();
    }
    
    
}
