<?php
namespace app\base\controller\traits;

trait ModelTraits  
{

    public static function transaction(\Closure $closure){
        
        return parent::transaction($closure);
    }
    
    
}
