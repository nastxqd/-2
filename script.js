document.addEventListener("DOMContentLoaded", function() {
    const loginForm = document.getElementById("login-form");

    loginForm && loginForm.addEventListener("submit", function(event) {
        event.preventDefault();
        alert("Функция авторизации ещё не реализована.");
    });
});
