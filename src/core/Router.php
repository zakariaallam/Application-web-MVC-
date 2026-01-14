<?php
namespace App\core;
use App\controllers;
class Router {

  public function disparcher(){
    $uri = $_SERVER['REQUEST_URI'];
    $respons = $this->resolve($uri);
    $aplec = $this->execute($respons);
    return $aplec;
  }

  public function resolve($uri){
     $posission = strpos($uri,"?");
     if($posission == false){
         $arrayAction = explode("/",$uri);
         return [
             "controller" => $arrayAction[2],
             "methode" => $arrayAction[3]
             ];
    }
    $cleanUri = str_split($uri,$posission);
     $arrayAction = explode("/",$cleanUri[0]);

     return [
        "controller" => $arrayAction[2],
        "methode" => $arrayAction[3]
     ];
  }

  public function execute($respons){
      $url = "App\controllers\\" . $respons['controller'] . "Controller";

      $instense = new $url();
      return $instense->{$respons['methode']}();
  }
}