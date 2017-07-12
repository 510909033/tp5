<?php

namespace app\way\controller;

use think\Controller;
use think\Request;
use app\base\controller\base\BaseModelController;
use app\way\model\CarType;
use think\Loader;
use app\way\model\WayLog;
use app\way\model\WayPos;
use app\way\model\WayUserBindCar;

class BaseWayController extends Controller
{
    /**
     * @var CarType
     */
    protected $carType;
    /**
     * @var WayLog
     */
    protected $wayLog;
    /**
     * @var WayPos
     */
    protected $wayPos;
    /**
     * @var WayUserBindCar
     */
    protected $wayUserBindCar;
    
    protected function _initialize(){
        $this->carType = Loader::model('\\app\way\\model\\CarType');
        $this->wayLog = Loader::model('\\app\way\\model\\WayLog');
        $this->wayPos = Loader::model('\\app\way\\model\\WayPos');
        $this->wayUserBindCar = Loader::model('\\app\way\\model\\WayUserBindCar');
        
    }
}
