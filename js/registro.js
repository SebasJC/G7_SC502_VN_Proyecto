document.addEventListener("DOMContentLoaded", function () {
    const form = document.querySelector("form");
    const passwordInput = document.getElementById('password');
    const confirmInput = document.getElementById('confirm_password');

    // Mostrar/Ocultar contraseñas
    document.getElementById("togglePassword").addEventListener("change", function () {
        const type = this.checked ? "text" : "password";
        passwordInput.type = type;
        confirmInput.type = type;
    });

    // Validación al enviar
    form.addEventListener("submit", function (e) {
        if (passwordInput.value !== confirmInput.value) {
            e.preventDefault();
            confirmInput.classList.add("is-invalid");
        } else {
            confirmInput.classList.remove("is-invalid");
        }
    });
});
