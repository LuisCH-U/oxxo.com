<?php

include './Conexion/C_Bd_Conexion.php';

$errors = [];

$result = [
    'success' => false,
    'message' => '',
    'user_name' => ''
];

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $usuario = $_POST['EMAIL'];
    $password = $_POST['CLAVE'];

    $conn = Obtener_Conexion_bd();

    if (!$conn) {
        die("Error al conectar a la base de datos");
    }

    $sql = "SELECT NOMBRE, EMAIL, CLAVE, DNI FROM TA_USUARIOS WHERE EMAIL = :usuario AND CLAVE = :clave AND TIPO_USUARIO = 3";
    $stmt = $conn->prepare($sql);

    $stmt->bindParam(':usuario', $usuario, PDO::PARAM_STR);
    $stmt->bindParam(':clave', $password, PDO::PARAM_STR);

    $stmt->execute();

    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($user) {
        session_start();
        $_SESSION['NOMBRE'] = $user['NOMBRE'];
        $_SESSION['DNI'] = $user['DNI'];
        $result['success'] = true;
        $result['user_name'] = $user['NOMBRE'];
        header('location: index.php');
        exit;
    } else {
        //$errors[] = "Usuario o Contraseña incorrectos.";
        $result['message'] = "Usuario o Contraseña incorrectos.";
    }

    $conn = null;

    return $result;
}
//$errors = [];
//
//if ($_SERVER["REQUEST_METHOD"] == "POST") {
//
//    $usuario = $_POST['EMAIL'];
//    $password = $_POST['CLAVE'];
//
//    $conn = Obtener_Conexion_bd();
//
//    if (!$conn) {
//        die("Error al conectar a la base de datos");
//    }
//
//    $sql = "SELECT * FROM TA_USUARIOS WHERE EMAIL = :usuario AND CLAVE = :clave";
//    $stmt = $conn->prepare($sql);
//
//    $stmt->bindParam(':usuario', $usuario, PDO::PARAM_STR);
//    $stmt->bindParam(':clave', $password, PDO::PARAM_STR);
//
//    $stmt->execute();
//
//    $count = $stmt->rowCount();
//    if ($count == 1) {
//        session_start();
//        $_SESSION['EMAIL'] = $usuario;
//        header('location: index.php');
//        exit;
//    } else {
//        $errors[] = "Usuario o Contraseña incorrectos.";
//    }
//    
//    $conn = null;
//    
//    return $count;
//}
//
//
