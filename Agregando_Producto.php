<?php

include './Conexion/C_Bd_Conexion.php';
session_start();

try {

    $conn = Obtener_Conexion_bd();

    if (!isset($_SESSION['DNI']) || $_SESSION['DNI'] == "") {
        $dni = "";
        header("location: Inicio_Sesion.php");
        exit; //
    } else {
        $dni = $_SESSION['DNI'];
    }

    if (isset($_GET["ID_PRODUCTO"])) {
        $Id_producto = intval($_GET["ID_PRODUCTO"]);

        $sql = "Call Insertar_Venta_ProductosVendidos(?,?)";
        $stmt = $conn->prepare($sql);
        //$stmt->bindParam(':DNI', $dni, PDO::PARAM_STR);
        //$stmt->bindParam(':ID_PRODUCTO', $Id_producto, PDO::PARAM_INT);
        $stmt->execute([$dni, $Id_producto]);
        try {
            $referencia = isset($_SERVER['HTTP_REFERER']) ? $_SERVER['HTTP_REFERER'] : 'index.php';
            echo "<script>
                localStorage.setItem('scrollPosition', window.scrollY);
                window.location.href = '$referencia';
              </script>";
            exit;
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
    } else {
        echo "ID_PRODUCTO no proporcionado.";
    }
} catch (Exception $exc) {
    echo "Error: " . $exc->getMessage();
}
