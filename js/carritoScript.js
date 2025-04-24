document.addEventListener("DOMContentLoaded", () => {
    const carritoList = document.getElementById("carritoList");
    const totalList = document.getElementById("totalList");
    const valorTotal = document.getElementById("total");
    let total = 0;


    function loadCart() {
        fetch("bdd/carritoController.php")
            .then(response => response.json())
            .then(data => {
                carritoList.innerHTML = "";
                data.forEach(carrito => {
                    const li = document.createElement("div");
                    li.className = "productos";
                    li.innerHTML = `
                            <h4 class="producto-titulo">${carrito.nombre}</h4>
                            <div class="producto-item">
                                <img src="${carrito.imagen}" alt="Bicicleta 1" id="imgcarrito">
                                <div>
                                    <p class="specs-title">Cantidad</p>
                                    <div class="botones">
                                        <button class="boton">-</button>
                                            <p>1</p>
                                        <button class="boton">+</button>
                                    </div>
                                </div>
                                <div>
                                    <p>Precio</p>
                                        <div class="botones">
                                            <p>₡${carrito.precio}</p>
                                        </div>
                                </div>
                                <div>
                                    <button type="button" class="btn btn-outline-danger" id="${carrito.id}">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
                                        <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5m2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5m3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0z"></path>
                                        <path d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4zM2.5 3h11V2h-11z"></path>
                                        </svg>
                                        Eliminar
                                    </button>
                                </div>
                            </div>
                    `;
                    carritoList.appendChild(li);
                });
            });
    }

    function loadTotal() {
        fetch("bdd/carritoController.php")
            .then(response => response.json())
            .then(data => {
                totalList.innerHTML = "";
                data.forEach(carrito => {
                    total = total + parseInt(carrito.precio); 
                    const li = document.createElement("div");
                    li.className = "producto";
                    li.innerHTML = `
                            <div>
                            <h6 style="margin-bottom: auto;">${carrito.nombre}</h6>
                            <span>₡${carrito.precio}</span>
                            </div>
                            <br>
                    `;
                    
                    totalList.appendChild(li);
                    
                });

                const to = document.createElement("div");
                    to.innerHTML = `
                            <span>Subtotal: </span>
                            <span style="margin-left: 47%;" id="total">₡${total}</span>
                    `;
                    valorTotal.appendChild(to);
            });
                    
    }
    

    function sendRequest(action, data) {
        fetch("bdd/carritoController.php", {
            method: "POST",
            headers: { "Content-Type": "application/json" },
            body: JSON.stringify({ action, ...data })
        }).then(loadCart, loadTotal);
    }

    carritoList.addEventListener("click", event => {
        if (event.target.classList.contains("btn-outline-danger")) {
            sendRequest("delete", {  id: event.target.id });
        } 
    });
    
    loadCart();
    loadTotal()



    
});