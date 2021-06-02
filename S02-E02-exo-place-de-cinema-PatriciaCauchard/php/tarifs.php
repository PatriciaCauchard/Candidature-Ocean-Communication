<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <title>Cinéma Rodia - Tarifs</title>
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
    <section id="tarifs">
      <h2>Tarifs</h2>
        <div class="flex">
          <ul>
            <li>Tarif Plein : 8,30 &euro;</li>
            <li>Tarif Réduit : 6,80 &euro;</li>
            <li>Tarif Enfant : 4,50 &euro;</li>
            <li>Supplément 3D : 1 &euro;</li>
          </ul>
          <?php 
          $tarif = [
            'Tarif Plein' => 8.30,
            'Tarif Réduit' => 6.80,
            'Tarif Enfant' => 4.50,
            'supplément D' => 1
          ];
          
          ?>
          <ul>
            <li>Abonnement 5 places : -10%</li>
            <li>Abonnement 5 places -25ans : -20%</li>
          </ul>

          <?php
          $abonnements =  [
            'abonnement 5 places' => 0.9, 
            'abonnement 5 places - 25ans' => 0.8
          ];
          ?>

        </div>
        <p>
          Tarif Réduit pour les personnes de + de 60 ans et de moins de 16 ans<br>
          Tarif Enfant pour les - de 14 ans
        </p>
      
      <h2>Selon votre âge</h2>
      <p>
        <?php
        //ordre croisaant
            $age = 1;

            while ( $age < 100) {
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
                echo '<li>' . $age . ' ans : ' . $tarif . ' &euro;</li>';
                
                $age = $age +1;
            }
        ?>
        
        <?php
           
            for ($age = 1; $age < 100; $age++) {
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
                // écrire l'age
                echo '<li> Si on a ' . $age . ' ans : ' . $tarif . ' &euro;</li>';
            }
        ?>

        <?php
        //ordre décroissant
            $age = 99;
            while ( $age > 0) {
                echo '<li>' . $age . '</li>';
                
                $age = $age -1;
            }
        ?>
        <?php

            for ($age = 100; $age > 0; $age--) {
                // écrire l'age
                echo '<li>' . $age . '</li>';
            }
        ?>
      </p>
      <h2>Consommation</h2>
   
<?php
      // [...]
$extras = [
  // => index 0
  [
    'Popcorn', // => sous-index 0
    'L', // => sous-index 1
    2.9 // => sous-index 2
  ],
  // => index 1
  [
    'Popcorn', // => sous-index 0
    'XL', // => sous-index 1
    4 // => sous-index 2
  ],
  // => index 2
  [
    'Chips', // => sous-index 0
    '50g', // => sous-index 1
    2.5 // => sous-index 2
  ],
  // => index 3
  [
    'M&M\'s', // => sous-index 0
    '100g', // => sous-index 1
    4 // => sous-index 2
  ],
  // => index 4
  [
    'Soda', // => sous-index 0
    '33cl', // => sous-index 1
    3.2 // => sous-index 2
  ],
  // => index 5
  [
    'Evian', // => sous-index 0
    '33cl', // => sous-index 1
    3 // => sous-index 2
  ]
  ];


?>
    </section>
  </main>
  <footer>
    Cinéma Rodia - 42, avenue Foch, Haut-Cloques &copy; Tous droits réservés
  </footer>
</body>
</html>
