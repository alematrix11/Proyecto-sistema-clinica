<?php 

    session_start();
    
    //30_ Si la sesion es valida, accede al contenido de los usuarios pacientes
    if(isset($_SESSION ['usuario'] )){
        //echo 'Bienvenido al sistema de turnos de la Clinica '.$_SESSION ['usuario'];
        //echo '<br><br><a href="cerrar.php">Cerrar sesión</a>';
        
        if(isset($_SESSION['usuarioId'])){
            
            header("location:usuarios_validos");
            
        }
        
    }
    //31_ Si la sesion no es valida mostramos un mensaje para que inicie sesion
    else{
        
        //Se muestra una alerta con codigo js para mostrar un mensaje de aviso que no se inicio sesion
        echo "<script>
                alert('Debe iniciar sesion para poder acceder a solicitar un turno');
            </script>";
        
        //32_ Se redireciona a una pagina de usuario no valido, para que inicie sesion
        header("location:usuarios_no_validos.php");
    }

?>