<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Tiendas | OXXO</title>
        <?php include ('./Links.php'); ?>
    </head>
    <body class="c-body-cuenta content-password">
        <section class="c-body-regi">
            <div class="card-cuenta">
                <div class="card-body-regi">
                    <form action="Controller/Recuperar_Contraseña.php" method="post">
                        <h2 class="c-titulo">Restablece tu contraseña</h2>
                        <div class="separator"></div>
                        <p class="c-text-titu">¿Olvidaste Tu Contraseña?</p>
                        <p class="c-text-sub col-12">Restablece tu contraseña y sientete seguro con tu nueva contraseña, 
                            por que en oxxo nos preocupamos por nuestros clientes.</p>
                        <div class="zoom-img">
                            <input type="text" id="DNI" name="DNI" class="c-imput" maxlength="8" placeholder="DNI*" />
                        </div>
                        <div class="zoom-img">
                            <input type="password" id="CLAVE" name="CLAVE" class="c-imput" placeholder="Nueva Contraseña*" disabled/>
                        </div>
                        <div class="zoom-img">
                            <input type="password" id="CLAVE_R" name="CLAVE_R" class="c-imput" placeholder="Confirmar Nueva Contraseña*" disabled/>
                        </div>
                        <button id="Btn_Restaura" class="btn-regi" type="submit">Restaura tu clave</button>
                    </form>
                </div>
                <div>
                    <p class="mb-0">Vuelve a <a href="Inicio_Sesion.php" class="btn-logi">Iniciar sesión</a></p>
                </div>
                <div>
                    <p class="mb-0">Inicio <a href="index.php" class="fas fa-home"></a></p>
                </div>
            </div>
        </section>
    </body>
    <script src="js/Restauracion_Contraseña/Restauracion_Password.js"></script>
</html>
