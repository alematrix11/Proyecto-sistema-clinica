<?php

    session_start();

    //12_ Se debe destruir todas las variables de sesión.
    $_SESSION = array();

    //13_ Si se desea destruir la sesión completamente, también se deben borrar las cookies de la sesión
    //Nota: ¡Esto destruirá la sesión, y no la información de la sesión!
        if (ini_get("session.use_cookies")) {
            $params = session_get_cookie_params();
            setcookie(session_name(), '', time() - 42000,
                $params["path"], $params["domain"],
                $params["secure"], $params["httponly"]
            );
        }

    //Se finaliza la sesión
    session_destroy();
    
    //Mostramos un mensaje y se redireciona con javascript

    echo "<script>
        
        alert('Su sesion ha sido cerrada correctamente');
        
        window.location.href='index.php';
        
    </script>";

    //Se redirecciona a la pagina principal
    //header("location:index.php");

?>