document.addEventListener('DOMContentLoaded', () => {
    const subscriptionSelect = document.getElementById('subscription');
    const paymentDetails = document.getElementById('payment-details');
    const countrySelect = document.getElementById('country');
    const addressFields = document.getElementById('address-fields');
    const emailField = document.getElementById('email');
    const emailError = document.getElementById('email-error');

    subscriptionSelect.addEventListener('change', () => {
        if (subscriptionSelect.value === 'Free') {
            paymentDetails.style.display = 'none';
        } else {
            paymentDetails.style.display = 'block';
        }
    });

    countrySelect.addEventListener('change', () => {
        // Logic to show/hide address fields based on country selection
        const country = countrySelect.value;
        // For example purposes
        if (country !== '') {
            addressFields.style.display = 'block';
        } else {
            addressFields.style.display = 'none';
        }
    });

    emailField.addEventListener('input', () => {
        const emailValue = emailField.value;
        if (!validateEmail(emailValue)) {
            emailError.textContent = 'Invalid email format.';
        } else {
            emailError.textContent = '';
        }
    });

    const validateEmail = (email) => {
        const re = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
        return re.test(String(email).toLowerCase());
    };
});
