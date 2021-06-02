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
// Nous pouvons stocker dans un autre fichier le morceau de HTML nécessaire pour afficher le Header du site de cinéma
// Puis appeler ce fichier pour qu'il insère son contenu exactement à cet endroit
include ('parts/header.php');
        ?>
  <main>
    <section >
      <h2>Consommations</h2>
          <?php
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
          <ul>
            <li>
              <?php
              
                  echo $extras[0][0]; // On veut afficher le premier élément, du premier élément de $extras
                  echo $extras[0][1]; // là j'affiche la taille de la conso 
                  echo $extras[0][2];
                ?>
            </li>
          </ul>

          <h3>Avec boucle FOR</h3>

          <ul>
          <?php
            for ($loopCounter = 0; $loopCounter < count($extras); $loopCounter++) {
              echo '<li>' . $extras[$loopCounter][0] . ' (' . $extras[$loopCounter][1] . ') :  ' . $extras[$loopCounter][2] . ' &euro; </li>';
            }
          ?>
          </ul>

          <h3>Avec DOUBLE Boucle FOR</h3>
          <ul>
          <?php
            for($index = 0; $index < count($extras); $index++ ){
                echo '<li>';
                for($ssIndex =0; $ssIndex < count($extras[$index]); $ssIndex++){
                    echo ' '.  $extras[$index][$ssIndex];
                }
                echo ' €  </li>';
            };
          ?>
          </ul>
       

    </section>
  </main>
  <footer>
    Cinéma Rodia - 42, avenue Foch, Haut-Cloques &copy; Tous droits réservés
  </footer>
</body>
</html>
