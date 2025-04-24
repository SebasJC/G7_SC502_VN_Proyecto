<?php
require_once 'conexion.php';

class Task
{
    public static function getAll(): array
    {
        global $conn;

        try {
            $sql = "SELECT * FROM carrito";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                return $result->fetch_all(MYSQLI_ASSOC);
            } else {
                return [];
            }
        } catch (mysqli_sql_exception $e) {
            return ["error" => "Error al obtener compras: " . $e->getMessage()];
        }
    }

    public static function delete($id)
    {
        global $conn;

        $sql = "DELETE FROM carrito WHERE id = $id ";

        if ($conn->query($sql) === TRUE) {
            return 1;
        } else {
            return 0;
        }
    }

}
