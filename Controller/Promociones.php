<?php

try {

    $conn = Obtener_Conexion_bd();

    $sql = "SELECT * FROM TA_PRODUCTOS ORDER BY RAND() LIMIT 3";
    $stmt = $conn->prepare($sql);
    $stmt->execute();

    if ($stmt->rowCount() > 0) {
        $num_rows = $stmt->rowCount();
        echo '<div class="row promo">';
        for ($i = 0; $i < $num_rows; $i++) {
            $row = $stmt->fetch(PDO::FETCH_ASSOC);
                echo '<div class="col-md-4">';
                    echo '<div class="card mb-4 zoom-img">';
                        echo '<img class="card-img-top" src="data:image/jpeg;base64,' . base64_encode($row['IMAGEN']) . '">';
                            echo '<div class="card-body">';
                                echo '<h6 class="card-title">' . htmlspecialchars($row['PRODUCTO']) . '</h6>';
                                echo '<p class="card-text limited-text text-center">' . htmlspecialchars($row['DESCRIPCION']) . '</p>';
                            echo '<h6 class="card-text text-center">' . 'S/' . htmlspecialchars($row['PRECIO']) . '</h6>';
                        echo '</div>';
                    echo '</div>';
                echo '</div>';
        }
        echo '</div>';
    }
    
    $conn = null;
    
} catch (PDOException $e) {
    die("Error al conectar a la base de datos: " . $e->getMessage());
}
?>