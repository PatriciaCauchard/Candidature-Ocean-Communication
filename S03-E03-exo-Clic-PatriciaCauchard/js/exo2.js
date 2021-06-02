// Etapé 1
// on sélectionne les éléments dont on va avoir besoin
let buttonYesElt = document.querySelector('#yes');
let buttonNoElt = document.querySelector('#no');
let spanYesElt = document.querySelector('#counter-yes');
let spanNoElt = document.querySelector('#counter-no');


let counter = 0;
let counterYes = 0;
let counterNo = 0;



// Etape 2
// on attache un écouteur d'événement click sur le bouton YES
buttonYesElt.addEventListener('click', function(){
    counterYes ++;
    counter ++;
    spanYesElt.innerText = counterYes;
    console.log(counter);
});
// on attache un écouteur d'événement click sur le bouton NO
buttonNoElt.addEventListener('click', function(){
    counterNo ++;
    counter ++;
    spanNoElt.innerText = counterNo;
    console.log(counter);
});



// Bonus
// On crée un nouveau bouton pour voir !
let buttonNspElt = document.querySelector('#nsp');
let spanNspElt = document.querySelector('#counter-nsp');
let counterNsp = 0;

buttonNspElt.addEventListener('click', function(){
    counterNsp ++;
    counter ++;
    spanNspElt.innerText = counterNsp;
    console.log(counter);
});