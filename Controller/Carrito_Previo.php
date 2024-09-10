<?php

try {
    $conn = Obtener_Conexion_bd();

    if (!isset($_SESSION['DNI']) || $_SESSION['DNI'] == "") {
        $dni = "";
    } else {
        $dni = $_SESSION['DNI'];
    }

//    $sql = "Select t3.PRODUCTO as PRODUCTO, t3.IMAGEN as IMAGEN, t3.PRECIO as PRECIO, t2.CANTIDAD as CANTIDAD, t2.ID_PRODUCTOS_VENDIDOS 
//            from ta_ventas t1 inner join ta_productos_vendidos t2 on
//            (t1.ID_VENTA = t2.VENTA)
//            inner join ta_productos t3 on
//            (t2.PRODUCTO = t3.ID_PRODUCTO)
//            where t1.DNI = :dni";
    $sql = "CALL ObtenerProductosPorDNI(:dni)";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':dni', $dni, PDO::PARAM_STR);
    $stmt->execute();

    if ($stmt->rowCount() > 0) {
        $num_rows = $stmt->rowCount();
        echo '<div class="scrollable-container">';
        for ($i = 0; $i < $num_rows; $i++) {
            $row = $stmt->fetch(PDO::FETCH_ASSOC);
            echo '<div class="c_producto_carrito producto">';
            //echo '<a href="Carrito_Compras.php" class="c_producto_enlace">';
            echo '<img src="data:image/jpeg;base64,' . base64_encode($row['IMAGEN']) . '">';
            echo '<span class="c_nombre_producto">' . htmlspecialchars($row['PRODUCTO']) . '</span>';
            echo '<span class="c_precio">' . 'S/' . htmlspecialchars($row['PRECIO']) . '</span>';
            echo '<span class="c_cantidad">' . htmlspecialchars($row['CANTIDAD']) . ' Un.' . '</span>';
            echo '<a class="btn" href="Controller/Eliminar_ProductoControllers.php?ID_PRODUCTOS_VENDIDOS=' . htmlspecialchars($row['ID_PRODUCTOS_VENDIDOS']) . '" ><i class="fa fa-trash-alt"></i></a>';
            // '</a>';
            echo '</div>';
        }
        echo '</div>';
        echo '<div class="cart-total-preview box-row">';
        echo '    <span class="c_label_p">Total: </span>';
        echo '    <span class="c_precio_p">' . 'S/' . htmlspecialchars($row['TOTAL']) . '</span>';
        echo '</div>';
    } else {
        echo '<div class="c_producto_carrito producto justify-content-center">Agrega mas Productos</div>';
    }
    $conn = null;
} catch (PDOException $e) {
    die("Error al conectar a la base de datos: " . $e->getMessage());
}
