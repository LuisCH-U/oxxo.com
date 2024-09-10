<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>OXXO ® | Compras</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <?php include_once ('./Links.php'); ?>
        <script src="https://checkout.izipay.pe/js/v1"></script>
    </head>
    <body>
        <main>
            <div class="c_carrito_prod content-carrito">
                <div class="c-logo-oxxo cart_container_lbl">
                    <a href="index.php"><img src="./img/logo_oxxo-color.png" alt="Logo de Oxxo" width="100" height="50" class="logo-img"></a>
                    <h4 class="label_4">¡Estás a un click de tu pedido!</h4>
                </div>

                <div class="cart_container">
                    <div class="c_card_compras">
                        <?php include './Controller/Carrito_ComprasControllers.php'; ?>
                    </div>
                    <div class="c_pago">
                        <h4>Medios de Pago</h4>
                        <div class="c_metodo_pago">
                            <label>
                                <input type="radio" name="payment" id="c-card-credito" value="c-card-credito"> Tarjeta de Crédito
                                <i class="fab fa-cc-visa"></i> <i class="fab fa-cc-mastercard"></i> <i class="fab fa-cc-discover"></i> <i class="fab fa-cc-diners-club"></i>
                            </label>
                            <label>
                                <input type="radio" name="payment" id="Pago_Contra" value="Pago_Contra" > Pago ContraEntrega
                            </label><!--
                            <label>
                                <input type="radio" name="payment" id="plin" value="plin" onclick="Pago_Detalle()"> Plin
                            </label>-->
                        </div>
                        <div class="c_card_tc_credito" style="display: none;">
                            <input type="text" id="Nomb_Titu" name="Nomb_Titu" placeholder="Nombre en la tarjeta">
                            <input type="text" id="Num_Tarj" maxlength="16" placeholder="Número de tarjeta"  disabled>
                            <input type="month" id="Fecha_Exp" maxlength="5" placeholder="Fecha de vencimiento (MM/AA)" disabled>
                            <input type="text" id="cvc" placeholder="cvv" maxlength="3" disabled>
                        </div>
                        <div class="c-detalles" style="display: none;">
                            <img id="qr-code" src="" alt="QR Code">
                        </div>
                        <div class="btn_pago">
                            <button id="btn_pagar" class="c_success_pago" type="button">Pagar Ahora</button>
                            <button id="btn_cancelar" class="c_danger_pago" type="button">Cancelar</button>
                        </div>
                    </div>
                </div>
            </div>
        </main>
        <script src="js/Carrito_Compras/Carrito_Compras.js"></script>
    </body>
    <footer>
        <?php include_once ('./Footers.php'); ?>
    </footer>
</html>
