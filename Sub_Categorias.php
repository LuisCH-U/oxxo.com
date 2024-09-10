<?php
include './Conexion/C_Bd_Conexion.php';

try {
    $conn = Obtener_Conexion_bd();

    $sql = "SELECT T2.ID_CATEGORIA, T2.DESCRIPCION AS CATEGORIA, T1.ID_PRODUCTO, T1.PRODUCTO 
            FROM TA_PRODUCTOS T1 INNER JOIN TA_CATEGORIAS T2 ON 
                 T1.TIPO_CATEGORIA = T2.ID_CATEGORIA 
            GROUP BY T2.ID_CATEGORIA, T1.ID_PRODUCTO, T1.PRODUCTO";
    $stmt = $conn->prepare($sql);
    $stmt->execute();

    if ($stmt->rowCount() > 0) {
        $Categoria = '';
        
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            if ($Categoria != $row['CATEGORIA']) {
                if ($Categoria != '') {
                    echo "</ul></li>";
                }
                $Categoria = $row['CATEGORIA'];
                echo '<li class="nav-item">';
                echo '<a href="Categoria_Producto.php?ID_CATEGORIA='. htmlspecialchars($row['ID_CATEGORIA']) . '"class="text submenu" data-toggle="submenu" aria-expanded="false" style="color:red">' . htmlspecialchars($Categoria) . '</a>';
                echo '<ul class="sub-menu">';
            }
            echo '<li class="nav-item">';
            echo '<a class="text submenu" href="Categoria_Producto.php?PRODUCTO=' . substr(htmlspecialchars($row['PRODUCTO']), 0, 3) . '">' . htmlspecialchars($row['PRODUCTO']) . '</a>';
            echo '</li>';
        }
        echo "</ul></li>";
    } else {
        echo '<a href="#" class="text submenu" data-toggle="submenu" aria-expanded="false">Categorias</a>';
    }
    
    $conn = null;
    
} catch (PDOException $e) {
    die("Error al conectar a la base de datos: " . $e->getMessage());
}

//----------------------------------------ANTERIOR----------------------------------------------
//include './Conexion/C_Bd_Conexion.php';
//try {
//
//    $conn = Obtener_Conexion_bd();
//
//    $sql = "SELECT T2.DESCRIPCION AS CATEGORIA, T1.PRODUCTO FROM TA_PRODUCTOS T1 INNER JOIN TA_CATEGORIAS T2 ON T1.TIPO_CATEGORIA = T2.ID_CATEGORIA GROUP BY T2.ID_CATEGORIA, T1.PRODUCTO";
//    $stmt = $conn->prepare($sql);
//    $stmt->execute();
//
//    if ($stmt->rowCount() > 0) {
//        $Categoria = '';
//        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
//            if ($Categoria != $row['CATEGORIA']) {
//                if ($Categoria != '') {
//                    echo "</ul></li>";
//                }
//                $Categoria = $row['CATEGORIA'];
//                echo '<li class="nav-item">';
//                echo     '<a href="#" class="text submenu" data-toggle="submenu" aria-expanded="false" data-pagina="Principal_Categoria" style="color:red">' . htmlspecialchars($Categoria) . '</a>';
//                echo     '<ul class="sub-menu">';
//            }
//            echo         '<li class="nav-item"><a class="text" href="#" data-pagina="Principal_Categoria">' . htmlspecialchars($row['PRODUCTO']) . '</a></li>';
//        }
//        echo "</ul></li>";
//    } else {
//        echo '<a href="#" class="text submenu" data-toggle="submenu" aria-expanded="false">Categorias</a>';
//    }
//    
//    $conn = null;
//    
//} catch (PDOException $e) {
//    die("Error al conectar a la base de datos: " . $e->getMessage());
//}
?>
