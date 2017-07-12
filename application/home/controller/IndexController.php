<?php
namespace app\home\controller;


use app\base\controller\interf\LoginInterfController;
use app\weixin\controller\AuthController;
use app\base\model\Config;
use app\base\controller\tool\UrlTool;
use app\home\model\User;

class IndexController extends BaseController 
{
    
    public function interf(){
        
        /**
         * @var \app\common\interf\AuthInterf $auth
         */
        $auth = null;
        
        $auth->bindWeixinUser();

        
    }
    
    public function index()
    {
        $arr = [];
        for ($i=0;$i<250000;$i++){
            $arr[$i] = new \stdClass();
            
            
            
            $arr[$i]->username = 'username'.$i;
            $arr[$i]->pwd='password'.$i;
            $arr[$i]->login_time = time();
//             $arr[$i]->obj = new User();
            
        }
        
//         dump($arr);
        
        return ;
        
        
        $configModel = model('\\app\\base\\model\\Config');
        $where = [
            'type'=>Config::TYPE_WEIXIN_CONFIG,
            'key'=>'appkey',
        ];
        $config = $configModel->where($where)->find();
        
        
        
        $auth = new \weixin\auth\AuthController();
        $appid = $config->key;
        $vars = [
              
        ];
        $redirect_uri = url('home/index/code',$vars,false,true);
        $state = 'state';
        $is_unit = true;
        $auth->redirect($redirect_uri, $state, $is_unit);
        
        return '';
    }
    
    public function code(){
        try {
            $auth = new \weixin\auth\AuthController();
            $res = $auth->getResultByCode();
            if (true !== $res){
                exception('不应该出现的情况..');
            }
            dump(session('user_id'));
        } catch (\Exception $e) {
            exception($e->getMessage());
        }
    }
    
    
}
