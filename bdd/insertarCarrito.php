<?php
header('Content-Type: application/json');
ini_set('display_errors', 1);
error_reporting(E_ALL);

include("conexion.php");

$data = json_decode(file_get_contents("php://input"), true);

if (!empty($data["nombre"])) {
    $nombre = $conn->real_escape_string($data["nombre"]);
    $precio = $conn->real_escape_string($data["precio"]);
    $imagen = $conn->real_escape_string($data["imagen"]);
    $query = "INSERT INTO carrito(nombre, precio, imagen) VALUES ('$nombre','$precio','$imagen')";

    if ($conn->query($query) ==  TRUE) {
        echo json_encode(["status" => "00", "message"=>"Registro exitosamente guardado"]);
    } else {
        echo json_encode(["status" => "99", "message"=>"Error al guardar"]);
    }
}
else {
    echo json_encode(["status" => "99", "message" => "Datos incompletos"]);
}
?>