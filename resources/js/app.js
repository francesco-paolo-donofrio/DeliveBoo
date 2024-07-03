import "./bootstrap";
import "~resources/scss/app.scss";
import * as bootstrap from "bootstrap";
import.meta.glob(["../img/**", "../fonts/**"]);
import ValidationFunction from "./validation";
import ValidationLogin from "./validationLogin";

if(window.location.href.includes('register') || window.location.href.includes('edit') || window.location.href.includes('create')) {
    ValidationFunction();
}

if(window.location.href.includes('login')){
    ValidationLogin();
}

// Javascript dell'eventuale searchbar

// document.getElementById('search-icon').addEventListener('click', function() {
//     const searchBar = document.getElementById('search-bar');
//     if (searchBar.style.display === 'none' || searchBar.style.display === '') {
//         searchBar.style.display = 'block';
//         searchBar.focus();
//     } else {
//         searchBar.style.display = 'none';
//     }
// });

//^ upload image-->preview
//prendo la casella di input file
const image = document.getElementById("uploadImage");
//se esiste nella pagina
if (image && document.getElementById('uploadPreview')) {
    image.addEventListener('change', () => {

        // prendo l'elemento img dove voglio la preview
        const preview = document.getElementById('uploadPreview');

        // creo nuovo oggetto file reader
        const oFReader = new FileReader();

        // uso il metodo readAsDataURL per leggere il file dell'immagine
        oFReader.readAsDataURL(image.files[0]);
        // al termine della lettura del file
        oFReader.onload = function (event) {
            // metto nel src della preview l'immagine
            preview.src = event.target.result;
        }
    });
}



//** */ Questo evento 'submit' viene attivato quando l'utente preme il tasto 'invia' del form
    // document.getElementById("priceForm").addEventListener("submit", function (event) {
    //     const priceButton = document.getElementById("priceButton");
    //     const price = document.getElementById("price").value;
    //     const errorMessage = document.getElementById("error-message");
        

    //     if (price < 0) {
    //         errorMessage.style.display = "block";
    //         event.preventDefault(); // Previene l'invio del form
    //     } else {
    //         errorMessage.style.display = "none";
    //     }
    // });


//** */ Questo evento 'input' viene attivato ogni volta che l'utente inserisce o modifica il valore nel campo di input
    // document.getElementById("price").addEventListener("input", function () {
    //     const price = document.getElementById("price").value;
    //     const errorMessage = document.getElementById("error-message");

    //     if (price < 0) {
    //       errorMessage.style.display = "block";
    //     } else {
    //       errorMessage.style.display = "none";
    //     }
    //   });





