document.addEventListener('DOMContentLoaded', function() {
    const emailInput = document.getElementById('email');
    const phoneInput = document.getElementById('phone');
    
    if (emailInput) {
        const emailError = document.createElement('div');
        emailError.style.color = 'red';
        emailError.style.fontSize = '12px';
        emailError.style.marginTop = '5px';
        emailInput.parentNode.insertBefore(emailError, emailInput.nextSibling);
        
        emailInput.addEventListener('input', function() {
            const email = this.value;
            if (email && (!email.includes('@') || !email.includes('.'))) {
                emailError.textContent = 'Enter a valid email address';
            } else {
                emailError.textContent = '';
            }
        });
    }
    
    if (phoneInput) {
        const phoneError = document.createElement('div');
        phoneError.style.color = 'red';
        phoneError.style.fontSize = '12px';
        phoneError.style.marginTop = '5px';
        phoneInput.parentNode.insertBefore(phoneError, phoneInput.nextSibling);
        
        phoneInput.addEventListener('input', function() {
            const phone = this.value;
            const digitsOnly = phone.replace(/[^0-9]/g, '');
            
            if (phone && !phone.match(/^[0-9+\-\s]+$/)) {
                phoneError.textContent = 'Use numbers, spaces, +, or - only';
            } else if (phone && digitsOnly.length > 0 && digitsOnly.length < 9) {
                phoneError.textContent = 'Phone number must have at least 9 digits';
            } else {
                phoneError.textContent = '';
            }
        });
    }
});