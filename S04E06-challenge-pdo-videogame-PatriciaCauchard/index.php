<?php

// Inclusion du fichier s'occupant de la connexion à la DB (TODO)
require __DIR__.'/inc/db.php'; // Pour __DIR__ => http://php.net/manual/fr/language.constants.predefined.php

// Initialisation de variables (évite les "NOTICE - variable inexistante")
$videogameList = array();
$platformList = array();
$name = '';
$editor = '';
$release_date = '';
$platform = '';

// Si le formulaire a été soumis
if (!empty($_POST)) {
    // Récupération des valeurs du formulaire dans des variables
    $name = isset($_POST['name']) ? $_POST['name'] : '';
    $editor = isset($_POST['editor']) ? $_POST['editor'] : '';
    $release_date = isset($_POST['release_date']) ? $_POST['release_date'] : '';
    $platform = isset($_POST['platform']) ? intval($_POST['platform']) : 0;
    
    
    // Insertion en DB du jeu video
    $insertQuery = "
        INSERT INTO videogame (name, editor, release_date, platform_id)
        VALUES ('{$name}', '{$editor}', '{$release_date}', {$platform})
    ";
    
$insertedRows = $pdoDBConnexion->exec($insertQuery);

if ($insertedRows == 1) {
    header('Location: index.php');
    exit();
}
else {
    exit("Erreur lors de l'ajout du jeu vidéo");
}





    // Version 2
    $platformListQuery = 'SELECT * FROM platform';
    $pdoStatement = $pdoDBConnexion->query($platformListQuery);
    
    // Avec l'option FETCH_KEY_PAIR, on obtient directement un tableau PHP (array)
    // avec la première colonne de résultat qui ira dans les clés/index et
    // la deuxième colonne de résultat qui ira dans les valeurs associées
    // La table de base ressemble à ça :
    // |--|-----------|
    // |id|name       |
    // |--|-----------|
    // | 1|PC         |
    // | 2|MegaDrive  |
    // | 3|SNES       |
    // | 4|PlayStation|
    // |--|-----------|
    // Quand on récupère le résultat avec FETCH_KEY_PAIR, on obtient directement :
    // $platformList = array(
    //     1 => 'PC',
    //     2 => 'MegaDrive',
    //     3 => 'SNES',
    //     4 => 'PlayStation'
    // );
    
    $platformList = $pdoStatement->fetchAll(PDO::FETCH_KEY_PAIR);
   


$sql = 'SELECT * FROM `videogame`
';


// Si un tri a été demandé, on réécrit la requête
if (!empty($_GET['order'])) {
    // Récupération du tri choisi
    $order = trim($_GET['order']);
    if ($order == 'name') {
        // TODO #2 écrire la requête avec un tri par nom croissant
        
        $sql = '
            SELECT * FROM `videogame` ORDER BY `name`
        ';
       
    }
    else if ($order == 'editor') {
      
        $sql = '
            SELECT * FROM `videogame` ORDER BY `editor` ASC
        ';
       
    }
}


$pdoStatement = $pdoDBConnexion->query($sql);

$videogameList = $pdoStatement->fetchAll(PDO::FETCH_ASSOC);


// Inclusion du fichier s'occupant d'afficher le code HTML

require __DIR__.'/view/videogame.php';
