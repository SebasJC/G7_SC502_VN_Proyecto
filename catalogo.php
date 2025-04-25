<?php
session_start();

if (!isset($_SESSION['usuario'])) {
    header("Location: login.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Catálogo de Bicicletas - PuraCleta</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="css/stylelogin.css" rel="stylesheet">
</head>
<body>

  <!-- Header -->
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

  <!-- Body -->
  <main class="container py-5">
    <h2 class="mb-4">Catálogo de Bicicletas</h2>
    <div class="row">
      <div class="col-md-4 mb-4">
        <div class="card">
          <img src="imagenes/catalogoUrbano.png" class="card-img-top" alt="Bicicleta 1">
          <div class="card-body">
            <h5 class="card-title">Bicicleta Urbana</h5>
            <p class="card-text">Ideal para desplazamientos diarios en la ciudad.</p>
            <a href="detalle.php?id=2" class="btn btn-outline-primary">Ver detalles</a>
          </div>
        </div>
      </div>
      <div class="col-md-4 mb-4">
        <div class="card">
          <img src="imagenes/catalogoMontana.png" class="card-img-top" alt="Bicicleta 2">
          <div class="card-body">
            <h5 class="card-title">Bicicleta de Montaña</h5>
            <p class="card-text">Perfecta para rutas al aire libre y terrenos irregulares.</p>
            <a href="detalle.php?id=1>" class="btn btn-outline-primary">Ver detalles</a>
          </div>
        </div>
      </div>
      <div class="col-md-4 mb-4">
        <div class="card">
          <img src="imagenes/catalogoRuta.png" class="card-img-top" alt="Bicicleta 2">
          <div class="card-body">
            <h5 class="card-title">Bicicleta de ruta</h5>
            <p class="card-text">Perfecta para competencias en áreas urbanas.</p>
            <a href="detalle.php?id=3" class="btn btn-outline-primary">Ver detalles</a>
          </div>
        </div>
      </div>
    </div>
  </main>

  <!-- Footer -->
  <footer class="py-3 border-top text-center">
  <small>&copy; 2025 PuraCleta - Promoviendo la salud en Costa Rica</small>
  </footer>
</body>
</html>