<?php

include '../Conexion/C_Bd_Conexion.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    $conn = Obtener_Conexion_bd();
    
    $DNI = $_POST['DNI'];
    $nueva_clave = $_POST['CLAVE'];

    $sql = "Update TA_USUARIOS Set CLAVE = :CLAVE Where DNI = :DNI";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':CLAVE', $nueva_clave);
    $stmt->bindParam(':DNI', $DNI);

    try {
        $stmt->execute();
        echo "Contraseña actualizada correctamente.";
        header('location: ../Inicio_Sesion.php');
    } catch(PDOException $e) {
        echo "Error al actualizar la contraseña: " . $e->getMessage();
    }

}
