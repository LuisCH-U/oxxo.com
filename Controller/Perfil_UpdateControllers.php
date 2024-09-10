<?php
session_start();

if (isset($_SESSION['perfil_update']) && $_SESSION['perfil_update'] == true) {
    
    unset($_SESSION['perfil_update']);
    
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
                            title: 'Perfil Actualizado',
                            text: 'La sesión se cerrará.',
                            icon: 'success',
                            confirmButtonText: 'Aceptar',
                            showConfirmButton: true,
                            timer: 3000
                        }).then(() => {
                            window.location.href = '../Close.php';
                        });
                    };
                </script>
        </head>
        </html>";
    exit;
}
header("Location: index.php");
exit;