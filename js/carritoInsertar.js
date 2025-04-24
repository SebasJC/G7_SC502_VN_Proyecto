
$(function () {

    $("#comprar").on("click", function () {
        fetch("bdd/insertarCarrito.php", {
            method: 'post',
            headers: {
                'Content-Type': 'application/json'
            },
            body: JSON.stringify({
                nombre: $("#nombre").text(),
                precio: $("#precio").text(),
                imagen: $("#imagen").attr("src")
            })
        }).then(response => response.json())
            .then(data => {
                if (data.status == "00") {
                    alert("Se ha agregado su compra al carrito");
                } else {
                    alert("Ocurrio un error agregando la compra");
                }
            });



    })

});


