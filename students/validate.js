document.addEventListener('DOMContentLoaded', function () {
    const emailInput = document.getElementById('email');
    const phoneInput = document.getElementById('phone');
    const enrollInput = document.getElementById('enroll');
    const dobInput = document.getElementById('dob');
    const urlParams = new URLSearchParams(window.location.search);
    const error = urlParams.get('error');
    const success = urlParams.get('success');

    if (emailInput) {
        const emailError = document.createElement('div');
        emailError.style.color = 'red';
        emailError.style.fontSize = '12px';
        emailError.style.marginTop = '5px';
        emailInput.parentNode.insertBefore(emailError, emailInput.nextSibling);

        emailInput.addEventListener('input', function () {
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

        phoneInput.addEventListener('input', function () {
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

    if (enrollInput) {
        const enrollError = document.createElement('div');
        enrollError.style.color = 'red';
        enrollError.style.fontSize = '12px';
        enrollError.style.marginTop = '5px';
        enrollInput.parentNode.insertBefore(enrollError, enrollInput.nextSibling);

        enrollInput.addEventListener('input', function () {
            const selectedDate = new Date(this.value);
            const today = new Date();
            today.setHours(0, 0, 0, 0);

            if (selectedDate > today) {
                enrollError.textContent = 'Enrollment date cannot be in the future';
            } else {
                enrollError.textContent = '';
            }
        });
    }


    if (dobInput) {
        const dobError = document.createElement('div');
        dobError.style.color = 'red';
        dobError.style.fontSize = '12px';
        dobError.style.marginTop = '5px';
        dobInput.parentNode.insertBefore(dobError, dobInput.nextSibling);

        dobInput.addEventListener('change', function () {
            const selectedDate = new Date(this.value);
            const today = new Date();
            today.setHours(0, 0, 0, 0);
            const minAgeDate = new Date();
            minAgeDate.setFullYear(today.getFullYear() - 3);

            if (selectedDate > today) {
                dobError.textContent = 'Date of birth cannot be in the future';
            } else if (selectedDate > minAgeDate) {
                dobError.textContent = 'Student must be at least 3 years old';
            } else {
                dobError.textContent = '';
            }
        });
    }

    if (success === '1') {
        alert("Student registered successfully!");
        window.history.replaceState({}, document.title, window.location.pathname);
    }

    if (error) {
        let message = "";
        switch (error) {
            case "invalid_email":
                message = "Invalid email address format!";
                break;
            case "invalid_enroll_date":
                message = "Enrollment date cannot be in the future!";
                break;
            case "invalid_dob":
                message = "Date of birth cannot be in the future!";
                break;
            case "too_young":
                message = "Student must be at least 3 years old!";
                break;
            case "duplicate_phone":
                message = "This phone number is already registered!";
                break;
            case "missing_fields":
                message = "Please fill in all required fields!";
                break;
            case "1":
                message = "Registration failed! Please try again.";
                break;
            default:
                message = "Registration failed! " + error;
        }
        alert(message);
        window.history.replaceState({}, document.title, window.location.pathname);
    }
});