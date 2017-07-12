<?php

namespace app\base\controller\priv;

use think\Controller;
use think\Request;
use app\base\controller\base\BaseModelController;
use app\base\validate\ValidatePriv;

class PrivController extends Controller
{
    /**
     * @var \app\base\controller\base\BaseModelController
     */
    protected $privBaseModel;
    
    protected function _initialize(){
        $this->baseModel = new BaseModelController('\\app\\base\\model\\Priv');
    }
    
    /**
     * 显示资源列表
     *
     * @return \think\Response
     */
    public function index()
    {
        //
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
        $data = $request->post();
        
        $validate = new ValidatePriv();
        if (!$validate->batch(true)->check($data)){
            $error = $validate->getError();
            return $error;
        }
        
        $id = $this->privBaseModel->addOne($data);
        if ($id){
            return $id;
        }
        return 0;
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
