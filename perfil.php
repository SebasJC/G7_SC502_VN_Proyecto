<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Perfil de Usuario - PuraCleta</title>
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
        <a href="perfil.php" class="text-decoration-none">Perfil</a>
        <a href="carrito.php" class="text-decoration-none">Carrito</a>
      </nav>
    </div>
  </header>

  <!-- Body -->
  <main class="container py-5">
    <h2 style="text-align:center;">Mi Perfil</h2>
    <form class="mt-4">
      <div class="mb-3">
        <label for="nombre" class="form-label">Nombre completo</label>
        <input type="text" id="nombre" class="form-control" placeholder="Juan Pérez">
      </div>
      <div class="mb-3">
        <label for="email" class="form-label">Correo electrónico</label>
        <input type="email" id="email" class="form-control" placeholder="correo@ejemplo.com">
      </div>
      <div class="mb-3">
        <label for="direccion" class="form-label">Direccion</label>
        <input type="text" id="direccion" class="form-control" placeholder="Provincia, cantón, detalle...">
      </div>
      <button type="submit" class="btn btn-primary">Actualizar Perfil</button>
    </form>
  </main>

  <!-- Footer -->
  <footer class="py-3 border-top text-center">
  <small>&copy; 2025 PuraCleta - Promoviendo la salud en Costa Rica</small>
  </footer>
</body>
</html>