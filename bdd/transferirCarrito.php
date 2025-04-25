<?php
include("conexion.php");
$data = json_decode(file_get_contents("php://input"), true);

if ($data["action"] ?? '' == "pagar") {
    // 1. Copiar todo a compras
    $query = "INSERT INTO compras (nombre, precio, imagen) SELECT nombre, precio, imagen FROM carrito";
    
    if ($conn->query($query) === TRUE) {
        // 2. Vaciar carrito solo si lo anterior funcionó
        $conn->query("DELETE FROM carrito");
        echo json_encode([
            "status" => "00",
            "message" => "Compra realizada con éxito. ¡Gracias por su compra!"
        ]);
    } else {
        echo json_encode([
            "status" => "99",
            "message" => "Error al procesar la compra: " . $conn->error
        ]);
    }
}
?>