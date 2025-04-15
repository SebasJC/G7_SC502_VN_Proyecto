<?php
include 'conexion.php';

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
  <title>Detalle - <?= htmlspecialchars($bicicleta['nombre']) ?></title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="css/styles.css">
</head>
<body>
  <div class="container my-5">
    <a href="index.php" class="btn btn-secondary mb-4">← Volver al catálogo</a>

    <div class="card mb-3">
      <div class="row g-0">
        <div class="col-md-5">
          <img src="<?= htmlspecialchars($bicicleta['imagen']) ?>" class="img-fluid rounded-start" alt="<?= htmlspecialchars($bicicleta['nombre']) ?>">
        </div>
        <div class="col-md-7">
          <div class="card-body">
            <h3 class="card-title"><?= htmlspecialchars($bicicleta['nombre']) ?></h3>
            <p class="card-text"><?= htmlspecialchars($bicicleta['descripcion']) ?></p>
            <h5 class="text-success">₡<?= number_format($bicicleta['precio'], 2) ?></h5>
            <form action="agregar_carrito.php" method="POST" class="d-flex gap-2 mt-4">
              <input type="hidden" name="bicicleta_id" value="<?= $bicicleta['id'] ?>">
              <input type="hidden" name="tipo" value="venta">
              <button type="submit" class="btn btn-success">Agregar</button>
            </form>

            <form action="agregar_carrito.php" method="POST" class="d-flex gap-2 mt-2">
              <input type="hidden" name="bicicleta_id" value="<?= $bicicleta['id'] ?>">
              <input type="hidden" name="tipo" value="alquiler">
              <button type="submit" class="btn btn-warning">Alquilar</button>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</body>
</html>