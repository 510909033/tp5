<?php

namespace app\way\controller;

use think\Controller;
use think\Request;
use app\way\model\WayLog;
use app\way\model\WayUserBindCar;
use function think\log;
use think\View;

class WayLogController extends BaseWayController
{
    
    /**
     * 写入入口信息  
     */
    public function in(Request $request){
        
      
        /*
         * in_pos_id
         * car_number   车牌号
         */
        try {
            $vars = [
                'err'=>0
            ];
            if (!$request->isPost()){
                exception('不是post提交='.$request->method());
            }
            $data = $request->post();
            $data['in_time'] = time();//
            $data['is_need_pay'] = 1;
            $data['is_pay'] = 0;
            $data['pay_time'] = 0;
            $data['pay_order_id'] = 0;
            
            $wayLog = new WayLog();
            
            $bindCar = WayUserBindCar::where('car_number')->find();
            if ($bindCar && $bindCar['user_id']){
                $data['user_bind_car_id'] = $bindCar->id;
            }
            
            $res = $wayLog->validate('WayLog')->save($data);
            if (false === $res) {
                $vars['err'] = $wayLog->getError();
                $vars['reason'] = 'validate';
            }else if ( 1 === $res ){
                $vars['err'] = 0;
            }else{
                exception('添加数据失败，res='.$res);
            }
        } catch (\Exception $e) {
            $vars['reason'] = 'exception';
            $vars['err'] = $e->getMessage();
            $vars['exception'] = 1;
        }
        
        
        if ( 0 === $vars['err']){
            return 'success';
        }else{
            //记录错误
            
            return 'fail';
        }
    }
    
    /**
     * 写入出口信息
     * 
     */
    public function out(Request $request){
        $data = $request->post();
        
        $data['out_time'] = time();
        $data['out_pos_id'] = 0;
    }
    
    
}
