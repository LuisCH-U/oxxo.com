<?php
session_start();

if (isset($_SESSION['OK']) && $_SESSION['OK'] == true) {
    
    unset($_SESSION['OK']);
    
    echo "<!DOCTYPE html>
        <html lang='es'>
        <head>
            <meta charset='UTF-8'>
            <meta http-equiv='X-UA-Compatible' content='IE=edge'>
            <title>OXXO ® | Asi de Fácil</title>
            <link rel='icon' href='../img/logo_oxxo-color.png' type='png'>
            <meta name='viewport' content='width=device-width, initial-scale=1.0'>";
        include '../Links.php';
        echo    "<script>
                    window.onload = function() {
                        Swal.fire({
                            title: 'Compra Realizada Con Exito',
                            text: 'Gracias por su compra.',
                            icon: 'success',
                            confirmButtonText: 'Aceptar',
                            showConfirmButton: true,
                            timer: 3000
                        }).then(() => {
                            window.location.href = '../index.php';
                        });
                    };
                </script>
        </head>
        </html>";
    exit;
}
header("Location: index.php");
exit;