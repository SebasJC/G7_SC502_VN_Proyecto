<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <title>Registro | Pura Cleta CR</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    body {
      background: linear-gradient(to right, #d4fc79, #96e6a1);
      height: 100vh;
      display: flex;
      justify-content: center;
      align-items: center;
      font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    }

    .register-box {
      background-color: white;
      padding: 3rem 4rem;
      border-radius: 1.5rem;
      box-shadow: 0 8px 20px rgba(0, 128, 0, 0.2);
      max-width: 500px;
      width: 100%;
    }

    .register-box h2 {
      color: #2e8b57;
      font-weight: 600;
    }

    .form-label {
      color: #2f4f4f;
    }

    .btn-primary {
      background-color: #2e8b57;
      border: none;
    }

    .btn-primary:hover {
      background-color: #276f47;
    }

    a {
      color: #2e8b57;
      text-decoration: none;
    }

    a:hover {
      text-decoration: underline;
    }
  </style>
</head>
<body>
  <div class="register-box">
    <h2 class="text-center mb-4">Crear Cuenta</h2>
    <form action="guardar_usuario.php" method="post">
      <div class="mb-3">
        <label for="nombre" class="form-label">Nombre completo</label>
        <input type="text" class="form-control" name="nombre" required>
      </div>
      <div class="mb-3">
        <label for="email" class="form-label">Correo electrónico</label>
        <input type="email" class="form-control" name="email" required>
      </div>
      <div class="mb-3">
        <label for="password" class="form-label">Contraseña</label>
        <input type="password" class="form-control" name="password" id="password" required>
      </div>
      <div class="mb-3">
        <label for="confirm_password" class="form-label">Confirmar contraseña</label>
        <input type="password" class="form-control" name="confirm_password" id="confirm_password" required>
      </div>
      <input class="form-check-input" type="checkbox" id="togglePassword">
      <label class="form-check-label" for="togglePassword">Mostrar contraseñas</label>
      <button type="submit" class="btn btn-primary w-100">Registrarse</button> 
    </form>
    <p class="text-center mt-3"><a href="login.php">¿Ya tienes cuenta? Inicia sesión</a></p>
  </div>

  <script src="js/registro.js"></script>
</body>
</html>