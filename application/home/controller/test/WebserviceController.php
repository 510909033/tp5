<?php

namespace app\home\controller\test;

use think\Controller;
use think\Request;
use app\home\model\User;
use \app\home\controller\test\ServerController;

class WebserviceController 
{
    /**
     * 显示资源列表
     *
     * @return \think\Response
     */
    public function index()
    {
        
        
        $server= new \SoapServer( null ,array('uri'=>'abc' ,'soap_version'=>SOAP_1_2));
//         $obj = new ServerController();
//         $server->setObject($obj);
        //$server->setPersistence(SOAP_PERSISTENCE_SESSION);
//         $server->setClass('ServerController');//
        $server->setClass('\\app\\home\\controller\\test\\ServerController');//
        
//         $server->addFunction('view');
        $server->handle('ss');
        exit('');//
        exit;
        
//         echo call_user_func(array('Service','Hello'));
    }
    
    public function getUserInfo_server($id){
        
        $user = User::get($id);
        
        return json_encode($user->toArray());
        
    }
    
    public function getUserInfo(){
        $vars = ['id'=>340];
        $location=url('home/test.webservice/index',$vars,'',true);
        $soap=new \SoapClient( null , array(
            'location'=>$location,
            'uri'=>'abc')
            );
        echo $soap->_soapCall('getUserInfo_server',array(1,2));//
        
        
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
        //
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
