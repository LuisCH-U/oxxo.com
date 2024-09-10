<?php

if (!isset($_SESSION['DNI'])) {
    header('Location: Inicio_Sesion.php');
  
}

$dni_usuario = $_SESSION['DNI'];