<?php
session_start();
if (!isset($_SESSION['usuario'])) {
    header("Location: login.php");
    exit();
}
include 'bdd/conexion.php';

$query = "SELECT * FROM bicicletas";
$resultado = $conn->query($query);
?>

<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Pura Cleta CR - Catálogo</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="css/stylelogin.css">
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

  <!-- Body 
  <main class="container py-5">
    <div class="text-center">
      <h2 class="mb-4">Bienvenido a PuraCleta</h2>
      <p class="lead">Compra o renta bicicletas y empieza un estilo de vida saludable.</p>
      <a href="catalogo.html" class="btn btn-primary mt-3">Explorar Catálogo</a>
    </div>
  </main>-->

  <div class="container my-5">
    <h1 class="text-center mb-4">Catálogo de Bicicletas - Pura Cleta CR</h1>
    <div class="row">
      <?php while ($row = $resultado->fetch_assoc()): ?>
        <div class="col-md-4 mb-4">
          <div class="card h-100">
            <img src="<?= htmlspecialchars($row['imagen']) ?>" class="card-img-top" alt="<?= $row['nombre'] ?>">
            <div class="card-body d-flex flex-column justify-content-between">
              <h5 class="card-title"><?= htmlspecialchars($row['nombre']) ?></h5>
              <p class="card-text"><?= htmlspecialchars($row['descripcion']) ?></p>
              <p class="fw-bold">₡<?= number_format($row['precio'], 2) ?></p>
              <a href="detalle.php?id=<?= $row['id'] ?>" class="btn btn-primary mt-auto">Ver detalles</a>
            </div>
          </div>
        </div>
      <?php endwhile; ?>

    </div>
  </div>

  <!-- Footer -->
  <footer class="py-3 border-top text-center">
  <small>&copy; 2025 PuraCleta - Promoviendo la salud en Costa Rica</small>
  </footer>
</body>
</html>