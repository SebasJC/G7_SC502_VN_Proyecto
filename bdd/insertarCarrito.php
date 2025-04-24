<?php
include("conexion.php");
$data = json_decode(file_get_contents("php://input"), true);

if ($data["nombre"] ?? '' != "") {
    $query = "INSERT INTO carrito(nombre, precio, imagen) VALUES ('".$data["nombre"] ."','".$data["precio"] ."','".$data["imagen"] ."')";

    if ($conn->query($query) ==  TRUE) {
        echo json_encode(["status" => "00", "message"=>"Registro exitosamente guardado"]);
    } else {
        echo json_encode(["status" => "99", "message"=>"Error al guardar"]);
    }   
    
}