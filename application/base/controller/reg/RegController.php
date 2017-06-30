<?php

namespace app\base\controller\reg;

use think\Controller;
use think\Request;
use think\Loader;
use app\member\model\user;

class RegController extends Controller
{
    public function __construct(Request $request){
        parent::__construct( $request);
        
        $this->user = model('\\app\\base\\model\\User');
    }
    /**
     * @var \app\member\model\user
     */
    protected $user;
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
        
        return <<<EEE
<form method="post" action="http://localhost/tp5/public/index.php/reg">
    <input type="text" name="name" value="Hello">
    <input type="submit" value="提交">
</form>        
EEE;
    }

    /**
     * 保存新建的资源
     *
     * @param  \think\Request  $request
     * @return \think\Response
     */
    public function save(Request $request)
    {
        
        
        try {
            $model = new User();
            $validate = new RegValidate();
            
            $form = new FormController($model, $validate);
            
            $data = request()->param();
            
            
            $insert_id = $form->save($data);
            
            if (!$insert_id){
                return 0;
            }else{
                return $insert_id;
            }
        } catch (\Exception $e) {
            dump($e->getMessage());
        }
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
        if ($request->isPut()){
            file_put_contents('c:/aupdate'.date('his'), '');
            return $id;
        }else{
            file_put_contents('c:/bupdate'.date('his'), '');
        }
        return 0;
    }

    /**
     * 删除指定资源
     *
     * @param  int  $id
     * @return \think\Response
     */
    public function delete($id)
    {
        
        if ( $this->request->isDelete() ){
            file_put_contents('c:/adelete'.date('his'), '');
            return 'delete_success';
        }else{
            file_put_contents('c:/bdelete'.date('his'), '');
        }
        return 'delete_error';
    }
}
