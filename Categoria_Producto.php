<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>OXXO ® | Categorias</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <?php include_once ('./Links.php'); ?>
    </head>
    <header>
        <?php include_once ('./Headers.php'); ?>
    </header>
    <body>
        <main>
            <div class="c_category_pod c-body">
                <div class="row">
                    <!--                Los mismo aqui se paso al controlador.-->
                    <h4 class="label_1">Descubre increíbles precios en OXXO</h4>
                    <?php include_once ('./Controller/Productos_de_Categoria.php'); ?>
                </div>
            </div>
        </main>
    </body>
    <footer>
        <?php include_once ('./Footers.php'); ?>
    </footer>
</html>