//** funz per validazione prima di submit di un form */
function ValidationFunction() {
    document.addEventListener('DOMContentLoaded', function() {

        // Prendo il bottone di invio form
        const submitBtn = document.getElementById('submitBtn');
    
        // Prendo i campi input
        const nameInput = document.getElementById('name');
        const emailInput = document.getElementById('email');
        const pswInput = document.getElementById('password');
        const pswConfInput = document.getElementById('password-confirm');
        const rNameInput = document.getElementById('restaurant_name');
        const addrInput = document.getElementById('address');
        const imageInput  = document.getElementById('uploadImage');
        const descriptionInput = document.getElementById('description');
        const vatInput = document.getElementById('vat');
        const checkboxes = document.querySelectorAll('.tipologieClassJS');
        const priceInput = document.getElementById('price');
        
    
        // Scrivo i messaggi di errore / FE VALIDATION
        const nameMessage = document.getElementById('nameMessage');
        const emailMessage = document.getElementById('emailMessage');
        const pswMessage = document.getElementById('pswMessage');
        const pswConfMessage = document.getElementById('pswConfMessage');
        const rNameMessage = document.getElementById('rNameMessage');
        const addrMessage = document.getElementById('addrMessage');
        const imgMessage = document.getElementById('imgMessage');
        const descriptionMessage = document.getElementById('descriptionMessage');
        const vatMessage = document.getElementById('vatMessage');
        const typeMessage = document.getElementById('typeMessage');
        const priceMessage = document.getElementById('priceMessage');
    
        submitBtn.addEventListener('click', function (event) {
            let valid = true;

            if(nameMessage){
                nameMessage.innerHTML = '';
            }
            if(emailMessage){
                emailMessage.innerHTML = '';
            }
            if(pswMessage){
                pswMessage.innerHTML = '';
            }
            if(pswConfMessage){
                pswConfMessage.innerHTML = '';
            }
            if(rNameMessage){
                rNameMessage.innerHTML = '';
            }
            if(addrMessage){
                addrMessage.innerHTML = '';
            }
            if(imgMessage){
                imgMessage.innerHTML = '';
            }
            if(descriptionMessage){
                descriptionMessage.innerHTML = '';
            }
            if(vatMessage){
                vatMessage.innerHTML = '';
            }
            if(typeMessage){
                typeMessage.innerHTML = '';
            }
            if(priceMessage){
                priceMessage.innerHTML = '';
            }

            const errorMessages = [
                nameMessage, emailMessage, pswMessage, pswConfMessage,
                rNameMessage, addrMessage, imgMessage, descriptionMessage,
                vatMessage, typeMessage, priceMessage
            ];

            const inputs = [
                nameInput, emailInput, pswInput, pswConfInput,
                rNameInput, addrInput, imageInput, descriptionInput,
                vatInput, priceInput
            ];

            errorMessages.forEach(message => {
                if (message) {
                    message.innerHTML = '';
                    message.classList.remove('f-d-error-div');
                    message.style.display = 'none';
                }
            });

            inputs.forEach(input => {
                if (input) {
                    input.classList.remove('input-error');
                }
            });

            if (nameInput && nameInput.value.trim() === '') {
                event.preventDefault();
                nameMessage.innerHTML = 'Campo obbligatorio';
                nameMessage.classList.add('f-d-error-div');
                nameMessage.style.display = 'block';
                nameInput.classList.add('input-error');
                valid = false;
            }
            if (emailInput) {
                if (emailInput.value.trim() === '') {
                    event.preventDefault();
                    emailMessage.innerHTML = 'Campo obbligatorio';
                    emailMessage.classList.add('f-d-error-div');
                    emailMessage.style.display = 'block';
                    emailInput.classList.add('input-error');
                    valid = false;
                } else if (!(/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/.test(emailInput.value))) {
                    event.preventDefault();
                    emailMessage.innerHTML = 'Inserisci una email valida';
                    emailMessage.classList.add('f-d-error-div');
                    emailMessage.style.display = 'block';
                    emailInput.classList.add('input-error');
                    valid = false;
                }
            }
            if (pswInput && pswInput.value.trim() === '') {
                event.preventDefault();
                pswMessage.innerHTML = 'Campo obbligatorio';
                pswMessage.classList.add('f-d-error-div');
                pswMessage.style.display = 'block';
                pswInput.classList.add('input-error');
                valid = false;
            }
            if (pswConfInput && pswConfInput.value.trim() === '') {
                event.preventDefault();
                pswConfMessage.innerHTML = 'Campo obbligatorio';
                pswConfMessage.classList.add('f-d-error-div');
                pswConfMessage.style.display = 'block';
                pswConfInput.classList.add('input-error');
                valid = false;
            }
            if (pswInput && pswInput.value !== pswConfInput.value) {
                event.preventDefault();
                pswConfMessage.innerHTML = 'Le password non corrispondono';
                pswConfMessage.classList.add('f-d-error-div');
                pswConfMessage.style.display = 'block';
                pswConfInput.classList.add('input-error');
                valid = false;
            }
            if (rNameInput && rNameInput.value.trim() === '') {
                event.preventDefault();
                rNameMessage.innerHTML = 'Campo obbligatorio';
                rNameMessage.classList.add('f-d-error-div');
                rNameMessage.style.display = 'block';
                rNameInput.classList.add('input-error');
                valid = false;
            }
            if (addrInput && addrInput.value.trim() === '') {
                event.preventDefault();
                addrMessage.innerHTML = 'Campo obbligatorio';
                addrMessage.classList.add('f-d-error-div');
                addrMessage.style.display = 'block';
                addrInput.classList.add('input-error');
                valid = false;
            }
            if (imageInput && imageInput.files.length > 0) {
                const file = imageInput.files[0];
                const maxFileSize = 5 * 1024 * 1024; // 5 MB in byte
        
                if (file.size > maxFileSize) {
                    event.preventDefault();
                    imgMessage.innerHTML = 'Attenzione: il file selezionato eccede il limite di 5mb';
                    imgMessage.classList.add('f-d-error-div');
                    imgMessage.style.display = 'block';
                    imageInput.classList.add('input-error');
                    valid = false;
                }
            }
            if (window.location.href.includes('register') || window.location.href.includes('create')) {
                if (imageInput && imageInput.files.length === 0) {
                    event.preventDefault();
                    imgMessage.innerHTML = 'Campo obbligatorio';
                    imgMessage.classList.add('f-d-error-div');
                    imgMessage.style.display = 'block';
                    imageInput.classList.add('input-error');
                    valid = false;
                }
            }
            if (!window.location.href.includes('register')) {
                if (descriptionInput && descriptionInput.value.trim() === '') {
                    event.preventDefault();
                    descriptionMessage.innerHTML = 'Campo obbligatorio';
                    descriptionMessage.classList.add('f-d-error-div');
                    descriptionMessage.style.display = 'block';
                    descriptionInput.classList.add('input-error');
                    valid = false;
                }
            }
            if (vatInput && vatInput.value.length > 11) {
                event.preventDefault();
                vatMessage.innerHTML = 'La partita IVA deve essere di 11 caratteri';
                vatMessage.classList.add('f-d-error-div');
                vatMessage.style.display = 'block';
                vatInput.classList.add('input-error');
                valid = false;
            }
            if (vatInput && vatInput.value.trim() === '') {
                event.preventDefault();
                vatMessage.innerHTML = 'Campo obbligatorio';
                vatMessage.classList.add('f-d-error-div');
                vatMessage.style.display = 'block';
                vatInput.classList.add('input-error');
                valid = false;
            }
            if (checkboxes.length > 0) {
                let isChecked = false;
                checkboxes.forEach(function (checkbox) {
                    if (checkbox.checked) {
                        isChecked = true;
                    }
                });
                if (!isChecked) {
                    event.preventDefault();
                    typeMessage.innerHTML = 'Seleziona almeno una tipologia di cucina per il tuo ristorante';
                    typeMessage.classList.add('f-d-error-div');
                    typeMessage.style.display = 'block';
                    valid = false;
                }
            }
            if (priceInput && priceInput.value < 0) {
                event.preventDefault();
                priceMessage.innerHTML = 'Inserisci un prezzo positivo';
                priceMessage.classList.add('f-d-error-div');
                priceMessage.style.display = 'block';
                priceInput.classList.add('input-error');
                valid = false;
            }
            if (priceInput && priceInput.value.trim() === '') {
                event.preventDefault();
                priceMessage.innerHTML = 'Campo obbligatorio';
                priceMessage.classList.add('f-d-error-div');
                priceMessage.style.display = 'block';
                priceInput.classList.add('input-error');
                valid = false;
            }
        });
    });
}

export default ValidationFunction;
