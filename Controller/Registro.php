<?php

include '../Conexion/C_Bd_Conexion.php';
include '../Entidad/Entidad_Registro.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    $conn = Obtener_Conexion_bd();

    if ($conn) {
        $tipoUsuario = 3;  //1 CLIENTE - 2 EMPLEADO - 3 ADMIN 
        $nombre = $_POST['NOMBRE'];
        $apellido = $_POST['APELLIDO'];
        $dni = $_POST['DNI'];
        $usuario = substr($nombre, 0, 1) . $dni;//$_POST['USUARIO'];
        $clave = $_POST['CLAVE'];
        $email = $_POST['CORREO'];
        $telefono = $_POST['TELEFONO'];
        $sexo = '';
        
        $resultado = Registro_Cuenta($usuario, $clave, $tipoUsuario, $nombre, $apellido, $email, $telefono, $sexo, $dni, $conn);
        
        echo $resultado;
        if (strpos($resultado, 'correctamente') !== false) {
            echo '<p class="success-message">' . $resultado . '</p>';
        } else {
            echo '<p class="error-message">' . $resultado . '</p>';
        }
    } else {
        echo "Error: No se pudo establecer conexión con la base de datos.";
    }
}

function Registro_Cuenta($usuario, $clave, $tipoUsuario, $nombre, $apellido, $email, $telefono, $sexo, $dni, $conn) {

    $registro = new Entidad_Registro($usuario, $clave, $tipoUsuario, $nombre, $apellido, $email, $telefono, $sexo, $dni);

    try {
        $stmt = $conn->prepare("INSERT INTO TA_USUARIOS (USUARIO, CLAVE, TIPO_USUARIO, NOMBRE, APELLIDO, EMAIL, TELEFONO, SEXO, DNI) 
                              VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)");

        $stmt->execute([$registro->getUsuario(), $registro->getClave(), $registro->getTipoUsuario(), $registro->getNombre(),
            $registro->getApellido(), $registro->getEmail(), $registro->getTelefono(), $registro->getSexo(),
            $registro->getDni()]);

        echo "Usuario registrado correctamente: " . $registro;
        /*return "Usuario registrado correctamente: " . $nombre . " " . $apellido;
        //return true; // Registro exitoso*/
    } catch (PDOException $e) {
        
        return "Error al registrar usuario: " . $e->getMessage();
        /*return $e->getMessage(); // Error al registrar usuario*/  
    }
    
    header('location:../Inicio_Sesion.php');
}
