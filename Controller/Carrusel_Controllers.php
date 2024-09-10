<?php

try {
    $conn = Obtener_Conexion_bd();

    $sql = "SELECT * FROM ta_carrusel ORDER BY RAND() LIMIT 12";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    if ($stmt->rowCount() > 0) {
        $num_rows = $stmt->rowCount();

        for ($i = 0; $i < $num_rows; $i++) {
            $row = $stmt->fetch(PDO::FETCH_ASSOC);
            echo '<div class="carousel-item active">';
            echo '    <img class="d-block w-100" src="data:image/jpeg;base64,' . base64_encode($row['IMAGEN_C']) . '">';
            echo '</div>';
            echo '<div class="carousel-item ">';
            echo '    <img class="d-block w-100" src="img/ppromocion_4.png" loading="lazy">';
            echo '</div>';
        }
    } else {
        echo "<div class='text-center'><b>Pagina En Mantenimiento!</b></div>";
    }
    $conn = null;
} catch (PDOException $e) {
    die("Error al conectar a la base de datos: " . $e->getMessage());
}
//echo '<div class="carousel-item ">';
//echo '    <img class="d-block w-100" src="img/ppromocion_4.png" loading="lazy">';
//echo '</div>';
//echo '<div class="carousel-item active">';
//echo '    <img class="d-block w-100" src="img/Promocion_1.png" loading="lazy">';
//echo '</div>';
//echo '<div class="carousel-item">';
//echo '    <img class="d-block w-100" src="img/Promocion_2.png"loading="lazy">';
//echo '</div>';
//echo '<div class="carousel-item">';
//echo '    <img class="d-block w-100" src="img/promocion_3.png" loading="lazy">';
//echo '</div>';
//echo '<div class="carousel-item">';
//echo '    <img class="d-block w-100" src="img/BienesyR.png" loading="lazy">';
//echo '</div>';
//echo '<div class="carousel-item">';
//echo '    <img class="d-block w-100" src="img/Antogo.png" loading="lazy">';
//echo '</div>';
//echo '<div class="carousel-item">';
//echo '    <img class="d-block w-100" src="img/Pisco_puro_Promo.png" loading="lazy">';
//echo '</div>';
