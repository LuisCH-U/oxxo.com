<?php

include './Conexion/C_Bd_Conexion.php';
session_start();

try {

    $conn = Obtener_Conexion_bd();

    if (!isset($_SESSION['DNI']) || $_SESSION['DNI'] == "") {
        $dni = "";
    } else {
        $dni = $_SESSION['DNI'];
    }
    
    $sql = "CALL ObtenerProductosPorDNI(:dni)";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':dni', $dni, PDO::PARAM_STR);
    $stmt->execute();

    if ($stmt->rowCount() > 0) {
        $num_rows = $stmt->rowCount();
        echo '<div class="scrollable-container_1">';
        for ($i = 0; $i < $num_rows; $i++) {
            $row = $stmt->fetch(PDO::FETCH_ASSOC);
            echo '<div class="cart-item">';
            echo '    <div class="item-image">';
            echo '        <img class="img" src="data:image/jpeg;base64,' . base64_encode($row['IMAGEN']) . '">';
            echo '    </div>';
            echo '    <div class="item-details">';
            echo '        <span class="c_label_span">' . htmlspecialchars($row['PRODUCTO']) . '</span>';
//            echo '        <div class="item-quantity">';
//            echo '            <button class="minus">-</button>';
//            echo '            <input type="number" value="1" min="1">';
//            echo '            <button class="maxi">+</button>';
//            echo '        </div>';
            echo '        <span class="item-price">' . 'S/' . htmlspecialchars($row['PRECIO']) . '</span>';
            echo '        <span class="c_cantidad">' . htmlspecialchars($row['CANTIDAD']) . ' Un.' . '</span>';
            echo '        <a class="btn" href="Controller/Eliminar_ProductoControllers.php?ID_PRODUCTOS_VENDIDOS=' . htmlspecialchars($row['ID_PRODUCTOS_VENDIDOS']) . '" >Eliminar</a>';
            echo '    </div>';
            echo '</div>';
        }
        echo '</div>';
        echo '<div class="cart-total">';
        echo'<span>Total:</span>';
        echo'<span class="c_precio">' . 'S/' . htmlspecialchars($row['TOTAL']) . '</span>';
        echo '</div>';
        
        $_SESSION['ID_VENTA'] = $row['ID_VENTA'];
        
    } else {
        echo '<div class="c_producto_carrito producto justify-content-center">Agrega mas Productos</div>';
    }
    $conn = null;
} catch (PDOException $e) {
    die("Error al conectar a la base de datos: " . $e->getMessage());
}
