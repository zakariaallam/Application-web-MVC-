<?php
namespace App\core;

class controller{
    
   public function View($name , $data = []){
       extract($data);
       $fileNmae = "src/views/" . $name . ".view.php" ;  

       if(file_exists($fileNmae)){
        require_once $fileNmae;
       }else{
        $fileNmae = "/src/views/404.view.php";
        require_once $fileNmae;
       }
   }
}