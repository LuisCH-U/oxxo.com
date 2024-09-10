<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Regístrate - OXXO</title>  
        <?php include ('./Links.php'); ?>
    </head>
    <body class="c-body-cuenta content-registro">
        <section class="c-body-regi">
            <div class="card-cuenta">
                <div class="card-body-regi">
                    <form action="Controller/Registro.php" method="post">
                        <h2 class="c-titulo">Crear cuenta - Oxxo</h2>
                        <div class="separator"></div>
                        <p class="c-text-titu">¿Eres nuevo en Oxxo?</p>
                        <p class="c-text-sub col-12">Regístrate y disfruta de nuestros beneficios y una experiencia
                            de compra más rápida y sencilla.</p>
                        <div class="zoom-img">
                            <input type="text" id="NOMBRE" name="NOMBRE" class="c-imput" placeholder="Nombre*" />
                        </div>
                        <div class="zoom-img">
                            <input type="text" id="APELLIDO" name="APELLIDO" class="c-imput" placeholder="Apellido*" />
                        </div>
                        <div class="zoom-img">
                            <input type="text" id="DNI" name="DNI" class="c-imput" maxlength="8" placeholder="DNI*" />
                        </div>
                        <div class="zoom-img">
                            <input type="text" id="TELEFONO" name="TELEFONO" class="c-imput" maxlength="9" placeholder="Telefono*" />
                        </div>
<!--                        <div class="zoom-img">
                            <input type="text" id="USUARIO" name="USUARIO" class="c-imput" maxlength="10" placeholder="Usuario*" />
                        </div>-->
                        <div class="zoom-img">
                            <input type="email" id="CORREO" name="CORREO" class="c-imput " placeholder="Correo*" />
                        </div>
                        <div class="zoom-img">
                            <input type="password" id="CLAVE" name="CLAVE" class="c-imput " placeholder="Contraseña*"/>
                        </div>
                        <div class="zoom-img">
                            <input type="password" id="CLAVE_R" name="CLAVE_R" class="c-imput " placeholder="Confirmar Contraseña*" />
                        </div>
                        <button id="Btn_Registrate" class="btn-regi" type="submit">Registrarse</button>
                    </form>
                </div>
                <div>
                    <p class="mb-0">¿Ya tienes una cuenta? <a href="Inicio_Sesion.php" class="btn-logi">Iniciar sesión</a></p>
                </div>
                <div>
                    <p class="mb-0">Volver al Inicio <a href="index.php" class="fas fa-home"></a></p>
                </div>
            </div>
        </section>
    </body>
    <script src="js/Registro_Cuenta/Registro_Cuenta.js"></script>
</html>
