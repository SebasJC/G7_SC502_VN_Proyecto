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

    public static function transferirCarritoACompras()
{
    global $conn;

    try {
        // Iniciar transacción
        $conn->begin_transaction();

        // 1. Obtener todos los items del carrito
        $items = self::getAll();
        
        if (empty($items)) {
            throw new Exception("El carrito está vacío");
        }

        // 2. Insertar cada item en la tabla compras
        foreach ($items as $item) {
            // Necesitamos obtener el bicicleta_id correspondiente
            $bikeQuery = "SELECT id FROM bicicletas WHERE nombre = ?";
            $stmt = $conn->prepare($bikeQuery);
            $stmt->bind_param("s", $item['nombre']);
            $stmt->execute();
            $bikeResult = $stmt->get_result();
            
            if ($bikeResult->num_rows == 0) {
                throw new Exception("No se encontró la bicicleta: " . $item['nombre']);
            }
            
            $bike = $bikeResult->fetch_assoc();
            $bicicleta_id = $bike['id'];
            
            // Insertar en compras
            $insertQuery = "INSERT INTO compras(nombre, precio, imagen, bicicleta_id) VALUES (?, ?, ?, ?)";
            $stmt = $conn->prepare($insertQuery);
            $stmt->bind_param("sdsi", $item['nombre'], $item['precio'], $item['imagen'], $bicicleta_id);
            $stmt->execute();
        }

        // 3. Vaciar el carrito
        $conn->query("TRUNCATE TABLE carrito");

        // Confirmar transacción
        $conn->commit();
        
        return ["success" => true, "message" => "Compra realizada con éxito"];
    } catch (Exception $e) {
        // Revertir en caso de error
        $conn->rollback();
        return ["error" => "Error al procesar la compra: " . $e->getMessage()];
    }
}
}
?>