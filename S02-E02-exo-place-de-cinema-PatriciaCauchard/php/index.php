<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Cinéma Rodia - Haut-Cloques</title>
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
                <?php
                    // créer une variable "age" et assigner la valeur 43 (entier/integer)
                    $age = 43;
                    $tarif = null;

                    // Comment déterminer le tarif en fonction de l'age du spectateur
                    // Les règles sont : 
                    // - Tarif Réduit (6,80) pour les personnes de + de 60 ans et de moins de 16 ans
                    // - Tarif Enfant (4,50) pour les - de 14 ans
                    // - Plein Tarif (8,30) pour tous les autres cas
                    
                    // Solution #1 ------------------
                    if ($age > 60 || $age < 16) {
                        $tarif = 6.8;
                        if ($age < 14) {
                            $tarif = 4.5;
                        }
                    }
                    else {
                        $tarif = 8.3;
                    }

                    // Solution #2 --------------------
                    if ($age < 14) {
                        $tarif = 4.5;
                    }
                    elseif ($age < 16) {
                        $tarif = 6.8;
                    }
                    elseif ($age > 60) {
                        $tarif = 6.8;
                    }
                    else {
                        $tarif = 8.3;
                    }

                ?>
                <p>L'age du Capitaine : <strong><?php echo $age; ?></strong></p>
                <p>Le capitaine devrait payer <strong><?php echo $tarif; ?></strong>&euro;</p>
            </section>
        </main>
        <footer>
            Cinéma Rodia - 42, avenue Foch, Haut-Cloques &copy; Tous droits réservés
        </footer>
    </body>
</html>

