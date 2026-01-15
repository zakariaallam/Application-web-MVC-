<?php
namespace App\controllers;
use App\core\controller;
use App\models\User;

class AuthController extends controller{
    public function Login(){
        if($_SERVER['REQUEST_METHOD'] === "POST"){
            $email = $_POST['email'];
            $password = $_POST['password'];

            $user = new User();
            $data = $user->setEmail($email)
            ->setPassword($password)
            ->getByEmail();

            if($data){
               session_start();
               $_SESSION['user_id'] = $data->getId();
               return $this->View("Home");
            }

         }
        if(!isset($_SESSION['user_id'])){
          return $this->View("Login",["error" => "Not Sinup"]);
        }
        if(isset($_SESSION['user_id'])){
          return $this->View("Home");
        }
    }

    public function Inscription(){
        if($_SERVER['REQUEST_METHOD'] != "POST"){
           $this->View("Inscription");
           return;
        }
        
        $firstName = $_POST['firstName'];
        $lastName = $_POST['lastName'];
        $email = $_POST['email'];
        $password = $_POST['password'];

        $user = new User();
        $user->setFirstName($firstName)
        ->setLastName($lastName)
        ->setEmail($email)
        ->setPassword($password);
        $user->save();
        $this->View("Login", ["success" => "Create success"]);
    }
}