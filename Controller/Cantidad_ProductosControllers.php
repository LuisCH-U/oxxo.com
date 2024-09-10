<?php

$contador_carrito = 0;

if (isset($_SESSION['DNI']) && $_SESSION['DNI'] != "") {
    
    $conn = Obtener_Conexion_bd();

    $sql = "Select count(id_productos_vendidos) total_productos From ta_productos_vendidos t1 Join ta_ventas t2 On 
            t1.VENTA = t2.ID_VENTA Where t2.DNI = :dni And t2.ESTADO = 'Activo';";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':dni', $_SESSION['DNI'], PDO::PARAM_STR);
    $stmt->execute();

    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    $contador_carrito = $result['total_productos'] ? (int) $result['total_productos'] : 0;
    return $contador_carrito;
}
