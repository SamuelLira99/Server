<?php

function getConnection($dbname) {
    $dsn = 'mysql:host=localhost;dbname='.$dbname.';charset=utf8mb4';
    $user = 'root';
    $pass = 'h689t';
    
    try {
        $pdo = new PDO($dsn, $user, $pass);
        return $pdo;
    } catch(PDOException $ex) {
        echo 'erro de PDO -> '.$ex->getMessage();
    }
}
    
?>