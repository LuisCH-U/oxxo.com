<?php

function Obtener_Conexion_bd() {
    $BD_HOST = "localhost";
    $BD_USER = "root";
    $BD_PASSWORD = "";
    $BD_DATABASE = "OXXO";

    try {
        $conn = new PDO("mysql:host={$BD_HOST};dbname={$BD_DATABASE}", $BD_USER, $BD_PASSWORD);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $conn;
    } catch (PDOException $e) {
        echo ("Error en la conexión a la base de datos: " . $e->getMessage());
    }
    return $conn;
}
