<?php


// ===========================================================
// Inclusion des fichiers nécessaires
// ===========================================================

// var_dump(__DIR__ .'/inc/classes/Article.php');
require __DIR__ . '/inc/classes/Article.php';
require __DIR__ . '/inc/classes/Authors.php';


// -----------------------------------------------------
// Récupération de la page à afficher
// -----------------------------------------------------

// Par défaut, on considère qu'on affichera la page d'accueil
$pageToDisplay = 'home';
// Mais si un paramètre 'page' est présent dans l'URL, c'est
// qu'on veut afficher une autre page
if (isset($_GET['page']) && $_GET['page'] !== '') {
   $pageToDisplay = $_GET['page'];
}
// var_dump($pageToDisplay);

// ===========================================================
// Chaque page nécessite une préparation différente car elle
// affiche des informations différentes
// ===========================================================

// ------------------
// Page d'Accueil
// ------------------
if ($pageToDisplay === 'home') {
    // Récupération du tableau Php contenant la liste
    // d'objets Article
    require __DIR__ . '/inc/data.php';
    $articlesList = $dataArticlesList;
}
// ------------------
// Page Article
// ------------------
else if ($pageToDisplay === 'article') {
    // Récupération du tableau Php contenant la liste
    // d'objets Article
    require __DIR__ . '/inc/data.php';
    $articlesList = $dataArticlesList;
    // On souhaite récupérer uniquement les données de l'article
    // à afficher
    $articleId = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);
    // filter_input renvoie null si la paramètre n'existe pas
    // et false si le filtre de validation échoue
    // On s'assure donc de ne pas tomber ni sur false, ni sur null
    if ($articleId !== false && $articleId !== null) {
        $articleToDisplay = $articlesList[$articleId];
    } 
    // Si l'id n'est pas fourni, on affiche la page d'accueil
    // plutôt que d'avoir un message d'erreur
    else {
        $pageToDisplay = 'home';
    }
}
// ------------------
// Page Auteur
// ------------------
else if ($pageToDisplay === 'author') {
    require __DIR__ . '/inc/data.php';
    $authorsList = $dataAuthorsList;
}
// ------------------
// Page Catégorie
// ------------------
else if ($pageToDisplay === 'category') {
    require __DIR__ . '/inc/data.php';
    $categoryList = $dataCategoriesList;
}

// ===========================================================
// Affichage
// ===========================================================

require __DIR__.'/inc/templates/header.tpl.php';
require __DIR__.'/inc/templates/' . $pageToDisplay . '.tpl.php';
require __DIR__.'/inc/templates/footer.tpl.php';
