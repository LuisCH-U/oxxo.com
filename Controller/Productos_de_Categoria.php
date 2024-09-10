<?php

try {
    $conn = Obtener_Conexion_bd();

    if (isset($_GET['ID_CATEGORIA'])) {
        $categoria_id = intval($_GET['ID_CATEGORIA']);

        $sql = "SELECT * FROM ta_productos WHERE TIPO_CATEGORIA = :ID_CATEGORIA";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':ID_CATEGORIA', $categoria_id, PDO::PARAM_INT);
    } elseif (isset($_GET['PRODUCTO'])) {
        $producto_des = $_GET['PRODUCTO'] . '%'; 
        $sql = "SELECT * FROM ta_productos WHERE PRODUCTO LIKE :PRODUCTO";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':PRODUCTO', $producto_des, PDO::PARAM_STR);
    } else {
        echo "<div class='text-center'><b>Página en Mantenimiento, Gracias.</b></div>";
        
    }
    $stmt->execute();

    if ($stmt->rowCount() > 0) {
        $num_rows = $stmt->rowCount();
        for ($i = 0; $i < $num_rows; $i++) {
            $row = $stmt->fetch(PDO::FETCH_ASSOC);
            echo '<div class="card1 col-lg-2 col-6">';
                echo '<div class="card mb-4">';
                    echo '<img class="card-img-top" src="data:image/jpeg;base64,' . base64_encode($row['IMAGEN']) . '">';
                    echo '<div class="card-body">';
                        echo '<h6 class="card-title">' . htmlspecialchars($row['PRODUCTO']) . '</h6>';
                        echo '<p class="card-text limited-text">' . htmlspecialchars($row['DESCRIPCION']) . '</p>';
                        echo '<h6 class="card-text">' . 'S/' . htmlspecialchars($row['PRECIO']) . '</h6>';
                        echo '<a class="btn_add" href="Agregando_Producto.php?ID_PRODUCTO=' . htmlspecialchars($row['ID_PRODUCTO']) . '">Agregar</a>';
                    echo '</div>';
                echo '</div>';
            echo '</div>';
        }
    }
    $conn = null;
} catch (PDOException $e) {
    die("Error al conectar a la base de datos: " . $e->getMessage());
}

//---------------------------------ANTERIOR------------------------------------------------
//include './Conexion/C_Bd_Conexion.php';
//
//try {
//    $conn = Obtener_Conexion_bd();
//
//    $sql = "SELECT * FROM ta_productos where ID_PRODUCTO in(1,10,24,29,18,26) ";  //Innner join con categoria y producto recibido de headers.
//    $stmt = $conn->prepare($sql);
//    $stmt->execute();
//
//    if ($stmt->rowCount() > 0) {
//        $num_rows = $stmt->rowCount();
//        for ($i = 0; $i < $num_rows; $i++) {
//            $row = $stmt->fetch(PDO::FETCH_ASSOC);
//            echo '<div class="card1 col-lg-2 col-6">';
//                echo '<div class="card mb-4">';
//                    echo '<img class="card-img-top" src="data:image/jpeg;base64,' . base64_encode($row['IMAGEN']) . '">';
//                    echo '<div class="card-body">';
//                        echo '<h6 class="card-title">' . htmlspecialchars($row['PRODUCTO']) . '</h6>';
//                        echo '<p class="card-text limited-text">' . htmlspecialchars($row['DESCRIPCION']) . '</p>';
//                        echo '<h6 class="card-text">' . 'S/' . htmlspecialchars($row['PRECIO']) . '</h6>';
//                        echo '<a href="#" class="btn_add">Agregar</a>';
//                    echo '</div>';
//                echo '</div>';
//            echo '</div>';
//        }
//    } else {
//        echo "<div clas='text-center'>No se encontraron productos.</div>";
//    }
//    $conn = null; 
//
//} catch (PDOException $e) {
//    die("Error al conectar a la base de datos: " . $e->getMessage());
//}
?>