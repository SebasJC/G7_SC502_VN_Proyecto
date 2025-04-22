<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <title>Iniciar Sesión | Pura Cleta CR</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    body {
      background: linear-gradient(to right, #c0f3c2, #8ee4af);
      height: 100vh;
      display: flex;
      justify-content: center;
      align-items: center;
      font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    }

    .login-box {
      background-color: white;
      padding: 3rem 4rem;
      border-radius: 1.5rem;
      box-shadow: 0 8px 20px rgba(0, 128, 0, 0.2);
      max-width: 450px;
      width: 100%;
      transition: all 0.3s ease-in-out;
    }

    .login-box h2 {
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
  <div class="login-box">
    <h2 class="text-center mb-4">Inicio de Sesión</h2>
    <form action="verificar_usuario.php" method="post">
      <div class="mb-3">
        <label for="email" class="form-label">Correo electrónico</label>
        <input type="email" class="form-control" name="email" required>
      </div>
      <div class="mb-3">
        <label for="password" class="form-label">Contraseña</label>
        <input type="password" class="form-control" name="password" required>
      </div>
      <button type="submit" class="btn btn-primary w-100">Ingresar</button>
    </form>
    <p class="text-center mt-3"><a href="registro.php">¿No tienes cuenta? Regístrate aquí</a></p>
  </div>
</body>
</html>
