<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Iniciar Sesión - OXXO</title>
        <?php include ('./Links.php'); ?>
    </head>
    <body class="c-body-cuenta content-iniciosesion">
        <section class="c-body-log">
            <div class="card-cuenta">
                <div class="card-body-log">
                    <form action="" method="post">
                        <h2 class="c-titulo">Iniciar sesión</h2>
                        <div class="separator"></div>
                        <p class="c-text-titu">¡Bienvenido de nuevo!</p>
                        <div class="zoom-img">
                            <input type="email" id="EMAIL" name="EMAIL" class="c-imput" placeholder="Correo*" />
                        </div>
                        <div class="zoom-img">
                            <input type="password" id="CLAVE" name="CLAVE" class="c-imput" placeholder="Contraseña*"/>
                        </div>
                        <p class="mb-0"><a class="text-red-50" href="Olvidaste_Password.php">Olvidates Tu Contraseña?</a></p>
                        <button  id="btn_login" class="btn-login" type="submit">Iniciar</button>
                        <div class="c-icon">
                            <a href="#!" class="text-red"><i class="fab fa-facebook-f fa-lg"></i></a>
                            <a href="#!" class="text-red"><i class="fab fa-twitter fa-lg mx-4 px-2"></i></a>
                            <a href="#!" class="text-red"><i class="fab fa-google fa-lg"></i></a>
                        </div>
                    </form>
                </div>
                <div>
                    <p class="mb-0">¿Eres nuevo en Oxxo.com? <a href="./Registro_cuenta.php" class="btn-logi">Registrate</a></p>
                </div>
                <div>
                    <p class="mb-0">Volver al Inicio <a href="index.php" class="fas fa-home"></a></p>
                </div>
            </div>
            <?php
            include './Controller/Inicio_Sesion.php';
            $result['success'] = false;

            if ($result['success']) {
                echo "<h6><center>Inicio de Sesión Correcto. Bienvenido, " . htmlspecialchars($result['user_name']) . ".</center></h6>";
                header('location: index.php');
                exit();
            } else {
                echo "<h6 style='color: red; font-size:15px;'><center>" . htmlspecialchars($result['message']) . "</center></h6>";
            }
            ?>
        </section>
        <script src="js/Inicio_Session/Inicio_Sesion.js"></script>
    </body>
</html>
