<?php

namespace app\way\model;

use think\Model;

class CarType extends Model
{
    protected $table = 'car_type';
    protected $readonly = ['uni_id','email'];
    protected $updateTime = null;
    
    
    public function validate($rule = true, $msg = [], $batch = false){
        
        return parent::validate($rule,$msg,$batch);
    }
    
}
