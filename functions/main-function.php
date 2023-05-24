<?php

    session_start();
    $dbhost = 'localhost';
    $dbname = 'memoire';
    $dbuser = 'root';
    $dbpswd = 'samir781227';

    try{
        $db = new PDO('mysql:host='.$dbhost.';dbname='.$dbname,$dbuser,$dbpswd, array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8', PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING));
    }catch(PDOexception $e){
        die("une erreur est survenue lors de la connexion à la base de données");
    }

// return 1 s'il y a connexion, 0 sinon
    function estConnecte(){
        if(isset($_SESSION['source'])){
            $connecte = 1;
        }else{
            $connecte = 0;
        }
        return $connecte;
    }
   
?>