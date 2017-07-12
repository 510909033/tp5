<?php
namespace app\base\command\test;

use think\console\Command;
use think\console\Input;
use think\console\Output;
use app\home\model\User;
use app\base\model\Config;
use app\base\controller\base\TableController;

class Init extends Command
{
    protected function configure()
    {
        $this->setName('test:init')->
        addOption('init_table')->
        setDescription('11111111111111111111111');
        $this->addArgument('init_table');
    }

    protected function execute(Input $input, Output $output)
    {
        $output->writeln("InitCommand:2222222222222222222222222");
        
        $table = new TableController();
        $table->check_table_upload();
        
    }
    

    
    
    
}