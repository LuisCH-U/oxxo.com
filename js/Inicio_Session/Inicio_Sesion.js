var W_InicioSesion = $('.content-iniciosesion');

W_InicioSesion.find("#btn_login").on('click', function (e) {
    if (Funciones_InicioSesion.Validar_Campos() === false) {
        e.preventDefault();
        return;
    } 
});

var Funciones_InicioSesion = {

    Validar_Campos: () => {
        var cont = 0;
        if (W_InicioSesion.find("#EMAIL").val() === "") {
            Swal.fire({
                title: '!Aviso',
                text: 'Falta llenar su correo'
            });
            cont++;
            return false;
        }
        if (W_InicioSesion.find("#CLAVE").val() === "") {
            Swal.fire({
                title: '!Aviso',
                text: 'Falta llenar su clave'
            });
            cont++;
            return false;
        }
        if (cont > 0) {
            return false;
        }
    }

};
//$(document).ready(function() {
//    W_InicioSesion.find('#form-login').on('submit', function(e) {
//        e.preventDefault();
//
//        $.ajax({
//            type: 'POST',
//            url: 'Controller/Inicio_Sesion.php',
//            data: $(this).serialize(),
//            dataType: 'json',
//            success: function(response) {
//                if (response.success) {
//                    Swal.fire({
//                        title: 'Inicio de Sesión',
//                        text: response.message,
//                        icon: 'success',
//                        confirmButtonText: 'Aceptar'
//                    }).then((result) => {
//                        if (result.isConfirmed) {
//                            window.location.href = 'index.php'; // Redirigir a la página de inicio después del inicio de sesión exitoso
//                        }
//                    });
//                } else {
//                    Swal.fire({
//                        title: 'Inicio de Sesión',
//                        text: response.message,
//                        icon: 'error',
//                        confirmButtonText: 'Aceptar'
//                    });
//                }
//            },
//            error: function(xhr, status, error) {
//                console.error('Error en la solicitud AJAX:', error);
//                Swal.fire({
//                    title: 'Error',
//                    text: 'Error en la solicitud AJAX',
//                    icon: 'error',
//                    confirmButtonText: 'Aceptar'
//                });
//            }
//        });
//    });
//});
