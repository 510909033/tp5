<?php
namespace app\base\validate;

use think\Validate;

class Reg extends Validate
{
    protected $rule = [
        'uni_account'  =>  'require|max:25|min:5',
        'password' =>  'require|length:40',
        'solt' =>  'require|length:5',
        'regtime' =>  'require|length:10',
        'type' =>  'require|max:20',
    ];

}