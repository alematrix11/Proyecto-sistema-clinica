<?php 

    session_start();
    
    //Si la sesion del administrador es valida, accede al contenido de administrador
    if(isset($_SESSION ['admin'])){
        
        //echo 'Bienvenido al sistema de administracion de la Clinica '.$_SESSION ['admin'];
        
        //echo '<br><br><a href="cerrar_admin.php">Cerrar sesión</a>';
        
        header("location:administrador_valido");
        
    }
    //Si la sesion del admin no es valida mostramos un mensaje para que inicie sesion
    else{
        
        //Se muestra una alerta con codigo js para mostrar un mensaje de aviso que no se inicio sesion
        echo "<script>
                alert('Debe iniciar sesion como administrador nuevamente');
            </script>";
        
        //Se redireciona a una pagina de admin no valido, para que inicie sesion
        header("location: administrador_no_valido.php");
    }

?>