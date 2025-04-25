$(function () {
    $("#btnPagar").on("click", function () {
        if (confirm('¿Confirmar compra de todos los items en el carrito?')) {
            fetch("bdd/transferirCarrito.php", {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json'
                },
                body: JSON.stringify({ action: 'pagar' })
            })
            .then(response => response.json())
            .then(data => {
                if (data.status == "00") {
                    alert(data.message);
                    location.reload(); // Recargar para ver carrito vacío
                } else {
                    alert(data.message || "Error al procesar la compra");
                }
            })
            .catch(error => {
                alert("Error de conexión: " + error.message);
            });
        }
    });
});