<?php
namespace app\way\validate;
use think\Validate;

class CarTypeValidate extends Validate{
    
    protected $rule = [
        'name'  =>  'require|max:25|min:5',
        'uni_id' =>  'require|unique:car_type,uni_id',
    ];
    
    protected $message = [
        'name.min'  =>  '车型长度必须大于4',
        'email' =>  '邮箱格式错误',
    ];
    
    protected $scene = [
        'add'  =>  ['name','uni_id'],
        'save'  =>  ['name','uni_id'],
        'edit'=>['uni_id','name'],
    ];
    
}