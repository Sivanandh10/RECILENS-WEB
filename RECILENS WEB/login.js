document.getElementById('login-form').addEventListener('submit', function (e) {
    e.preventDefault();

    const email = document.getElementById('email').value;
    const password = document.getElementById('password').value;
    const formData = new FormData();
    formData.append('email', email);
    formData.append('password', password);
    const emailError = document.getElementById('email-error');
    const passwordError = document.getElementById('password-error');
    const errorMessage = document.getElementById('error-message');
    emailError.style.display = 'none';
    passwordError.style.display = 'none';
    errorMessage.style.display = 'none';
    fetch('login.php', {
        method: 'POST',
        body: formData
    })
    .then(response => response.json())
    .then(data => {
        if (data.success) {
            const successMessage = document.getElementById('success-message');
            successMessage.textContent = `Welcome, ${data.first_name}!`;
            successMessage.style.display = 'block';
            setTimeout(() => {
                window.location.href = 'home.php';
            }, 3000); 
        } else {
            if (data.error === 'email') {
                emailError.textContent = 'The e-mail is not found';
                emailError.style.display = 'block';
                emailError.classList.add('error-popup');
            } else if (data.error === 'password') {
                passwordError.textContent = 'Email or password does not match';
                passwordError.style.display = 'block';
                passwordError.classList.add('error-popup');
            } else if (data.error === 'connection') {
                errorMessage.textContent = 'Connection failed: ' + data.message;
                errorMessage.style.display = 'block';
            }
        }
    })
    .catch(error => {
        console.error('Error:', error);
        errorMessage.textContent = 'An error occurred. Please try again later.';
        errorMessage.style.display = 'block';
    });
});

function togglePassword() {
    const passwordField = document.getElementById('password');
    const eyeIcon = document.getElementById('eye');
    if (passwordField.type === 'password') {
        passwordField.type = 'text';
        eyeIcon.classList.add('fa-eye-slash');
    } else {
        passwordField.type = 'password';
        eyeIcon.classList.remove('fa-eye-slash');
    }
}
document.getElementById('login-form').addEventListener('submit', function (e) {
    e.preventDefault();
    const email = document.getElementById('email').value;
    const password = document.getElementById('password').value;
    fetch('login.php', {
        method: 'POST',
        headers: { 'Content-Type': 'application/x-www-form-urlencoded' },
        body: `email=${encodeURIComponent(email)}&password=${encodeURIComponent(password)}`
    })
    .then(response => response.json())
    .then(data => {
        const emailError = document.getElementById('email-error');
        const passwordError = document.getElementById('password-error');
        const successMessage = document.getElementById('success-message');
        const errorMessage = document.getElementById('error-message');
        emailError.style.display = 'none';
        passwordError.style.display = 'none';
        successMessage.style.display = 'none';
        errorMessage.style.display = 'none';
        if (data.success) {
            successMessage.textContent = `Welcome, ${data.first_name}!`;
            successMessage.style.display = 'block';
            setTimeout(() => {
                window.location.href = 'home.php'; 
            }, 3000); 
        } else {
            if (data.error === 'email') {
                errorMessage.textContent = 'The e-mail is not found';
            } else if (data.error === 'password') {
                errorMessage.textContent = 'Email or password does not match';
            }

            errorMessage.style.display = 'block';
        }
    })
    .catch(error => {
        console.error('Error:', error);
    });
});

function togglePassword() {
    const passwordField = document.getElementById('password');
    const eyeIcon = document.getElementById('eye');

    if (passwordField.type === 'password') {
        passwordField.type = 'text';
        eyeIcon.classList.add('fa-eye-slash');
    } else {
        passwordField.type = 'password';
        eyeIcon.classList.remove('fa-eye-slash');
    }
}
window.addEventListener('load', function() {
    document.body.classList.remove('loading');
    document.getElementById('loader').style.display = 'none';
});
