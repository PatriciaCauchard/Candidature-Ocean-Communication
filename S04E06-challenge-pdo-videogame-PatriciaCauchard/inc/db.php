<?php


$dataSourceName = 'mysql:dbname=videogame;host=localhost;charset=UTF8';
$user = 'explorateur';
$password = 'Ereul9Aeng';

try {
    $pdoDBConnexion = new PDO(
        $dataSourceName,
        $user,
        $password,
        array(
            PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING
        )
    );
} catch (PDOException $exception) {
    echo 'Connexion échouée : ' . $exception->getMessage();
}


