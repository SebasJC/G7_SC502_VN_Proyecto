<?php
$host = "localhost";
$user = "root";
$pass = "123456";
$db = "pura_cleta_cr";

$conn = new mysqli($host, $user, $pass, $db);

if ($conn->connect_error) {
    die("Error de conexión: " . $conn->connect_error);
}
?>