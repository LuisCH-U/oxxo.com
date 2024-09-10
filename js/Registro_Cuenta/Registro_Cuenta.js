/* global Swal */

var W_Admin = $(".content-registro");

W_Admin.find("#Btn_Registrate").on('click', function (e) {
    if (Funciones_Registro.Validar_Campos() === false) {
        e.preventDefault();
        return;
    } else {
        Swal.fire({
            title: 'Aviso',
            text: 'Se ha registrado correctamente - ' + $("#NOMBRE").val(),
            icon: 'success',
            confirmButtonText: 'Aceptar'
        }).then((result) => {
            if (result.isConfirmed) {
                window.location.href = 'http://localhost/Proyecto_Oxxo/Inicio_Sesion.php';
            }
        });

    }
    //Funciones_Registro.Guardar();
});

var Funciones_Registro = {

//    Guardar: function() {
//        $.ajax({
//            type: "POST",
//            url: "../Controller/Registro", // Ruta relativa desde Registro_Cuenta.js
//            dataType: 'json',
//            success: function (response) {
//                console.log(response);
//                if (response.success) {
//                    alert("Registro exitoso: " + response.message);
//                    // Puedes redirigir a otra página o realizar otras acciones aquí
//                } else {
//                    alert("Error: " + response.message);
//                }
//            },
//            error: function (xhr, status, error) {
//                console.error("Error en la solicitud AJAX:", error);
//                alert("Error en la solicitud AJAX");
//                return;
//            }
//        });
//    },

    Validar_Campos: () => {
        var cont = 0;
        if ($("#NOMBRE").val() === "") {
            Swal.fire({
                title: '!Aviso',
                text: 'Falta llenar su Nombre'
            });
            cont++;
            return false;
        }
        if ($("#APELLIDO").val() === "") {
            Swal.fire({
                title: '!Aviso',
                text: 'Falta llenar su Apellido'
            });
            cont++;
            return false;
        }
        if ($("#DNI").val() === "") {
            Swal.fire({
                title: '!Aviso',
                text: 'Falta llenar su DNI'
            });
            cont++;
            return false;
        }
        if ($("#TELEFONO").val() === "") {
            Swal.fire({
                title: '!Aviso',
                text: 'Falta llenar su Telefono'
            });
            cont++;
            return false;
        }
        if ($("#USUARIO").val() === "") {
            Swal.fire({
                title: '!Aviso',
                text: 'Falta llenar su Usuario'
            });
            cont++;
            return false;
        }
        if ($("#CORREO").val() === "") {
            Swal.fire({
                title: '!Aviso',
                text: 'Falta llenar su Correo'
            });
            cont++;
            return false;
        }
        if ($("#CLAVE").val() === "") {
            Swal.fire({
                title: '!Aviso',
                text: 'Falta llenar su Clave'
            });
            cont++;
            return false;
        }
        if ($("#CLAVE_R").val() === "") {
            Swal.fire({
                title: '!Aviso',
                text: 'Falta Confirmar Su Clave'
            });
            cont++;
            return false;
        }
        if ($("#CLAVE").val() !== $("#CLAVE_R").val()) {
            Swal.fire({
                title: '!Aviso',
                text: 'Clave es diferente a la Anterior'
            });
            cont++;
            return false;
        }
        if (cont > 0) {
            return false;
        }
    }

};



