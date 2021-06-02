// Etape 1
// récupérons l'input dans lequel sera saisi une valeur
let inputElt = document.querySelector('#shop-item-input');
// récupérons la balise ol qui contiendra la liste des courses
let olElt = document.querySelector('#shop-items');
// récupérons le bouton de validation du formulaire
//let buttonElt = document.querySelector('button');
// récupérons le formulaire
let formElt = document.querySelector('#shop-item-form');


formElt.addEventListener('submit', function(event){
    // On stoppe le comportement submit du formulaire
    event.preventDefault();
    console.log(event);
    // on veut récupérer le texte saisi dans l'input
    let inputValue = inputElt.value;
    if (inputValue != '') {
        olElt.innerHTML += '<li>' + inputValue + '</li>';
        inputElt.value = '';
        inputElt.focus();
    }
    else {
        alert('le vide ne se mange pas !');
    }
});


// on peut aussi déclarer une fonction handler qui ne soit pas anonyme
function handleClick(evt) {
    // instructions à exécuter lors de la survenue d'un événement
}

inputElt.addEventListener('blur', handleClick);

