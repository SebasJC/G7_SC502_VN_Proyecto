<?php
$host = "localhost";
$user = "root";
$pass = "Alpha890,";
$db = "pura_cleta_cr";

$conn = new mysqli($host, $user, $pass, $db);

if ($conn->connect_error) {
    die("Error de conexión: " . $conn->connect_error);
}
?>