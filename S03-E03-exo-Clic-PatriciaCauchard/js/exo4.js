
let inputElt = document.querySelector('#colors-input');
let formElt = document.querySelector('form');
let listElt = document.querySelector('#colors-list');
let errorElt = document.querySelector('#colors-error');

formElt.addEventListener('submit', function(event){
    event.preventDefault();
    let inputValue = inputElt.value;
    console.log(inputValue);
    errorElt.innerText = '';

        if (inputValue[0] === '#' && (inputValue.length === 4 || inputValue.length ===7) )

//Pour afficher les couleurs avec la couleur écrite:

        {
        listElt.innerHTML += '<li><span style="color: ' + inputValue + ';">' + inputValue + '</span></li>'; 
        }
    else {
        errorElt.innerText= "ERROR! ERROR! YOU GOT 5 SECONDS BEFORE IT EXPLODES..4..3..";
        }
        inputElt.value='';
    }
    ); 
    
