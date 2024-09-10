<?php
session_start();
include '../Conexion/C_Bd_Conexion.php';

try {
    $conn = Obtener_Conexion_bd();

    if (!isset($_SESSION['DNI']) || $_SESSION['DNI'] == "") {
        $dni = "";
    } else {
        $dni = $_SESSION['DNI'];
    }
    if (!isset($_SESSION['ID_VENTA']) || $_SESSION['ID_VENTA'] == "") {
        $id_venta = "";
    } else {
        $id_venta = $_SESSION['ID_VENTA'];
    }

    $sql = "Call Finaliza_Compra(?,?)";
    $stmt = $conn->prepare($sql);
    $stmt->execute([$id_venta, $dni]);
        
    try {
        $stmt->execute();
        //$referencia = isset($_SERVER['HTTP_REFERER']) ? $_SERVER['HTTP_REFERER'] : 'index.php';
        //header("Location: $referencia");
        $_SESSION['OK'] = true; 
        header("Location: Compra_FinalizadaControllers.php");
        exit;
    } catch (PDOException $e) {
        echo "Error: No se realizó el proceso. Detalles: " . $e->getMessage();
    }
} catch (Exception $e) {
    echo "Error: " . $e->getMessage();
}

