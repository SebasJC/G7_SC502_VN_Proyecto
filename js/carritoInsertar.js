$(document).ready(function () {
    $('#comprar').click(function () {
      const nombre = $('#nombre').text();
      const precio = $('#precio').text();
      const imagen = $('#imagen').attr('src');
  
      $.ajax({
        url: 'bdd/insertarCarrito.php',
        method: 'POST',
        contentType: 'application/json',
        data: JSON.stringify({ nombre, precio, imagen }),
        success: function (response) {
          alert(response.message);
          if (response.status === "00") {
            window.location.href = "carrito.php";
          }
        },
        error: function () {
          alert("Error al intentar agregar al carrito.");
        }
      });
    });
  });