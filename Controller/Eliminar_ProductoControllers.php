<?php
include '../Conexion/C_Bd_Conexion.php';

try {
    $conn = Obtener_Conexion_bd();

    if (isset($_GET["ID_PRODUCTOS_VENDIDOS"])) {
            $Id_producto = intval($_GET["ID_PRODUCTOS_VENDIDOS"]);

            //$sql = "Delete From ta_productos_vendidos Where ID_PRODUCTOS_VENDIDOS = :ID_PRODUCTOS_VENDIDOS";
            $sql = "Call Eliminar_Producto_Y_Actualizar_Venta(:ID_PRODUCTOS_VENDIDOS)";
            $stmt = $conn->prepare($sql);
            $stmt->bindParam(':ID_PRODUCTOS_VENDIDOS', $Id_producto, PDO::PARAM_INT);

            try {
                $stmt->execute();
                $referencia = isset($_SERVER['HTTP_REFERER']) ? $_SERVER['HTTP_REFERER'] : 'index.php';
                header("Location: $referencia");
                exit;
            } catch (PDOException $e) {
                echo "Error: No se realizó el proceso. Detalles: " . $e->getMessage();
            }
        } else {
            echo "ID_PRODUCTOS_VENDIDOS no proporcionado.";
        }
} catch (Exception $e) {
    echo "Error: " . $e->getMessage();
}
