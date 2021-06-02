<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Cinéma Rodia - En salle</title>
        <link href="https://fonts.googleapis.com/css?family=Roboto+Slab:400,700" rel="stylesheet">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">
        <meta http-equiv="X-UA-Compatible" content="ie=edge,chrome=1">
        <link rel="stylesheet" href="../css/reset.css">
        <link rel="stylesheet" href="../css/style.css">
    </head>
    <body>
        <?php

include ('parts/header.php');
        ?>
        <main>
            <section>
                <h2>Les films en salle</h2>

                <h3>Sans boucle</h3>
                <?php

                    $films = [];
                    // $films est une variable qui contient un tableau vide

                    $films = [
                        "Alien", // index 0
                        "L'Ordre des Croissants", // index 1
                        "Le Caméléon",// index 2
                        'Seven Deadly Sins',// index 3
                        "La Nicole",// index 4
                        'L\'attaque des Tomates',// index 5
                        'Bad Teacher'// index 6
                    ];
                    
                ?> 

                <p><?php echo $films[0]; // Alien ?></p>
                <p><?php echo $films[1]; // L'Ordre des Croissants ?></p>
                <p><?php echo $films[2]; // Le Caméléon?></p>
                <p><?php echo $films[3]; ?></p>
                <p><?php echo $films[4]; ?></p>
                <p><?php echo $films[5]; ?></p>
                <p><?php echo $films[6]; ?></p>

                <h3>Avec boucle FOR</h3>
                <?php

                    for ($index = 0; $index <= 6; $index++) {
                        echo '<p>' . $films[$index] . '</p>';
                    }
                ?>

                <?php
                    // On veut ajouter un nouvel élément dans notre tableau
                    $films[] = "Wall-e";
                    array_push($films, "L'attaque de la moussaka géante");
                    // https://www.php.net/manual/fr/function.array-push.php
                ?>
                <h3>On a rajouté un film</h3>
                <?php

                   
                    for ($index = 0; $index < count($films); $index++) {
                        echo '<p>' . $films[$index] . '</p>';
                    }
                ?>
            <h2>Salles</h2>
            
                    <ul>
                        <li> 
                            <?php
                                // [Afficher la première salle]
                                $rooms = [
                                'Athéna', // => index 0
                                'Dyonisos', // => index 1
                                'Hadès', // => index 2
                                'Zeus' // => index 3
                                ];
                                echo "(".$rooms[0]."-Affichage première salle avec li)";

                            ?>
                        </li>
                                 autre solution: 
                                 <!-- echo "<ul> 
                                <li>" .$rooms[0]. "</li>
                        </ul>";
                ?>
                <ul>
                    <li><?php echo $rooms[0]; ?></li> 
                </ul> -->
                     <!-- #1 - Afficher la première salle -->
                        <li>
                            <?php 
                            // [Afficher la deuxième salle]
                                $rooms = [
                                'Athéna', // => index 0
                                'Dyonisos', // => index 1
                                'Hadès', // => index 2
                                'Zeus' // => index 3
                                ];
                                echo "(" . $rooms[1] . "-Affichage deuxième salle avec li)";
                            ?>
                        </li>
                        
                            <?php
                            // [Faire une boucle avec les salles et les placer dans des li]
                              $rooms = [
                                'Athéna', // => index 0
                                'Dyonisos', // => index 1
                                'Hadès', // => index 2
                                'Zeus' // => index 3
                                ]; 
                                for ($index = 0; $index <= 3; $index++) {
                                echo '<li>' . $rooms[$index] . '</li>';
                                }
                            ?>
                            autre solution:
                                


                    
                    </ul>
            </section>
        </main>
        <footer>
            Cinéma Rodia - 42, avenue Foch, Haut-Cloques &copy; Tous droits réservés
        </footer>
    </body>
</html>