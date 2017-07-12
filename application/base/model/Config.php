<?php

namespace app\base\model;

use think\Model;
use think\db\Query;

/**
 * @author Administrator
 *
 */
class Config extends Model
{
    protected $table = 'sys_config';
    protected $autoWriteTimestamp = false;
    
    /**
     * 配置表type值 
     * 上传文件当前表后缀
     * @var string
     */
    const TYPE_UPLOAD_SUBFIX_NUM = '上传文件配置';
    const TYPE_WEIXIN_CONFIG = '微信配置';
    const TYPE_COLOR = '颜色选项';
    
    /**
     * user表type字段的值
     * 微信注册方式
     * @var integer 
     */
    const REG_TYPE_WEIXIN = 1;
    const REG_TYPE_PHONE = 2;
    const REG_TYPE_EMAIL = 3;
    const REG_TYPE_USERNAME = 4;
    
    
    
    /**
     * 添加一条配置
     * @param array $data
     * @param array $vars
     * @return number|\think\false
     */
    public function addOne(array $data ){
        $model = null;
        $model = $this->validateFailException()->validate('\\app\\base\\validate\\ConfigValidate')->save($data);
        return $model;
    }


    public static function getValueBy($type,$key){
        $model = self::get(function(Query $query) use ($type,$key){
            $where = [
                'type'=>$type,
                'key'=>$key,
            ];
            $query->where($where);
        });
        return $model&&$model->id?$model->value:null;
    }
    
}
