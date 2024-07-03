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
    // email
    const emailInput = document.getElementById('email');
    // password
    const pswInput = document.getElementById('password');
    // password-confirm
    const pswConfInput = document.getElementById('password-confirm');
    // nome ristorante
    const rNameInput = document.getElementById('rName');
    // descrizione
    const descriptionInput = document.getElementById('description');
    // prezzo
    const priceInput = document.getElementById('price');
    

    // Scrivo i messaggi di errore / FE VALIDATION

    // nome
    // Registrazione - Create Piatto - Edit Piatto
    const nameMessage = document.getElementById('nameMessage');
    //nameMessage.innerHTML = '*campo obbligatorio';

    // email
    // Registrazione
    const emailMessage = document.getElementById('emailMessage');
    //emailMessage.innerHTML = '*inserisci una email valida';

    // password
    // Registrazione
    const pswMessage = document.getElementById('pswMessage');
    //passwordMessage.innerHTML = '*inserisci una password valida';

    // password-confirm
    // Registrazione
    const pswConfMessage = document.getElementById('pswConfMessage');
    //pswConfMessage.innerHTML = '*inserisci una password valida';

    // nome ristorante
    // Registrazione
    const rNameMessage = document.getElementById('rNameMessage');
    //rNameMessage.innerHTML = '*inserisci un nome valido';

    // descrizione
    // Create Piatto - Edit Piatto
    const descriptionMessage = document.getElementById('descriptionMessage');
    // if(descriptionMessage){
    //     descriptionMessage.innerHTML = '*campo obbligatorio';
    // };

    // prezzo
    // Create Piatto - Edit Piatto
    const priceMessage = document.getElementById('priceMessage');
    //priceMessage.innerHTML = '*il valore deve essere positivo';  

    submitBtn.addEventListener('click', function (event) {
        if (
            nameInput && nameInput.value.trim() === '') {
            event.preventDefault();
            nameMessage.innerHTML = 'MA LO VEDI O NO CHE DEVI COMPILARE QUESTO CAMPO';
        }
        if (emailInput) {
            if(emailInput.value.trim() === ''){
                    event.preventDefault();
                    emailMessage.innerHTML = 'MA LO VEDI O NO CHE DEVI COMPILARE QUESTO CAMPO';
            } else if (!(/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/.test(emailInput.value))) {
                event.preventDefault();
                emailMessage.innerHTML = 'Inserisci una email valida';
            }
        }
        if (
            pswInput && pswInput.value.trim() === '') {
            event.preventDefault();
            pswMessage.innerHTML = 'MA LO VEDI O NO CHE DEVI COMPILARE QUESTO CAMPO';
        }
        if (
            pswConfInput && pswConfInput.value.trim() === '') {
            event.preventDefault();
            pswConfMessage.innerHTML = 'MA LO VEDI O NO CHE DEVI COMPILARE QUESTO CAMPO';
        }
        if(pswInput.value !== pswConfInput.value){
            event.preventDefault();
            pswConfMessage.innerHTML = 'Le password non corrispondono';
        }
        if (
            rNameInput && rNameInput.value.trim() === '') {
            event.preventDefault();
            rNameMessage.innerHTML = 'MA LO VEDI O NO CHE DEVI COMPILARE QUESTO CAMPO';
        }
        if (
            descriptionInput && descriptionInput.value.trim() === '') {
            event.preventDefault();
            descriptionMessage.innerHTML = 'MA LO VEDI O NO CHE DEVI COMPILARE QUESTO CAMPO';
        }
        if (
            priceInput && priceInput.value < 0) {
            event.preventDefault();
            priceMessage.innerHTML = 'Devi mettere un prezzo positivo';
        }
        if (
            priceInput && priceInput.value.trim() === '') {
            event.preventDefault();
            priceMessage.innerHTML = 'MA LO VEDI O NO CHE DEVI COMPILARE QUESTO CAMPO';
        }
    });
});

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

