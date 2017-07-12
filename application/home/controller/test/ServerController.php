<?php

namespace app\home\controller\test;


class ServerController
{
  public function __construct(){
      
  }
  
  public function a(){
//       return ;
      $server= new \SoapServer( null ,array('uri'=>'abc' ,'soap_version'=>SOAP_1_2));
      //         $obj = new ServerController();
      //         $server->setObject($obj);
      //$server->setPersistence(SOAP_PERSISTENCE_SESSION);
      //         $server->setClass('ServerController');//
      $server->setClass('StdClass');//
      
      //         $server->addFunction('view');
      $server->handle('aaa=bbb');
      exit('');
  }
}
