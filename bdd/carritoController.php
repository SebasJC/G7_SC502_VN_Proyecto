<?php
require_once 'carrito.php';

header('Content-Type: application/json');

try {
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $data = json_decode(file_get_contents("php://input"), true);
        $action = $data['action'] ?? '';

        // Manejo único de todas las acciones POST
        if ($action === 'delete' && !empty($data['id'])) {
            echo json_encode(Task::delete($data['id']));
        } elseif ($action === 'transferirCarritoACompras') {
            echo json_encode(Task::transferirCarritoACompras());
        } else {
            throw new Exception("Acción no válida o parámetros incorrectos.");
        }
    } else {
        // Para métodos GET, simplemente devolvemos todos los items del carrito
        echo json_encode(Task::getAll());
    }
} catch (Exception $e) {
    echo json_encode(["error" => $e->getMessage()]);
}
?>