<?php

namespace app\base\controller\config;

use think\Controller;
use think\Request;
use app\base\model\Config;
use think\console\Command;

class ConfigController 
{
    
    public function add(Request $request){
        
        try {
            $vars = [
                'err'=>0
            ];
            if (!$request->isPost()){
                exception('不是post提交');
            }
            $data = $request->post();
            $config = new Config();
            
            $model = $config->addOne($data, $vars);
            if (!$model || $model->id){
                exception('添加失败');
            }
        } catch (\Exception $e) {
            $vars['reason'] = 'exception';
            $vars['err'] = $e->getMessage();
            $vars['exception'] = 1;
        }
        
        return \view('',$vars);
    }
    
}
