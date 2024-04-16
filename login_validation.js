document.getElementById('loginForm').addEventListener('submit', function(event) {
    var email = document.getElementById('email').value;
    var password = document.getElementById('password').value;
    var valid = true;
    
    if (!email || !password) {
        document.getElementById('loginError').textContent = 'Both email and password are required.';
        valid = false;
    }

    if (!valid) {
        event.preventDefault();
    }
});
