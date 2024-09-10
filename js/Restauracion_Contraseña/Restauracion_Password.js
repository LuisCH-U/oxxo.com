var W_Password = $('.content-password');

W_Password.find("#Btn_Restaura").on('click', function (e) {
    if (Funciones.Valida_Campos_password() === false) {
        e.preventDefault();
        return;
    }
});
W_Password.find("#DNI").on('input', function (e) {
    e.preventDefault();
    if (W_Password.find("#DNI").val() === "") {
        W_Password.find("#CLAVE").prop('disabled', true);
        W_Password.find("#CLAVE_R").prop('disabled', true);
    } else {
        W_Password.find("#CLAVE").prop('disabled', false);
        W_Password.find("#CLAVE_R").prop('disabled', false);
    }
});
var Funciones = {

    Valida_Campos_password: () => {
        var cont = 0;
        if (W_Password.find("#DNI").val() === "") {
            Swal.fire({
                title: '!Aviso',
                text: 'Falta Ingresar su DNI'
            });
            W_Password.find("#DNI").focus();
            cont++;
            return false;
        }
        if (W_Password.find("#CLAVE").val() === "") {
            Swal.fire({
                title: '!Aviso',
                text: 'Falta ingresar su nueva Contraseña'
            });
            W_Password.find("#CLAVE").focus();
            cont++;
            return false;
        }
        if (W_Password.find("#CLAVE_R").val() === "") {
            Swal.fire({
                title: '!Aviso',
                text: 'Falta confirmar su nueva Contraseña'
            });
            W_Password.find("#CLAVE_R").focus();
            cont++;
            return false;
        }
        if (W_Password.find("#CLAVE").val() !== W_Password.find("#CLAVE_R").val()) {
            Swal.fire({
                title: '!Aviso',
                text: 'Contraseña es diferente a la Anterior'
            });
            cont++;
            return false;
        }
        if (cont > 0) {
            return false;
        }
    },
};