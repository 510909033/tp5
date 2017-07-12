<?php
namespace app\base\validate;

use think\Validate;

class ConfigValidate extends Validate
{
    protected $rule = [
        'type'  =>  'require',
        'key' =>  'require',
        'value' =>  'require',
    ];

}