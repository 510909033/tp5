<?php

namespace app\way\model;

use think\Model;
use traits\model\SoftDelete;

class WayLog extends Model
{
    use SoftDelete;
    protected $table = 'way_log';
    protected $updateTime = null;
    
}
