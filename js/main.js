document.addEventListener('DOMContentLoaded', () => {
    const sidebar = document.getElementById('sidebar');
    const toggleButton = document.getElementById('toggle-btn');
    const steps = document.querySelectorAll('.step');
    const nextBtn = document.getElementById('nextBtn');
    const prevBtn = document.getElementById('prevBtn');
    const submitBtn = document.getElementById('submitBtn');
    const termsCheckbox = document.getElementById('terms');
    const accountModal = document.getElementById('accountModal');
    let currentStep = 0;

    // Toggle sidebar visibility
    toggleButton.addEventListener('click', () => {
        const isOpen = sidebar.classList.toggle('open');
        toggleButton.classList.toggle('open', isOpen);
    });

    // Enable submit button based on terms checkbox
    termsCheckbox.addEventListener('change', () => {
        submitBtn.disabled = !termsCheckbox.checked;
    });

    // Show or hide modal
    function toggleModal(isVisible) {
        accountModal.classList.toggle('hidden', !isVisible);
    }

    // Show the current step
    function showStep(step) {
        steps.forEach((s, index) => s.classList.toggle('hidden', index !== step));
        updateButtonVisibility(step);
    }

    // Update the visibility of navigation buttons
    function updateButtonVisibility(step) {
        prevBtn.classList.toggle('hidden', step === 0);
        nextBtn.classList.toggle('hidden', step === steps.length - 1);
        submitBtn.classList.toggle('hidden', step !== steps.length - 1);
    }

    // Handle next button click
    nextBtn.addEventListener('click', () => {
        if (validateCurrentStep()) {
            currentStep++;
            showStep(currentStep);
        }
    });

    // Handle previous button click
    prevBtn.addEventListener('click', () => {
        if (currentStep > 0) {
            currentStep--;
            showStep(currentStep);
        }
    });

    // Validate inputs in the current step
    function validateCurrentStep() {
        const inputs = steps[currentStep].querySelectorAll('input, select');
        const valid = [...inputs].every(input => {
            const isValid = input.checkValidity();
            input.classList.toggle('border-red-500', !isValid);
            return isValid;
        });

        if (!valid) {
            Swal.fire('Error', 'Mohon lengkapi semua data sebelum melanjutkan.', 'error');
        }

        return valid;
    }

    // Initialize the display
    showStep(currentStep);
});
