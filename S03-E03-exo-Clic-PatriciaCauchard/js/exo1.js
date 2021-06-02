// Première étape 
// stockons les éléments du DOM dans des variables
let buttonElt = document.querySelector('#button');
let spanElt = document.querySelector('#counter');
// déclarons la variable qui nous servira à enregistrer le nombre de clicks
let counter = 0;
let dblCounter = 0;

// Seconde étape
// attachons un écouteur d'événement CLICK
// à chaque survenue de l'événement CLICK, les instructions contenues dans la function anonyme placée en second argument (de la fonction addEventListener) sont exécutées
buttonElt.addEventListener('click', function(){
    console.log('click ! ');
    counter++;
    spanElt.innerText = counter;
});


// Bonus
// attachons un écouteur d'événement DBLCLICK
buttonElt.addEventListener('dblclick', function(){
    console.log('dblclick ! ');
    dblCounter++
    if (dblCounter === 10) {
        alert("T'en as pas marre de me cliquer dessus ?")
    }
    else if (dblCounter === 15) {
        alert("Tu m'as pris pour un bouton en fait ?");
    }
    else if (dblCounter === 20) {
        buttonElt.style.backgroundColor = '#F0F';
        alert("Je vais me facher tout #F0F");
    }
});
// attachons un écouteur d'événement MOUSEOVER
// ressemble beaucoup au :hover en CSS !!
buttonElt.addEventListener('mouseover', function(){
    console.log('mouseover ! ');
});

// ici la valeur contenue dans counter ne sera affichée qu'une fois
console.warn(counter);

