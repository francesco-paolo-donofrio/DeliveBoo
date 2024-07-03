import "./bootstrap";
import "~resources/scss/app.scss";
import * as bootstrap from "bootstrap";
import.meta.glob(["../img/**", "../fonts/**"]);

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
if (image) {
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



//** funz per validazione prima di submit di un form */
document.addEventListener('DOMContentLoaded', function() {

    // Prendo il bottone di invio form
    const submitBtn = document.getElementById('submitBtn');

    // Prendo i campi input
    // nome
    const nameInput = document.getElementById('name');
    // descrizione
    const descriptionInput = document.getElementById('description');
    // prezzo
    const priceInput = document.getElementById('price');
    

    // Scrivo i messaggi di errore / FE VALIDATION
    // nome
    const nameMessage = document.getElementById('nameMessage');
    nameMessage.innerHTML = '*campo obbligatorio';
    // descrizione
    const descriptionMessage = document.getElementById('descriptionMessage');
    descriptionMessage.innerHTML = '*campo obbligatorio';
    // prezzo
    const priceMessage = document.getElementById('priceMessage');
    //priceMessage.innerHTML = '*il valore deve essere positivo';
    

    submitBtn.addEventListener('click', function (event) {
        if (
            nameInput.value.trim() === '') {
            event.preventDefault();
            nameMessage.innerHTML = 'MA LO VEDI O NO CHE DEVI COMPILARE QUESTO CAMPO';
        }
        if(
            descriptionInput.value.trim() === '') {
            event.preventDefault();
            descriptionMessage.innerHTML = 'MA LO VEDI O NO CHE DEVI COMPILARE QUESTO CAMPO';
        }
        if(
            priceInput.value < 0) {
            event.preventDefault();
            priceMessage.innerHTML = 'Devi mettere un prezzo positivo';
        }
        if(
            priceInput.value.trim() === '') {
            event.preventDefault();
            priceMessage.innerHTML = 'MA LO VEDI O NO CHE DEVI COMPILARE QUESTO CAMPO';
        }
    });
});


/*document.addEventListener('DOMContentLoaded', function() {
    const form = document.querySelector('form');
    const submitBtn = document.getElementById('submitBtn');
    const inputs = form.querySelectorAll('[data-required], [data-positive]');
    
    submitBtn.addEventListener('click', function(event) {
        inputs.forEach(function(input) {
            const messageDiv = document.getElementById(input.id + 'Message');
            let message = '';
            
            // Validazione campo obbligatorio
            if (input.dataset.required === 'true' && input.value.trim() === '') {
                message = input.dataset.messageRequired || '*campo obbligatorio';
            }
            
            // Validazione campo positivo
            if (input.dataset.positive === 'true' && parseFloat(input.value) < 0) {
                message = input.dataset.messagePositive || 'Il valore deve essere positivo';
            }
            
            if (message) {
                event.preventDefault();
                messageDiv.innerHTML = message;
            } else {
                messageDiv.innerHTML = '';
            }
        });
    });
});
*/

// Modale per eliminazione piatto

const deleteButtonModal = document.querySelectorAll('.delete-button');

deleteButtonModal.forEach(element => {
    element.addEventListener('click', (e) => {
        console.log('addEventListener');
        e.preventDefault();
        const modale = document.getElementById('exampleModal');
        const myModal = new bootstrap.Modal(modale);
        myModal.show();
        const btnSave = modale.querySelector(".btn.f-d-button-form-cancel-modal");
        console.log(btnSave);
        btnSave.addEventListener("click", () => {
            element.parentElement.submit();
        });
    });
});

