<?php

namespace app\base\controller\form;

use think\Controller;
use think\Model;
use think\Validate;
use app\base\controller\base\BaseModelController;

class FormController
{
    /**
     * @var BaseModelController
     */
    protected $model;
    protected $validate;
    
    public function __construct( BaseModelController $model , Validate $validate ){
        $this->model = $model;
        $this->validate = $validate;
    }

    /**
     * 保存新建的资源
     * @return mixed 失败false，成功返回自增id
     */
    public function add($data)
    {
        
        if ( !$this->validate->check($data) ){
            exception($this->validate->getError());
        }
        return $this->model->addOne($data);
    }
    
    /**
     * 
     * @param unknown $id
     * @param unknown $data
     * @return boolean 
     */
    public function save($id,$data){
        
        if ( !$this->validate->check($data) ){
            exception($this->validate->getError());
        }
        
        if (!$this->validate_save_id($id)){
            exception('系统错误,在修改数据时，传入的id未通过validate_save_id验证');
        }
        
        $where = array();
        $where['id'] = $id;
        return $this->model->saveOneById($id, $data);
    }
    
    protected function validate_save_id($id){
        
        $rule = [
            'id'=>'require|min:0|number|'
        ];
        
        $va = new Validate($rule);
        return $va->check(['id'=>$id]);
    }
    
    protected function validate_delete_id($id){
        return $this->validate_save_id($id);
    }
    
    
    /**
     * 
     * @param unknown $id
     * @return boolean
     */
    public function delete($id){
        if (!$this->validate_delete_id($id)){
            exception('系统错误,在删除数据时，传入的id未通过validate_save_id验证');
        }
        return $this->model->deleteOneById($id);
    }
    
    
    

    
    
}