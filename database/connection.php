<?php
    $host = 'localhost';
    $dbname = 'escola';
    $user = 'root';
    $password = 'password';
    
    $pdo = null;
    
    try {
      $pdo = new PDO("mysql:host=$host;dbname=$dbname", $user , $password );
    } catch (PDOException $e){
      echo $e->getMessage();
    }
    return $pdo;
?>