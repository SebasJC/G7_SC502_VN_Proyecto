<?php
include("conexion.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre = trim($_POST["nombre"]);
    $email = trim($_POST["email"]);
    $password = trim($_POST["password"]);

    // Verificar si el correo ya está registrado
    $verificar_sql = "SELECT id FROM usuarios WHERE email = ?";
    $stmt_verificar = $conn->prepare($verificar_sql);
    $stmt_verificar->bind_param("s", $email);
    $stmt_verificar->execute();
    $stmt_verificar->store_result();

    if ($stmt_verificar->num_rows > 0) {
        echo "<script>alert('Este correo ya está registrado.'); window.location.href='registro.php';</script>";
    } else {
        // Encriptar la contraseña
        $password_hash = password_hash($password, PASSWORD_DEFAULT);

        // Insertar nuevo usuario
        $sql = "INSERT INTO usuarios (nombre, email, password) VALUES (?, ?, ?)";
        $stmt_insertar = $conn->prepare($sql);
        $stmt_insertar->bind_param("sss", $nombre, $email, $password_hash);

        if ($stmt_insertar->execute()) {
            echo "<script>alert('Usuario registrado exitosamente'); window.location.href='login.php';</script>";
        } else {
            echo "<script>alert('Error al registrar el usuario.'); window.location.href='registro.php';</script>";
        }

        $stmt_insertar->close();
    }

    $stmt_verificar->close();
    $conn->close();
}
?>