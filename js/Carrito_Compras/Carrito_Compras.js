var w_carrito_pago = $('.content-carrito');

let Tarjeta_Credito = document.querySelector('.c_card_tc_credito'),
        Cod_QR = document.querySelector('.c-detalles'),
        chk_tarjeta = document.getElementById('c-card-credito'),
        chk_pago = document.getElementById('Pago_Contra'),
        chk_plin = document.getElementById('plin');

//Validaciones 
w_carrito_pago.off('click', '#c-card-credito').on('click', '#c-card-credito', function () {
    F_Carrito_Compras.Pago_Detalle();
});
w_carrito_pago.off('click', '#Pago_Contra').on('click', '#Pago_Contra', function () {
    F_Carrito_Compras.Pago_Detalle();
});

w_carrito_pago.off('click', '#btn_pagar').on('click', '#btn_pagar', function () {
    if (chk_pago.checked) {
        Swal.fire({
            title: '¿Confirme su compra?',
            html: '<i class="fas fa-shopping-cart fa-2x" style="color: #ff3346;"></i>',
            showCancelButton: true,
            confirmButtonText: 'Sí, continuar',
            cancelButtonText: 'No, cancelar',
            confirmButtonColor: '#46ff33',
            cancelButtonColor: '#d33',
            background: '#f8f9fa'
        }).then((result) => {
            if (result.isConfirmed) {
                window.location.href = './Controller/Finaliza_CompraControllers.php';
                Swal.fire('¡Confirmado!', 'Su compra se reralizo correctamente', 'success');
            } else if (result.dismiss === Swal.DismissReason.cancel) {
                Swal.fire('Cancelado', 'Se cancelo su compra', 'error');
            }
        });
    } else {
        if (F_Carrito_Compras.Valida_Campos() === false) {
            return false;
        } else {
            Swal.fire({
                title: '¿Confirme su compra?',
                html: '<i class="fas fa-shopping-cart fa-2x" style="color: #ff3346;"></i>',
                showCancelButton: true,
                confirmButtonText: 'Sí, continuar',
                cancelButtonText: 'No, cancelar',
                confirmButtonColor: '#46ff33',
                cancelButtonColor: '#d33',
                background: '#f8f9fa'
            }).then((result) => {
                if (result.isConfirmed) {
                    window.location.href = './Controller/Finaliza_CompraControllers.php';
                    Swal.fire('¡Confirmado!', 'Su compra se reralizo correctamente', 'success');
                } else if (result.dismiss === Swal.DismissReason.cancel) {
                    Swal.fire('Cancelado', 'Se cancelo su compra', 'error');
                }
            });
        }
    }
});
w_carrito_pago.off('click', '#btn_cancelar').on('click', '#btn_cancelar', function () {
    if (chk_pago.checked) {
        Swal.fire({
            title: '¿Estás seguro?',
            text: '¿Se Cancelara su Compra?',
            icon: 'question',
            showCancelButton: true,
            confirmButtonText: 'Sí, continuar',
            cancelButtonText: 'No, cancelar',
            confirmButtonColor: '#ff5833',
            cancelButtonColor: '#33ceff',
            background: '#f8f9fa'
        }).then((result) => {
            if (result.isConfirmed) {
                Swal.fire('¡Confirmado!', 'Se cancelo su compra correctamente', 'success');
                Tarjeta_Credito.style.display = 'none';
            } else if (result.dismiss === Swal.DismissReason.cancel) {
                Swal.fire('Cancelado', '', 'error');
            }
        });
    } else {
        Swal.fire({
            title: '¿Estás seguro?',
            text: '¿Se borraran los datos de su tarjeta?',
            icon: 'question',
            showCancelButton: true,
            confirmButtonText: 'Sí, continuar',
            cancelButtonText: 'No, cancelar',
            confirmButtonColor: '#ff5833',
            cancelButtonColor: '#33ceff',
            background: '#f8f9fa'
        }).then((result) => {
            if (result.isConfirmed) {
                Swal.fire('¡Confirmado!', 'Se cancelo su compra correctamente', 'success');
                w_carrito_pago.find("#Num_Tarj").val("");
                w_carrito_pago.find("#Fecha_Exp").val("");
                w_carrito_pago.find("#cvc").val("");
                w_carrito_pago.find("#Nomb_Titu").val("");
                w_carrito_pago.find("#c-card-credito").iCheck('uncheck');
                Tarjeta_Credito.style.display = 'none';
            } else if (result.dismiss === Swal.DismissReason.cancel) {
                Swal.fire('Cancelado', '', 'error');
            }
        });
    }
});

w_carrito_pago.find('#Nomb_Titu').on('input', function (e) {
    e.preventDefault();
    e.target.value = e.target.value.replace(/[^a-zA-Z\s]/g, '');
    if (w_carrito_pago.find('#Nomb_Titu').val() === "") {
        w_carrito_pago.find("#Num_Tarj").prop('disabled', true);
        w_carrito_pago.find("#Fecha_Exp").prop('disabled', true);
        w_carrito_pago.find("#cvc").prop('disabled', true);
    } else {
        w_carrito_pago.find("#Num_Tarj").prop('disabled', false);
    }
});
w_carrito_pago.find('#Num_Tarj').on('input', function (e) {
    e.preventDefault();
    e.target.value = e.target.value.replace(/[^0-9]/g, '');
    if (w_carrito_pago.find('#Num_Tarj').val() === "") {
        w_carrito_pago.find("#Fecha_Exp").prop('disabled', true);
        w_carrito_pago.find("#cvc").prop('disabled', true);
    } else {
        w_carrito_pago.find("#Fecha_Exp").prop('disabled', false);
        w_carrito_pago.find("#cvc").prop('disabled', false);
    }
});
w_carrito_pago.find('#Fecha_Exp').on('input', function (e) {
    e.preventDefault();

    let V_NUM_TARJ = w_carrito_pago.find('#Num_Tarj').val();

    if (V_NUM_TARJ.length < 16) {
        Swal.fire({
            title: '!Aviso',
            icon: 'warning',
            text: 'Número de tarjeta incompleto.'
        });
        w_carrito_pago.find('#Fecha_Exp').val("");
    }
});
w_carrito_pago.find('#cvc').on('input', function (e) {
    e.preventDefault();
    let v_cvc = w_carrito_pago.find('#cvc').val(),
        cvv_real = w_carrito_pago.find('#cvc').val();
        
    v_cvc = '*'.repeat(cvv_real.length);
    w_carrito_pago.find('#cvc').val(v_cvc);
});

var F_Carrito_Compras = {

    Pago_Detalle: () => {
        if (chk_tarjeta.checked) {
            Tarjeta_Credito.style.display = 'flex';
            Cod_QR.style.display = 'none';
        } else if (chk_pago.checked) {
            Tarjeta_Credito.style.display = 'none';
            Cod_QR.style.display = 'none';
        } else if (chk_plin.checked) {
            Tarjeta_Credito.style.display = 'none';
            Cod_QR.style.display = 'none';
        } else {
            Tarjeta_Credito.style.display = 'none';
            Cod_QR.style.display = 'none';
        }
    },

    Valida_Campos: () => {
        var cont = 0;
        Tarjeta_Credito.style.display = 'flex';
        if (w_carrito_pago.find('#Nomb_Titu').val() === "") {
            Swal.fire({
                title: '!Aviso',
                text: 'Falta Ingresar el Nombre del Titular'
            });
            w_carrito_pago.find('#Nomb_Titu').focus();
            cont++;
            return false;
        }
        if (w_carrito_pago.find('#Num_Tarj').val() === "") {
            Swal.fire({
                title: '!Aviso',
                text: 'Falta Ingresar los N° de su Tarjeta'
            });
            cont++;
            w_carrito_pago.find('#Num_Tarj').focus();
            return false;
        }
        if (w_carrito_pago.find('#Fecha_Exp').val() === "") {
            Swal.fire({
                title: '!Aviso',
                text: 'Falta Ingresar la Fecha de Expiración'
            });
            cont++;
            w_carrito_pago.find('#Fecha_Exp').focus();
            return false;
        }
        if (w_carrito_pago.find('#cvc').val() === "") {
            Swal.fire({
                title: '!Aviso',
                text: 'Falta Ingresar Su Código CVV, Del Reverso De Su Tarjeta'
            });
            cont++;
            w_carrito_pago.find('#cvc').focus();
            return false;
        }

        if (cont > 0) {
            return false;
        }
    }
};