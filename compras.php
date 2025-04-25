<?php
include 'bdd/conexion.php';

$compras = [];
$query = "SELECT * FROM compras ORDER BY id DESC";
$resultado = $conn->query($query);

if ($resultado->num_rows > 0) {
    $compras = $resultado->fetch_all(MYSQLI_ASSOC);
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mis Compras - PuraCleta</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="css/stylelogin.css" rel="stylesheet">
    <style>
        .compra-card {
            border: 1px solid #ddd;
            border-radius: 8px;
            padding: 15px;
            margin-bottom: 15px;
        }
        .compra-img {
            max-width: 100px;
            border-radius: 4px;
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
                <a href="compras.php" class="text-decoration-none">Mis Compras</a>
            </nav>
        </div>
    </header>

    <main class="container py-5">
        <h2 class="mb-4">Mis Compras Anteriores</h2>
        
        <?php if (empty($compras)): ?>
            <div class="alert alert-info">No has realizado compras aún.</div>
        <?php else: ?>
            <div class="row">
                <?php foreach ($compras as $compra): ?>
                <div class="col-md-6">
                    <div class="compra-card">
                        <div class="d-flex">
                            <img src="<?= htmlspecialchars($compra['imagen']) ?>" class="compra-img me-3" alt="<?= htmlspecialchars($compra['nombre']) ?>">
                            <div>
                                <h5><?= htmlspecialchars($compra['nombre']) ?></h5>
                                <p class="mb-1">Precio: ₡<?= number_format($compra['precio'], 0, ',', '.') ?></p>
                            </div>
                        </div>
                    </div>
                </div>
                <?php endforeach; ?>
            </div>
        <?php endif; ?>
    </main>

    <footer class="py-3 border-top text-center">
        <small>&copy; 2025 PuraCleta - Promoviendo la salud en Costa Rica</small>
    </footer>

    <script src="js/jquery-3.7.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>