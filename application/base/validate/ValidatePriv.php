<?php
namespace app\base\validate;

use think\Validate;

class ValidatePriv extends Validate
{
    protected $rule = [
        'fid'  =>  'require|number',
        'name' =>  'require',
        'uri' =>  'require',
        'sort' =>  'require',
        'global_visit' =>  'require',
    ];

}