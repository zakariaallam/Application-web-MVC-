<?php
namespace App\controllers;

use App\core\controller;
use App\models\User;

class AuthController extends controller{
    public function Login(){
        if(!isset($_SESSION['user'])){
           $this->View("Login",["error" => "Not Sinup"]);
        }
         if($_SERVER['REQUEST_METHOD'] === "POST"){
            $email = $_POST['email'];
            $password = $_POST['password'];

            // $user = new User();
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

        $user = new User($firstName,$lastName,$email,$password);
        $user->save();
        $this->View("Login", ["success" => "Create success"]);
    }
}