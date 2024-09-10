<?php
session_start();
?>
<html>
    <body>
        <?php
        $name_user = isset($_SESSION['NOMBRE']) ? $_SESSION['NOMBRE'] : "";
        $Usuario = $name_user;
        ?>
        <header class="py-2 border-bottom fixed-top content-header">
            <div class="red">
                <div class="c_titulo">
                    Sobrin@ entregamos tu pedido en 30 minutos!
                </div>
            </div>
            <div class="container-fluid">
                <div class="row align-items-center justify-content-between">
                    <div class="col-lg-2 col-md-1 col-10">
                        <a href="index.php" class="d-flex align-items-center mb-2 mb-lg-0 link-body-emphasis text-decoration-none">
                            <img src="./img/logo_oxxo-color.png" alt="Logo de Oxxo" width="100" height="50" class="logo-img">
                        </a>
                    </div>
                    <div class="col-lg-6 col-md-5 col-10 d-flex align-items-center" >
                        <button class="btn_nadvar">
                            <i class="fas fa-bars fa-lg"></i>
                        </button>
                        <ul class="nav justify-content-center justify-content-lg-start flex-grow-1 nav-menu" id="nav-menu">
                            <?php include './Sub_Categorias.php'; ?> 
                        </ul>
                    </div>
                    <div class="col-lg-4 d-flex align-items-center justify-content-between">
                        <form class="c-form">
                            <input class="c-form-search" id="busc" type="search" placeholder="Buscar..." aria-label="Buscar">
                            <button id="btn" class="btn-search btn-outline-secondary" type="submit"><i class="fas fa-search"></i></button>
                        </form>
                        <div class="navbar">
                            <div class="dropdown">
                                <button class="dropbtn">
                                    <i class="fas fa-user-circle"></i> Hola de Nuevo <?php echo htmlspecialchars($Usuario); ?>
                                </button>
                                <div class="dropdown-content">
                                    <?php if ($Usuario): ?>
                                        <a class="btn_inic" href="Perfil_Usuario.php" id="mi_perfil"><i class="fas fa-user"> Mi Perfil</i></a>
                                        <a class="btn_inic" href="Close.php" id="cerrar_sesion"><i class="fas fa-sign-out-alt"> Cerrar Sesión</i></a>
                                    <?php else: ?>
                                        <a class="btn_inic" href="Inicio_Sesion.php"><i class="fas fa-sign-in-alt"> Iniciar Sesión</i></a>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
                        <div class="contenedor-carrito">
                            <?php if ($Usuario): ?>
                                <?php include './Controller/Cantidad_ProductosControllers.php'; ?>
                                <a class="btn-carrito" href="#">
                                    <i class="fas fa-shopping-cart"></i>
                                    <?php if ($contador_carrito): ?>
                                    <span class="contador"><?php echo $contador_carrito; ?></span>
                                    <?php endif; ?>
                                </a>
                                <div class="carrito-desplegable">
                                    <?php include './Controller/Carrito_Previo.php'; ?>                             
                                    <div class="btn_compra">
                                        <a href="Carrito_Compras.php" class="btn_text">Continuar Compra</a>
                                    </div>
                                </div>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>
        </header>
        <script src="js/Headers/Headers.js"></script>
    </body>
</html>