<?php

namespace app\home\model;

use think\Model;
/**
 * 
 * @author Administrator
 * @property string $type
 * @property string $solt
 */
class User extends Model
{
    use \app\base\controller\traits\ModelTraits; 
    protected $table='sys_user';


    
    
    
}
