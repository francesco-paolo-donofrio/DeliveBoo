function ValidationFunction() {
    document.addEventListener('DOMContentLoaded', function() {

        // Prendo il bottone di invio form
        const submitBtn = document.getElementById('submitBtn');
    
        // Prendo i campi input
        const emailInput = document.getElementById('email');
        const pswInput = document.getElementById('password');
        
        // Scrivo i messaggi di errore / FE VALIDATION
        const emailMessage = document.getElementById('emailMessage');
        const pswMessage = document.getElementById('pswMessage');
    
        submitBtn.addEventListener('click', function (event) {

            // Resetta i messaggi di errore e le classi di errore
            if(emailMessage){
                emailMessage.innerHTML = '';
                emailMessage.classList.remove('f-d-error-div');
                emailMessage.style.display = 'none';
            }
            if(pswMessage){
                pswMessage.innerHTML = '';
                pswMessage.classList.remove('f-d-error-div');
                pswMessage.style.display = 'none';
            }
            if(emailInput){
                emailInput.classList.remove('input-error');
            }
            if(pswInput){
                pswInput.classList.remove('input-error');
            }

            // Validazione campi
            if (emailInput) {
                if (emailInput.value.trim() === '') {
                    event.preventDefault();
                    emailMessage.innerHTML = 'Campo obbligatorio';
                    emailMessage.classList.add('f-d-error-div');
                    emailMessage.style.display = 'block';
                    emailInput.classList.add('input-error');
                } else if (!(/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/.test(emailInput.value))) {
                    event.preventDefault();
                    emailMessage.innerHTML = 'Inserisci una email valida';
                    emailMessage.classList.add('f-d-error-div');
                    emailMessage.style.display = 'block';
                    emailInput.classList.add('input-error');
                }
            }
            if (pswInput && pswInput.value.trim() === '') {
                event.preventDefault();
                pswMessage.innerHTML = 'Campo obbligatorio';
                pswMessage.classList.add('f-d-error-div');
                pswMessage.style.display = 'block';
                pswInput.classList.add('input-error');
            }
        });
    });
}

export default ValidationFunction;
