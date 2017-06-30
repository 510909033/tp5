<?php
namespace app\home\controller;

use app\base\controller\form\FormController;
use app\home\model\User;
use app\home\validate\RegValidate;
use think\Db;
use think\db\Query;
use function think\view;

class RegController 
{
    

    
    public function create(){
        try {
            
            $model = new User();
            $validate = new RegValidate();
            $form = new FormController($model, $validate);
            
            $data = request()->param();
            
            $data['uni_account'] = 'username025034';
            
            $model::transaction(function() use ($model , $data){
                
                $res = $model::get(function(Query $query) use ($data){
                    $query->where('uni_account' ,'eq' ,$data['uni_account']);
                });
                
            });
            
            
            
            $insert_id = $form->add($data);
            
            if (!$insert_id){
                
                View::share('test_result' , 0);

                
                return 0;
            }else{
                View::share('test_result' , 1);
                return $insert_id;
            }
        } catch (\Exception $e) {
          
            return view(null);
            dump($e->getMessage());
        }
    }
    
    
}
