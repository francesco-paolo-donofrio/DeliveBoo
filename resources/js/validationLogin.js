//** funz per validazione prima di submit di un form */
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

            if(emailMessage){
                emailMessage.innerHTML = '';
            }
            if(pswMessage){
                pswMessage.innerHTML = '';
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
        });
    });
}

export default ValidationFunction;
