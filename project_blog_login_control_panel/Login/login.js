function loginAsGuest() {
    window.location.href = '../Blog/blog.html';
}

document.getElementById('loginForm').addEventListener('submit', function(event) {
    const username = document.getElementById('username').value;
    const password = document.getElementById('password').value;

    if (username === '' || password === '') {
        alert('Por favor, completa todos los campos.');
        event.preventDefault();
    }
});
