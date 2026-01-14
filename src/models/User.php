<?php
namespace App\models;
use PDO;
class User {
    private PDO $pdo;
    private string $firstName;
    private string $lastName;
    private string $email;
    private string $password;


    public function __construct(string $firstName, string $lastName , string $email, string $password)
    {
        $this->firstName = $firstName;
        $this->lastName = $lastName;
        $this->email = $email;
        $this->password = $password;
        $this->pdo = new Pdo("pgsql:host=postgres;dbname=atelier_MVC","root","root123");
    }

    public function save(){
        $sql = "INSERT INTO users (first_name,last_name,email,password) VALUES (:first_name,:last_name,:email,:password)";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindParam(":first_name",$this->firstName);
        $stmt->bindParam(":last_name",$this->lastName);
        $stmt->bindParam(":email",$this->email);
        $stmt->bindParam(":password",$this->password);
        $stmt->execute();
    }
}