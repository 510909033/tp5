<?php

namespace app\way\model;

use think\Model;
use traits\model\SoftDelete;

class WayUserBindCar extends Model
{
    protected $table = 'way_user_bind_car';
    protected $updateTime = null;
}
