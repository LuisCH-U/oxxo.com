<?php

try {
    $conn = Obtener_Conexion_bd();

    if (!isset($_SESSION['DNI']) || $_SESSION['DNI'] == "") {
       $dni = "";
    } else {
        $dni = $_SESSION['DNI'];
    }

    $sql = "SELECT * FROM TA_usuarios WHERE DNI = :dni";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':dni', $dni, PDO::PARAM_STR);
    $stmt->execute();

    $usuario = $stmt->fetch(PDO::FETCH_ASSOC);

    if (!$usuario) {
        throw new Exception('No se encontró el usuario.');
    }
    echo '<form action="Controller/Actualizar_PerfilControllers.php" method="post">';
    echo '    <h2 class="c-titulo">Mi Perfil - OXXO</h2>';
    echo '    <div class="separator"></div>';
    echo '    <p class="c-text-titu">¡Tus Datos Personales, Es Importante ' . htmlspecialchars($usuario['NOMBRE']) . '</p>';
    //echo '    <img src="img/" alt="Perfil"/>';
    echo '    <div class="col-sm-12">';
    echo '        <div class="c_campo">';
    echo '            <input type="text" id="EMAIL" name="EMAIL" class="c-imput" placeholder="Correo*" title="Correo" value="' . htmlspecialchars($usuario['EMAIL']) . '" />';
    echo '            <input type="password" id="CLAVE" name="CLAVE" class="c-imput" placeholder="Contraseña*" title="Contraseña" value="' . htmlspecialchars($usuario['CLAVE']) . '" />';
    echo '        </div>';
    echo '        <div class="c_campo">';
    echo '            <input type="text" id="NOMBRE" name="NOMBRE" class="c-imput" placeholder="Nombre*"  title="Nombre" value="' . htmlspecialchars($usuario['NOMBRE']) . '" />';
    echo '            <input type="text" id="APELLIDO" name="APELLIDO" class="c-imput" placeholder="Apellido*"  title="Apellido" value="' . htmlspecialchars($usuario['APELLIDO']) . '" />';
    echo '        </div>';
    echo '        <div class="c_campo">';
    echo '            <input type="text" id="TELEFONO" name="TELEFONO" class="c-imput" placeholder="Teléfono*" title="Teléfono" value="' . htmlspecialchars($usuario['TELEFONO']) . '" />';
    echo '            <input style="color:red;" title="DNI" type="text" id="DNI" name="DNI" class="c-imput" placeholder="DNI*" value="' . htmlspecialchars($usuario['DNI']) . '" />';
    echo '        </div>';
    echo '    </div>';
    echo '    <button id="btn_login" class="btn-login" type="submit">Actualizar</button>';
    echo '</form>';

    $conn = null;
} catch (PDOException $e) {
    die("Error al conectar a la base de datos: " . $e->getMessage());
} catch (Exception $e) {
    die("Error: " . $e->getMessage());
}
?>
