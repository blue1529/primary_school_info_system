
// Get all step divs and progress indicators
const steps = document.querySelectorAll('.step');
const progressSteps = document.querySelectorAll('.progress-step');
let currentStep = 0;  // 0-based index

// Helper: show only current step and update progress bar
function showStep(index) {
    // Hide all steps
    steps.forEach((step, i) => {
        step.classList.toggle('active', i === index);
    });
    // Update progress bar active class
    progressSteps.forEach((step, i) => {
        step.classList.toggle('active', i === index);
    });
    currentStep = index;
}

// Validate current step's required fields (uses HTML5 validation + custom checks)
function validateCurrentStep() {
    const currentStepDiv = steps[currentStep];
    const requiredFields = currentStepDiv.querySelectorAll('[required]');
    let isValid = true;

    // Remove any existing custom error messages
    currentStepDiv.querySelectorAll('.error-message').forEach(el => el.remove());

    for (let field of requiredFields) {
        // Check HTML5 validation (built-in)
        if (!field.checkValidity()) {
            field.reportValidity();  // shows browser's built-in message
            isValid = false;
            break;
        }
        // Additional custom check for empty value (belt and braces)
        if (!field.value.trim()) {
            const errorSpan = document.createElement('span');
            errorSpan.className = 'error-message';
            errorSpan.innerText = `${field.previousElementSibling?.innerText.replace('*','') || 'This field'} is required.`;
            field.parentNode.insertBefore(errorSpan, field.nextSibling);
            isValid = false;
            break;
        }
    }
    return isValid;
}

// Next button logic
function nextStep() {
    if (validateCurrentStep()) {
        if (currentStep < steps.length - 1) {
            showStep(currentStep + 1);
        }
    }
}

// Previous button logic
function prevStep() {
    if (currentStep > 0) {
        showStep(currentStep - 1);
    }
}

// Attach event listeners to all next/prev buttons
document.querySelectorAll('.next-btn').forEach(btn => {
    btn.addEventListener('click', nextStep);
});
document.querySelectorAll('.prev-btn').forEach(btn => {
    btn.addEventListener('click', prevStep);
});

// Final submit: validate all steps before actual submission (optional, because final step already validated)
const form = document.getElementById('multiStepForm');
form.addEventListener('submit', function(e) {
    // Validate all steps before allowing submit
    let allValid = true;
    for (let i = 0; i < steps.length; i++) {
        // Temporarily go to each step and validate its required fields
        const stepDiv = steps[i];
        const requiredFields = stepDiv.querySelectorAll('[required]');
        for (let field of requiredFields) {
            if (!field.value.trim()) {
                alert(`Please fill in all required fields in section ${i+1}: ${field.previousElementSibling?.innerText || 'field'}`);
                showStep(i);  // go to the step with error
                allValid = false;
                break;
            }
            if (!field.checkValidity()) {
                field.reportValidity();
                showStep(i);
                allValid = false;
                break;
            }
        }
        if (!allValid) break;
    }
    if (!allValid) {
        e.preventDefault();  // stop submission
    }
    // if allValid, form submits normally to register.php
});
