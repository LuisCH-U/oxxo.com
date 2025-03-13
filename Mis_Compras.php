<!DOCTYPE html>
<html>
    <head>
         <head>
        <meta charset="UTF-8">
        <title>Historial Compras - OXXO</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <?php include './Links.php'; ?>
        <?php include './Headers.php'; ?>
    </head>
    </head>
    <body>
        <div class="c_category_pod c-body">
                <div class="row">
                    <h4 class="label_1">😉 Tu Historial de Compras estara aqui para ti 🧺</h4>
                    <?php include_once ('./Controller/Historial_ComprasControllers.php'); ?>
                </div>
            </div>
    </body>
    <footer>
         <?php include './Footers.php'; ?>
    </footer>
</html>
