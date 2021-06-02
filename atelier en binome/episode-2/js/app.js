console.log('Fichier JS chargé !');

let tirSucceed=0;
let tirMissed=0;
let tirTotal = 0;

// Notre grille est constituée d'un tableau où chaque entrée représente une ligne. Chaque entrée contient aussi un tableau dont chaque valeur réprésente une colonne.
// Avec la notation grid[0][4], je peux récupérer la case située sur la première ligne et la 5ème colonne.
let grid = [
    ['', '', 'b', 'b', 'b', '', '', ''],
    ['', '', '', '', '', '', 'b', ''],
    ['', '', '', 'p', '', '', 'b', ''],
    ['', 'b', '', '', '', '', 't', ''],
    ['', 'b', '', '', '', '', '', ''],
    ['', '', '', '', '', '', '', ''],
    ['', '', '', '', '', '', '', ''],
    ['', '', '', '', '', '', '', ''],
];

let tours=1;

// Tableau associatif contenant les en-tetes des lignes et des colonnes.
const gridHeaders = {
    // Index :   0    1    2    3    4    5    6    7
    'columns': ['A', 'B', 'C', 'D', 'E', 'F', 'G', 'H'],
    //Index  0  1  2  3  4  5  6  7
    'rows': [1, 2 ,3 ,4 ,5 ,6 ,7 ,8]
}
// let grid2 = ['B', 'b', 'b', 'b', 'b', 'b', 'b', 'b'];

console.log(grid);


function displayLine(lineParam, rowIndex) {

    // On commence par initialiser une variable qui va contenir la chaine de caractères à afficher.
    let line = '';
// debugger;
    // On parcourt l'ensemble du tableau grace à une boucle
    for (let columnIndex = 0; columnIndex < lineParam.length; columnIndex++) {

        // On sélectionne la cellule HTML qui est associée à l'entrée courante de notre grille.
        let currentHTMLCell = document.querySelector('#cell'+ rowIndex + columnIndex);
       
        // On récupère le caractère courant dans le tableau passé en paramètre.
        const currentCharacter = lineParam[columnIndex];
        
        // Si le caractère courant n'est pas vide
        if(currentCharacter !== ''){
            // Alors on modifie le contenu de la cellule pour y ajouter ce caractère
            currentHTMLCell.innerText = currentCharacter;

            // Si l'élément est touché, on doit ajouter la classe "hit"
            if(currentCharacter === 't') {
                currentHTMLCell.classList.add('hit');

                currentHTMLCell.innerHTML = "<img src='https://i.pinimg.com/originals/0e/14/e8/0e14e85756dbdfe2979998bf8e76e3c4.gif'>";
            } else if (currentCharacter === 'p') {
                //Si c'est raté, on ajoute la classe "splash"
                currentHTMLCell.classList.add('splash');
            }
        }
        

    }


}

// On exécute displayLine pour afficher notre ligne dans la console
// displayLine(grid);

function sendMissileAt(rowIndex, columnIndex) {
    // On récupère le caractère contenu dans la case ciblée
    // On peut utiliser la variable grid car elle a été définie en dehors de notre fonction.
    const targetCharacter = grid[rowIndex][columnIndex];
    checkTir(targetCharacter);

    // On doit vérifier si le caractère ciblé est égal à b.
    if( targetCharacter === 'b') {
        console.log('Touché !');
        // On met à jour le tableau pour stocker l'information du bateau touché
        grid[rowIndex][columnIndex] = 't';

        // Après avoir modifié la grille, on l'affiche
        displayGrid();

        // On affiche dans la console toutes les cellules touchées.
        displayHits();

        // Si le caractère est b, on renvoie true
        return true;
    } 
    // Si le caractère n'est pas un "b" on vérifie si c'est soit un "t" soit un "p" (case déjà touchée par un missile)
    else if ( targetCharacter === 't' || targetCharacter === 'p') {
        console.log("Allooo! Allooooo! Y'a personne au bout du fil ? Faut réfléchir McFly. Faut réfléchir !");

        return false;
    }
    else {
        console.log('Plouf !');

        // On met à jour le tableau pour stocker le plouf
        grid[rowIndex][columnIndex] = 'p';

        // Après avoir modifié la grille, on l'affiche
        displayGrid();

        // Sinon on renvoie false
       return false; 
    }
}

// sendMissileAt(2);


/**
 * Affiche la grille dans la console
 */
function displayGrid(){

    // On parcourt l'ensemble des lignes du tableau grid
    for( let rowIndex = 0; rowIndex < grid.length; rowIndex++) {
        // On récupère la ligne courante grace à son index
        const currentLine = grid[rowIndex];

        // On commence notre nouvelle ligne à afficher en concaténant son index avec un espace.
        let stringLine = gridHeaders.rows[rowIndex] + ' ';
       
        // On exécute displayLine (qui parcourt chaque case de la ligne et l'affiche) et on récupère son résultat dans une variable.
        let line = displayLine(currentLine, rowIndex);

        // On concatène ce résultat au début de ligne qu'on a commencée.
        stringLine += line;

        // On affiche notre ligne dans la console.
        // console.log(stringLine);
    }
}

function sendMissile(cellName) {
    // On utilise la fonction getGridIndexes qui traduit notre string (ex: A5) en index (Ex: A5 => row = 4 et column = 0)
    const result = getGridIndexes(cellName);
    const rowIndex = result[0];
    const columnIndex = result[1];
    
    // Puis on appelle la fonction sendMissileAt
    // on prend soin de retourner la valeur de retour de sendMissileAt
    // (VRAI si touché, FALSE sinon)
    return sendMissileAt(rowIndex, columnIndex);
}


function getGridIndexes(cellName) {

    // On récupère les différents caractères qui composent notre case grace à la notation "tableau".
    const letter = cellName[0];
    let number = cellName[1];

    // Comme notre nombre est une string par défaut, on la convertit en "Number"
    number = Number(number);
  

    // L'index de notre ligne est égal au chiffre passé en argument moins 1
    const rowIndex = number - 1;

    // On définit la variable a l'extérieur de la boucle pour qu'elle utilisable DANS la boucle et HORS de la boucle.
    // https://developer.mozilla.org/fr/docs/Web/JavaScript/Reference/Instructions/let
    let columnIndex;

    // On boucle sur l'ensemble des colonnes stockées dans le tableau gridHeaders.columns. Pour chaque entrée de ce tableau, on stocke l'index dans la variable du meme nom.
    for (const index in gridHeaders.columns) {

        // Grace à l'index on peut récupérer la valeur associée.
        // CurrentLetter contient donc A, B, C, D... successivement.
        const currentLetter = gridHeaders.columns[index];

        // On compare la lettre courante à celle passée en paramètre de la fonction (dans le paramètre cellName)
        // Si elles sont identiques, alors on va stocker l'index de la lettre
        if(currentLetter === letter) {
            console.log("La lettre demandée est : " + currentLetter + " et son index est " + index);
            columnIndex = index;
        }
    }


    // On construit un tableau contenant nos deux index
    const resultArray = [rowIndex, columnIndex];

    // On renvoie le résultat
    return resultArray;
}

function checkGameOver(){
    // On définit un compteur qui va stocker le nombre de cases "b" restantes sur la grille.
    let remainingBoats = 0;

    // On boucle sur chacune des cellules de notre grille grace à une double boucle.
    // La première parcourt toutes les lignes, la seconde parcourt chaque case de chaque ligne.
    for (let row of grid) {
        for(let cell of row) {
            // Si la case contient un b, c'est un bateau, donc on augmente notre compteur de bateaux.
            if(cell === 'b'){
                remainingBoats++;
            }
        }
    }

    // S'il reste des bateaux, alors le jeu n'est pas terminé !
    if(remainingBoats > 0) {
        return false;
    } else {
        console.log("Bravo, tu as tout coulé !");
        return true;
    }
}

/**
 * Fonction qui demande à l'utilisateur sur quelle case tirer
 */
function promptMissileCell() {
    // La fonction prompt permet de générer une fenetre dans laquelle l'utilisateur peut taper des informations. Celles-ci seront stockées dans la variable cellName.
    let cellName = prompt('On envoie un missile sur quelle cellule ?');
    
    // Une fois qu'on a les coordonnées de la case visée, on les transmet à la fonction sendMissile.
    sendMissile(cellName);
}


function displayHits(){
    // On sélectionne dans notre page tous les éléments qui ont la classe hit.
    const hitCells = document.querySelectorAll('.hit');

    console.log("Liste des cellules touchées :");

    // On parcourt nos cellules afin d'afficher leur ID dans la console.
    for(const cell of hitCells) {
        console.log(cell.id);
    }
}


// tant que le jeu n'est pas terminé
// while (checkGameOver() === false) {
    displayGrid();


let formElem = document.querySelector('form');
let inputElem = document.querySelector('#cellToHit');
let olElem = document.querySelector('#case-cible');


formElem.addEventListener('submit', function(event) {
    event.preventDefault();
    let inputValue = inputElem.value;
    tours++;
    let nbTour = document.querySelector('#nbTour');
    nbTour.innerText = 'Tour'+ tours;
    
    if (inputValue != '') {
        olElem.innerHTML += '<li>' + inputValue + '</li>';
        inputElem.value = '';
        inputElem.focus();
    }
    else {
        alert('no missiles sent !');
    }
    sendMissile(inputValue);
    console.log(inputValue);
}
);



let buttonStats = document.querySelector('#stats');

buttonStats.addEventListener('click', function(){
    console.log('click');
    alert('nombre de tirs réussis :' + tirSucceed +
          '\n' + 'nombre de tirs ratés :' + tirMissed + '\n' + 'Total :' + tirTotal + '\n' + 'poucentage de tirs réussis :' + tirPourcentageSucceed + '%' + '\n' +'pourcentage de tirs ratés :' + tirPourcentageMissed + '%');
}
);

function checkTir (targetCharacter){
        if(targetCharacter == 'b'){
            tirSucceed++;
        }
        else {
            tirMissed++;
        }
        tirTotal = tirSucceed + tirMissed;
        tirPourcentageSucceed= Math.round((tirSucceed*100)/tirTotal);
        tirPourcentageMissed=Math.round((tirMissed*100)/tirTotal);
        console.log(tirPourcentageSucceed);
        
};

