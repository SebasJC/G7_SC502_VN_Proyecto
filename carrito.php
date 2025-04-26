<?php
session_start();

if (!isset($_SESSION['usuario'])) {
    header("Location: login.php");
    exit();
}

include 'bdd/conexion.php';

$query = "SELECT * FROM carrito";
$resultado = $conn->query($query);
$carrito_vacio = ($resultado->num_rows == 0);
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Carrito - PuraCleta</title>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="js/jquery-3.7.1.min.js"></script>
    <script src="js/carritoScript.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="css/stylelogin.css" rel="stylesheet">

    <style>
    h1 {
        color: #3347db;
        margin: auto;
        padding: 0px;

        
    }

    .body {
    min-height: 0px;
    margin: auto;
    display: flex;

    }

    
  </style>
</head>

<body>

    <header class="py-3 border-bottom">
        <div class="container d-flex justify-content-between align-items-center">
            <h1 class="h4 m-0">PuraCleta</h1>
            <nav>
                <a href="index.php" class="me-3 text-decoration-none">Inicio</a>
                <a href="catalogo.php" class="me-3 text-decoration-none">Catálogo</a>
                <a href="carrito.php" class="me-3 text-decoration-none">Carrito</a>
                <a href="compras.php" class="me-3 text-decoration-none">Mis Compras</a>
                <a href="logout.php" class="me-3 text-decoration-none">Cerrar sesión</a>
            </nav>
        </div>
    </header>
    <main class="container py-5">
        <h2>Tu carrito</h2>
        <?php if ($carrito_vacio): ?>
        <p>No hay productos en el carrito.</p>
        <?php else: ?>
        <div class="wrapper">
            <div class="wrapper-productos" id="carritoList">
        </div>
            <div class="carrito">
                <h4 style="text-align: center;">Su compra final</h4>
                <div id="totalList"></div>
                

                <div id="total"></div>
                <button class="boton-pagar" id="btnPagar">Pagar</button>
            </div>
        </div>
    <?php endif; ?>
    </main>

    <footer class="py-3 border-top text-center">
        <small>&copy; 2025 PuraCleta - Promoviendo la salud en Costa Rica</small>
    </footer>
    <script src="js/pagarCarrito.js"></script>
</body>

</html>