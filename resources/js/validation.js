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

            if (nameInput && nameInput.value.trim() === '') {
                event.preventDefault();
                nameMessage.innerHTML = 'Campo obbligatorio';
            }
            if (emailInput) {
                if (emailInput.value.trim() === '') {
                    event.preventDefault();
                    emailMessage.innerHTML = 'Campo obbligatorio';
                } else if (!(/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/.test(emailInput.value))) {
                    event.preventDefault();
                    emailMessage.innerHTML = 'Inserisci una email valida';
                }
            }
            if (pswInput && pswInput.value.trim() === '') {
                event.preventDefault();
                pswMessage.innerHTML = 'Campo obbligatorio';
            }
            if (pswConfInput && pswConfInput.value.trim() === '') {
                event.preventDefault();
                pswConfMessage.innerHTML = 'Campo obbligatorio';
            }
            if (pswInput && pswInput.value !== pswConfInput.value) {
                event.preventDefault();
                pswConfMessage.innerHTML = 'Le password non corrispondono';
            }
            if (rNameInput && rNameInput.value.trim() === '') {
                event.preventDefault();
                rNameMessage.innerHTML = 'Campo obbligatorio';
            }
            if (addrInput && addrInput.value.trim() === '') {
                event.preventDefault();
                addrMessage.innerHTML = 'Campo obbligatorio';
            }
            if (imageInput && imageInput.files.length > 0) {
                const file = imageInput.files[0];
                const maxFileSize = 5 * 1024 * 1024; // 5 MB in byte
        
                if (file.size > maxFileSize) {
                    event.preventDefault();
                    imgMessage.innerHTML = 'Attenzione: il file selezionato eccede il limite di 5mb';
                }
            }
            if(!window.location.href.includes('register')){
                if (imageInput && imageInput.files.length === 0) {
                    event.preventDefault();
                    imgMessage.innerHTML = 'Campo obbligatorio';
                }
            }
            if(!window.location.href.includes('register')){
                if (descriptionInput && descriptionInput.value.trim() === '') {
                    event.preventDefault();
                    descriptionMessage.innerHTML = 'Campo obbligatorio';
                }
            }
            if (vatInput && vatInput.value.length > 20) {
                event.preventDefault();
                vatMessage.innerHTML = 'La partita IVA deve avere massimo 20 caratteri';
            }
            if (vatInput && vatInput.value.trim() === '') {
                event.preventDefault();
                vatMessage.innerHTML = 'Campo obbligatorio';
            }
            if (checkboxes.lenght > 0) {
                let isChecked = false;
                checkboxes.forEach(function (checkbox) {
                    if (checkbox.checked) {
                        isChecked = true;
                    }
                });
                if (!isChecked) {
                    event.preventDefault();
                    typeMessage.innerHTML = 'Seleziona almeno una tipologia di cucina per il tuo ristorante';
                }
            }
            if (priceInput && priceInput.value < 0) {
                event.preventDefault();
                priceMessage.innerHTML = 'Devi mettere un prezzo positivo';
            }
            if (priceInput && priceInput.value.trim() === '') {
                event.preventDefault();
                priceMessage.innerHTML = 'Campo obbligatorio';
            }

            // if (!valid) {
            //     event.preventDefault();
            // }
            // console.log(valid);
        });
    });
}

export default ValidationFunction;
