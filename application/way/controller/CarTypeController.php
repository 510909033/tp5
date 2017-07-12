<?php

namespace app\way\controller;

use think\Controller;
use think\Request;
use think\Validate;
use app\way\model\CarType;
use app\way\validate\ValidateCarType;
use think\View;
use phpDocumentor\Reflection\Types\This;

class CarTypeController extends BaseWayController
{
    
    
    /**
     * 显示资源列表
     *
     * @return \think\Response
     */
    public function index()
    {
        $data = [
            'name'=>'aa',
            'uni_id'=>10,
        ];
        $res = $this->carType->validate('\\app\\way\\validate\\CarTypeValidate.add','',true)->save($data);
        
        if (false === $res){
            dump($this->carType->getError());
        }
        return 'index';
    }

    /**
     * 显示创建资源表单页.
     *
     * @return \think\Response
     */
    public function create()
    {
        //
    }

    /**
     * 保存新建的资源
     *
     * @param  \think\Request  $request
     * @return \think\Response
     */
    public function save(Request $request)
    {
        $vars = [
            'err'=>null,
        ];
        
        /**
         * 
         * @var Ambiguous $data     name uni_id
         */
        
        $data = $request->post();
        
        
        $res = $this->carType->validate('\\app\\way\\validate\\CarTypeValidate.add','',true)->save($data);
        if (false === $res){
            $vars['test']['reason'] = 'validate';
            $vars['err'] = $this->carType->getError();
        }
        
        
        if ($vars['err']){
            
        }else{
            
        }
        dump($vars);
        return \view(APP_PATH.'way/view/car_type/save.html',$vars);
    }

    /**
     * 显示指定的资源
     *
     * @param  int  $id
     * @return \think\Response
     */
    public function read($id)
    {
        //
    }

    /**
     * 显示编辑资源表单页.
     *
     * @param  int  $id
     * @return \think\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * 保存更新的资源
     *
     * @param  \think\Request  $request
     * @param  int  $id
     * @return \think\Response
     */
    public function update(Request $request, $id)
    {
        //
        $vars = [
            'err'=>null,
        ];
        $carType = CarType::get($id);
        if ($carType && $carType->id){
            
            $data = $request->put();

            $data = [
              'uni_id'=>11,
                'name'=>'cccss'.rand(1,4),
                'username'=>'not exists',
            ];
            
            
            $res = $carType->validate('\\app\\way\\validate\\CarTypeValidate.save','',true)->
            allowField('name')->
            save($data);
            
            
            if (false === $res){
                $vars['test']['reason'] = 'validate';
                $vars['err'] = $carType->getError();
            }else if ( 0 === $res){
                //无变化
            }else if (1 === $res){
                dump('更新成功');
            }
            
        }else{
            
        }
        
        
        dump($vars);
    }

    /**
     * 删除指定资源
     *
     * @param  int  $id
     * @return \think\Response
     */
    public function delete($id)
    {
        //
    }
}
