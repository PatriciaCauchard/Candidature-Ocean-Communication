/**
 * Fonction se chargeant de faire une requete vers l'API star wars et afficher son résultat dans la page.
 */
function makeRequestAPI() {
   
    let fetchOptions = {

        method: 'GET',
    
       
        mode: 'cors',
       
        cache: 'no-cache'
        
    };

    request = fetch('https://swapi.dev/api/starships/', fetchOptions);
    // La requête vient d'être envoyée !
    
    
    request.then(
        
        function(response) {
        
        return response.json();
        }
    )
    
    .then(
        
        function(jsonResponse) {
            console.log(jsonResponse);
            const starships = jsonResponse.results;

            for(const starship of starships) {
                const content = document.querySelector('#content');
                content.innerHTML += "<li>" + starship.name + "</li>";
            }
        
        }
    );
}

const button = document.querySelector('button');
button.addEventListener('click', makeRequestAPI);