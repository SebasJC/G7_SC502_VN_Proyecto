<?php
include 'bdd/conexion.php';

if (!isset($_GET['id'])) {
    echo "ID de bicicleta no especificado.";
    exit;
}

$id = intval($_GET['id']);
$query = "SELECT * FROM bicicletas WHERE id = $id";
$resultado = $conn->query($query);

if ($resultado->num_rows == 0) {
    echo "Bicicleta no encontrada.";
    exit;
}

$bicicleta = $resultado->fetch_assoc();
?>

<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Detalles de Bicicleta - PuraCleta</title>
  
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="css/stylelogin.css" rel="stylesheet">
  <style>

    .mb-4{
      background-color:rgb(0, 0, 0);
      border: none;
      
    }

    .mb-4 text{
      background-color:rgb(255, 255, 255);
      border: none;
      
    } 

    .mb-4:hover {
      background-color:rgb(14, 27, 99);
    }

    .card-title {
      color: #3347db;
      font-weight: 600;
    }

    .precio {
      color:rgb(0, 0, 0);
      font-weight: 600;
    }




  </style>
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
        <a href="compras.php" class="text-decoration-none">Mis Compras</a>
      </nav>
    </div>
  </header>

  <!-- Body -->
  <main class="container py-5">
    <div class="row">
      <div class="col-md-6">
      <img id="imagen" src="<?= htmlspecialchars($bicicleta['imagen']) ?>" class="img-fluid rounded-start" alt="<?= htmlspecialchars($bicicleta['nombre']) ?>">
      </div>
      <div class="col-md-6">
      <h3 id="nombre" class="card-title"><?= htmlspecialchars($bicicleta['nombre']) ?></h3>
            <p class="card-text"><?= htmlspecialchars($bicicleta['descripcion']) ?></p>
            <div style="display: flex;"><h5>₡</h5><h5 id="precio" class="precio"><?= htmlspecialchars($bicicleta['precio']) ?></h5></div>
        <div class="d-flex gap-2">
          <button id="comprar" class="btn btn-success">Comprar</button>
        </div>
      </div>
    </div>
  </main>

  <!-- Footer -->
  <footer class="py-3 border-top text-center">
  <small>&copy; 2025 PuraCleta - Promoviendo la salud en Costa Rica</small>
  </footer>
</body>
<script src="js/jquery-3.7.1.min.js"></script>
<script src="js/carritoInsertar.js"></script>
</html>