<?php
include '../Conexion/C_Bd_Conexion.php';
session_start();

if (!isset($_SESSION['DNI']) || $_SESSION['DNI'] == "") {
    $dni = "";
} else {
    $dni = $_SESSION['DNI'];
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $conn = Obtener_Conexion_bd();
    $Nombre = $_POST['NOMBRE'];
    $Apellido = $_POST['APELLIDO'];
    $Telefono = $_POST['TELEFONO'];
    $Correo = $_POST['EMAIL'];
    $NumeroDNI  = $_POST['DNI'];
    $Password = $_POST['CLAVE'];
    
    $sql = "UPDATE TA_USUARIOS SET
                NOMBRE = :Nombre,
                APELLIDO = :Apellido,
                TELEFONO = :Telefono, 
                EMAIL = :Correo,
                DNI = :NumeroDNI,
                CLAVE = :Password 
             WHERE DNI = :DNI";
    
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':Nombre', $Nombre);
    $stmt->bindParam(':Apellido', $Apellido);
    $stmt->bindParam(':Telefono', $Telefono);
    $stmt->bindParam(':Correo', $Correo);
    $stmt->bindParam(':Password', $Password);
    $stmt->bindParam(':NumeroDNI', $NumeroDNI);
    $stmt->bindParam(':DNI', $dni);

    try {
        $stmt->execute();
        echo "Perfil Actualizado";
        //$referencia = isset($_SERVER['HTTP_REFERER']) ? $_SERVER['HTTP_REFERER'] : 'index.php';
        //header("Location: $referencia");
        $_SESSION['perfil_update'] = true; 
        header("Location: Perfil_UpdateControllers.php");
        exit;
    } catch (PDOException $e) {
        echo "Error al actualizar perfil: " . $e->getMessage();
    }
}
