<?php
session_start();
include("bdd/conexion.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = trim($_POST["email"]);
    $password = trim($_POST["password"]);

    // Buscar el usuario en la base de datos
    $sql = "SELECT id, nombre, password FROM usuarios WHERE email = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $email);

    if ($stmt->execute()) {
        $resultado = $stmt->get_result();

        if ($resultado->num_rows === 1) {
            $usuario = $resultado->fetch_assoc();

            // Verificar la contraseña
            if (password_verify($password, $usuario["password"])) {
                $_SESSION["usuario"] = $email;
                $_SESSION["nombre"] = $usuario["nombre"];
                header("Location: index.php");
                exit();
            } else {
                echo "<script>alert('Contraseña incorrecta.'); window.location.href='login.php';</script>";
            }
        } else {
            echo "<script>alert('Usuario no encontrado.'); window.location.href='login.php';</script>";
        }
    } else {
        echo "<script>alert('Error en la base de datos.'); window.location.href='login.php';</script>";
    }

    $stmt->close();
    $conn->close();
}
?>
