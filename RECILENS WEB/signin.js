function togglePasswordVisibility(inputId) {
    const inputField = document.getElementById(inputId);
    const icon = inputId === 'password' ? document.getElementById('toggle-password') : document.getElementById('toggle-confirm-password');

    if (inputField.type === "password") {
        inputField.type = "text";
        icon.classList.remove('fa-eye');
        icon.classList.add('fa-eye-slash');
    } else {
        inputField.type = "password";
        icon.classList.remove('fa-eye-slash');
        icon.classList.add('fa-eye');
    }
}
function validateForm() {
    const password = document.getElementById("password").value;
    const confirmPassword = document.getElementById("confirm-password").value;

    if (password !== confirmPassword) {
        alert("Passwords do not match!");
        return false;
    } else {
        alert("Sign Up Successful!");
        return true;
    }
}
window.addEventListener('load', function() {
    document.body.classList.remove('loading');
    document.getElementById('loader').style.display = 'none';
});

