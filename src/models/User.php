<?php
namespace App\models;

use App\core\DataBase;
use PDO;

class User {
    private int $id;
    private string $firstname;
    private string $lastname;
    private string $email;
    private string $password;

    public function save(){
        $sql = "INSERT INTO users (firstname,lastname,email,password) VALUES (:firstname,:lastname,:email,:password)";
        $stmt = DataBase::Connextion()->prepare($sql);
        $stmt->bindParam(":firstname",$this->firstname);
        $stmt->bindParam(":lastname",$this->lastname);
        $stmt->bindParam(":email",$this->email);
        $stmt->bindParam(":password",$this->password);
        $stmt->execute();
    }

    public function getByEmail(){
        $sql = "SELECT * FROM users WHERE email=:email";
        $stmt = DataBase::Connextion()->prepare($sql);
        $stmt->bindParam(":email",$this->email);
        $stmt->execute();
        $stmt->setFetchMode(PDO::FETCH_CLASS, User::class);
         return $stmt->fetch();

    }

    public function getId(): int{
        return $this->id;
    }

    public function setId($id){
        $this->id = $id;
        return $this;
    }
    public function getFirstName(): string{
        return $this->firstname;
    }

    public function setFirstName($firstName){
        $this->firstname = $firstName;
        return $this;
    }
    public function getLastName(): string{
        return $this->lastname;
    }

    public function setLastName($lastName){
        $this->lastname = $lastName;
        return $this;
    }
    public function getEmail(): string{
        return $this->email;
    }

    public function setEmail($email){
        $this->email = $email;
        return $this;
    }
    public function getPassword(): string{
        return $this->password;
    }

    public function setPassword($password){
        $this->password = $password;
        return $this;
    }
}