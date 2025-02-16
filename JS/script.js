// Function to toggle between forms
function toggleForm(formId) {
    const forms = ['login-form', 'signup-form', 'password-reset-form'];
    forms.forEach(id => {
        const form = document.getElementById(id);
        if (form) {
            form.style.display = formId === id ? 'block' : 'none';
        }
    });
}

// Event listener for toggling password visibility in login form
document.getElementById('login-show-password').addEventListener('change', (e) => {
    const passwordInput = document.querySelector('#login-form input[name="password"]');
    passwordInput.type = e.target.checked ? 'text' : 'password';
});

// Ensure other parts of the script only run if the respective elements are present

document.getElementById('show-signup')?.addEventListener('click', (e) => {
    e.preventDefault();
    toggleForm('signup-form');
});

document.getElementById('show-login')?.addEventListener('click', (e) => {
    e.preventDefault();
    toggleForm('login-form');
});

// Event listener for toggling password visibility in signup form
document.getElementById('signup-show-password')?.addEventListener('change', (e) => {
    const passwordInput = document.querySelector('#signup-form input[name="password"]');
    passwordInput.type = e.target.checked ? 'text' : 'password';
});

// Event listener for toggling password visibility in reset password form
document.getElementById('reset-show-password')?.addEventListener('change', (e) => {
    const passwordInput = document.querySelector('#password-reset-form input[name="password"]');
    passwordInput.type = e.target.checked ? 'text' : 'password';
});

// Event listener for opening the password reset form
document.getElementById('forgot-password')?.addEventListener('click', (e) => {
    e.preventDefault();
    toggleForm('password-reset-form');
});

// Show/Hide password
document.querySelectorAll('input[type="checkbox"]').forEach(checkbox => {
    checkbox.addEventListener('change', function () {
        const passwordField = this.closest('form').querySelector('input[type="password"]');
        passwordField.type = this.checked ? 'text' : 'password';
    });
});

// Switch between login, signup, and reset forms
document.getElementById('show-signup').addEventListener('click', function () {
    document.getElementById('login-form').style.display = 'none';
    document.getElementById('signup-form').style.display = 'block';
});
document.getElementById('show-login').addEventListener('click', function () {
    document.getElementById('signup-form').style.display = 'none';
    document.getElementById('login-form').style.display = 'block';
});

// Handle forgot password
document.getElementById('forgot-password').addEventListener('click', function () {
    document.getElementById('password-reset-form').style.display = 'block';
});
document.getElementById('cancel-reset').addEventListener('click', function () {
    document.getElementById('password-reset-form').style.display = 'none';
});

// Display success/error messages based on URL parameter
const urlParams = new URLSearchParams(window.location.search);
const status = urlParams.get('stat');
const formMessage = document.getElementById('form-message');
if (status) {
    if (status.includes('success')) {
        formMessage.textContent = decodeURIComponent(status.replace(/_/g, ' '));
        formMessage.classList.add('success');
    } else {
        formMessage.textContent = decodeURIComponent(status.replace(/_/g, ' '));
        formMessage.classList.add('error');
    }
}

document.addEventListener("DOMContentLoaded", function () {
    setTimeout(function () {
        let messages = document.querySelectorAll(".message");
        messages.forEach((msg) => {
            msg.style.opacity = "0"; // Fade out effect
            setTimeout(() => msg.style.display = "none", 500); // Hide completely after fade out
        });
    }, 2000); // 2 seconds

    // Remove messages from URL after refreshing
    if (window.history.replaceState) {
        setTimeout(() => {
            const url = new URL(window.location);
            url.searchParams.delete("stat"); // Remove 'stat' parameter
            window.history.replaceState(null, null, url);
        }, 2000);
    }
});

document.addEventListener("DOMContentLoaded", function () {
    const formMessage = document.getElementById('form-message');
    const urlParams = new URLSearchParams(window.location.search);
    const status = urlParams.get('stat');

    // Show message based on URL status (success or error)
    if (status && formMessage) {
        formMessage.textContent = decodeURIComponent(status.replace(/_/g, ' '));
        formMessage.classList.add(status.includes('success') ? 'success' : 'error');
    }

    // Create close button for form message
    const closeButton = document.createElement('button');
    closeButton.textContent = '×'; // Unicode for the close symbol
    closeButton.classList.add('close-btn');
    formMessage.appendChild(closeButton);

    // Close the message when the button is clicked
    closeButton.addEventListener('click', () => {
        formMessage.style.opacity = '0'; // Fade out effect
        setTimeout(() => {
            formMessage.style.display = 'none'; // Hide completely after fade-out
        }, 500); // Delay to match fade-out duration
    });

    // Handle message disappearance and URL cleanup
    setTimeout(function () {
        if (formMessage && formMessage.style.display !== 'none') {
            formMessage.style.transition = "opacity 0.5s ease-out"; // Make sure fade-out is smooth
            formMessage.style.opacity = "0"; // Apply fade-out effect

            // After fade-out, remove the message
            setTimeout(() => {
                formMessage.style.display = "none"; // Hide message completely
            }, 500); // Delay matches the fade-out duration
        }

        // Remove the 'stat' parameter from the URL after 2 seconds
        if (window.history.replaceState) {
            const url = new URL(window.location);
            url.searchParams.delete("stat"); // Remove 'stat' parameter
            window.history.replaceState(null, null, url); // Update the URL without reloading
        }
    }, 1000); // 1 seconds delay before starting the fade and URL cleanup
});


// Event listener for canceling the password reset process
document.getElementById('cancel-reset')?.addEventListener('click', (e) => {
    e.preventDefault();
    toggleForm('login-form');
});
