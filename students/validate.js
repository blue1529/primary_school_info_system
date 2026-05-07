document.addEventListener('DOMContentLoaded', function () {

    // ── Inputs ──────────────────────────────────────────────────────────────
    const fnameInput  = document.getElementById('fname');
    const mnameInput  = document.getElementById('mname');
    const snameInput  = document.getElementById('sname');
    const pfnameInput = document.getElementById('pfname');
    const psnameInput = document.getElementById('psname');
    const emailInput  = document.getElementById('email');
    const phoneInput  = document.getElementById('phone');
    const enrollInput = document.getElementById('enroll');
    const dobInput    = document.getElementById('dob');

    const urlParams = new URLSearchParams(window.location.search);
    const error     = urlParams.get('error');
    const success   = urlParams.get('success');
    
    function attachError(input) {
        if (!input) return null;
        const wrapper = document.createElement('span');
        wrapper.style.cssText = 'position:relative;display:inline-block;';
        input.parentNode.insertBefore(wrapper, input);
        wrapper.appendChild(input);

        const div = document.createElement('div');
        div.style.cssText = [
            'position:absolute', 'top:100%', 'left:0',
            'color:red', 'font-size:11px', 'line-height:1.2',
            'white-space:nowrap', 'background:rgba(255,255,255,0.92)',
            'padding:1px 4px', 'border-radius:3px',
            'pointer-events:none', 'z-index:10'
        ].join(';');
        wrapper.appendChild(div);
        return div;
    }

    function setValidity(input, errorDiv, message) {
        errorDiv.textContent    = message;
        input.style.borderColor = message ? 'red' : '#66c2ff';
    }

    function attachTrim(input) {
        if (!input) return;
        input.addEventListener('blur', function () {
            this.value = this.value.trim();
        });
    }

    function nameValidator(input) {
        if (!input) return;
        attachTrim(input);
        const err = attachError(input);
        input.addEventListener('input', function () {
            const val = this.value.trim();
            setValidity(this, err,
                val && /[^a-zA-Z\s\-]/.test(val) ? 'Name must contain letters only' : ''
            );
        });
    }
    [fnameInput, mnameInput, snameInput, pfnameInput, psnameInput].forEach(nameValidator);

    if (phoneInput) {
        const phoneError = attachError(phoneInput);
        phoneInput.addEventListener('input', function () {
            const phone      = this.value;
            const digitsOnly = phone.replace(/[^0-9]/g, '');
            let msg = '';
            if (phone && !/^[0-9+\-\s]+$/.test(phone)) {
                msg = 'Use numbers, spaces, +, or - only';
            } else if (phone && digitsOnly.length > 0 && digitsOnly.length < 9) {
                msg = 'Phone number must have at least 9 digits';
            }
            setValidity(this, phoneError, msg);
        });
    }

    if (emailInput) {
        const emailError = attachError(emailInput);
        emailInput.addEventListener('input', function () {
            const email = this.value;
            setValidity(this, emailError,
                email && (!email.includes('@') || !email.includes('.'))
                    ? 'Enter a valid email address' : ''
            );
        });
    }

    if (enrollInput) {
        const enrollError = attachError(enrollInput);
        enrollInput.addEventListener('input', function () {
            const selected = new Date(this.value);
            const today    = new Date(); today.setHours(0, 0, 0, 0);
            setValidity(this, enrollError,
                selected > today ? 'Enrollment date cannot be in the future' : ''
            );
        });
    }

    if (dobInput) {
        const dobError = attachError(dobInput);
        dobInput.addEventListener('change', function () {
            const selected   = new Date(this.value);
            const today      = new Date(); today.setHours(0, 0, 0, 0);
            const minAgeDate = new Date();
            minAgeDate.setFullYear(today.getFullYear() - 3);
            let msg = '';
            if (selected > today)           msg = 'Date of birth cannot be in the future';
            else if (selected > minAgeDate) msg = 'Student must be at least 3 years old';
            setValidity(this, dobError, msg);
        });
    }
    
    const originalNextStep = window.nextStep;
    window.nextStep = function () {
        const step1     = document.getElementById('step1');
        const errorDivs = step1 ? step1.querySelectorAll('div[style*="position:absolute"]') : [];
        for (let div of errorDivs) {
            if (div.textContent.trim() !== '') {
                alert('Please fix the highlighted errors before proceeding.');
                return;
            }
        }
        if (typeof originalNextStep === 'function') originalNextStep();
    };

    
    const form = document.querySelector('form');
    if (form) {
        form.addEventListener('submit', function (e) {
            const step2     = document.getElementById('step2');
            const errorDivs = step2 ? step2.querySelectorAll('div[style*="position:absolute"]') : [];
            for (let div of errorDivs) {
                if (div.textContent.trim() !== '') {
                    e.preventDefault();
                    alert('Please fix the highlighted errors before submitting.');
                    return;
                }
            }
        });
    }

    if (success === '1') {
        alert('Student registered successfully!');
        window.history.replaceState({}, document.title, window.location.pathname);
    }

    if (error) {
        const messages = {
            'invalid_email'       : 'Invalid email address format!',
            'invalid_enroll_date' : 'Enrollment date cannot be in the future!',
            'invalid_dob'         : 'Date of birth cannot be in the future!',
            'too_young'           : 'Student must be at least 3 years old!',
            '1'                   : 'Registration failed! Please try again.',
        };
        alert(messages[error] || 'Registration failed! ' + error);
        window.history.replaceState({}, document.title, window.location.pathname);
    }

});