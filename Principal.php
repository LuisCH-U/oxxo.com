<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>OXXO ® | Así de Fácil</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    </head>
    <body>
        <main>
            <div class="row">
                <h3 class="label_1">¡Las Mejores Promos!</h3>
                <!--Si Genera error, lo pase al controlador el producto, promos y ofertas,-->
                <?php include './Controller/Ofertas_Del_Mes.php'; ?>
                <?php include './Controller/Promociones.php'; ?>
                <?php include './Controller/Productos.php'; ?> 
            </div>
        </main>
    </body>
</html>
