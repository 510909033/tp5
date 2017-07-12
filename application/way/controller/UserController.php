<?php

namespace app\way\controller;

use think\Controller;
use think\Request;
use app\way\model\CarType;
use app\base\model\Priv;
use app\base\controller\base\BaseModelController;
use app\base\controller\tool\LoginUserTool;
use app\home\model\User;
use app\way\model\WayUserBindCar;
use think\db\Query;

class UserController extends Controller
{
    protected function _initialize(){
    }
    
    public function debug_image(Request $request){
        
        if ($request->isPost()){
            
            $file = $request->file('file');
            
            $info = $file->move(ROOT_PATH . 'public' . DS . 'uploads');
            if($info){
                // 成功上传后 获取上传信息
                // 输出 jpg
//                 echo $info->getExtension();
                // 输出 20160820/42a79759f284b767dfcb2a0197904287.jpg
                echo $info->getSaveName();
                // 输出 42a79759f284b767dfcb2a0197904287.jpg
//                 echo $info->getFilename(); 
            }else{
                // 上传失败获取错误信息
                echo $file->getError();
            }
            
        }
        
        return \view();
        
    }
    
    /**
     * 显示资源列表
     *
     * @return \think\Response
     */
    public function index()
    {
        
        
        
//         CarType::get(1);
//         dump(CarType::getTable());


        
        return '公众号用户个人信息首页';
    }

    /**
     * 显示创建资源表单页.
     *
     * @return \think\Response
     */
    public function create()
    {
        return '用户点击编辑车辆进入的表单页面';
    }

    /**
     * 用户绑定车辆
     *
     * @param  \think\Request  $request
     * @return \think\Response
     */
    public function bind_add(Request $request)
    {
        
//         dump($request);
        
        $vars = [
            'err'=>0,
        ];
        
        try {
            if (! $request->isPost()){
                exception('不是post提交 = '.$request->method());
            }
            
            $model = new WayUserBindCar();
            $user_id = LoginUserTool::getId();
            
            
            $data = $request->post();
            
            $data['user_id'] = $user_id;
            $data['status'] = 1;
            $data['verify_time'] = 0;
            
            
            WayUserBindCar::startTrans();
            try {
                $model->lock(true)->find(function(Query $query) use ($data) {
                    $query->
                    where('user_id' , $data['user_id'])->
                    where('car_number' , $data['car_number']);
                });
                
                $res = $model->validate('WayUserBindCar')->save($data);
                if (false === $res){
                    $vars['reason'] = 'validate';
                    $vars['err'] = $model->getError();
                    WayUserBindCar::rollback();
                }else{
                    $vars['err'] = 0;
                    WayUserBindCar::commit();
                }
            } catch (\Exception $e) {
                $vars['reason'] = 'exception';
                $vars['err'] = $e->getMessage();
                WayUserBindCar::rollback();
            }
        } catch (\Exception $e) {
            $vars['reason'] = 'exception';
            $vars['err'] = $e->getMessage(); 
        }
        
        
        return \view(APP_PATH.'way/view/user/bind_add.html',$vars);
    }

    /**
     * 显示指定的资源
     *
     * @param  int  $id
     * @return \think\Response
     */
    public function read($id)
    {
        return '显示用户绑定的车辆信息';
    }

    /**
     * 显示编辑资源表单页.
     *
     * @param  int  $id
     * @return \think\Response
     */
    public function edit($id)
    {
        return '编辑车辆信息表单';
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
        return '编辑车辆信息成功';
    }

    /**
     * 删除指定资源
     *
     * @param  int  $id
     * @return \think\Response
     */
    public function delete($id)
    {
        return '删除车辆信息成功';
    }
}
