<?php
namespace App\core;
use PDO;
use PDOException;
class DataBase{
    private static ?PDO $pdo = NULL;

    public static function Connextion(){
        if(self::$pdo == NULL){
            try{
            self::$pdo = new PDO("pgsql:host=postgres;dbname=atelier_MVC","root","root123");
            }
            catch(PDOException $e){
                echo $e->getMessage();
            }
        }

        return self::$pdo;
    } 
}