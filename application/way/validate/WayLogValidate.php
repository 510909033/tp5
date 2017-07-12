<?php
namespace app\way\validate;
use think\Validate;

class WayLogValidate extends Validate{
    
    protected $rule = [
        'in_pos_id'  =>  'require|number|min:1',
        'car_number' =>  'require|number|min:1',
    ];
    
    
    protected $scene = [
        'add'  =>  ['name','uni_id'],
    ];
    
}