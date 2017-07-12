<?php

namespace app\home\model;

use think\Model;
use traits\model\SoftDelete;
/**
 * 
 * @author Administrator
 * @property string $type
 * @property string $solt
 */
class User extends Model
{
    use \app\base\controller\traits\ModelTraits; 
    use SoftDelete;
    protected $deleteTime = 'delete_time';
    
    protected $table='sys_user';
    
    protected $autoWriteTimestamp = true;
    
    //字段的值一旦写入，就无法更改。 要使用只读字段的功能，我们只需要在模型中定义readonly属性：
    protected $readonly = ['uni_account','regtime','create_time','id'];

    
    // 定义全局的查询范围
    protected function base($query)
    {
//         $query->where('solt',100);
    }
    
    
    public static function regApi($data){
        try {
    
            $vars = [
                'err'=>0,
            ];
    
            $model = new static;
    
            $res = $model->validate('\\app\\home\\validate\\RegValidate','',true)->save($data);
            if (false === $res){
                $vars['err'] = $model->getError();
                $vars['reason'] = 'validate';
            }else if ( 0 === $res){
                $vars['reason'] = '用户名已存在';
                $vars['err'] = $data['uni_account'];
            }else if (1 === $res){
                $vars['reason'] = 'success';
                $vars['err'] = 0;
                $vars['user_model'] = $model;//
            }else{
                $vars['reason'] = '其他情况res='.$res;
                $vars['err'] = 'error';
            }
        }catch (\Exception $e){
            if ( stripos($e->getMessage(), 'SQLSTATE[23000]: Integrity constraint violation: 1062 Duplicate entry') !== false ){
                $vars['reason'] = '用户名已存在';
                $vars['err'] = $data['uni_account'];
                $vars['exception'] = $e->getMessage();
            }else{
                $vars['reason'] = 'exception';
                $vars['err'] = '系统错误';
                $vars['exception'] = $e->getMessage();
            }
        }
        return $vars;
    }
    
}
