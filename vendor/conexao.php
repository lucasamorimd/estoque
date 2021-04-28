<?php


abstract class conexao {
    function __construct() {
        
    }
    public static function getinstance(){
    try{   
    
    $pdo = new PDO("mysql:host=localhost;dbname=projetonti","root","");
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    return $pdo;
} catch(PDOException $exc){
    echo $exc->getMessage();
    
}

    }   
}