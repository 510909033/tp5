<?php

namespace app\base\controller\base;

use think\Controller;
use app\base\model\Config;
use think\Db;

class TableController 
{
    protected $table_upload_max_num = 100;
   
    /**
     * 检查是否需要新建附件表，如果需要建立，不需要忽略
     * @return 
     */
    public function check_table_upload(){
        try {
            \think\Db::startTrans();
            $config = new Config();
            $lineConfig = Config::where('type',Config::TYPE_UPLOAD_SUBFIX_NUM )->
            where('key','sys_upload_subfix_num')->lock(true)->find();
        
            if (!$lineConfig){
                $table_name_subfix = date('ymdHis');
                $data = [
                    'type'=>Config::TYPE_UPLOAD_SUBFIX_NUM,
                    'key'=>'sys_upload_subfix_num',
                    'value'=>$table_name_subfix,
                    'sort'=>100
                ];
                $this->create_upload_table($table_name_subfix);
                $model = $config->addOne($data);
                
            }else{
                if( \think\Db::table('sys_upload_'.$lineConfig->value)->max('id') >= $this->table_upload_max_num ){
                    $table_name_subfix = date('ymdHis');
                    $this->create_upload_table($table_name_subfix);
                    $lineConfig->value = $table_name_subfix;
                    $lineConfig->save();
                }
            }
            //@TODO 修改成 commit
            \think\Db::rollback();
        } catch (\Exception $e) {
            \think\Db::rollback();
            $this->output->error($e->getMessage());
        }
    }
    
    public function check_table_weixin(){
        
    }
    
    
    
    
    private function create_upload_table($table_name_subfix){
        $sys_upload_sql=<<<EEE
CREATE TABLE IF NOT EXISTS `sys_upload_{$table_name_subfix}` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `create_time` int(10) unsigned NOT NULL DEFAULT '0',
  `user_id` int(10) unsigned NOT NULL DEFAULT '0',
  `type` int(10) unsigned NOT NULL DEFAULT '0',
  `size` int(10) unsigned NOT NULL DEFAULT '0',
  `minetype` varchar(50) NOT NULL DEFAULT '',
  `path` varchar(200) NOT NULL DEFAULT '',
  `url` varchar(1000) NOT NULL DEFAULT '',
  `ext` varchar(50) NOT NULL DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
EEE;
        return \think\db::execute($sys_upload_sql);
    }
}
