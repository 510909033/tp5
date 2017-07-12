<?php

namespace app\base\controller\traits;

use think\Validate;

trait ValidateController
{
    /**
     * 数字 大于0、整数
     * @param unknown $id
     * @return boolean
     */
    public static function validate_number($id){
        $rule = [
            'id'=>'require|min:1|number|'
        ];
        
        $va = new Validate($rule);
        return $va->check(['id'=>$id]);
    }
}
